<?php
include'dbcon.php';
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$privilege=$_POST['privilege'];
$username=$_POST['username'];
$team=$_POST['team'];



mysqli_query($conn,"UPDATE tblaccounts SET firstname='$firstname',lastname='$lastname',email='$email',password='$password',username='$username',privilege='$privilege',team='$team' WHERE user_ID='$id'");

header('location:accounts.php');
?>