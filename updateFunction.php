<head>
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO MODIFY PROJECTS, ORDERS AND TASKS
    =================================================================*/
    require 'connection.php';
    session_start();
 
    $type = $_POST['type'];
    //$phaseID = $_POST['phaseID'];

    if($type=='Project'){
        $projectID = $_POST['projectID'];
        $projectName = $_POST['projectName'];;
        $projectManagerID = $_POST['projectManagerID'];;
        $customerID = $_POST['customerID'];;
        $startDate = $_POST['startDate'];;
        $endDate = $_POST['endDate'];;
        $siteAddress = $_POST['siteAddress'];;
        $status = $_POST['status'];;
        $estimatedCost = $_POST['estimatedCost'];;
        $actualCost = $_POST['actualCost'];;

        $sql = "UPDATE project SET projectID = '".$projectID."', projectName = '".$projectName."', projectManagerID = '".$projectManagerID."', customerID = '".$customerID."', startDate = '".$startDate."', endDate = '".$endDate."', siteAddress = '".$siteAddress."', status = '".$status."', estimatedCost = '".$estimatedCost."', actualCost = '".$actualCost."' WHERE projectID ='".$projectID."'";
    }else if($type=='Order'){
        $orderID = $_POST['orderID'];
        $projectID = $_POST['projectID'];
        $phaseID = $_POST['phaseID'];
        $taskID = $_POST['taskID'];
        $supplierID = $_POST['supplierID'];
        $totalCost = $_POST['totalCost'];
        $orderDate = $_POST['orderDate'];
        $estimatedDeliveryDate = $_POST['estimatedDeliveryDate'];

        $sql = "UPDATE orders SET orderID = ".$orderID.", projectID = ".$projectID.", phaseID = ".$phaseID.", taskID = ".$taskID.", supplierID = ".$supplierID.", totalCost = ".$totalCost.", orderDate  = ".$orderDate.", estimatedDeliveryDate = ".$estimatedDeliveryDate." WHERE CONCAT(taskID,phaseID,projectID) = '".$taskID.$phaseID.$projectID."'";


    }else if($type=='Task'){
        //primary key =  concatination of projectID,phaseID & taskID
    	
    	$projectID = $_POST['projectID'];
        $projectName = $_POST['projectName'];
        $projectManagerID = $_POST['projectManagerID'];
        $customerID = $_POST['customerID'];
        $actualStartDate = $_POST['actualStartDate'];
        $estimatedStartDate = $_POST['estimatedStartDate'];
        $actualEndDate = $_POST['actualEndDate'];
        $estimatedEndDate = $_POST['estimatedEndDate'];
        $status = $_POST['status'];
        $actualCost = $_POST['actualCost'];
        $estimatedCost = $_POST['estimatedCost'];
        $taskName = $_POST['taskName'];



        $sql = "UPDATE SET task taskID = '".$taskID."', phaseID = '".$phaseID."', projectID = '".$projectID."', taskName = '".$taskName."', estimatedStartDate = '".$estimatedStartDate."', actualStartDate = '".$actualStartDate."', estimatedCost = '".$estimatedCost."', estimatedEndDate = '".$estimatedEndDate."', actualEndDate = '".$actualEndDate."', actualCost = '".$actualCost."', status SET WHERE = CONCAT(taskID,phaseID,projectID) = '".$taskID.$phaseID.$projectID."'";
    }
    


    $result = mysqli_query($connection,$sql);
    mysqli_close($connection);
    if($type == 'Task')
        header('Location: /Damavand/task.php');
    else
        header('Location: /Damavand/Welcome.php');
    ?>
</div>
