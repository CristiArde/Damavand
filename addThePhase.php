<?php
require'connection.php';
session_start();

$projectID = $_SESSION['projectID'];  

$phaseName = $_POST['phaseName'];
$estStartDate = $_POST['estStartDate'];
$estEndDate = $_POST['estEndDate'];
$actualStartDate = $_POST['actualStartDate'];
$actualEndDate = $_POST['actualEndDate'];
$status = $_POST['status'];
$retrievePhaseID = $_SESSION['PhaseIDNew'];

$newPhaseID = $retrievePhaseID + 1;

$query =  "INSERT INTO Phase (phaseID, projectID, phaseName, estimatedStartDate, estimatedEndDate, actualStartDate,
actualEndDate, status) VALUES ('".$newPhaseID."','".$projectID."','".$phaseName."','".$estStartDate."','".$estEndDate."','".$actualStartDate."','".$actualEndDate."','".$status."')";
$connection->query($query);

$_SESSION['projectID'] = $projectID;

mysqli_close($connection);
header('Location: /Damavand/projectDetails.php');
?>