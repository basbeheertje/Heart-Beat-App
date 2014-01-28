<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$file = $_GET['file'];
	$directory = $_GET['directory'];
	
	$imagedata = file_get_contents('../'.$directory."/".$file);
    $base64 = base64_encode($imagedata);
	
	echo $base64;
	
?>