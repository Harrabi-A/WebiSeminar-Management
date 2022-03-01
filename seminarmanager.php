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
            	<h4><br><br><br><br>Your organized Seminar:</h4>
            <table>
            <form action="participantsseminar.php" method="post">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Place/Link</th>
                <th>Number of Participants</th>
            </tr>


                <?php
                $user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

                $email=$_SESSION['user'];
                $query = "SELECT S.*,COUNT(S.id) AS NumParticipants FROM SEMINAR S JOIN PARTICIPATIONSEMINAR P WHERE S.id=P.id AND S.manager='$email'";
                $result = mysqli_query($conn,$query);

                ?>

                <?php

                while($rows=mysqli_fetch_assoc($result) ) {
                ?>
                <tr> 
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['title']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['Place']; ?></td>
                    <td><?php echo $rows['NumParticipants']; ?></td>
                    <td><input class="participants" type="submit" name="<?php echo $rows['id'];?>" value="List of Participants"></td>
                </tr>
                
                <?php 
                }
                ?>
            </form>

            <form action="webinarmanager.php" method="post">
                <input class="addEvent" type="submit" name="add" value="SEE WEBINAR">
            </form>
        </div>
        </div>
    </div>
</body>
</html>