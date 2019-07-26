 <?php
include'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
	
	
 //person information
$changedocs_id=$_POST['changedocs_id'];

  
   
  
 
 
mysqli_query($conn,"UPDATE tbl_changedocs SET status='Approved' WHERE changedocs_id=$changedocs_id");
header('location:changedocs.php');
 
 
 
 
 }else{
	
	header('location:index.php');
	
}

?>
