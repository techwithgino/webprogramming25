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

        <div style="margin-top: 1.5rem; padding: 1.25rem; border: 1px solid #e5e7eb; border-radius: 12px;">
            <p><strong>Ticket Number:</strong> <?php echo htmlspecialchars($t["ticket_no"]); ?></p>
            <p><strong>Company ID:</strong> <?php echo htmlspecialchars($t["company_id"]); ?></p>
            <p><strong>Reported By:</strong> <?php echo htmlspecialchars($t["first_name"] . " " . $t["last_name"]); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($t["email"]); ?></p>
            <p><strong>Subject:</strong> <?php echo htmlspecialchars($t["subject"]); ?></p>
            <p><strong>Message:</strong><br><?php echo nl2br(htmlspecialchars($t["message"])); ?></p>
            <p><strong>Date Submitted:</strong> <?php echo htmlspecialchars($t["created_at"]); ?></p>
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