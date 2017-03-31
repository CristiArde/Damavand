<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>

<?php
$id = $_GET['id'];
$type = $_GET['type'];	//get Orders based on Projects OR Phases. Type = Project or Type = Phase

require 'connection.php';
if($type = "Project"){
	$sql="SELECT supplierName , orderID, phaseID,totalCost, orderDate, estimatedDeliveryDate FROM Orders o  INNER JOIN supplier s ON s.supplierID = o.supplierID WHERE projectID = '".$id."'";
	$result = mysqli_query($connection,$sql);		
	echo "<table>
	<tr>
	<th>Order Number</th>
	<th>Phase Number</th>
	<th>Supplier</th>
	<th>Total Cost</th>
	<th>Date Ordered</th>
	<th>Estimate Delivery Date</th>
	<th></th>
	</tr>";
	$count = 0;
	//$supplierName = "";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['orderID'] . "</td>";
	    echo "<td>" . $row['phaseID'] . "</td>";
	    echo "<td>" . $row['supplierName'] . "</td>";
	    echo "<td>" . $row['totalCost'] . "</td>";
	    echo "<td>" . $row['orderDate'] . "</td>";
	    echo "<td>" . $row['estimatedDeliveryDate'] . "</td>";
	   $count += 1;
	}
	 echo '<td rowspan="'.$count.'">
		<form action="/Damavand/getItems.php">
			  <input name="id" type="hidden" value = "'.$id.'">
			  <input name="type" type="hidden" value = "Project">
			  <input type="submit" value="Ordered Items">
			</form> 
		</td>';
	echo "</table>";
}
mysqli_close($connection);
?>
</body>
</html>