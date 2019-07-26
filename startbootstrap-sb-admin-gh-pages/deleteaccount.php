<?php
include 'dbcon.php';
	$id=$_GET['id'];
	mysqli_query($conn,"DELETE FROM tblaccounts WHERE user_ID = '$id'");
	

   

  header('location:accounts.php');
?>