<?php

	include 'header.php';

	if(isset($_POST['save'])){
		/**
		 * for name exits
		 */
			$sql = " SELECT * FROM designations WHERE designation_name = '".$_POST['designation_name']."' ";
			$result = mysqli_query( $conn, $sql );
			if ( $result-> num_rows>0 ) {
				header("Refresh: 2; designations.php");
				$message = ' Name is already here! ';
		/**
		 * end name exits
		 */
		}else{
			/**
			 * for data insert
			 */
				$dg_name = mysqli_real_escape_string( $conn, trim($_POST['designation_name']));
				if ( !preg_match("/^[a-zA-Z ]*$/", $dg_name) || $dg_name =='' ) {
					header("Refresh: 2; designations.php");
					$message = "Only letters allowed"; 
				}else {
					$sql = "INSERT INTO designations ( designation_name ) VALUES ( '$dg_name' )";
					if(mysqli_query( $conn, $sql )){
						header("Refresh: 2; designations.php");
						$message = 'Designation name insert successfully.';
					}else {
						echo ' Query Problem! ';
					}
				/**
				 * end data insert
				 */
				}			
		}
}

	$sql = " SELECT * FROM designations ";
	if (mysqli_query( $conn, $sql )) {
		$results = mysqli_query( $conn, $sql );
	}else {
		echo ' Query Problem !';
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
			        
			        <input type="text" class="form-control" placeholder="Add designation name" name="designation_name">
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
			      <th>designation ID</th>
			      <th>designation Name</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>

				<?php
					foreach  ($results as $result ) { ?>
						<tr>
						<td><?php echo $result['designation_id']; ?></td>
					  	<td><?php echo $result['designation_name']; ?></td>	  	
					  	<td>
					  		<a href="dg_edit.php?id=<?php echo $result['designation_id']; ?>">Edit</a> |
					  		<a href="dg_delete.php?id=<?php echo $result['designation_id']; ?>">Delete</a> |
					  		<a href="">View</a>
					  	</td>
					</tr>
				<?php	} ?>

			  </tbody>
			</table>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>