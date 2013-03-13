<!DOCTYPE html>
<html>
<head>
    <title>SmartLogin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>	
</head>

<body style="background:white;">

<div style="container">

		<div class="hero-unit" style="margin-top : 20px;margin-left:15%; margin-right:15%;">
					
					<h1>Smart<text style="color:#1E90FF;">Login</h1>
					    <br>
						<p>
						Scan this QR code with SmartLogin Mobile App. Incase your smartphone is not connected to internet, you will be redirected to input the otp key.
						</p>
						<br><br>
						<center>

<?php

    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		require("config.php");
		
	session_start();
	$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
	$validCharNumber=strlen($validCharacters);
	$length = 6;
	$result = "";
        for ($i = 0; $i < $length; $i++) 
	{
            $index = mt_rand(0, $validCharNumber-1);
            $result .= $validCharacters[$index];
        }
	$_SESSION['$random']=$result;
	generateQRwithGoogle($result);
	function generateQRwithGoogle($url,$widthHeight ='150',$EC_level='L',$margin='0') 
	{
	        $url = urlencode($url);
		echo '<img src="http://chart.apis.google.com/chart?chs='.$widthHeight.'x'.$widthHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$url.'" " widthHeight="'.$widthHeight.'" widthHeight="'.$widthHeight.'"/>';
	}
	$sql="INSERT INTO ".$randomdb." VALUES('$result',null)";
	if (!mysql_query($sql,$con))
  	{
		die('Error: ' . mysql_error());
  	}
	mysql_close($con);
	header("refresh:5,process.php");
?>

						</center>
					
		</div>     
	
</div>


</body>
</html>

