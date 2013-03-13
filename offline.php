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
		
	?>
</head>
	
<body style="background:white;">

	<div style="container">

		<div class="hero-unit" style="margin-top : 20px;margin-left:15%; margin-right:15%;">
					
					<h1>Smart<text style="color:#1E90FF;">Login</h1>
					    <br>
						<p>
						You must have been provided with a  'otp key' by SmartLogin Mobile App, please try again from the beginning.
						</p>
						<br><br>
						<center>
							<form name="input" action="offlogin.php" method="post">
								Username  <input type="text" name="username"><br>
								OTP Key  <input type="password" name="pin"><br>
								<input type="submit" value="Submit">
							</form>	
						</center>				
		</div>     
	
	</div>

</body>
	
</html>