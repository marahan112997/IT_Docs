 <?php
include'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
	
	

$changedocs_id=$_POST['changedocs_id'];
$message=$_POST['message'];

  
   if (strpos($message, '\'') != false) { 
   	$message=str_replace("'","\'",$message);
	} 
  
echo$message;
 
mysqli_query($conn,"UPDATE tbl_changedocs SET status='Rejected',comment='$message' WHERE changedocs_id=$changedocs_id");
header('location:changedocs.php');
 
 
 
 
}else{
	
	header('location:index.php');
	
}

?>
