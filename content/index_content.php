<?php
require_once('connection.php'); 
session_start();

$_SESSION['authenticated'] = null;
//print_r($_POST['btn_Login']);
if(isset($_POST['btn_Login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];	
	//print_r($username);
	//print_r($password);
	$query = mysqli_query($connection, 'select * from login where username="'.$username.'" and password="'.$password.'" ');
	$query_userCheck = mysqli_query($connection, 'select COUNT(*) FROM login L, companyStaff C WHERE L.userID = C.staffID AND L.username ="'.$username.'"');
	if(mysqli_num_rows($query) == 1)
	{
		$_SESSION['username'] = $username;
		if (strpos($_SESSION['username'], 'damavand') === false) #customer
		{
			$query =  'select customerID from customer where email = "'.$username.'"';
			$results = mysqli_query($connection, $query);
  			$row = mysqli_fetch_assoc($results);
				$_SESSION['customerID'] = $row['customerID'];
		}
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$check = mysqli_num_rows($query_userCheck);
		if($check > 0)
		{
			$query = mysqli_query($connection, 'select projectID FROM project');
			//print_r($query);
			$projectID = mysqli_fetch_all($query,MYSQLI_ASSOC); 
			$_SESSION['ProjectID'] = $projectID;

			//print_r( $_SESSION['ProjectID']);
			$Url = 'Welcome.php';
		}
		else
		{
			$Url = 'CWelcome.php';
		}
		//echo 'Location: http://'.$host.$uri.'/'.$Url;
		//exit(header("Location: /".$host.$uri."/".$Url));
		
		$_SESSION['authenticated'] = true;
		echo '<script type="text/javascript">
           window.location = "http://'.$host.$uri.'/'.$Url.'";
      </script>';
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
			<td><input id="username" name="username" type="text"></td>
		</tr>
		<tr>
			<td><label>Password :</label></td>
			<td><input id="password" name="password" type="password"></td>	
		</tr>
		<tr>
			<td colspan="2"><input id="btn-login" name="btn_Login" type="submit" value="Login"></td>
		</tr>
		<tr>
			<td colspan="2">
				<a href="register.php" class="center">Register As Customer</a>
			</td>
		</tr>
		<tr>
			<td><a href="registerStaff.php" class="center">Register As Employee</a>
			</td>
		</tr>
	</table>
</form>
<?php
if (!is_null($_SESSION['authenticated']) && $_SESSION['authenticated'] === false) {
	echo '<div id="login-error">Invalid login information.</div>';
}
?>

