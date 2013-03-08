<?php
	$SqlHost='localhost';
	$SqlUser='root';
	$SqlPass='suprit12';
	$SqlDBname='smartlogin';
	$SqlCon=mysql_connect($SqlHost,$SqlUser,$SqlPass,$SqlDBname);
	$con=mysql_connect($SqlHost,$SqlUser,$SqlPass);
	if(!$con)
	{
		die("Connection Error");
	}
	$db=mysql_select_db($SqlDBname,$con);
	if(!$db)
		die("Error in db delection..");
	$ico_loc='<link rel="shortcut icon"  href="/smartloginlibrary/favicon.ico">';
	$randomdb='randomdb';
	$randomdb_random='random';
	$randomdb_user='username';
?>