<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login Module</div>
        <div class="card-body">
          <form role="form" id="myform" action="login.php" method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" autocomplete="off" name="username" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" autocomplete="off" name="password" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
							<?php 
								if( ! empty($_SESSION['login_error_msg'])){
							?>
							<label style="color:red; font-size:1.05em; font-weight:normal; margin:5px 8px;"><span><i class="glyphicon glyphicon-alert"></i></span> 
							<?php echo ($_SESSION['login_error_msg']);
							
							?></label>
							<?php
									unset($_SESSION['login_error_msg']);
								}
							?>
       
			<input type="submit" name="submit" value="Log in" class="btn btn-primary btn-block"/>
          </form>
          <div class="text-center">
            <!---<a class="d-block small mt-3" href="addaccount.php">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
