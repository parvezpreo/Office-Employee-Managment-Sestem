<?php
	include 'header.php'; 

	if (isset($_POST['register'])) {

		$re_name = $_POST['re_name'];
		$re_email = $_POST['re_email'];
		$re_phone = $_POST['re_phone'];
		$re_image = $_FILES['re_image']['name'];
		$re_pass = $_POST['re_pass'];
		$confirm_pass = $_POST['confirm_pass'];
		$re_status = $_POST['re_status'];
		$re_role = $_POST['re_role'];
		$target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["re_image"]["name"]);
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["re_image"]["tmp_name"], $target_file);

		$role="";
    	for ($i=0; $i < count($re_role); $i++) 
        { 
            if($i == count($re_role)-1)
            {
            	$role .=$re_role[$i];
            }
            else
            {
            	$role .=$re_role[$i].',';
            }
        }

		$sql = "INSERT INTO `registrations` ( `re_name`, `re_email`, `re_phone`, `re_image`, `re_pass`, `confirm_pass`, `re_status`, `re_role`) VALUES ( '$re_name', '$re_email', '$re_phone', '$re_image', '$re_pass', '$confirm_pass', '$re_status', '$role') ";

		if (mysqli_query( $conn, $sql )) {
			echo "data inserted sucessfully!";
			header("Refresh:2; login.php");				
		} else {
			echo "try agin ";
		}		
	} else {
		
	}

?>


<?php include 'footer.php'; ?>