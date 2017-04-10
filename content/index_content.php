		
<?php
session_start();
$_SESSION['authenticated'] = null;
if(isset($_POST['btn_Login']))
{
	require'connection.php';
	$username = $_POST['username'];
	$password = $_POST['password'];	
	
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
		$_SESSION['authenticated'] = true;
		exit;
	} else {
		$_SESSION['authenticated'] = false;
	}
		
	
	 	
}
?>

<h1>Damavand Construction INC.</h1>
<form action="" method="POST">
	<table id="login-table" class="center" >
		<tr>
			<th colspan="2"><h2>Login Form</h2></th>
		</tr>
		<tr>
			<td><label>Username :</label></td>
			<td><input id="name" name="username" type="text"></td>
		</tr>
		<tr>
			<td><label>Password :</label></td>
			<td><input id="password" name="password" type="password"></td>	
		</tr>
		<tr>
			<td colspan="2"><input id="btn-login" name="btn_Login" type="submit" value="Login"></td>
		</tr>
		<tr><td colspan="2"><a href="register.php" class="center">Register</a></td></tr>
	</table>
</form>
<?php
if (!is_null($_SESSION['authenticated']) && $_SESSION['authenticated'] === false) {
	echo '<div id="login-error">Invalid login information.</div>';
}
?>


