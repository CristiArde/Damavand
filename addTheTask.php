<?php
require'connection.php';
session_start();

$projectID = $_SESSION['projectID'];  
$phaseID = $_SESSION['phaseID'];

$taskName = $_POST['taskName'];
$estimatedCost = $_POST['estCost'];
$actualCost = $_POST['actualCost'];
$estStartDate = $_POST['estStartDate'];
$estEndDate = $_POST['estEndDate'];
$actualStartDate = $_POST['actualStartDate'];
$actualEndDate = $_POST['actualEndDate'];
$status = $_POST['status'];

$newtaskID =  'SELECT MAX(taskID) as newTaskID from task where projectID ="'.$projectID.'" AND phaseID ="'.$phaseID.'"';
				$result = mysqli_query($connection, $newtaskID);
				$newIDResult = mysqli_fetch_assoc($result);

$newID = $newIDResult['newTaskID'] + 1;

$query =  "INSERT INTO task (taskID, phaseID, projectID, taskName, estimatedStartDate, actualStartDate, estimatedCost, estimatedEndDate, actualEndDate, actualCost, status) VALUES ('".$newID."','".$phaseID."','".$projectID."','".$taskName."','".$estStartDate."','".$actualStartDate."','".$estimatedCost."','".$estEndDate."','".$actualEndDate."','".$actualCost."','".$status."')";
$connection->query($query);

$_SESSION['projectID'] = $projectID;
$_SESSION['phaseID'] = $phaseID;
$_SESSION['taskID'] = $newID;

mysqli_close($connection);
header('Location: /Damavand/task.php');

?>