<?php

$title=$_GET['id'];
$file='pdf_files/'.$title.'.pdf';
$filename ='pdf_files/'.$title.'.pdf';

header('Content-type:application/pdf');
header('Content-Disposition:inline; filename="' . $filename . '"');
header('Content-transfer-Encoding:binary');
header('Accept-Ranges: bytes');

@readfile($file);


?>