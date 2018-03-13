<?php include'header.php'; 

	$id = $_GET['id'];
	$sql = "SELECT * FROM departments where department_id = '$id'";
	if(mysqli_query($conn, $sql)){
		$result = mysqli_query($conn, $sql);
	}else{
		$message = "Query Problem";
	}
	$resu = mysqli_fetch_assoc($result);

// Seach Query
if(isset($_POST['update'])){
			$sql = "SELECT * FROM departments WHERE '".$_POST['department_name']."' = department_name";
			$result = mysqli_query($conn, $sql);
			if($result->num_rows>0){
				$message = "name already exist";
				
			}else{
				if(empty($_POST['department_name'])){
					$message = "Name Cannot be empty";

				}else{
						$name = $_POST['department_name'];
						$id = $_POST['department_id'];
						$sql = " UPDATE departments SET department_name='$name' WHERE department_id='$id' ";
							if(mysqli_query($conn, $sql)){
								$message = '<h2 style="background:green;width:500px;display:block;text-align:center;margin:0 auto;margin-top:10%;">Record updated successfully</h2>';
								header("Refresh: 2; departments.php");									
								}else{
									$message = "Query Problem";
								}
				}
			}
		}


?>

<br> <br>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="" method="post">
			  <div class="form-row align-items-center">
			    <div class="col-auto">
			    <h3><?php echo $message; ?><h3> 
			      <label class="sr-only" for="inlineFormInputGroup">Username</label>
			      <div class=>
			        
			        <input type="hidden" class="form-control" name="department_id" value="<?php echo $resu['department_id']; ?>">
			        <input type="text" class="form-control" name="department_name" value="<?php echo $resu['department_name']; ?>">
			      </div>
			    </div>
			    <div class="col-auto">
			      <button type="submit" class="btn btn-primary" name="update">Update</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>

<?php include'footer.php'; ?>