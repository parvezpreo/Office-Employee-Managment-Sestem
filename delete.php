<?php
	$message="";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "work";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if(isset($_REQUEST['id'])){

	$sql = "DELETE FROM `departments` WHERE `department_id` = '".$_REQUEST['id']."'";
		if ($conn->query($sql) === TRUE) {
		    echo '<h1 style="background:green;width:500px;display:block;text-align:center;margin:0 auto;margin-top:20%;">Record deleted successfully</h1>';
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
		header("Refresh:2; departments.php");
	}
