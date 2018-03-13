<?php
	
	session_start();
	unset($_SESSION['re_email']);
	session_destroy();
	header('location:login.php');
	

 ?>

<!-- 
 session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: login.php"); -->