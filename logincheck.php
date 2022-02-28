<?php
session_start();

if ($_POST['email'] && $_POST['password']) {
        $email= $_POST['email'];
        $userpass= $_POST['password'];
        $user="root";
        $host="localhost";
        $password="";
        $database="WebSeminar";
        // Create connection
        $conn = mysqli_connect($host,$user,$password,$database);
        $query = "SELECT * FROM USER WHERE email='$email' AND password='$userpass' ";
        echo "$query";
        $result = mysqli_query($conn,$query);
        /*$row=mysqli_fetch_assoc($result);*/
        if($rows=mysqli_fetch_assoc($result)){
            $_SESSION["user"]=$email;
            // Login succeed, session variable updated succefully, ready for redirecting
            header("Location: home.php");
        }
        mysqli_close($conn);
        
}
header("Location: login.php");
?>