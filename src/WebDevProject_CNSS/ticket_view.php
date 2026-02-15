<?php
session_start();
include 'db.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

$ticket_no = trim($_GET["ticket_no"] ?? "");
if ($ticket_no === "") {
    header("Location: CaseMgmtPortal.php?error=missing_ticket");
    exit();
}

$acc_sn = (int)($_SESSION["sn"] ?? 0);
$company_id = trim($_SESSION["company_id"] ?? "");

// Basic CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle comment submit (POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $posted_ticket_no = trim($_POST["ticket_no"] ?? "");
    $comment = trim($_POST["comment"] ?? "");
    $csrf = $_POST["csrf_token"] ?? "";

    if (!hash_equals($_SESSION['csrf_token'], $csrf)) {
        header("Location: ticket_view.php?ticket_no=" . urlencode($ticket_no) . "&error=csrf");
        exit();
    }

    if ($posted_ticket_no !== $ticket_no) {
        header("Location: ticket_view.php?ticket_no=" . urlencode($ticket_no) . "&error=bad_request");
        exit();
    }

    if ($comment === "") {
        header("Location: ticket_view.php?ticket_no=" . urlencode($ticket_no) . "&error=empty_comment");
        exit();
    }

    // Build the text that will be appended to message
    // Using acc_sn as identifier (you can swap this for user's name if you have it in session)
    $now = date("Y-m-d H:i:s");
    $first_name = $_SESSION["first_name"] ?? "User";
    $last_name  = $_SESSION["last_name"] ?? "";

    $full_name = trim($first_name . " " . $last_name);

    $appendBlock = "\n\n--- Comment by {$full_name} at {$now} ---\n" . $comment;

    // Append to existing message (keeps your existing schema)
    $upd = $conn->prepare("
        UPDATE case_mgmt_portal
        SET message = CONCAT(IFNULL(message,''), ?)
        WHERE ticket_no = ?
        AND (acc_sn = ? OR company_id = ?)
        LIMIT 1
    ");

    if (!$upd) {
        die("Prepare failed: " . $conn->error);
    }

    $upd->bind_param("ssis", $appendBlock, $ticket_no, $acc_sn, $company_id);
    $upd->execute();

    if ($upd->affected_rows < 1) {
        // Either not found, or user not allowed to update
        header("Location: CaseMgmtPortal.php?error=not_allowed_or_not_found");
        exit();
    }

    // PRG redirect to avoid double-submit
    header("Location: ticket_view.php?ticket_no=" . urlencode($ticket_no) . "&success=comment_added");
    exit();
}

// Get ticket details (and restrict access)
$stmt = $conn->prepare("
    SELECT ticket_no, entry_type, first_name, last_name, email, subject, message, created_at, company_id
    FROM case_mgmt_portal
    WHERE ticket_no = ?
    AND (acc_sn = ? OR company_id = ?)
    LIMIT 1
");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sis", $ticket_no, $acc_sn, $company_id);
$stmt->execute();
$res = $stmt->get_result();
$t = $res->fetch_assoc();

if (!$t) {
    header("Location: CaseMgmtPortal.php?error=not_found");
    exit();
}

include 'header_portal.php';
?>

<!-- PAGE WRAPPER (forces footer to bottom) -->
<div style="min-height:90vh; display:flex; flex-direction:column;">

    <!-- MAIN CONTENT grows to fill space -->
    <main style="flex:1;">
        <div class="container" style="max-width: 900px; margin: 3rem auto;">
            <h2><?php echo strtoupper(htmlspecialchars($t["entry_type"])); ?> Details</h2>

            <?php if (!empty($_GET["success"]) && $_GET["success"] === "comment_added"): ?>
                <div style="margin-top:1rem; padding:0.75rem 1rem; border:1px solid #bbf7d0; background:#f0fdf4; border-radius:10px;">
                    ✅ Comment added successfully.
                </div>
            <?php endif; ?>

            <?php if (!empty($_GET["error"])): ?>
                <div style="margin-top:1rem; padding:0.75rem 1rem; border:1px solid #fecaca; background:#fef2f2; border-radius:10px;">
                    ⚠️
                    <?php
                        $err = $_GET["error"];
                        if ($err === "empty_comment") echo "Please enter a comment before submitting.";
                        elseif ($err === "csrf") echo "Security check failed. Please refresh and try again.";
                        elseif ($err === "bad_request") echo "Invalid request.";
                        else echo "Something went wrong. Please try again.";
                    ?>
                </div>
            <?php endif; ?>

            <div style="margin-top: 1.5rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px;">
                <p><strong>Ticket Number:</strong> <?php echo htmlspecialchars($t["ticket_no"]); ?></p>
                <p><strong>Company ID:</strong> <?php echo htmlspecialchars($t["company_id"]); ?></p>
                <p><strong>Reported By:</strong> <?php echo htmlspecialchars($t["first_name"] . " " . $t["last_name"]); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($t["email"]); ?></p>
                <p><strong>Subject:</strong> <?php echo htmlspecialchars($t["subject"]); ?></p>
                <p><strong>Message / Updates:</strong><br><?php echo nl2br(htmlspecialchars($t["message"])); ?></p>
                <p><strong>Date Submitted:</strong> <?php echo htmlspecialchars($t["created_at"]); ?></p>
            </div>

            <!-- Add Comment / Update Ticket -->
            <div style="margin-top: 1.5rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px;">
                <h3 style="margin-top:0;">Add Comment / Update Ticket</h3>

                <form method="POST" action="ticket_view.php?ticket_no=<?php echo urlencode($ticket_no); ?>">
                    <input type="hidden" name="ticket_no" value="<?php echo htmlspecialchars($ticket_no); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <label for="comment" style="display:block; font-weight:600; margin-bottom:0.5rem;">
                        Your Comment
                    </label>
                    <textarea
                        id="comment"
                        name="comment"
                        rows="5"
                        style="width:100%; padding:0.75rem; border:1px solid #e5e7eb; border-radius:10px; resize:vertical;"
                        placeholder="Type your update/comment here..."
                        required
                    ></textarea>

                    <button
                        type="submit"
                        style="margin-top:0.75rem; padding:0.6rem 1rem; border:0; border-radius:10px; cursor:pointer;"
                    >
                        Submit Comment
                    </button>
                </form>
            </div>

            <p style="margin-top: 2rem;">
                <a href="CaseMgmtPortal.php">← Back to Portal</a>
            </p>
        </div>
    </main>

    <!-- FOOTER sits at bottom because main is flex:1 -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</div>