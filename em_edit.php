<?php
    include'header.php';
    if (isset($_POST['update'])) {
        print_r($_POST);
     
        $id = $_POST['em_id'];
        $name = $_POST['em_name'];
        $email = $_POST['em_email'];
        $phone = $_POST['em_phone'];
        $address = $_POST['em_address'];
        $image = $_FILES['em_image']['name']; 
        $dp_id = $_POST['department_id'];
        $dg_id = $_POST['designation_id'];
        $status = $_POST['em_status'];
       

        if(!empty($_FILES['em_image']['name'])){
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["em_image"]["name"]);
            move_uploaded_file($_FILES["em_image"]["tmp_name"], $target_file);

            $sql = " UPDATE `employees` SET `em_name` = '$name', `em_email` = '$email', `em_phone` = '$phone', `em_address` = '$address', `em_image` = '$image', `em_dp_id` = '$dp_id', `em_dg_id` = '$dg_id', `em_status` = '$status' WHERE `employees`.`em_id` = $id";
            $res=$conn->query($sql);
        }
        else {
            $sql = " UPDATE `employees` SET `em_name` = '$name', `em_email` = '$email', `em_phone` = '$phone', `em_address` = '$address', `em_dp_id` = '$dp_id', `em_dg_id` = '$dg_id', `em_status` = '$status' WHERE `employees`.`em_id` = $id";
            $res=$conn->query($sql);
        }
        # code...
    }

    $id = $_GET['id'];
	$sql = "SELECT * FROM employees where em_id = '$id'";
	if(mysqli_query($conn, $sql)){
		$result = mysqli_query($conn, $sql);
	}else{
		$message = "Query Problem";
	}
    $show = mysqli_fetch_assoc($result);
    
    $sql 	= " SELECT * FROM employees e, departments dp, designations dg WHERE e.em_dp_id = dp.department_id AND e.em_dg_id = dg.designation_id ";
    $views = mysqli_query( $conn, $sql );
    
    $sql = " SELECT * FROM departments ";
    $dps = mysqli_query( $conn, $sql );

    $sql = " SELECT * FROM designations ";
    $dgs = mysqli_query( $conn, $sql );

    $sql1 = "SELECT * FROM employees where em_id = '$id'";
    $result = mysqli_query( $conn, $sql1 );
    
    foreach ($result as $key) {
       $dpt_id = $key['em_dp_id'];
       $dgt_id = $key['em_dg_id'];
    }

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="" method="post" enctype="multipart/form-data">
             <input type="hidden" class="form-control" value="<?php echo $show['em_id']; ?>" name="em_id">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $show['em_name']; ?>" name="em_name">
                   
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" value="<?php echo $show['em_email']; ?>" name="em_email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $show['em_phone']; ?>" name="em_phone">
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="text" cols="72" rows="4" value="<?php echo $show['em_address']; ?>" name="em_address"><?php echo $show['em_address']; ?></textarea>
                </div>
                <div class="form-group">
                    <img style="width: 87px;" src='img/<?php echo $show['em_image']; ?>'>
                    <input type="file" class="form-control" value="<?php echo $show['em_image']; ?>" name="em_image">
                </div>

                <div class="form-group">
                    <select class="form-control" name="department_id">

                        <?php foreach ($dps as $dp) { ?>
                            <option value="<?php echo $dp['department_id'];?>"<?php if( $dpt_id == $dp['department_id']): ?> selected="selected"<?php endif; ?>><?php echo $dp['department_name']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                
                <div class="form-group">
                    <select class="form-control" name="designation_id">

                        <?php foreach ( $dgs as $dg ) { ?>
                                <option value="<?php echo $dg['designation_id'] ?>"<?php if( $dgt_id == $dg['designation_id']): ?> selected="selected"<?php endif; ?>><?php echo $dg['designation_name']; ?></option> 
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="yes" name="em_status" <?php echo ($show['em_status']=='yes')?'checked':'' ?> > Yes
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="no" name="em_status"  <?php echo ($show['em_status']=='no')?'checked':'' ?> > No
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="update" >update</button>
            </form>
		</div>
	</div>
</div><br>
<?php
echo '<pre>';
print_r($show);

echo '</pre>';


include'footer.php'; 



?>