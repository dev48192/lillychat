<?php
session_start();

$servername = "localhost";
$username = "id5846261_root";
$password = "dev48192";
$dbname = "id5846261_users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user=$_SESSION['username'];
$sql="UPDATE verifieduser SET uid='off' WHERE email='$user'";
mysqli_query($conn,$sql);
header('Location:index.php');
?>
