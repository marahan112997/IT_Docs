<?php
include'dbcon.php';
$id=$_GET['id'];

$queryr= mysqli_query($conn,"SELECT * FROM tblaccounts WHERE user_ID='$id'");
  $row=mysqli_fetch_array($queryr);
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update an Account</div>
        <div class="card-body">
          <form method="POST" action="updateaccount.php" >
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="text" id="firstName" class="form-control" name="firstname" autocomplete="off" value="<?php echo $row['firstname'];?>" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">First name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" class="form-control" name="lastname" autocomplete="off" value="<?php echo $row['lastname'];?>" placeholder="Last name" required="required">
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" autocomplete="off" value="<?php echo $row['email'];?>" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="confirmPassword" name="username" autocomplete="off" class="form-control" value="<?php echo $row['username'];?>" placeholder="Username" required="required">
                    <label for="confirmPassword">Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password" autocomplete="off" class="form-control" value="<?php echo $row['password'];?>" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" name="team" class="form-control" placeholder="Username" required="required">
					<option value="<?php echo $row['team'];?>"><?php echo $row['team'];?></option>
					<option value="DSE">DSE</option>
					<option value="Network">NETWORK</option>
					<option value="Server">SERVER</option>
					
					</select>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" name="privilege" class="form-control" placeholder="Username" required="required">
					<option value="<?php echo $row['privilege'];?>"><?php echo $row['privilege'];?></option>
					<option value="Super Admin">Super Admin</option>
					<option value="User">User</option>
				
					
					</select>
                    
                  </div>
                </div>
              </div>
            </div>
			<br>
			
            <input type="submit" class="btn btn-success btn-block" value="Update">
            <a class="btn btn-danger btn-block" href="accounts.php">Cancel</a>
          </form>
         
         
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
