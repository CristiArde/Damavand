<?php
session_start();
if(isset($_POST['btn_Login']))
{
	require'connection.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$dirname = dirname(__FILE__); 
	
	$query = mysqli_query($connection, 'select * from login where username="'.$username.'" and password="'.$password.'" ');
	if(mysqli_num_rows($query) == 1)
	{
		$_SESSION['username'] = $username;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'Welcome.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}
	else
		echo "Invalid Account";
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<div id="main">
			<h1>Damavand Construction INC.</h1>
		<div id="login">
		<h2>Login Form</h2>
			<form action="" method="post">
				<label>UserName :</label>
				<input id="name" name="username" type="text">
				<label>Password :</label>
				<input id="password" name="password" type="password">
				<input name="btn_Login" type="submit" value="Login">
			</form>
		</div>
		</div>
	</body>
</html>