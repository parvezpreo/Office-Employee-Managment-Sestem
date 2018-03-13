<?php

	include'header.php'; 

	if(isset($_POST['save'])){
			$sql = "SELECT * FROM departments WHERE '".$_POST['department_name']."' = department_name";
			$result = mysqli_query($conn, $sql);
			if($result->num_rows>0){
				$message = "name already exist";

			}else{
				if(empty($_POST['department_name'])){
					$message = "Name Cannot be empty";

				}else{

						$dep_name = mysqli_real_escape_string( $conn, ltrim(rtrim($_POST['department_name'])));
						if (!preg_match("/^[a-zA-Z ]*$/",$dep_name) || $dep_name =='' ) {
							$message = "Only letters allowed";
						}else{
						$sql = "INSERT INTO departments (department_name) VALUES ('$dep_name')";
						if(mysqli_query($conn, $sql)){
							$message = "Department input Successfully";
							header("Refresh:2; departments.php");
						}else{
							$message = "Query Problem";
					}					
							
				}
			}
		}
	}
		$sql = "SELECT * FROM departments";
		if(mysqli_query($conn, $sql)){
			$result = mysqli_query($conn, $sql);
		}else{
			$message = "Query Problem";
		}
?>


<br> <br>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
			  <div class="form-row align-items-center">
			    <div class="col-auto">
			    	<h3><?php echo $message; ?><h3>
			      <label class="sr-only" for="inlineFormInputGroup">Username</label>
			      <div class=>
			        
			        <input type="text" class="form-control" placeholder="Add department name" name="department_name">
			      </div>
			    </div>
			    <div class="col-auto">
			      <button type="submit" class="btn btn-primary" name="save">Submit</button>
			    </div>
			  </div>
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
			      <th>Department ID</th>
			      <th>Department Name</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>

				<?php while ($resu = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td><?php echo $resu['department_id']; ?></td>
					  	<td><?php echo $resu['department_name']; ?></td>	  	
					  	<td>
					  		<a href="edit.php?id=<?php echo $resu['department_id']; ?>">Edit</a> |
					  		<a href="delete.php?id=<?php echo $resu['department_id']; ?>">Delete</a> |
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