<?php
session_start();
if(isset($_POST['btn_Login']))
{
	require'connection.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$dirname = dirname(__FILE__); 
	
	$query = mysqli_query($connection, 'select * from login where username="'.$username.'" and password="'.$password.'" ');
	$query_userCheck = mysqli_query($connection, 'select COUNT(*) FROM login L, companystaff C WHERE L.userID = C.staffID AND L.username ="'.$username.'"');
	if(mysqli_num_rows($query) == 1)
	{
		$_SESSION['username'] = $username;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

		if(mysqli_num_rows($query_userCheck) == 1)
		{
			$query = mysqli_query($connection, 'select projectID FROM PROJECT');
			$projectID = mysqli_fetch_all($query,MYSQLI_ASSOC); 
			$_SESSION['ProjectID'] = $projectID;

			//print_r( $_SESSION['ProjectID']);
			$Url = 'welcome.php';
		}
		else
		{
			$Url = 'CWelcome.php';
		}
		header("Location: http://$host$uri/$Url");
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
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<?php 
	$page_content = 'content/index_content.php';
	include('master.php');
	?>
</html>