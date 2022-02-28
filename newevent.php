<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
}
if ($_POST['eventType'] && $_POST['date'] && $_POST['title'] && $_POST['adress']) {
	$eventType= $_POST['eventType'];
	$email=$_SESSION['user'];
	$date= trim($_POST['date']);
	$title= trim($_POST['title']);
	$description= trim($_POST['description']);
	$adress= trim($_POST['adress']);

	$user="root";
    $host="localhost";
    $password="";
    $database="WebSeminar";


    // Create connection
    $conn = mysqli_connect($host,$user,$password,$database);
    if ($eventType=="SEMINAR") {
    	$query = "INSERT INTO $eventType (date,title,description,manager,Place) VALUES ('$date','$title','$description','$email','$adress')";
    }else{
    	$query = "INSERT INTO $eventType (date,title,description,manager,link) VALUES ('$date','$title','$description','$email','$adress')";
    }

    mysqli_query($conn,$query);
    

    $query2 = "SELECT MAX(id) AS id FROM $eventType WHERE manager='$email'";

    $result = mysqli_query($conn,$query2);
    $row = mysqli_fetch_assoc($result);
    $eventId= $row['id'];

    $query3="INSERT INTO PARTICIPATION".$eventType." VALUES ('$email','$eventId')";
    mysqli_query($conn,$query3);

    header("Location: home.php");
}

header("Location: addEvent.php");
?>