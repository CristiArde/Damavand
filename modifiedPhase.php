<?php
require'connection.php';
session_start();

$phaseID = $_SESSION['phaseID'];
$projectID = $_SESSION['projectID']; //THIS WORKS
$phaseName = $_POST["phaseName"];
$estStartDate = $_POST["estStartDate"];
$estEndDate = $_POST["estEndDate"];
$actualStartDate = $_POST["actualStartDate"];
$actualEndDate = $_POST["actualEndDate"];
$status = $_POST["status"];

echo $phaseID;

 $query =  'UPDATE Phase SET phaseName = "'.$phaseName.'",estimatedStartDate = "'.$estStartDate.'",
 estimatedEndDate = "'.$estEndDate.'", actualStartDate = "'.$actualStartDate.'",actualEndDate = "'.$actualEndDate.'",
 status = "'.$status.'" where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'"';
$connection->query($query);

$_SESSION['projectID'] = $projectID;

mysqli_close($connection);
header('Location: /Damavand/projectDetails.php');
?>