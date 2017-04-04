<?php
session_start();
$id = $_GET['id'];
$type = $_GET['type'];	//get Orders based on Projects OR Phases. Type = Project or Type = Phase

require 'connection.php';
if($type = "Project"){
	$sql="SELECT supplierName, status , orderID, phaseID,totalCost, orderDate, estimatedDeliveryDate FROM Orders o  INNER JOIN supplier s ON s.supplierID = o.supplierID INNER JOIN project p ON p.projectID = '".$id."'WHERE o.projectID = '".$id."'";
	$result = mysqli_query($connection,$sql);		
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
					  <input type="submit" '.$enableDisable.' value="Modify Order">
					</form>
			</td>';
	   $count += 1;
	}
	 echo '<td rowspan="'.$count.'">
	 	<form action="placeOrder.php">
			  <input name="id" type="hidden" value = "'.$id.'">
			  <input name="type" type="hidden" value = "Project">
			  <input type="submit" '.$enableDisable.' value="Place Order">
		</form>
		<form action="getItems.php">
			  <input name="id" type="hidden" value = "'.$id.'">
			  <input name="type" type="hidden" value = "Project">
			  <input type="submit" value="View Orders Items">
		</form> 
		</td>';
	echo "</table>";
}
mysqli_close($connection);
?>