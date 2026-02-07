<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
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

        /* Top navigation */
        .top-nav {
            background-color: #f5f5f5;
            padding: 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .top-nav a {
            background-color: #000;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            border-radius: 4px;
        }

        .top-nav a:hover {
            background-color: #333;
        }

        .top-nav a.active {
            background-color: #0b6623;
        }

        /* Main content */
        main {
            padding: 40px;
            text-align: center;
        }
        main.full-bg {
            background-image: url('img_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: calc(90vh - 200px);
            color: white;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Footer */
        footer {
            background-color: #e0e0e0;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;   /* centers the table */
            width: 350px;
        }

        th, td {
            border: 1px solid black; /* THIS is the border */
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<header>
    My Web Programming Exercises
</header>

<nav class="top-nav">
    <a href="main.php" class="<?php if($currentPage=='main.php') echo 'active'; ?>">Home</a>
    <a href="ex1.php" class="<?php if($currentPage=='ex1.php') echo 'active'; ?>">Exercise 1</a>
    <a href="ex2.php" class="<?php if($currentPage=='ex2.php') echo 'active'; ?>">Exercise 2</a>
    <a href="ex3.php" class="<?php if($currentPage=='ex3.php') echo 'active'; ?>">Exercise 3</a>
    <a href="ex4.php" class="<?php if($currentPage=='ex4.php') echo 'active'; ?>">Exercise 4</a>
    <a href="ex5.php" class="<?php if($currentPage=='ex5.php') echo 'active'; ?>">Exercise 5</a>
    <a href="ex6.php" class="<?php if($currentPage=='ex6.php') echo 'active'; ?>">Exercise 6</a>
</nav>