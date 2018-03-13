<?php
    include 'db.php';

    if ( isset($_POST['submit'])) {
        $re_email = $_POST['re_email'];
        $re_pass = $_POST['re_pass'];
        $results = $conn->query("SELECT * FROM registrations WHERE re_email = '$re_email' AND re_pass = '$re_pass'");
        $row = $results->fetch_array(MYSQLI_BOTH);

        session_start();
        $_SESSION['re'] = $row['re'];
        $_SESSION['re_email'] = $row['re_email'];
        $_SESSION['re_name'] = $row['re_name'];
        $_SESSION['re_image'] = $row['re_image'];

        header("Location: index.php");
        
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>


        <div class="mt-5"></div>
        <br> <br>
    	<div class="container">
    	<div class="row">
    		<div class="col-md-6 offset-md-3">
    			<form action="" method="post">
                    <div class="form-group">
                        <input type="email" placeholder="Enter Email" class="form-control" name="re_email">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Chose Password" name="re_pass">
                    </div>

                    <div class="form-group">                    
                        <div class="form-check form-check-inline">
                            <button type="submit" class="btn btn-primary" name="submit" >Login</button>

                            </div>
                            <div class="form-check form-check-inline">
                            <p class="font-small grey-text d-flex justify-content-end mt-3">Don't have an account?<a href="registration.php" class="dark-grey-text ml-1 font-weight-bold p-1 btn-success">Sign up</a></p>
                        </div>
                    </div>

                </form>
    		</div>
    	</div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>
  </body>
</html>