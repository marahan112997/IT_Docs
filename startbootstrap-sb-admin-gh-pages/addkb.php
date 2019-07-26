<?php 

include'dbcon.php';

if(isset($_POST['submit'])){
	$name= $_FILES['file']['name'];

	$tmp_name= $_FILES['file']['tmp_name'];

	$submitbutton= $_POST['submit'];

	$position= strpos($name, "."); 

	$fileextension= substr($name, $position + 1);

	$fileextension= strtolower($fileextension);

	$description= $_POST['description_entered'];
	$author= $_POST['author'];

	if (isset($name)) {

		$path= 'pdf_files/';

		if (!empty($name)){
			if (move_uploaded_file($tmp_name, $path.$name)) {

			echo '<script type="text/javascript">alert("Uploaded!");</script>';

			mysqli_query($conn, "INSERT INTO tbl_kb(kb_id, kb_title, kb_author)VALUES('','$description', '$author')");
			
			header("location:kbarticles.php");

			}
		}
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
	  
        <div class="card-header"><b>Upload KB Article</b></div>
        <div class="card-body">
		<center>
          <form action="#file" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" autocomplete="off" class="form-control" placeholder="Title of File" name="description_entered" required="required" autofocus="autofocus">
                    <label for="firstName">Title of File</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="lastName" autocomplete="off" class="form-control" name="author" placeholder="Author" required="required">
                    <label for="lastName">Author</label>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="file" name="file" required="required">
                    <label for="inputPassword">KB File</label>
                  </div>
                </div>
                <div class="col-md-6">
                  
                </div>
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
