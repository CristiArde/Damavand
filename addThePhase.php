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

$query =  'INSERT INTO Phase (phaseID, projectID, taskName, estimatedCost, actualCost, estimatedStartDate, estimatedEndDate, actualStartDate, status,
actualEndDate, status) VALUES ("5","'.$projectID.'","'.$phaseName.'","'.$estimatedCost.'","'.$actualCost.'","'.$estStartDate.'",
"'.$estEndDate.'","'.$actualStartDate.'","'.$actualEndDate.'","'.$status.'")';
//$results = mysqli_query($query, $connection);
$connection->query($query);
echo $query;

//mysqli_free_result($results);
mysqli_close($connection);
//header('Location: /Damavand/projectDetails.php');
?>