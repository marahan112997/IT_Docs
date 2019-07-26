<?php
include'dbcon.php';
session_start();
if (isset($_SESSION['username']))
	
{
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$privilege=$_POST['privilege'];
$username=$_POST['username'];
$team=$_POST['team'];



mysqli_query($conn,"UPDATE tblaccounts SET firstname='$firstname',lastname='$lastname',email='$email',password='$password',username='$username',privilege='$privilege',team='$team' WHERE user_ID='$id'");


	$name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
	$date_time = date("Y-m-d h:i:sa");
	
	mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Editted a Account')");
	
	
header('location:index.php');


}
else
{
	header("location:error.php");
}
?>	
