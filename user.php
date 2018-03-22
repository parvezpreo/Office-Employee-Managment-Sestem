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
			<form action="confirmRegistration.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="User Name" name="re_name" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="User Email" name="re_email" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="User Phone" name="re_phone" required="">
                </div>
                
                <div class="form-group">
                    <input type="file" class="form-control" name="re_image">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Chose Password" name="re_pass">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Comfirm Password" name="confirm_pass">
                </div>

				<!-- Type Of User -->
                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                    	Type Of User:&nbsp;&nbsp; 
                        <label class="form-check-label">
                            <input type="radio" value="admin" name="re_status" onclick="check()"> Admin
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" onclick="uncheck()" value="client" name="re_status"> Client
                        </label>
                    </div>
                </div> <!-- End Type Of User -->

				<!-- User Role -->
                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                    	User Role:&nbsp;&nbsp; 
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="view" name="re_role[]" id="view"> View
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                           <input class="form-check-input" type="checkbox" value="add" name="re_role[]" id="add"> Add
                        </label>
                    </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="edit" name="re_role[]" id="edit"> Edit
                        </label>
                    </div>
                        <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="delete" name="re_role[]" id="delete"> Delete
                        </label>
                    </div>
                </div> <!-- TUser Role -->
                
                <div class="form-group">                    
                    <div class="form-check form-check-inline">
                        <button type="submit" class="btn btn-primary" name="register" >Register</button>

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