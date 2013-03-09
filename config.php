<?php	
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);	
	
	// Enter your mysql connection credentials here
	$SqlHost = '<path>';
	$SqlUser = '<user>';
	$SqlPass = '<password>';
	
	// Enter your mysql database name here
	$SqlDBname='<dbname>';
	
	//Making connections and selecting your db for furhter operations.
	$con=mysql_connect($SqlHost,$SqlUser,$SqlPass);
	if(!$con)
	{
		die("Connection Error");
	}
	$db=mysql_select_db($SqlDBname,$con);
	
	if(!$db)
		die("Error in db delection..");
	

	$ico_loc='<link rel="shortcut icon"  href="/smartloginlibrary/favicon.ico">';
	
    // Set following variables to your db's table, which will store random nos and usernames
	// See step ** for more details.
	
	$randomdb = '<tablenamefor random nos>';
	$randomdb_random = '<fieldnamefor random no>';
	$randomdb_user = '<fieldnamefor username>';
	
	
	// Set following variables to your db's table, which will store devices registered by users.
	// See step ** for more details.
	
	$mobiledb = '<tablenamefor deviceids>';
	$mobiledb_device = '<fieddnamefor device id>';
	$mobiledb_user = '<fieldnamefor username>';
	
	
	// Set following variables to your db's table, which stores usernames and passswords
	$logindb = '<tablenamefor websites username,passwords>';
	$logindb_user = '<fieldnamefor username>';
	$logindb_pass = '<fieldnamefor password>';
?>
