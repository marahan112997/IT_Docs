<?php
include'dbcon.php';
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$privilege=$_POST['privilege'];
$team=$_POST['team'];


mysqli_query($conn, "INSERT INTO tblaccounts(user_ID, firstname, lastname,email,username,password,privilege,team)
VALUES('','$firstname', '$lastname', '$email', '$username', '$password', '$privilege', '$team')");

header("location:accounts.php");
?>