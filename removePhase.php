<?php
require'connection.php';
session_start();

$projectID = $_SESSION['projectID']; 
$phaseID = $_POST['submitPID'];

$query =  'DELETE FROM Phase where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'"';
$connection->query($query);


$message = "Phase";
echo "<script type='text/javascript'>alert('$message');</script>";

mysqli_close($connection);
header('Location: /Damavand/projectDetails.php');
?>