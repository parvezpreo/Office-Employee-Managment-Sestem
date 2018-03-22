<?php
	
	session_start();
	unset($_SESSION['re_email']);
	session_destroy();
	echo '<h2 style="display:block;position:absolute;text-align:center;top:40%;left:40%;">You\'re Loged Out</h2>';
	header('Refresh:2; login.php');
	

 ?>

<!-- 
 session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: login.php"); -->