<?php include 'header.php'; ?>

<main class="container mt-4">

    <h2>Exercise 3</h2>

    <!-- Form creation for exercise 3 -->
    <div class="mt-4">
        <h4>Input your First and Last Name</h4>

        <form method="post" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first = htmlspecialchars($_POST['firstname']);
            $last = htmlspecialchars($_POST['lastname']);
            echo "<h3>Hello $first $last, You are welcome to my site.</h3>";
        }
        ?>
    </div>

    <!-- This is the table from exercise 1 -->
    <div class="mt-4">
            <?php
            $g1 = 5;
            $g2 = 4;
            $g3 = 5;
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
    </div>


    <div class="mt-4">
        <h4>PHP Tasks</h4>

        <?php

        $str1 = "Hello";
        $str2 = "World";
        $joined = $str1 . " " . $str2;
        echo "<p>Joined String: <b>$joined</b></p>";
        echo "<p>Length of joined string: <b>" . strlen($joined) . "</b></p>";


        $num1 = 298;
        $num2 = 234;
        $num3 = 46;
        $sum = $num1 + $num2 + $num3;
        echo "<p>Sum of numbers: <b>$sum</b></p>";


        $browser = $_SERVER['HTTP_USER_AGENT'];
        echo "<p>Browser info: <b>$browser</b></p>";
        ?>
    </div>

</main>

<?php include 'footer.php'; ?>