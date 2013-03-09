<html>
	<head>
		<title>
			Processing Offline......
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
	$random = $_SESSION['$random'];
	$_SESSION['$random']=$random;
	$username=$_POST['username'];
	$pin=$_POST['pin'];
	$query = " SELECT * FROM ".$mobiledb." WHERE ".$mobiledb_user." = '$username' ";
	$result=mysql_query($query,$con);
	if(!$result)
		die("Connection Error");
	else
	{
		$row = mysql_fetch_array($result);
		$deviceid=$row[$mobiledb_device];
		$secretkey=$row['$mobiledb_key'];		
		$secret=hash_hmac('sha1',$deviceid, $random);
		if((strlen($secret)%2)!=0)
		{
				$secret="0".$secret;
		}	
		$key="";
		for($i=0;$i<strlen($secret);$i++)
		{
			if($i%7==0)
			$key=$key.$secret[$i];
		}
		$pin1=hash_hmac('sha1',$key, $secretkey);
		if((strlen($pin1)%2)!=0)
		{
				$pin1="0".$pin1;
		}	
		$finalpin="";
		for($i=0;$i<strlen($pin1);$i++)
		{
			if($i%7==0)
			$finalpin=$finalpin.$pin1[$i];
		}
		$_SESSION['username'] = $username;
		if($finalpin==$pin)
			header("refresh:1,login_mech.php");	
		else
			header("refresh:1,Location:index.php");
	}
?>