<?php
	session_start();
	if ($_SESSION['re_email'] == false) {
		header("Location: login.php");
		exit();
	}
?>



<?php include('header.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-6"><h4>Welcome To The Employee Management System</h4></div>
		<div class="col-md-6"><a href="logout.php">Logout</a></div>
	</div>
	<div class="row">
		<div class="col-md-6"><h2><?php echo $_SESSION['re_email']; ?></h2></div>
		<div class="col-md-6"><h2><?php echo $_SESSION['re_name']; ?></h2> <img src="img/<?php echo $_SESSION['re_image']; ?>" alt=""></div>
	</div>
</div>





<?php require('footer.php'); ?>

