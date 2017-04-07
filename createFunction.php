<?php
require'connection.php';
session_start();

$type = $_SESSION['type'];
if($type=='Project'){
       
        $projectName = $_POST['projectName'];;
        $projectManagerID = $_POST['projectManagerID'];;
        $customerID = $_POST['customerID'];;
        $startDate = $_POST['startDate'];;
        $endDate = $_POST['endDate'];;
        $siteAddress = $_POST['siteAddress'];;
        $status = $_POST['status'];;
        $estimatedCost = $_POST['estimatedCost'];;
        $actualCost = $_POST['actualCost'];;

        $sql = "INSERT INTO project (projectName, projectManagerID, customerID, startDate, endDate, siteAddress, status, estimatedCost, actualCost) VALUES ('".$projectName."',".$projectManagerID.",".$customerID.",'".$startDate."','".$endDate."','".$siteAddress."','".$status."',".$estimatedCost.",".$actualCost.")";
    }else if($type=='Order'){
      
        $projectID = $_POST['projectID'];
        $phaseID = $_POST['phaseID'];
        $taskID = $_POST['taskID'];
        $supplierID = $_POST['supplierID'];
        $totalCost = $_POST['totalCost'];
        $orderDate = $_POST['orderDate'];
        $estimatedDeliveryDate = $_POST['estimatedDeliveryDate'];

        $sql = "INSERT INTO  orders (projectID, phaseID, taskID, supplierID, totalCost, orderDate, estimatedDeliveryDate) VALUES (".$projectID.",".$phaseID.",".$taskID.",".$supplierID.",".$totalCost.",'".$orderDate."','".$estimatedDeliveryDate."')";


    }else if($type=='Item'){
    	$itemName = $_POST['itemName'];
    	$unitCost = $_POST['unitCost'];
    	$quantity = $_POST['quantity'];
    	$orderID = $_POST['OrderID'];
    	$supplierID = $_POST['supplierID'];
    	$sql="INSERT INTO items (itemName, unitCost, quantity, orderID, supplierID)VALUES('".$itemName."', ".$unitCost." , ".$quantity.", ".$orderID." , ".$supplierID.")";
    }
//print_r($_POST['OrderID']);
mysqli_query($connection,$sql);
//$stmt ->execute();
mysqli_close($connection);
if($type=='Item')
	header('Location: /Damavand/getItems.php?id='.$_SESSION['projectID'].'&type=Project');
else if($type=='Order'){
	header('Location: /Damavand/getOrders.php?id='.$_SESSION['projectID'].'&type=Project');
}
else if($type=='Project'){
	header('Location: /Damavand/Welcome.php');
}
?>