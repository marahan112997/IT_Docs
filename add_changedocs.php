<?php 

include'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{

	if(isset($_POST['submit'])){
		$name= $_FILES['file']['name'];
		

		$tmp_name= $_FILES['file']['tmp_name'];
		
		$submitbutton= $_POST['submit'];
		$title2=explode(".",$name);
		$end=end($title2);
		if($end=='pdf'){
		
			$position= strpos($name, "."); 
			
			$fileextension= substr($name, $position + 1);

			$fileextension= strtolower($fileextension);


			//echo $kbtype= $_POST['kbtype'];
			$title= $_POST['title'];
			$ticket_number= $_POST['ticket_number'];
			//$kbnumber= $_POST['kbnumber'];
			
			
			$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
			$date_time = date("Y-m-d");
			$user_ID=$_SESSION['user_ID'];
			$team=$_SESSION['team'];
			
			$uniq=uniqid();
			$name=$uniq.'.pdf';
			

			if (isset($name)) {

				$path= 'changedocs/';

				if (!empty($name)){
					echo '<script type="text/javascript">alert("Uploaded!");</script>';
					if (move_uploaded_file($tmp_name, $path.$name)) {

					

				echo mysqli_query($conn, "INSERT INTO tbl_changedocs(changedocs_id, author,title,temp_title,ticket_number,date_upload,status)VALUES('','$fullname', '$title','$uniq','$ticket_number', '$date_time','Pending')");
				
					header("location:upload_changedocs.php");

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
	  
        <div class="card-header"><b>Upload Change Document File</b></div>
        <div class="card-body">
		<center>
          <form action="#file" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input  class="form-control"  type="file" name="file" required="required">
                    <label for="inputPassword">Change Document File</label>
                  </div>
                </div>
				<div class="col-md-6">
                  <div class="form-label-group">
                  	<input  class="form-control"  type="text" maxlength="9" name="ticket_number" required="required" onkeypress="return isNumberKey(event)" onpaste="return false">
					<label for="inputPassword">Ticket Number</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-label-group">
                    <input  class="form-control"  type="text" name="title" required="required">
					<label for="inputPassword">Title</label>
                  </div>
                </div>
              </div>
            </div>     
			</center><a href = "upload_changedocs.php" class="btn btn-danger btn-lg">Cancel</a>
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

  <script type="text/javascript">
	 function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
	
	function isNumberKey(evt){
				var charCode = (evt.which)? evt.which:event.keyCode
				if(charCode>31 && (charCode<48||charCode>57)){
					return false;
				}
				return true;
			}

			$(document).ready(function(){
		    $('#confirmEmail').bind("cut copy paste",function(e) {
		        e.preventDefault();
		    });
		});
	</script>
<?php
}
else
{
	header("location:error.php");
}
?>	