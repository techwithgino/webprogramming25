<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    // Server-side validation
    if (!isset($_POST['terms'])) {
        die("You must accept the Terms and Conditions.");
    }

    $first_name   = trim($_POST['first_name']);
    $last_name    = trim($_POST['last_name']);
    $email_add    = trim($_POST['email_add']);
    $company_name = !empty($_POST['company_name']) ? trim($_POST['company_name']) : NULL;
    $phone_num    = !empty($_POST['phone_num']) ? trim($_POST['phone_num']) : NULL;
    $query        = trim($_POST['query']);

    // File upload handling
    $attachment = NULL;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $allowed = ['pdf','doc','docx','png','jpg'];
        $fileName = $_FILES['attachment']['name'];
        $fileTmp  = $_FILES['attachment']['tmp_name'];
        $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowed)) {
            die("Invalid file type. Allowed: pdf, doc, docx, png, jpg.");
        }

        if ($_FILES['attachment']['size'] > 2*1024*1024) {
            die("File too large. Max 2MB.");
        }

        if (!is_dir("uploads")) mkdir("uploads", 0777, true);
        $newName = uniqid() . "_" . basename($fileName);
        $destination = "uploads/" . $newName;

        if (move_uploaded_file($fileTmp, $destination)) {
            $attachment = $destination;
        } else {
            die("Failed to upload file.");
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO userquery 
        (first_name, last_name, email_add, company_name, phone_num, query, attachment)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email_add, $company_name, $phone_num, $query, $attachment);

    if ($stmt->execute()) {
        // Display a clean "Thank You" page after submission
        include 'header.php';
        echo '<div class="container mt-5">';
        echo '<h2>Thank You!</h2>';
        echo '<p>Thank you for reaching out to CNSS Tech. Our team will review your inquiry and respond as soon as possible.</p>';
        echo '<a href="index.php" class="btn btn-primary">Back to Home</a>';
        echo '</div>';
        include 'footer.php';
        exit; // stop further execution
    } else {
        echo "<div class='alert alert-danger'>Error: ".$stmt->error."</div>";
    }

    $stmt->close();
    $conn->close();
}
?>