<?php 

include'dbcon.php';

if(isset($_POST['submit'])){
	$name= $_FILES['file']['name'];

	$tmp_name= $_FILES['file']['tmp_name'];

	$submitbutton= $_POST['submit'];

	$position= strpos($name, "."); 

	$fileextension= substr($name, $position + 1);

	$fileextension= strtolower($fileextension);

	$description= $_POST['description_entered'];
	$author= $_POST['author'];

	if (isset($name)) {

		$path= 'pdf_files/';

		if (!empty($name)){
			if (move_uploaded_file($tmp_name, $path.$name)) {

			echo '<script type="text/javascript">alert("Uploaded!");</script>';

			mysqli_query($conn, "INSERT INTO tbl_kb(kb_id, kb_title, kb_author)VALUES('','$description', '$author')");
			
			header("location:sample2.php");

			}
		}
	}
}



?>


<html>
<form action="#file" method='post' enctype="multipart/form-data">
Title of File: <input type="text" name="description_entered"/><br><br>
Author <input type="text" name="author"/><br><br>
<input type="file" name="file"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>

</form>

</html>
