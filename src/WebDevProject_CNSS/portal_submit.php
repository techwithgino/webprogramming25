<?php
session_start();
include 'db.php';

// Must be logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: CaseMgmtPortal.php");
    exit();
}

$acc_sn = (int)($_SESSION["sn"] ?? 0);
if ($acc_sn <= 0) {
    header("Location: login.php");
    exit();
}

$type    = trim($_POST["entry_type"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");

$allowed = ['case','request','inquiry'];
if (!in_array($type, $allowed, true)) {
    header("Location: CaseMgmtPortal.php?error=bad_type");
    exit();
}

if ($subject === "" || $message === "") {
    header("Location: CaseMgmtPortal.php?error=missing");
    exit();
}

// 1) Fetch company_id, first_name, last_name, email from acc_creation
$stmt = $conn->prepare("
    SELECT company_id, first_name, last_name, company_email
    FROM acc_creation
    WHERE sn = ?
    LIMIT 1
");
if (!$stmt) {
    die("Prepare failed (select): " . $conn->error);
}
$stmt->bind_param("i", $acc_sn);
$stmt->execute();
$res = $stmt->get_result();
$acc = $res->fetch_assoc();

if (!$acc) {
    header("Location: login.php");
    exit();
}

$company_id = $acc["company_id"];
$first_name = $acc["first_name"];
$last_name  = $acc["last_name"];
$email      = $acc["company_email"];

// 2) Generate a numeric ticket
function generate_ticket(): string {
    return date("Ymd") . random_int(100000, 999999);
}

// 3) Insert into case_mgmt_portal
$attempts = 0;
do {
    $attempts++;
    $ticket = generate_ticket();

    $ins = $conn->prepare("
        INSERT INTO case_mgmt_portal
        (acc_sn, company_id, first_name, last_name, entry_type, email, subject, message, ticket_no)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    if (!$ins) {
        die("Prepare failed (insert): " . $conn->error);
    }

    $ins->bind_param(
        "issssssss",
        $acc_sn,
        $company_id,
        $first_name,
        $last_name,
        $type,
        $email,
        $subject,
        $message,
        $ticket
    );

    $ok = $ins->execute();

    // Ticket collision rare; retry if duplicate
    if (!$ok && $conn->errno == 1062 && $attempts < 5) {
        continue;
    }

    if (!$ok) {
        die("Insert failed: " . $ins->error);
    }

    break;

} while ($attempts < 5);

// 4) Redirect to thank-you page
$_SESSION["last_ticket"] = $ticket;
header("Location: ticket_success.php");
exit();