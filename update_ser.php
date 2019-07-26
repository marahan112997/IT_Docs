<?php 

include'dbcon.php';
session_start();

if (isset($_SESSION['username'])){

$ser_number=$_GET['ser_number'];
$ser_id=$_GET['id'];
if(isset($_POST['submit'])){
    $name= $_FILES['file']['name'];
    

    $tmp_name= $_FILES['file']['tmp_name'];
    
    $submitbutton= $_POST['submit'];
    $title=explode(".",$name);

    $end=end($title);
  if($end=='pdf'){
    $position= strpos($name, "."); 
    
    $fileextension= substr($name, $position + 1);

    $fileextension= strtolower($fileextension);

    $ser_title= $_POST['ser_title'];
    $ser_number= $_POST['ser_number'];
    $approved_date= $_POST['approved_date'];
    $expiration_date= $_POST['expiration_date'];
    // $fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
    // $team=$_SESSION['team'];
    
    $uniq=uniqid();
    $name=$uniq.'.pdf';
    
    
    if (isset($name)) {

      $path= 'ser_files/';

      if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {

        echo'<script type="text/javascript">alert("Uploaded!");</script>';

        
        mysqli_query($conn, "INSERT INTO tbl_ser(ser_id, ser_title, temp_title,approved_date,ser_number,expiration_date)VALUES('','$ser_title', '$uniq', '$approved_date','$ser_number','$expiration_date')");
        mysqli_query($conn,"UPDATE tbl_ser SET updated_file='true' WHERE ser_id='$ser_id'");
        
        

        }
        
      }
    }
    header("location:ser_view.php");   
  }else{
      echo "<script type='text/javascript'>alert('Please Upload a PDF File');</script>";
  } 
  
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
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="file" name="file" required="required">
                    <label for="inputPassword">SER File</label>
                  </div>
                </div>

        <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="hidden" name="ser_number" value="<?php echo $ser_number;?>"required="required" autocomplete="off">
                    <input  class="form-control"  type="text" value="<?php echo $ser_number; ?>" required="required" disabled >
                     <label for="inputPassword">SER Number</label>
                  </div>
                </div>
              </div>
            </div>
       
        
      <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="date" name="approved_date" required="required" autocomplete="off">
                    <label for="inputPassword">Approved Date</label>
                  </div>
                </div>

        
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="date" name="expiration_date" required="required" autocomplete="off">
                    <label for="inputPassword">Expiration Date</label>
                  </div>
                </div>

              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="ser_title" required="required" autocomplete="off">
                    <label for="inputPassword">Title</label>
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