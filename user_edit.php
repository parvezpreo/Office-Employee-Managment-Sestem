<?php
    require 'db.php';

    if (isset($_POST['update'])) {

        $re = $_POST['re'];
        $re_name = $_POST['re_name'];
        $re_email = $_POST['re_email'];
        $re_phone = $_POST['re_phone'];
        $re_image = $_FILES['re_image']['name'];
        $re_status = $_POST['re_status'];
        $re_role = $_POST['re_role'];
        if(isset($_FILES["re_image"]["name"]) && $_FILES["re_image"]["name"]!=""){
            if(file_exists ("img/".$_FILES["re_image"]["name"])){
                $target_file =time()."-".str_replace("","",basename($_FILES["re_image"]["name"]));


            }else{
                $target_file=$_FILES["re_image"]["name"];
            }
           if( move_uploaded_file($_FILES["re_image"]["tmp_name"], "img/".$target_file)){

            $sql="SELECT re_image FROM registrations where re='".$_GET['id']."' ";
                $forimage = mysqli_query( $conn, $sql );
                $imgrow = mysqli_fetch_assoc($forimage);
                unlink("img/".$imgrow['re_image']);
            }
    }else{
         $target_file=$_POST['user_image'];
    }
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

       $sql = " UPDATE registrations SET re_name='$re_name', re_email='$re_email', re_phone='$re_phone', re_image='$re_image', re_status='$re_status', re_role='$role' WHERE re='".$_GET['id']."' ";

        if ( mysqli_query( $conn, $sql )) {
            echo "data update sucessfully!";
            header("Refresh:2; view_user.php");         
        } else {
            echo "try agin ";
        }       
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM registrations where re = '$id'";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
    }else{
        $message = "Query Problem";
    }
    $show = mysqli_fetch_assoc($result);

    // Admin user #Role
    $role = explode(",",$show['re_role']);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php">HOME</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="departments.php">Departments</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="designations.php">Designations</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="employee.php">Employee</a>
	      </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="view_user.php">View User</a>
            </div>
          </li>
	      <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hi, </a>
		    <div class="dropdown-menu">
		      <a class="dropdown-item" href="logout.php">Logout</a>
		    </div>
		  </li>
	    </ul>
	  </div>
</nav>

    <br>
	<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" value="<?=$show['re'];?>" name="re">
                    <input type="text" class="form-control" value="<?=$show['re_name'];?>" name="re_name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" value="<?=$show['re_email'];?>" name="re_email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?=$show['re_phone'];?>" name="re_phone" required>
                </div>
                
                <div class="form-group">
                    <img style="width: 87px;" src="img/<?=$show['re_image'];?>" >
                    <input type="file" class="form-control" name="re_image">
                    <?php if( $show['re_image'] != '' ) { ?>
                    <input type="hidden" class="form-control" name="user_image" value="<?php $show['re_image']; ?>">
                    <?php }?>
                </div>
				<!-- Type Of User -->
                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                    	Type Of User:&nbsp;&nbsp; 
                        <label class="form-check-label">
                            <input type="radio" value="admin" name="re_status" onclick="check()" <?php echo ($show['re_status']=='admin')?'checked':'' ?> > Admin
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" onclick="uncheck()" value="client" name="re_status" <?php echo ($show['re_status']=='client')?'checked':'' ?> > Client
                        </label>
                    </div>
                </div> <!-- End Type Of User -->

				<!-- User Role -->
                <div class="form-group">                               
                    <div class="form-check form-check-inline">
                    	User Role:&nbsp;&nbsp; 
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="view" name="re_role[]" 
                            <?php for($i=0; $i<count($role); $i++) 
                                if($role[$i]=='view') 
                                    {?> checked <?php } ?> > View
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                           <input class="form-check-input" type="checkbox" value="add" name="re_role[]" id="add" <?php for($i=0; $i<count($role); $i++) 
                                if($role[$i]=='add') 
                                    {?> checked <?php } ?> > Add
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="edit" name="re_role[]" id="edit" <?php for($i=0; $i<count($role); $i++) 
                                if($role[$i]=='edit') 
                                    {?> checked <?php } ?> > Edit
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="delete" name="re_role[]" id="delete" <?php for($i=0; $i<count($role); $i++) 
                                if($role[$i]=='delete') 
                                    {?> checked <?php } ?> > Delete
                        </label>
                    </div>
                </div> <!-- TUser Role -->
                
                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                        <button type="submit" class="btn btn-primary" name="update" >Update User</button>

                        </div>
                        <div class="form-check form-check-inline">
                        <p class="font-small grey-text d-flex justify-content-end mt-3">Have an account? <a href="login.php" class="dark-grey-text ml-1 font-weight-bold p-1 btn-success"> Login</a></p>
                    </div>
                </div>

            </form>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>