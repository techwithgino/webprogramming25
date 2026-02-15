<?php
session_start();

if (!isset($_SESSION["last_ticket"])) {
    header("Location: CaseMgmtPortal.php");
    exit();
}

$ticket = $_SESSION["last_ticket"];
unset($_SESSION["last_ticket"]); // one-time display

include 'header_portal.php';
?>

<div class="container" style="max-width: 820px; margin: 3rem auto;">
    <h2>Thank you! We will get back to you as soon as possible.</h2>
    <p style="margin-top: 1rem; font-size: 1.1rem;">
        Here is your Ticket number <strong><?php echo htmlspecialchars($ticket); ?></strong>
    </p>

    <p style="margin-top: 2rem;">
        <a href="CaseMgmtPortal.php">Back to Portal</a>
    </p>
</div>

<?php include 'footer.php'; ?>