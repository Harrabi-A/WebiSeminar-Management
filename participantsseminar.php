<?php
session_start();

//check if not logged redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"> WebSeminar Reservation </h2>
            </div>
            <div class="menu">
           	    <ul>
           		    <li><a href="seminar.php">Seminar</a></li>
           		    <li><a href="webinar.php">Webinar</a></li>
                    <li><a href="project.php">Project</a></li>
                    <li><a href="home.php">Home</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="content">
            <h4>List of Participant:</h4>
            <table>
            
            <tr>
                <th>email</th>
                <th>Name</th>
                <th>Surname</th>
            </tr>


                <?php
                $user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

                $keys=array_keys($_POST);
                $eventID=$keys['0'];

                $email=$_SESSION['user'];
                $query = "SELECT U.email,U.name,U.surname FROM USER U JOIN PARTICIPATIONSEMINAR P WHERE U.email=P.email AND P.id='$eventID'";
                $result = mysqli_query($conn,$query);

                ?>

                <?php

                while($rows=mysqli_fetch_assoc($result) ) {
                ?>
                <tr> 
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['surname']; ?></td>
                </tr>
                
                <?php 
                }
                ?>
              

            <form action="seminarmanager.php" method="post">
                <input class="addEvent" type="submit" name="add" value="Return">
            </form>
        </div>
        </div>
    </div>
</body>
</html>
