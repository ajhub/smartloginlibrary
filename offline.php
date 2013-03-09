<?php
	session_start();
	$random = $_SESSION['$random'];
	$_SESSION['$random']=$random;
?>
<html>
	<head>
		<title>
			Offline Mode
		</title>
	<?php	
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		require("config.php");
		echo $ico_loc;
	?>
	</head>
	<body>
		<form name="input" action="offlogin.php" method="post">
	      	      Username: <input type="text" name="username"><br>
	      	      PIN: <input type="password" name="pin"><br>
	      	      <input type="submit" value="Submit">
      		</form>
	</body>
</html>