<?php 
    include'header.php';

    if (isset($_POST['submit'])) {
        
        $name = $_POST['em_name'];
        $email = $_POST['em_email'];
        $phone = $_POST['em_phone'];
        $adress = $_POST['em_address'];
        $image = $_FILES['em_image']['name']; 
        $dp_id = $_POST['department_id'];
        $dg_id = $_POST['designation_id'];
        $status = $_POST['em_status'];
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["em_image"]["name"]);
        //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["em_image"]["tmp_name"], $target_file);

        $sql = " INSERT INTO `employees` ( `em_name`, `em_email`, `em_phone`, `em_address`, `em_image`, `em_dp_id`, `em_dg_id`, `em_status`) VALUES ('$name', '$email', '$phone', '$adress', '$image', '$dp_id', '$dg_id', '$status') ";

        if(mysqli_query( $conn, $sql )){
            // header("Refresh: 2; employee.php");
            $message = 'Designation name insert successfully.';
        }else {
            echo ' Query Problem! ';
		}
    }else {
        // echo "Query plm!";
    }

    $sql 	= " SELECT * FROM employees e, departments dp, designations dg WHERE e.em_dp_id = dp.department_id AND e.em_dg_id = dg.designation_id ";
    $views = mysqli_query( $conn, $sql );
    
    $sql = " SELECT * FROM departments ";
    $dps = mysqli_query( $conn, $sql );

    $sql = " SELECT * FROM designations ";
    $dgs = mysqli_query( $conn, $sql );

?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Emplyoee Name" name="em_name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Emplyoee Email" name="em_email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Emplyoee Phone" name="em_phone">
                </div>
                <div class="form-group">
                    <textarea class="form-control" cols="72" rows="4" placeholder="Emplyoee Address" name="em_address"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" placeholder="Emplyoee Phone" name="em_image">
                </div>

                <div class="form-group">
                    <select class="form-control" name="department_id">
                        <option>Chose Your Department name</option>
                        <?php foreach ($dps as $dp) { ?>
                            <option value="<?php echo $dp['department_id'];?>"><?php echo $dp['department_name']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                
                <div class="form-group">
                    <select class="form-control" name="designation_id">
                        <option>Chose Your Designation name</option>

                        <?php foreach ( $dgs as $dg ) { ?>
                                <option value="<?php echo $dg['designation_id'] ?>"><?php echo $dg['designation_name']; ?></option> 
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="yes" name="em_status"> Yes
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="no" name="em_status" checked="checked"> No
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
            </form>
		</div>
	</div>
</div>


<br> <br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-inverse">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Name</th>
			      <th>Email</th>
			      <th>Phone</th>
			      <th>Address</th>
                  <th>Image</th>
			      <th>Department</th>
			      <th>Designation</th>
                  <th>Status</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
                <?php foreach ( $views as $view ) { ?>
                        
                    <tr>
						<td><?php echo $view['em_id']; ?></td>
						<td><?php echo $view['em_name']; ?></td>
						<td><?php echo $view['em_email']; ?></td>
						<td><?php echo $view['em_phone']; ?></td>
						<td><?php echo $view['em_address']; ?></td>
                        <td><img style="width: 185px;height: 185px;" src="img/<?php echo $view['em_image']; ?>"></td>
						<td><?php echo $view['department_name']; ?></td>
						<td><?php echo $view['designation_name']; ?></td>
                        <td><?php echo $view['em_status']; ?></td>
					  	<td>
					  		<a href="em_edit.php?id=<?php echo $view['em_id']; ?>">Edit</a> |
					  		<a href="em_delete.php?id=<?php echo $view['em_id']; ?>">Delete</a> |
					  		<a href="">View</a>
					  	</td>
					</tr>

                <?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

<?php include'footer.php'; ?>