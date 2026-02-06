<html>
<head>
    <title>Home - Web Programming Exercises</title>

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

        /* Main content with background */
        main {
            padding: 40px;
            flex: 1;
            text-align: center;

            /* background image */
            background-image: url("img_2.jpg");
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        main h2 {
            font-size: 32px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
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
        <a href="main.php" class="home active">Home</a>
        <a href="ex1.php">Exercise 1</a>
        <a href="ex2.php">Exercise 2</a>
        <a href="ex3.php">Exercise 3</a>
        <a href="ex4.php">Exercise 4</a>
        <a href="ex5.php">Exercise 5</a>
        <a href="ex6.php">Exercise 6</a>
    </nav>

    <main>
        <h2></h2>
        <!-- You can add more content here if you want -->
    </main>

</div>

<footer>
    <p>&copy; 2025 Web Programming. All rights reserved.</p>
</footer>

</body>
</html>