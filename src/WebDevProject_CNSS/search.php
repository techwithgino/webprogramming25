<?php
session_start();
include 'db.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

$type = trim($_GET["type"] ?? "");
$q    = trim($_GET["q"] ?? "");

$allowed = ["case","request","inquiry"];
if (!in_array($type, $allowed, true) || $q === "") {
    header("Location: CaseMgmtPortal.php?error=bad_search");
    exit();
}

$acc_sn = (int)($_SESSION["sn"] ?? 0);
$company_id = trim($_SESSION["company_id"] ?? "");

// Lookup ticket that matches BOTH: ticket_no + entry_type
$stmt = $conn->prepare("
    SELECT ticket_no
    FROM case_mgmt_portal
    WHERE ticket_no = ? AND entry_type = ?
    AND (acc_sn = ? OR company_id = ?)
    LIMIT 1
");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssis", $q, $type, $acc_sn, $company_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if (!$row) {
    header("Location: CaseMgmtPortal.php?error=not_found");
    exit();
}

// Redirect to details page
header("Location: ticket_view.php?ticket_no=" . urlencode($row["ticket_no"]));
exit();