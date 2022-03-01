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
            <h4> <br><br><br><br>Your organised webinar</h4>
            <table>
            <form action="participantswebinar.php" method="post">
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
                $query = "SELECT W.*,COUNT(W.id) AS NumParticipants FROM WEBINAR W JOIN PARTICIPATIONWEBINAR P WHERE W.id=P.id AND W.manager='$email'";
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
                    <td><?php echo $rows['link']; ?></td>
                    <td><?php echo $rows['NumParticipants']; ?></td>
                    <td><input class="participants" type="submit" name="<?php echo $rows['id'];?>" value="List of Participants"></td>
                </tr>
                
                <?php 
                }
                ?>
            </form>

            <form action="seminarmanager.php" method="post">
                <input class="addEvent" type="submit" name="add" value="SEE SEMINAR">
            </form>
        </div>
        </div>
    </div>
</body>
</html>