

<link rel="shortcut icon" href="logo.jpg"/>

<?php

$title=$_GET['id'];
$file='../policy_files/'.$title.'.pdf';
$filename ='../policy_files/'.$title.'.pdf';

header('Content-type:application/pdf');
header('Content-Disposition:inline; filename="' . $filename . '"');
header('Content-transfer-Encoding:binary');
header('Accept-Ranges:bytes');

@readfile($file);


?>
