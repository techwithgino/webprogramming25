<html>
<head>
    <title>Exercise 1: Getting Started with PHP - Gino</title>

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
            min-height: calc(100vh - 140px); /* header + footer space */
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
    background-color: #0b6623; /* dark green */
        }

        nav a.home:hover {
            background-color: #084d1a;
        }

        main {
            padding: 20px;
            flex: 1;
        }

        table {
            border-collapse: collapse;
            width: 300px;
        }

        th, td {
            border: 1px solid #cfd8e3;
            padding: 8px;
            text-align: center;
        }

        th {
            font-weight: bold;
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
    Web Programming Exercises
</header>

<div class="container">

<nav>
    <a href="#" class="home">Home</a>
    <a href="#" class="active">Exercise 1</a>
    <a href="#">Exercise 2</a>
    <a href="#">Exercise 3</a>
</nav>

    <main>

        <?php
        $title = "PHP is interesting.";
        $g1 = 5;
        $g2 = 4;
        $g3 = 5;

        echo "<h3>Hello world! My name is \"Gino Canoy\".</h3>";
        echo "<h4>$title</h4>";
        ?>

        <table>
            <tr>
                <th>S.n.</th>
                <th>Name</th>
                <th>Grade</th>
            </tr>
            <tr>
                <td>1</td>
                <td>John</td>
                <td><?php echo $g1; ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Alice</td>
                <td><?php echo $g2; ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bob</td>
                <td><?php echo $g3; ?></td>
            </tr>
        </table>

        <br>

        <div>
            <img src="img_1.JPG" width="50%">
        </div>

    </main>

</div>

<footer>
    <p>&copy; 2025 Web Programming. All rights reserved.</p>
</footer>

</body>
</html>