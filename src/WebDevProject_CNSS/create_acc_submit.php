<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: create_acc.php");
    exit();
}

$company_id        = trim($_POST["company_id"] ?? "");
$first_name        = trim($_POST["first_name"] ?? "");
$last_name         = trim($_POST["last_name"] ?? "");
$company_email     = trim($_POST["company_email"] ?? "");
$username          = trim($_POST["username"] ?? "");
$password          = (string)($_POST["password"] ?? "");
$confirm_password  = (string)($_POST["confirm_password"] ?? "");
$terms             = isset($_POST["terms"]);

if (
    $company_id === "" || $first_name === "" || $last_name === "" ||
    $company_email === "" || $username === "" || $password === "" ||
    $confirm_password === "" || !$terms
) {
    header("Location: create_acc.php?error=missing");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: create_acc.php?error=password_mismatch");
    exit();
}

// Letters + numbers only for company_id
if (!preg_match('/^[A-Za-z0-9]+$/', $company_id)) {
    header("Location: create_acc.php?error=bad_company_id");
    exit();
}

// Hash password
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert into DB
$stmt = $conn->prepare("
    INSERT INTO acc_creation (company_id, first_name, last_name, company_email, user_name, pswd)
    VALUES (?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssssss", $company_id, $first_name, $last_name, $company_email, $username, $hashed);

if ($stmt->execute()) {
    header("Location: acc_pending.php");
    exit();
} else {
    die("Insert failed: " . $stmt->error);
}