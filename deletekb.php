<?php
include 'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{

	$title=$_GET['id'];
	mysqli_query($conn,"DELETE FROM tbl_kb WHERE kb_title = '$title'");
	
	$name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
	$date_time = date("Y-m-d h:i:sa");
	
	mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Deleted a KB Article')");
	

   $mask = "pdf_files/$title.pdf";
   array_map( "unlink", glob( $mask ) );

  header('location:kbarticles.php');
  }
else
{
	header("location:error.php");
}
?>