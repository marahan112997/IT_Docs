<?php
session_start();
include'dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="logo.png">

    <?php
    include 'sample100.php';
    ?>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
   	<body style="background-image: url('new logo.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
    </br>
    </br>
    </br>
    </br>
    </br>
    <div class="container">
      <div class="card card-login mx-auto mt-5" style="background-color:transparent;border-style: solid;border-width: 8px;">
        <div class="card-header">
          <center style="font-weight: bold; font-size: 30px;">
          	<img src="login-logo.png" height="90" width="305"> 
          </center>
        </div>
        <div class="card-body">
          <form role="form" id="myform" action="login.php" method="POST">
              </br>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputEmail" class="form-control" autocomplete="off" style="opacity:1;color:black;"name="username" placeholder="Username" required="required" autofocus="autofocus">
                  <label for="inputEmail">Username</label>
                </div>
              </div>
              </br>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" style="opacity:1;color:black;"autocomplete="off" name="password" placeholder="Password" required="required">
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
                </br>
  			       <center>

  			       	<!--<input type="submit" name="submit" value="Log in" class="btn btn-primary btn-md" style="width:200px;"/>-->
  			       	<button type="submit" class="btn btn-primary" style="width: 245px">
                                    <i class="fa fa-share"></i> LOGIN
                    </button>
  			       
  			       </center>
          </form>
            </br>
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
