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
//$type = $_GET['type'];
require 'connection.php';
$sql="SELECT supplierName, o.projectID, phaseID, i.orderID , itemName, unitCost, quantity FROM items i INNER JOIN orders o on i.orderID = o.orderID INNER JOIN supplier s ON i.supplierID = s.supplierID WHERE o.projectID = '".$id."' GROUP BY supplierName,o.projectID, i.orderID , itemName, unitCost, quantity HAVING o.projectID = '".$id."'";

$result = mysqli_query($connection,$sql);		
echo "<table>
<tr>
<th>Project Number</th>
<th>Phase Number</th>
<th>Order Number</th>
<th>Supplier</th>
<th>Item Name</th>
<th>Cost Per Unit</th>
<th>Quantity</th>
</tr>";
$count = 0;
$supplierName = "";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['projectID'] . "</td>";
    echo "<td>" . $row['phaseID'] . "</td>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['supplierName'] . "</td>";
    echo "<td>" . $row['itemName'] . "</td>";
    echo "<td>$" . $row['unitCost'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
   $count += 1;
}
echo "</table>";
mysqli_close($connection);
?>
</body>
</html>