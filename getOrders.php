<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$id = $_GET['id'];
$type = $_GET['type'];	//get Orders based on Projects OR Phases. Type = Project or Type = Phase

//print_r($id);
//print_r($type);
//die(print_r($type, true ));
require 'connection.php';
if($type = "Project"){
	$sql="SELECT * FROM Orders WHERE projectID = '".$id."' Order By phaseID";
	$sql2 = "SELECT supplierName FROM Supplier s, Orders o Where s.supplierID = o.supplierID"; //get Supplier Names
	$result = mysqli_query($connection,$sql);		//TO DO FROM HERE
	echo "<table>
	<tr>
	<th>Order ID</th>
	<th>Project ID</th>
	<th>Supplier</th>
	<th>Total Cost</th>
	<th>Estimate Delivery Date</th>
	<th>End Date</th>
	<th>Address</th>
	<th>Estimated Cost</th>
	<th>Actual Cost</th>
	<th></th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td> Project " . $row['projectID'] . "</td>";
	    echo "<td>" . $row['projectName'] . "</td>";
	    echo "<td>" . $row['status'] . "</td>";
	    echo "<td>" . $projectManager['firstName'] . " ". $projectManager['lastName'] . " </td>";
	    //echo "<td></td>";
	    echo "<td>" . $row['startDate'] . "</td>";
		if($row['endDate'] != "")
			echo "<td>" . $row['endDate'] . "</td>";
		else
			echo "<td> TBA </td>";
		echo "<td>" . $row['siteAddress'] . "</td>";
		if($row['estimatedCost'] != "")
			echo "<td>$" . $row['estimatedCost'] . "</td>";
		else
			echo "<td> TBA </td>";
		if($row['actualCost'] != "" && $row['actualCost'] != 0)
			echo "<td>$" . $row['actualCost'] . "</td>";
		else
			echo "<td> TBA </td>";
		echo '<td>
			<form action="/projectDetails.php">
			  <input type="hidden" value = "'.$row['projectID'].'">
			  <input type="submit" value="More Information">
			</form> 
		</td>';
	    echo "</tr>";
	}
	echo "</table>";
}
mysqli_close($connection);
?>
</body>
</html>