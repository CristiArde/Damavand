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

        $sql = "INSERT INTO project VALUES (".$projectName.",".$projectManagerID.",".$customerID.",".$startDate."',".$endDate.",".$siteAddress.",".$status.",".$estimatedCost.",".$actualCost.")";
    }else if($type=='Order'){
      
        $projectID = $_POST['projectID'];
        $phaseID = $_POST['phaseID'];
        $taskID = $_POST['taskID'];
        $supplierID = $_POST['supplierID'];
        $totalCost = $_POST['totalCost'];
        $orderDate = $_POST['orderDate'];
        $estimatedDeliveryDate = $_POST['estimatedDeliveryDate'];

        $sql = "INSERT INTO  orders VALUES (".$projectID.",".$phaseID.",".$taskID.",".$supplierID.",".$totalCost.",".$orderDate.",".$estimatedDeliveryDate.")";


    }else if($type=='Item'){
    	$sql="SELECT itemID as 'Item ID',  itemName as 'Item Name', unitCost as 'Unit Cost', quantity as 'Quantity', orderID as 'Order Number', supplierID as 'Supplier ID' FROM Items ORDER BY itemID ASC LIMIT 1";
    }
print_r($_POST['OrderID']);
//$connection->query($query);
mysqli_close($connection);
//header('Location: /Damavand/projectDetails.php');
?>