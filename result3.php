

<link rel="shortcut icon" href="logo.jpg"/>

<?php

$title=$_GET['id'];
// $title='5ca355a2f2b28';
$file='changedocs/'.$title.'.pdf';
$filename ='changedocs/'.$title.'.pdf';

header('Content-type:application/pdf');
header('Content-Disposition:inline; filename="' . $filename . '"');
header('Content-transfer-Encoding:binary');
header('Accept-Ranges:bytes');

@readfile($file);


?>
