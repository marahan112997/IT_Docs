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


			//echo $kbtype= $_POST['kbtype'];
			$title_kb= $_POST['title'];
			//$kbnumber= $_POST['kbnumber'];
			
			
			$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
			$date_time = date("Y-m-d");
			$user_ID=$_SESSION['user_ID'];
			$team=$_SESSION['team'];
			
			$uniq=uniqid();
			$name=$uniq.'.pdf';
			

		if (isset($name)) {

			$path= 'pdf_files/';

			if (!empty($name)){
				if (move_uploaded_file($tmp_name, $path.$name)) {

				echo '<script type="text/javascript">alert("Uploaded!");</script>';

				echo mysqli_query($conn, "INSERT INTO tbl_kb(kb_id, kb_title, kb_author,kb_type,kb_number,kb_date,user_ID,team,title_kb)VALUES('','$uniq', '$fullname', '$team', '', '$date_time',$user_ID,'$team','$title_kb')");
				echo mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$fullname', '$date_time', 'Uploaded a KB Article')");
			
				header("location:kbarticles.php");

				}
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
	<link rel="shortcut icon" href="logo.jpg">

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
	  
        <div class="card-header"><b>Upload KB Article</b></div>
        <div class="card-body">
		<center>
          <form action="#file" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="file" name="file" required="required">
                    <label for="inputPassword">KB File</label>
                  </div>
                </div>
				<div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="title" required="required">
					<label for="inputPassword">Title</label>
                  </div>
                </div>
               <!-- <div class="col-md-6">
                  <div class="form-label-group">
                   
					<div class="form-label-group">
                    <select type="text" name="kbtype" class="form-control" placeholder="KB Type" required="required">
					<option value="">KB Type</option>
					<option value="DSE">DSE</option>
					<option value="Network">NETWORK</option>
					<option value="Server">SERVER</option>
					<option value="IT Asset">IT Asset</option>
					<option value="Site Security">Site Security</option>
					
					</select>
                    
                  </div>
                  </div>
                </div>
				-->
              </div>
            </div>
			
			
			
			
			
          
            
			</center><a href = "kbarticles.php" class="btn btn-danger btn-lg">Cancel</a>
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