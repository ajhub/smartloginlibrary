<html>
<head>
	<title>
	  QR Based Login
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
