<?php
require'connection.php';
session_start();

$phaseID = $_SESSION['phaseID'];
//$projectID = $_POST['projectID'];  //THIS WORKS
$projectID = 7;  //temporary
$phaseName = $_POST["phaseName"];
$estCost = $_POST["estCost"];
$actualCost = $_POST["actualCost"];
$estStartDate = $_POST["estStartDate"];
$estEndDate = $_POST["estEndDate"];
$actualStartDate = $_POST["actualStartDate"];
$actualEndDate = $_POST["actualEndDate"];
$status = $_POST["status"];

echo $phaseID;

 $query =  'UPDATE Phase SET taskName = "'.$phaseName.'",estimatedCost = "'.$estCost.'",actualCost = "'.$actualCost.'",estimatedStartDate = "'.$estStartDate.'",
 estimatedEndDate = "'.$estEndDate.'", actualStartDate = "'.$actualStartDate.'",actualEndDate = "'.$actualEndDate.'",
 status = "'.$status.'" where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'"';
$connection->query($query);

$_SESSION['projectID'] = $projectID;

mysqli_close($connection);
header('Location: /Damavand/projectDetails.php');
?>