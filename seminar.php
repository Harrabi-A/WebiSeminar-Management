<?php
 session_start();

 if (isset($_SESSION['user'])) {
 
   //check ifuser is logged
 	include("functions.php");
 	/*$SEMINAR = getSeminars();*/
 

 } else {
    /*header("Location: login.php");*/

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
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
        	<h4>Seminar</h4>
		    <table>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Title</th>
				<th>Description</th>
				<th>Manager</th>
				<th>Place</th>



				<?php
				$user="root";
                $host="localhost";
                $password="";
                $database="WebSeminar";
                // Create connection
                $conn = mysqli_connect($host,$user,$password,$database);

                function getSeminars(){
    	        $query = "SELECT * FROM SEMINAR";
    	        $result = mysqli_query($conn,$query);
    	        $arraySeminar = array();

    	        for ($row_no = 0; $row_no <= $result -> mysqli_num_rows; $row_no++){
    	     	$res -> data_seek($row_no);
    	     	$row = $res-> fetch_assoc();
    		    array_push($arraySeminar, $row);

    	        }
                }

                echo print_r($arraySeminar);
                mysqli_close($conn);
				/*foreach ($arraySeminar as $value) {
					echo "<th>'$value['$id']'</th>";
				    echo "<th>'$value['$date']'</th>";
				    /*echo "<th>Title</th>";
				    echo "<th>Description</th>";
				    echo "<th>Manager</th>";
				    echo "<th>Place</th>";
				}*/
				?>




			</tr>
			
		    </table>
        </div>
        

	</div>

</body>
</html>
