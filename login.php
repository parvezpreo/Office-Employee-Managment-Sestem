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


        <br> <br> <br> <br><br> <br><br> <br>
    	<div class="container">
    	<div class="row">
    		<div class="col-md-6 offset-md-3">
    			<form action="welcome.php" method="post">
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