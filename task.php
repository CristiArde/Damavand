<?php 
	require'connection.php';
session_start();

if(@$_POST['projectID'] == "")
	$projectID = $_SESSION['projectID'];
else
	$projectID = $_POST['projectID']; #needs the value of current poject id from other pages
$phaseID = $_POST['submitPID'];

echo $_POST['submitPID'].' '.$projectID;
?>