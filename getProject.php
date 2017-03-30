<!DOCTYPE html>
<html>
<head>
<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
$id = intval($_GET['id']);

require 'connection.php';

$sql="SELECT * FROM project WHERE projectID = '".$id."'";
$sql2 = "SELECT s.firstName, s.lastName FROM companyStaff s, project p WHERE s.staffID = p.projectManagerID AND p.projectID = '".$id."'";
$result = mysqli_query($connection,$sql);
$result2 = mysqli_query($connection,$sql2);
$projectManager = mysqli_fetch_assoc($result2);	//store First and Last name of project Manager
echo "<table>
<tr>
<th>Project ID</th>
<th>Project Name</th>
<th>Status</th>
<th>Project Manager</th>
<th>Start Date</th>
<th>End Date</th>
<th>Address</th>
<th>Estimated Cost</th>
<th>Actual Cost</th>
<th></th>
<th></th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td> Project " . $row['projectID'] . "</td>";
    echo "<td>" . $row['projectName'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $projectManager['firstName'] . " ". $projectManager['lastName'] . " </td>";
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
	echo '<td><input id="ordersBtn" onclick="showOrders('.$row['projectID'].')" type="button" value="Order Details"></td>';
	echo '<td>
		<form action="/Damavand/projectDetails.php" method="POST">
		  <input name="projectID" type="hidden" value = "'.$row['projectID'].'">
		  <input type="submit" value="More Information">
		</form> 
	</td>';
    echo "</tr>";
}
echo "</table>";
mysqli_close($connection);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
 
</script>
</body>
</html>
