<?php
session_start();

$keys=array_keys($_POST);
$eventID=$keys['0'];
$email= $_SESSION['user'];

$user="root";
$host="localhost";
$password="";
$database="WebSeminar";

// Establish connection
$conn = mysqli_connect($host,$user,$password,$database);
$query= "SELECT * FROM SEMINAR WHERE id='$eventID' AND manager='$email'"; // This Query is used to check if the user who request seminar remove is the manager 
$result= mysqli_query($conn,$query);
if ($rows=mysqli_fetch_assoc($result)) {
	// the user is tthe manager
	// delete seminar 
	$query2="DELETE FROM SEMINAR WHERE id='$eventID'";
	$result2 = mysqli_query($conn,$query2,MYSQLI_STORE_RESULT);
	header("Location: home.php");
}else{
	// the user  is participant
	$query3= "DELETE FROM PARTICIPATIONSEMINAR WHERE id='$eventID' AND email='$email'";
	$result3 = mysqli_query($conn,$query3,MYSQLI_STORE_RESULT);
	header("Location: home.php");
}
?>
