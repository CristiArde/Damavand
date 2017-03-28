<?php
//include('session.php');
session_start();

//TODO:   DO REDIRECT IF NOT LOGGED IN
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="profile">
		<b id="welcome">Welcome : <i><?php echo $_SESSION['username']; ?></i></b>
		</div>
		<div id="logout">
		<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
		<select>
		<php foreach ($_SESSION[Project] as $value) {
		 echo '<option value="'.$value->id.'">'.$value->name.'</option>'
		}?>
		</select>
		<div id="table">
		<table border='1'>
		<tr>
			<th>Status</th>
			<th>Estimated Cost</th>
			<th>Actual Cost</th>
			<th>Phase</th>
			<th></th>
		</tr>
		<tr>
			<td>tempStatus</td>
			<td>tempEst</td>
			<td>tempAct</td>
			<td>tempPhase</td>
			<td>

			<form action="/projectDetails.php">
			  <input type="hidden" name="projectID" value="tempProj">
			  <input type="submit" value="More Info">
			</form> 
			</td>
		</tr>
		</table>
	</body>
</html>