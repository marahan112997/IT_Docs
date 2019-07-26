<?php
include 'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{

	echo $title=$_GET['id'];
	mysqli_query($conn,"DELETE FROM weekly_report WHERE temp_title = '$title'");
	
	$name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
	$date_time = date("Y-m-d h:i:sa");
	mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Deleted a Changedocs')");
	

   $mask = "changedocs/$title.pdf";
   array_map( "unlink", glob( $mask ) );

  header('location:rejected_weekly.php');
  }
else
{
	header("location:error.php");
}
?>