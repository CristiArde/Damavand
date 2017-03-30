<?php
require'connection.php';
session_start();

$projectID = 7;
$phaseName = $_POST['phaseName'];
$estimatedCost = $_POST['estCost'];
$actualCost = $_POST['actualCost'];
$estStartDate = $_POST['estStartDate'];
$estEndDate = $_POST['estEndDate'];
$actualStartDate = $_POST['actualStartDate'];
$actualEndDate = $_POST['actualEndDate'];
$status = $_POST['status'];
$retrievePhaseID = $_SESSION['PhaseIDNew'];

$newPhaseID = $retrievePhaseID + 1;

$query =  "INSERT INTO Phase (phaseID, projectID, taskName, estimatedCost, actualCost, estimatedStartDate, estimatedEndDate, actualStartDate,
actualEndDate, status) VALUES ('".$newPhaseID."','".$projectID."','".$phaseName."','".$estimatedCost."','".$actualCost."','".$estStartDate."','".$estEndDate."','".$actualStartDate."','".$actualEndDate."','".$status."')";
$connection->query($query);

mysqli_close($connection);
header('Location: /Damavand/projectDetails.php');
?>