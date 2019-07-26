<?php
session_start();
require_once 'dbcon.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query="SELECT * FROM tblaccounts WHERE username='$username' AND password = '$password'"; 
	$result = mysqli_query($conn,$query);
	
		if (!$row = $result->fetch_assoc())
		{
			echo '<script>window.history.back()</script>';
			$_SESSION['login_error_msg'] = 'Incorrect Username or Incorrect Password.';
		
		}
		
		else
		{
			$_SESSION['username'] = $row['username'];
			header("Location:index.php");
		} 
	
	

?>

