 <?php
include'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
	
	
 //person information
echo $policy_id=$_GET['policy_id'];
// echo 'hehe';

  
   
  
 
 
mysqli_query($conn,"UPDATE tbl_policy SET version='Old' WHERE policy_id=$policy_id");
header('location:policy.php');
 
 
 
 
 }else{
	
	header('location:index.php');
	
}

?>
