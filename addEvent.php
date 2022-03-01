<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Seminar</title>
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
        <div class="content">
        	<h4>Create new Event</h4>
        	<div class="newevent">
        		<form action="newevent.php" method="post">
        			<h5>Select event type: </h5><br>
        			<select class="selector" name="eventType">
        				<option value="SEMINAR">Seminar</option>
        				<option value="WEBINAR">Webinar</option>
        			</select>
        			<br><br><br>
        			<h5>Select event date:</h5>
        			<br>
        			<input class="input2" type="text" name="date" placeholder="date (e.g. 2022-04-18)">
        			<br><br><br>
        			<h5>Choose event Title:</h5>
        			<br>
        			<input class="input2" type="text" name="title" placeholder="Title">
        			<br><br><br>
        			<h5>Enter event Description:</h5>
        			<br>
        			<input class="input2" type="text" name="description" placeholder="Description">
        			<br><br><br>
        			<h5>Enter event Location/Link</h5>
        			<br>
        			<input class='input2' type="text" name="adress" placeholder="Location or Link">
        			<br><br><br>
        			<input class="submitEvent" type="submit" name="submit" value="Add">
        		</form>
        	</div>
        </div>
        

	</div>

</body>
</html>
