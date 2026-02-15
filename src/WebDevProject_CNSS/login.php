<?php
session_start();
include 'db.php';

function h($v) {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $company_id = trim($_POST["company_id"] ?? "");
    $username   = trim($_POST["username"] ?? "");
    $password   = (string)($_POST["password"] ?? "");

    if ($company_id === "" || $username === "" || $password === "") {
        $error = "All fields are required.";
    } else {

        $stmt = $conn->prepare("
            SELECT sn, company_id, user_name, pswd
            FROM acc_creation
            WHERE company_id = ? AND user_name = ?
            LIMIT 1
        ");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $company_id, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["pswd"])) {

            $_SESSION["logged_in"]  = true;
            $_SESSION["username"]   = $user["user_name"];
            $_SESSION["company_id"] = $user["company_id"];
            $_SESSION["sn"]         = $user["sn"];

            header("Location: CaseMgmtPortal.php");
            exit();

        } else {
            $error = "Invalid Company ID, Username, or Password.";
        }
    }
}

// ✅ Only include header AFTER redirect logic
include 'header.php';
?>

<div class="login-page">
    <div class="login-layout">

        <!-- LEFT SIDE: SUPPORT INFORMATION -->
        <div class="login-support">
            <h3>Support & Assistance</h3>

            <p>
                Our experts are available to assist you with support and maintenance issues
                on weekdays from <strong>8:00 AM to 4:00 PM</strong>.
            </p>

            <p>
                As our contract customer, you can also send your support request directly by email to
                <strong>cnsstech@support.fi</strong>.
            </p>

            <p>
                In urgent matters, we recommend contacting us by phone at
                <strong>041 7408 331</strong>.
            </p>
        </div>

        <!-- RIGHT SIDE: LOGIN CARD -->
        <div class="login-card">
            <h2 class="login-title">CNSS Tech Sign In Portal</h2>
            <p class="login-subtitle">Enter your sign in credentials</p>

            <?php if ($error !== ""): ?>
                <div style="color:#e11d48; margin-bottom:1rem; font-weight:600;">
                    <?php echo h($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="login-form">
                <div class="login-field">
                    <label for="company_id">Company ID</label>
                    <input type="text" name="company_id" id="company_id" required>
                </div>

                <div class="login-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="login-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="login-btn">Sign In</button>
            </form>

            <p class="login-help">
                Having trouble signing in? <a href="contact.php">Contact Us</a>
            </p>

            <p class="login-help">
                Don't have an account yet? <a href="create_acc.php">Create an Account</a>
            </p>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>