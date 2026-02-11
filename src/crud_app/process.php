<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $groupid = $_POST['groupid'];

    $sql = "INSERT INTO studentsinfo (first_name, last_name, city, groupId)
            VALUES ('$fname', '$lname', '$city', '$groupid')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>