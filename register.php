<?php
include'dbcon.php';
session_start();
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$privilege=$_POST['privilege'];
$team=$_POST['team'];

$fullname=$firstname.' '.$lastname;


mysqli_query($conn, "INSERT INTO tblaccounts(user_ID, firstname, lastname,email,username,password,privilege,team,fullname)
VALUES('','$firstname', '$lastname', '$email', '$username', '$password', '$privilege', '$team','$fullname')");

	$name=$_SESSION['firstname'].' '.$_SESSION['lastname'];
	$date_time = date("Y-m-d h:i:sa");
	
	mysqli_query($conn, "INSERT INTO tbl_audittrail(audit_trail_ID, name, Date_Time_action,action)VALUES('','$name', '$date_time', 'Added a Account')");

header("location:accounts.php");
?>