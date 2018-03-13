<?php include 'header.php';?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM designations WHERE designation_id = '$id' ";
    if (mysqli_query( $conn, $sql )) {
        $result = mysqli_query( $conn, $sql );    
    }else {
        $message = ' Query Problem ! ';
    }
    $results = mysqli_fetch_assoc( $result );

		if (isset($_POST['update'])) {
			$dg = $_POST['designation_name'];
			$sql = " UPDATE designations SET designation_name = '$dg' WHERE designation_id = '$id' ";

			if (empty($_POST['designation_name'])) {
				$message = 'Name Cannot be empty';
			}else {
				if ( mysqli_query( $conn, $sql )) {
					echo '<h2 style="background:green;width:500px;display:block;text-align:center;margin:0 auto;margin-top:10%;">Record updated successfully</h2>';
					header("Refresh: 2; designations.php");				
				}else {
					$message = ' Query Problem !';
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
			        
			        <input type="text" class="form-control" placeholder="Add designation name" name="designation_name" value="<?=$results['designation_name'];?>">
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

<?php include 'footer.php';?>