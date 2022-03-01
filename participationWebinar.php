<?php
session_start();
if (isset($_SESSION['user'])) {
	

$keys=array_keys($_POST);

$eventID=$keys['0'];
$email=$_SESSION['user'];

$user="root";
$host="localhost";
$password="";
$database="WebSeminar";


// Create connection
$conn = mysqli_connect($host,$user,$password,$database);
$query = "INSERT INTO PARTICIPATIONWEBINAR (email,id) VALUES ('$email','$eventID')";
$result = mysqli_query($conn,$query,MYSQLI_STORE_RESULT);
header("Location: home.php");
}else{
header("Location: login.php");
}
?>
