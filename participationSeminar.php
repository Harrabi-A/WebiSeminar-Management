<?php
session_start();
if (isset($_SESSION['user'])) {
	

$keys=array_keys($_POST);
print_r($keys);

$eventID=$keys['0'];
$email=$_SESSION['user'];

$user="root";
$host="localhost";
$password="";
$database="WebSeminar";


// Create connection
$conn = mysqli_connect($host,$user,$password,$database);
$query = "INSERT INTO PARTICIPATIONSEMINAR (email,id) VALUES ('$email','$eventID')";
echo "$query";
$result = mysqli_query($conn,$query,MYSQLI_STORE_RESULT);
}
header("Location: login.php");
?>