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
		$username = $row["$mobiledb_user"];

		$query="UPDATE ".$randomdb." SET  ".$randomdb_user." =  '$username' WHERE  ".$randomdb_random." = '$random'";

		$result = mysql_query($query,$con);
		if($result)
			$output = array('status' => 'OK');				
		else
			$output = array('status' => 'NOOK1');
	}
	else
	{
		$output = array('status' => 'NOOK2');
	}	
   	
	echo json_encode($output);
   	mysql_close();
?>