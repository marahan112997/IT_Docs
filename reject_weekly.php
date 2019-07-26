 <?php
include'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
	
	

$week_id=$_POST['week_id'];
$message=$_POST['message'];

  
   if (strpos($message, '\'') != false) { 
   	$message=str_replace("'","\'",$message);
	} 
  
echo$message;
 
mysqli_query($conn,"UPDATE weekly_report SET status='Rejected',comment='$message' WHERE week_id=$week_id");
header('location:forapproval_reports.php');
 
 
 
 
}else{
	
	header('location:index.php');
	
}

?>
