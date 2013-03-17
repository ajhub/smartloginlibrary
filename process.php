<html>
  <head>
    <title>
      Processing.....
    </title>
	<?php
	   	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	   require("config.php");
	   echo $ico_loc;
	?>
  </head>
</html>

<?php
	session_start();
	require("config.php");
	$status =0;
	$random = $_SESSION['$random'];
	$count=0;
	while($status == 0 && $count < 20)
	{
		sleep(1);
		$count++;
		$query = " SELECT * FROM ".$randomdb." WHERE ".$randomdb_random." = '$random' ";
		$result=mysql_query($query,$con);
		if(!$result)
			die("Connection Error");
		else
		{
			$row = mysql_fetch_array($result);
			$username = $row[$randomdb_user];
			if($username!=null)
			{
				$status=1;
				$username = $row[$randomdb_user]; 
		    	}
		 }
	}

	if($status==1)		
	{
		$query = " SELECT * FROM ".$mobiledb." WHERE ".$mobiledb_user." = '$username' ";
		$result=mysql_query($query,$con);
		if(!$result)
			die("Connection Error");
		else
		{
			$row = mysql_fetch_array($result);
			$_SESSION['username'] = $row[$mobiledb_user];
		}
		header("refresh:1,login_mech.php");	
	}
	else
	{
			$_SESSION['$random']=$random;
			$query = " DELETE FROM ".$randomdb." WHERE ".$randomdb_random." = '$random' ";
	    		$result=mysql_query($query,$con);
			header("refresh:1,offline.php");	
	}?>
	
