<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM studentsinfo WHERE id='$id'");
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $groupid = $_POST['groupid'];

    $query = mysqli_query($conn, "UPDATE studentsinfo SET first_name='$fname', last_name='$lname', city='$city', groupId='$groupid' WHERE id='$id'");
    if ($query) echo "Information updated successfully.";
}

if (isset($_POST['delete'])) {
    $query = mysqli_query($conn, "DELETE FROM studentsinfo WHERE id='$id'");
    if ($query) echo "Record deleted.";
}
?>

<form method="post">
    <input type="text" name="fname" value="<?php echo $row['first_name']; ?>" required>
    <input type="text" name="lname" value="<?php echo $row['last_name']; ?>" required>
    <input type="text" name="city" value="<?php echo $row['city']; ?>" required>
    <input type="text" name="groupid" value="<?php echo $row['groupId']; ?>" required>
    <button type="submit" name="submit">Update</button>
    <button type="submit" name="delete">Delete</button>
</form>