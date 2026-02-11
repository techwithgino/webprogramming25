<?php
function add ($name) {
    echo "$name <br ?>";
    }
add ("Juha");
add ("Timo");

function add1 ($name, $address){
    echo "Name: $name Addresses:$address <br />";
}
add1 ("Deepak", "Kajaani");
add1 ("Juha", "Tornio");
?>

<?php
function test(){
    echo "this is my first function <br />";
}
test();
Test ();
TEST();
?>

<?php
$servername = "localhost";
$username = "testuser";
$password = "Password123";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>