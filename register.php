<!DOCTYPE HTML>
<html>
<title></title>
<body style="text-align: center;background-color: black; color: yellow">
	<p style="font-size: 40px;">Register your account</p>
	<form style="font-size: 20px; text-align: center; margin-top: 30px; border: 5px solid yellow; padding: 10px; border-radius: 10px; color: white" method="post">
		<input type="text" name="fname" style="margin-bottom: 10px;" placeholder="First Name"><br>
		<input type="text" name="sname" style="margin-bottom: 10px;" placeholder="Second Name"><br>
		<input type="text" name="uname" style="margin-bottom: 10px;" placeholder="Username"><br>
		<input type="password" name="pass" minlength="8" required style="margin-bottom: 10px;" placeholder="Password"><br>
		<input type="password" name="conpass" style="margin-bottom: 10px;" placeholder="Re-enter Password"><br>
		<input type="submit" name="register" value="Register">
	</form>
	<?php
		if (isset($_POST['register'])) 
		{
			$fname = $_POST['fname'];
			$sname = $_POST['sname'];
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$con = $_POST['conpass'];
			if ($pass == $con) 
			{
				$db = mysqli_connect('https://ikky.ml/phpmyadmin/index.php','dalton','12345678','users')
 				or die('Error connecting to MySQL server.');
				$sql = "INSERT INTO users(fname,sname,uname,pass) VALUES ('".$fname."', '".$sname."', '".$uname."', AES_ENCRYPT('".$pass."', '12345')');";
				$send = mysqli_query($db,$sql)
				or die('Error Registering');
				header("Location: http://dalton.ikky.ml");
				exit();
			}
			else
			{
				echo "Passwords do not match";
			}
		}
	?>
</body>
</html>