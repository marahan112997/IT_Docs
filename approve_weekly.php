 <?php
include'dbcon.php';
session_start();
if(isset($_SESSION['username'])){
	
	
 //person information
$week_id=$_POST['week_id'];

  
   
  
 
 
mysqli_query($conn,"UPDATE weekly_report SET status='Approved' WHERE week_id=$week_id");
header('location:forapproval_reports.php');
 
 
 
 
 }else{
	
	header('location:index.php');
	
}

?>
