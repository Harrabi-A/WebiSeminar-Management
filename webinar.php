<?php
 session_start();

 if (isset($_SESSION['user'])) {
 
   //check ifuser is logged
 

 } else {
 	
    /*header("Location: login.php");*/

 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Webinar</title>
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
                    <?php 
                    if (isset($_SESSION['user'])) {
                    ?>
                       <li><a href="home.php">Home</a></li> 
                    <?php
                    } else{
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
		
		<table class="content">
			<h4>Webinar</h4>
			<form action="addEvent.php" method="post">
				<input class="addEvent" type="submit" name="add" value="Add Event">
			</form>
			<form action="participationWebinar.php" method="post">
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Title</th>
				<th>Description</th>
				<th>Manager</th>
				<th>link</th>
			</tr>
			<?php
				$user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

            
    	        $query = "SELECT * FROM WEBINAR WHERE date>current_date()";
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
                    <td><?php echo $rows['link']; ?></td>
                    <td><input type="submit" name="<?php echo $rows['id'];?>" value="Participate"></td>
                </tr>
				
                <?php 
                }

                /*mysqli_close($conn);*/
				?>
			</form>
		</table>
	</div>
</body>
</html>
