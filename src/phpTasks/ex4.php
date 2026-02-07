<?php include 'header.php'; ?>

<main class="container mt-4">

    <h2>Exercise 4</h2>

    <div class="mt-4">
        <h4>Are you Eligible to vote?</h4>
        <p>
            Please enter your name and age below to check.
        </p>
        <form method="post" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="First and Last Name" required>
            </div>
            <div class="col-md-6">
                <input type="number" name="age" class="form-control" placeholder="Age" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Check</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['age']) && isset($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            $age = intval($_POST['age']);

            if ($age >= 18) {
                echo "<h4>You are eligible to vote!</h4>";
            } else {
                echo "<h4>Sorry, you are NOT eligible to vote yet.</h4>";
            }
        }
        ?>
    </div>

    <!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->
    <div class="mt-4">
        <h4>Exercise 4 - 3 (Switch Case)</h4>
        <?php
        $month = date("F");

        switch ($month) {
            case "August":
                echo "<p>It's August, so it's still holiday.</p>";
                break;
            default:
                echo "<p>Not August, this is <b>$month</b> so I don't have any holidays.</p>";
        }
        ?>
    </div>

    <!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->
    
    <div class="mt-4">
        <h4>Exercise 4-4 (Multiplication Table - Loop)</h4>

        <form method="post" class="row g-3 justify-content-center">
            <div class="col-md-4">
                <input type="number" name="n_table" class="form-control" placeholder="Enter a number" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Generate Table</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['n_table'])) {
            $n = intval($_POST['n_table']);

            echo "<h5>RESULTS:</h5>";
            echo "<ul class='list-group'>";
            for ($i = 1; $i <= 10; $i++) {
                echo "<li class='list-group-item'>$n x $i = " . ($n * $i) . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

    <div class="mt-4">
        <h4>Exercise 5 - 6 (While Loop)</h4>
        <form method="post" class="row g-3 justify-content-center">
            <div class="col-md-4">
                <input type="number" name="n_while" class="form-control" placeholder="Enter a number" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Print Numbers</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['n_while'])) {
            $n2 = intval($_POST['n_while']);
            $i = 1;

            echo "<p>";
            while ($i <= $n2) {
                echo $i . " ";
                $i++;
            }
            echo "</p>";
        }
        ?>
    </div>

    <!-- 000000000000000000000000000000000000000000000000000000000000000000000000000000000000 -->

    <div class="mt-4">
        <h4>Exercise 4 - 6 (Foreach Loop)</h4>
        <?php
        $myarray = array("HTML", "CSS", "PHP", "JavaScript");

        echo "<ul class='list-group'>";
        foreach ($myarray as $item) {
            echo "<li class='list-group-item'>$item</li>";
        }
        echo "</ul>";
        ?>
    </div>

</main>

<?php include 'footer.php'; ?>