

<html>
<head>
    <title>Exercise 1: Getting Started with PHP - Gino</title>

    <style>
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
    </style>

</head>
<body>

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
<img src="img_1.JPG" width="80%">
</div>

</body>
</html>