<?php
session_start();
$id = intval($_GET['id']);

require 'connection.php';
$_SESSION['projectID'] = $id;
$sql="SELECT * FROM project WHERE projectID = '".$id."'";
$sql2 = "SELECT s.firstName, s.lastName FROM companyStaff s, project p WHERE s.staffID = p.projectManagerID AND p.projectID = '".$id."'";
$result = mysqli_query($connection,$sql);
$result2 = mysqli_query($connection,$sql2);
$projectManager = mysqli_fetch_assoc($result2);	//store First and Last name of project Manager
echo 
"<table id='project-table'>
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
	if($row['status']=='Complete')
		$buttonVal = 'More Information';
	else
		$buttonVal = 'Update Project';
    echo "<tr>";
    echo "<td> Project " . $row['projectID'] . "</td>";
    echo "<td>" . $row['projectName'] . "</td>";
    switch ($row['status']) {
    	case "Complete":
    		echo "<td><font color='green'>" . $row['status'] . "</font></td>";
    		break;
		case "In Progress":
			echo "<td><font color='orange'>" . $row['status'] . "</font></td>";
			break;
		default:
			echo "<td><font color='red'>" . $row['status'] . "</font></td>";
			break;
    }
    
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
		echo '<td>';
		if (strpos($_SESSION['username'], 'damavand') !== false)
		{
		echo '<form action="modifyFunction.php" method="POST">
		  <input name="type" type="hidden" value = "Project">
		  <input name="id" type="hidden" value = '.$row['projectID'].'>
		  <input type="submit" value="Modify Project">
		</form>
		<form action="deleteFunction.php" method="POST">
		<input name="type" id="id" type="hidden" value = "Project">
		  <input name="id" id="id" type="hidden" value = '.$row['projectID'].'>
		  <input type="submit" value="Delete Project">
		</form>
		</td>';
		echo '<td><input id="ordersBtn" onclick="showOrders('.$row['projectID'].')" type="button" value="Order Details">';
		}
		echo '<form action="projectDetails.php" method="POST">
		  <input name="projectID" type="hidden" value = "'.$row['projectID'].'">
		  <input type="submit" value="'.$buttonVal.'">
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