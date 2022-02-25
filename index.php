<?php
 session_start();

 if (isset($_SESSION['user'])) {
 
   //check ifuser is logged
 

 } else {
   header("Location: login.php");
 }

?>
