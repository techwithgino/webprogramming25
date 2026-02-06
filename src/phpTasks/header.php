<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Programming Exercises</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header */
        header {
            background-color: #e0e0e0;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        /* Layout */
        .container {
            display: flex;
            min-height: calc(100vh - 140px);
        }

        /* Sidebar */
        nav {
            width: 200px;
            background-color: #f5f5f5;
            padding: 20px;
        }

        nav a {
            display: block;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: #333;
        }

        nav a.home {
            background-color: #0b6623;
        }

        nav a.home:hover {
            background-color: #084d1a;
        }

        nav a.active {
            background-color: #0b6623;
        }

        /* Main content */
        main {
            padding: 40px;
            flex: 1;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center; /* centers all content */
        }

        /* Table styling */
        table {
            border-collapse: collapse;
            width: 350px;
            margin: 20px auto; /* centers the table */
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        /* Footer */
        footer {
            background-color: #e0e0e0;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>

<header>
    My Web Programming Exercises
</header>

<div class="container">

<nav>
    <a href="main.php" class="home <?php if($currentPage=='main.php') echo 'active'; ?>">Home</a>
    <a href="ex1.php" class="<?php if($currentPage=='ex1.php') echo 'active'; ?>">Exercise 1</a>
    <a href="ex2.php" class="<?php if($currentPage=='ex2.php') echo 'active'; ?>">Exercise 2</a>
    <a href="ex3.php" class="<?php if($currentPage=='ex3.php') echo 'active'; ?>">Exercise 3</a>
    <a href="ex4.php" class="<?php if($currentPage=='ex4.php') echo 'active'; ?>">Exercise 4</a>
    <a href="ex5.php" class="<?php if($currentPage=='ex5.php') echo 'active'; ?>">Exercise 5</a>
    <a href="ex6.php" class="<?php if($currentPage=='ex6.php') echo 'active'; ?>">Exercise 6</a>
</nav>