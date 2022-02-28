<?php
session_start();

if (isset($_SESSION['username'])) {
 
   // user is set
	header("Location: index.php");
 

 } else {
   
 }

?>

</html>
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
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="form">
        	<form action="newuser.php" method="post">
        		<div id="signup">
        		<h3>Sign-up</h3><br>
        		<input type="text" name="email" placeholder="Enter your email"><br><br>
        		<input type="text" name="password" placeholder="Enter your password"><br><br>
                <input type="text" name="name" placeholder="Enter your name"><br><br>
                <input type="text" name="surname" placeholder="Enter your surname"><br><br>
        		<button class="btn"></a>Sign-up</button>
        		</div>
        	</form>
        </div>
        <div>
            <p class="introduction">WebSeminar is a management platform to organize registration for Seminar Event and Webinar Event.</p>
        </div>
    </div>
             
</body>
</html>
