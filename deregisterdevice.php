<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

	require("config.php");

	$deviceid = $_POST['deviceid'];
	
	$query = mysql_query("DELETE FROM ".$mobiledb." WHERE ".$mobiledb_device." = '$deviceid';");
		if(!$query)
			$output = array('status' => "NOOK");
		else
			$output = array('status' => "OK");
?>