<?php
	require("config.php");
	
	$deviceid = $_POST['deviceid'];
	$random = $_POST['random'];
	
	$query ="SELECT * FROM ".$mobiledb." where ".$mobiledb_device."='$deviceid'";
	$result=mysql_query($query);
	$num = mysql_num_rows($result);
	
	if($num == 1)
	{
		$row = mysql_fetch_assoc($result);
		$username = $row["".$mobiledb_user.""];
		
		$query="UPDATE ".randomdb." SET ".$randommdb_user." = '$username' where ".$randomdb_random." = '$random'";
		$result = mysql_query($query);
		$output = array('status' => 'OK');				
	}
	else
	{
		$output = array('status' => 'NOOK');
	}	
   	
	echo json_encode($output);
   	mysql_close();
?>
