<?php
include'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{
 $id=$_POST['id'];
 $comment=$_POST['comment'];
 $name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
 $date_time = date("Y-m-d h:i:sa");

mysqli_query($conn,"UPDATE tbl_kb SET kb_status='Disapproved' ,comment='$comment',status='$name' WHERE kb_id='$id'");
mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Dispproved a KB Article')");
header('location:for_approval.php');
}
else
{
	header("location:error.php");
}
?>