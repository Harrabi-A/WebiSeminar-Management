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
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="content">
            <h4>Welcome <?php echo $_SESSION['user']; ?> <br><br><br><br>Your events:</h4>
            <table>
            <form action="removeSeminar.php" method="post">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Manager</th>
                <th>Place/Link</th>
            </tr>


                <?php
                $user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

                $email=$_SESSION['user'];
                $query = "SELECT S.* FROM SEMINAR S JOIN PARTICIPATIONSEMINAR P WHERE S.id=P.id AND email='$email'";
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
                    <td><?php echo $rows['manager']; ?></td>
                    <td><?php echo $rows['Place']; ?></td>
                    <td><input class="remove" type="submit" name="<?php echo $rows['id'];?>" value="Remove"></td>
                </tr>
                
                <?php 
                }
                ?>
            </form>

            <form action="removeWebinar.php" method="post">
                <?php
                $user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

                $email=$_SESSION['user'];
                $query2 = "SELECT S.* FROM WEBINAR S JOIN PARTICIPATIONWEBINAR P WHERE S.id=P.id AND email='$email'";
                $result2 = mysqli_query($conn,$query2);

                ?>

                <?php

                while($rows=mysqli_fetch_assoc($result2) ) {
                ?>
                <tr> 
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['date']; ?></td>
                    <td><?php echo $rows['title']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['manager']; ?></td>
                    <td><?php echo $rows['link']; ?></td>
                    <td><input class="remove" type="submit" name="<?php echo $rows['id'];?>" value="Remove"></td>
                </tr>
                
                <?php 
                }
                ?>
            </form>

            </tr>
            
            </table>

            <form action="seminarmanager.php" method="post">
                <input class="addEvent" type="submit" name="add" value="Your organized events">
            </form>
        </div>
        </div>
    </div>
</body>
</html>
