<?php

$id = $_GET['id'];
$type = $_GET['type'];	//get Orders based on Projects OR Phases. Type = Project or Type = Phase

require 'connection.php';
//print_r($id);
//print_r($type);
if($type == "Project"){
	$sql="SELECT supplierName, status , orderID, phaseID,totalCost, orderDate, estimatedDeliveryDate FROM Orders o  INNER JOIN supplier s ON s.supplierID = o.supplierID INNER JOIN project p ON p.projectID = '".$id."'WHERE o.projectID = '".$id."'";
}
else if($type == "Phase"){
	$phaseID = $_GET['phaseID'];

echo "<ul>
            <li>
                <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
                >>
                <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Project " .$id. "  Details</button> 
                >>
                <button onclick=\"location.href ='getOrders.php?id=".$id."&type=Phase&phaseID=".$phaseID."';\" class=\"button button2\">Phase ".$phaseID." orders</button> 
            </li>
        </ul>";


	$sql="SELECT supplierName, status , orderID, phaseID,totalCost, orderDate, estimatedDeliveryDate FROM Orders o  INNER JOIN supplier s ON s.supplierID = o.supplierID INNER JOIN project p ON p.projectID = '".$id."'WHERE o.projectID = ".$id." AND o.phaseID = ".$phaseID;
}
else if($type =='Task'){
	$sql="SELECT supplierName, status , orderID, o.phaseID,totalCost, orderDate, estimatedDeliveryDate FROM Orders o  INNER JOIN supplier s ON s.supplierID = o.supplierID INNER JOIN task t on CONCAT(t.taskID,t.phaseID,t.projectID) = ".$id."  where CONCAT(o.taskID,o.phaseID,o.projectID) = ".$id;
}	
	$result = mysqli_query($connection,$sql);
	$check = mysqli_num_rows($result);
	//print_r($result);
	if($check != 0){		
		echo 
		"<table id='order-table'>
			<tr>
				<th>Order Number</th>
				<th>Phase Number</th>
				<th>Supplier</th>
				<th>Total Cost</th>
				<th>Date Ordered</th>
				<th>Estimate Delivery Date</th>
				<th></th>
				<th></th>
			</tr>";
		$count = 0;
		//$supplierName = "";
		$enableDisable = 'enabled';
		while($row = mysqli_fetch_array($result)) {
			if($row['status']=='Complete')
				$enableDisable = 'disabled';
		    echo "<tr>";
		    echo "<td>" . $row['orderID'] . "</td>";
		    echo "<td>" . $row['phaseID'] . "</td>";
		    echo "<td>" . $row['supplierName'] . "</td>";
		    echo "<td>" . $row['totalCost'] . "</td>";
		    echo "<td>" . $row['orderDate'] . "</td>";
		    echo "<td>" . $row['estimatedDeliveryDate'] . "</td>";
		    echo '<td> <form action="modifyFunction.php" method="POST">
						  <input name="type" type="hidden" value = "Order">
						  <input name="id" type="hidden" value = '.$id.'>
						  <input name="oid" type="hidden" value = '.$row['orderID'].'>
						  <input name="phaseID" type="hidden" value = '.$row['phaseID'].'>
						  <input type="submit"  '.$enableDisable.' value="Modify Order">
						</form>
				</td>';
		   $count += 1;
		}
		 echo '<td rowspan="'.$count.'">
		 	<form action="createFunctionPage.php" method="POST">
				  <input name="type" id="type" type="hidden" value = "Order">
				  <input type="submit" '.$enableDisable.' value="Create Order">
			</form>
			<form action="getItems.php">
				  <input name="id" type="hidden" value = "'.$id.'">
				  <input name="type" type="hidden" value = "Project">
				  <input type="submit" value="View Orders Items">
			</form> 
			</td>';
		echo "</table>";
	}
	else
	{

		//TODO
		/*SHOW NAVIGATION BAR
		SHOW BACK BUTTON
		SHOW ADD ORDERS BUTTON IF PROJECT/PHASE/TASK NOT COMPLETED*/
		echo " No Orders for this ".$type;
	}
mysqli_close($connection);
?>