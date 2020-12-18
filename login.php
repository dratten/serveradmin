<!DOCTYPE HTML>
<html>
<title></title>
<body style="text-align: center; background-color: black; color: yellow">
	<p style="font-size: 40px;">Log into your account</p>
	<form style="font-size: 20px; text-align: center; margin-top: 30px; border: 5px solid yellow; padding: 10px; border-radius: 10px; color: yellow" method="post">
		<input type="text" name="uname" style="margin-bottom: 10px;" placeholder="Username"><br>
		<input type="password" name="pass" minlength="8" required style="margin-bottom: 10px;" placeholder="Password"><br>
		<input type="submit" name="login" value="Login" style="margin-right: 10px;">
		<a href="http://dalton.ikky.ml/register.php" style="color: yellow">Register</a>
	</form>
	<?php
		session_start();
		if (isset($_POST['login'])) 
		{
			$uname = $_POST['uname'];
			$pass = $_POST['pass'];
			$db = mysqli_connect('https://ikky.ml/phpmyadmin/index.php','dalton','12345678','users')
 				or die('Error connecting to MySQL server.');
			$sql = mysqli_query($db,"SELECT fname, AES_DECRYPT(pass, '12345') from users WHERE uname = '".$uname."';");
			while ($row = mysqli_fetch_array($sql)) 
        		{
        			$name = $row['fname'];
        			$password = $row["AES_DECRYPT(pass, '12345')"];
        			$_SESSION['name'] = $name;
        			if($password == $pass )
        				{
        					header("Location: http://dalton.ikky.ml/home");
  							exit();
        				}
        		}
		}
	?>
</body>
</html>