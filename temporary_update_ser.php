<?php 

include'dbcon.php';
session_start();

if (isset($_SESSION['username'])){

$ser_number=$_GET['ser_number'];
$ser_title=$_GET['ser_title'];
$ser_id=$_GET['id'];
if(isset($_POST['submit'])){
   

  $ser_number=$_POST['ser_number'];
  $ser_title=$_POST['ser_title'];

  echo'<script type="text/javascript">alert("Successfully updated!");</script>';

  mysqli_query($conn,"UPDATE tbl_ser SET ser_number='$ser_number', ser_title='$ser_title' WHERE ser_id='$ser_id'");

  header("location:ser_view.php");   

}



?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
    
        <div class="card-header"><b>Upload SER File</b></div>
        <div class="card-body">
  
          <form action="#file" method='post' enctype="multipart/form-data">

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="ser_title" value="<?php echo  $ser_title?>" required="required" autocomplete="off">
                    <label for="inputPassword">Title</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="ser_number" value="<?php echo $ser_number?>" required="required" autocomplete="off">
                    <label for="inputPassword">Ser Number</label>
                  </div>
                </div>
              </div>
            </div>


            
      
      
      
      
          
            
      <a href = "ser_view.php" class="btn btn-danger btn-lg">Cancel</a>
      <input type="submit" name="submit" class="btn btn-success btn-lg" style="float:right" value="Upload"/>
            
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
<?php
}
else
{
  header("location:error.php");
}
?>  