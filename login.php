<?php
session_start();

if (isset($_SESSION['user'])) {
	header("Location: home.php");
 

 }

?>

<html>
<head>
      <title>   WebSeminar Reservation    </title>
    <link rel="stylesheet" href="style.css">
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
                    <li><a href="signup.php">Singup</a></li>
                </ul>
            </div>
        </div>
        <div class="form">
        	<form action="logincheck.php" method="post">
        		<div id="login">
        		<h3>Login</h3><br>
        		<input type="text" name="email" placeholder="Enter your email"><br><br>
        		<input type="text" name="password" placeholder="Enter your password"><br><br>
        		<button class="btn"></a>Login</button>
        		</div>
        	</form>
        </div>
        <div>
            <p class="introduction">WebSeminar is a management platform to organize registration for Seminar Event and Webinar Event.</p>
        </div>
    </div>    
       
</body>
</html>
