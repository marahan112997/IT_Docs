<?php
include 'dbcon.php';
	$title=$_GET['id'];
	mysqli_query($conn,"DELETE FROM tbl_kb WHERE kb_title = '$title'");
	

   $mask = "pdf_files/$title.pdf";
   array_map( "unlink", glob( $mask ) );

  header('location:kbarticles.php');
?>