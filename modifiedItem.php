<?php
 session_start();
 require 'connection.php';
$projectID = $_SESSION['projectID'];
$itemID = $_POST['id'];
$itemName = $_POST['itemName'];
$quantity = $_POST['quantity'];
$unitCost = $_POST['unitCost'];
$supID = $_POST['supID'];
$_SESSION['itemID'] = $itemID;

$query = 'UPDATE items SET itemName ="'.$itemName.'",quantity = "'.$quantity.'", unitCost = "'.$unitCost.'", 
supplierID = "'.$supID.'" WHERE itemID = "'.$itemID.'"';
   if (mysqli_query($connection, $query)) {
	   echo "Record updated successfully";
	} 
	else {
    	echo "Error updating record: " . mysqli_error($connection);
	}
  
  mysqli_close($connection);
  header('Location: /Damavand/getItems.php?id='.$projectID.'&type=Project');
?>