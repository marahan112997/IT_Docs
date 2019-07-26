<?php 

include'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{

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


  	$title= $_POST['title'];
  	$policynumber= $_POST['policynumber'];
  	$version= $_POST['version'];
  	$file_type= $_POST['file_type'];
   	$effectivity_date= $_POST['effectivity_date'];

  	
  	
  	$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];

  	$team=$_SESSION['team'];
  	
  	$uniq=uniqid();
  	$name=$uniq.'.pdf';
  	
  	
		if (isset($name)) {

			$path= 'policy_files/';

			if (!empty($name)){
				if (move_uploaded_file($tmp_name, $path.$name)) {

				echo '<script type="text/javascript">alert("Uploaded!");</script>';

				
				echo mysqli_query($conn, "INSERT INTO tbl_policy(policy_id, title, author,policy_number,effectivity_date,temp_title,version,file_type)VALUES('','$title', '$fullname', '$policynumber','$effectivity_date','$uniq','New','$file_type')");
				//echo mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$fullname', '$date_time', 'Uploaded a Policy')");
				
				

				}
				header("location:policy.php");
			}
		}
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
	  
        <div class="card-header"><b>Upload Policy Article</b></div>
        <div class="card-body">
	
          <form action="#file" method='post' enctype="multipart/form-data">
		  
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="file" name="file" required="required">
                    <label for="inputPassword">Policy File</label>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="policynumber" required="required" autocomplete="off">
					<label for="inputPassword">Policy Number</label>
                  </div>
                </div>
              </div>
            </div>
			 
				
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="title" required="required" autocomplete="off">
                    <label for="inputPassword">Title</label>
                  </div>
                </div>

				
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="date" name="effectivity_date" required="required" autocomplete="off">
                    <label for="inputPassword">Effectivity Date</label>
                  </div>
                </div>

              </div>
            </div>


            <div class="form-group">
              <div class="form-row">
                

                <div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" name="version" class="form-control" placeholder="Username" required="required">
					<option value="">---Choose Version----</option>
					<option value="New">New</option>
					<option value="Old">Old</option>
					</select>
                  </div>
                </div>

				<div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" name="file_type" class="form-control" placeholder="Username" required="required">
					<option value="">---File Type----</option>
					<option value="Policy">Policy & Procedure</option>
					<option value="Baseline">Baseline</option>
					</select>
                  </div>
                </div>

              </div>
            </div>
			
			
			
			
          
            
			<a href = "policy.php" class="btn btn-danger btn-lg">Cancel</a>
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