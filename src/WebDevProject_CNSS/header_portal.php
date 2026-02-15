<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CNSS Tech Case Management Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="portal-header">
    <div class="container portal-header-flex">

        <div class="brand">
            <img src="images/10_img_logo.PNG" alt="CNSS Logo" class="logo-blend">
            <div class="brand-text">
                <span class="brand-name">CNSS Tech</span>
                <span class="brand-tagline">Driving Business Forward with Technology</span>
            </div>
        </div>

        <div class="portal-user">
            <?php if (isset($_SESSION["username"])): ?>
                <span class="portal-username">
                    Logged in as: <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </span>
            <?php endif; ?>
        </div>

    </div>
</header>