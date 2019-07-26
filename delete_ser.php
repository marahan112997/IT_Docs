<?php
include 'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{
	$id=$_GET['id'];
	// $name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
	// $date_time = date("Y-m-d h:i:sa");
	mysqli_query($conn,"DELETE FROM tbl_ser WHERE ser_id = '$id'");
	// mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Deleted a Policy')");
	

   

  header('location:ser_view.php');
}
else
{
	header("location:error.php");
}
?>