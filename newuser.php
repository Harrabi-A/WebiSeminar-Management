<?php
session_start();
if (isset($_SESSION['user'])) {
	header("Location: home.php");
}
if ($_POST['email'] && $_POST['password'] && $_POST['name'] && $_POST['surname']) {
    
    $email = trim($_POST['email']);
    $userpass = trim($_POST['password']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);

    $user="root";
    $host="localhost";
    $password="";
    $database="WebSeminar";

    // Create connection
    $conn = mysqli_connect($host,$user,$password,$database);
    

    $query2 = "SELECT * FROM USER WHERE email='$email'";

    //check if user already exist
    $result = mysqli_query($conn,$query2);
    if(isset($result)){
        header("Location: signup.php");
    }else{

    $query = "INSERT INTO USER VALUES ('$email','$userpass','$name','surname')";
    mysqli_query($conn,$query);

    

    $result = mysqli_query($conn,$query2);
    if ($rows=mysqli_fetch_assoc($result)) {
    	$_SESSION['user']=$email;
    	header("Location: home.php");
    }
    }

}else{
header("Location: signup.php");
}
?>
