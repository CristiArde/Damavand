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
	$sql="SELECT orderID, phaseID, (Select supplierName from supplier s, project p, orders o WHERE s.supplierID = o.supplierID AND o.projectID =  p.projectID = '".$id."') as supplierName,totalCost, orderDate, estimatedDeliveryDate FROM Orders WHERE projectID = '".$id."'";
	$result = mysqli_query($connection,$sql);		//TO DO FROM HERE
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
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['orderID'] . "</td>";
	    echo "<td>" . $row['phaseID'] . "</td>";
	    echo "<td>" . $row['supplierName'] . "</td>";
	    echo "<td>" . $row['totalCost'] . "</td>";
	    echo "<td>" . $row['orderDate'] . "</td>";
	    echo "<td>" . $row['estimatedDeliveryDate'] . "</td>";
	    echo '<td>
		<form action="/Damavand/projectDetails.php">
			  <input type="hidden" value = "'.$row['orderID'].'">
			  <input type="submit" value="Ordered Items">
			</form> 
		</td>';
	}
	echo "</table>";
}
mysqli_close($connection);
?>
</body>
</html>