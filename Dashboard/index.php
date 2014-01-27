<?php

	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);

	session_start();
	
	require_once('controllers/system.php');
	
	$system = new system();
	
?>