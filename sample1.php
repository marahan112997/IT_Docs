<?php 

include'dbcon.php';
session_start();
$id= $_GET['id'];
$kb_title= $_GET['kb_title'];
$title_kb= $_GET['title_kb'];
$kb_number= $_GET['kb_number'];

if (isset($_SESSION['username']))
	
{

if(isset($_POST['submit'])){
	
	$name= $_FILES['file']['name'];
	$tmp_name= $_FILES['file']['tmp_name'];
	
	
	$submitbutton= $_POST['submit'];
	$title=explode(".",$name);
	
	$title=$title[0];
	$date_time = date("Y-m-d");
	
	if(strpos($kb_number,'_')){
	$kb_number=substr_replace($kb_number, $date_time, 7,-4);
	
	}else{
		$kb_number=substr_replace($kb_number, $date_time, 7);
			
	}
		
	// if($kb_title==$title){
		if(strpos($kb_number,'_')){
			
			echo '<script type="text/javascript">alert("tanggap!");</script>';
			$end_parse=explode('_',$kb_number);
			$first_parse=$end_parse[0];
			$end_parse=end($end_parse);
			$kb_parse=$end_parse+1;
			$v='-V_'.$kb_parse;
			
			$kb_parse2= $_GET['kb_number'];
			$kb_parse2=explode("-",$kb_parse2);
			$kb_count=count($kb_parse2)-2;
			$kb_parse2=$kb_parse2[$kb_count];
			
			
			$kb_number_parse=$first_parse.'_'.$kb_parse;
			$kb_number_parse=explode("-",$kb_number_parse);
			$kb_number_parse=$kb_number_parse[0].'-'.$kb_number_parse[1].'-'.$kb_number_parse[2].'-'.$kb_number_parse[3].'-'.$kb_number_parse[4].'-'.$kb_parse2.'-'.$kb_number_parse[5];
			$title=$kb_title.$v;
			
		}else{
			
			echo '<script type="text/javascript">alert("Hindi tanggap!");</script>';
			$kb_parse= $_GET['kb_number'];
			$kb_parse=explode("-",$kb_parse);
			$kb_parse=end($kb_parse);
			$v='-V_1';
			$kb_number_parse=$kb_number.'-'.$kb_parse.$v;
			$title=$kb_title.$v;
			
			
		}
			
				$position= strpos($name, "."); 
				$fileextension= substr($name, $position + 1);
				$fileextension= strtolower($fileextension);
				$kbtype= $_POST['kbtype'];
				//$kbnumber= $_POST['kbnumber'];


				$fullname=$_SESSION['firstname'].' '.$_SESSION['lastname'];
				$date_time = date("Y-m-d");
				$user_ID=$_SESSION['user_ID'];
				$team=$_SESSION['team'];



				if (isset($name)) {
					
					$title_name= $title.'.pdf';
					$tmp_name= $_FILES['file']['tmp_name'];
					$path= 'pdf_files/';
					
					
					if (!empty($title_name)){
						if (move_uploaded_file($tmp_name, $path.$title_name)) {
						
						echo '<script type="text/javascript">alert("Uploaded!");</script>';
						
						mysqli_query($conn, "UPDATE tbl_kb SET update_file='True' WHERE kb_id=$id");
						mysqli_query($conn, "INSERT INTO tbl_kb(kb_id, kb_title, kb_author,kb_type,temp_number,kb_date,user_ID,team,title_kb)VALUES('','$title', '$fullname', '$kbtype', '$kb_number_parse', '$date_time',$user_ID,'$team','$title_kb')");
						mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$fullname', '$date_time', 'Update a KB Article')");
					
						header("location:kbarticles.php");

						}
					}
				}
				
				
	// }
	// else{	
		// header("location:kbarticles.php");
	// }
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
                   
					<div class="form-label-group">
                    <select type="text" name="kbtype" class="form-control" placeholder="KB Type" required="required">
					
					<option value="<?php echo $_GET['kb_type']?>"><?php echo $_GET['kb_type']?></option>
					
					
					</select>
                    
                  </div>
                  </div>
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
<?php
}
else
{
	header("location:error.php");
}
?>	