<!DOCTYPE html>
<html>
<head>
	<title>Project Details</title>
</head>
<body>
	<table>
		<tr>
			<th>PROJECT DETAILS AND PHASES</th>
		</tr>
		<tr>
			<td>
<?php
require'connection.php';
session_start();

if(@$_POST['projectID'] == "")
	$projectID = $_SESSION['projectID'];
else
	$projectID = $_POST['projectID']; #needs the value of current poject id from other pages


$newPhaseIDQuery =  'SELECT MAX(phaseID) as newIDPhase from Phase where projectID ="'.$projectID.'"';
$result = mysqli_query($connection, $newPhaseIDQuery);
$newPhaseID = mysqli_fetch_assoc($result);
$_SESSION["PhaseIDNew"] = $newPhaseID['newIDPhase'];
$_SESSION["projectID"] = $projectID;  #TRYING TO PUT PROJECT ID IN SESSION, DOESNT WORK EITHER

$query =  'select phaseID, taskName, estimatedCost, actualCost, estimatedStartDate, estimatedEndDate, actualStartDate,
actualEndDate, status from Phase where projectID ="'.$projectID.'" ORDER BY status';
$results = mysqli_query($connection, $query);

echo "This section contains detailed information on each phase. You may proceed to place an order or make a payment as well";
?>
</tr></td>
<tr><td>
<form action="/Damavand/addPhase.html" method="POST">
<input id="Pidadd" name="Pidadd" type="hidden" value=<?php echo $projectID ?>>
<button type="submit">Add A Phase</button>
</form>
</tr></td>
<tr><td>
<table>

<?php
while ($row = mysqli_fetch_assoc($results))
{
	$_SESSION['phaseID'] = $row['phaseID'];  #for modify phase page
?>
<tr><th>
<?php
		echo 'Phase: '.$row['phaseID'].' status: ';
		if($row['status'] == "Complete")
		{
			?>
			<font color="green">
			<?php			
			echo $row['status'];
		}
		else if($row['status'] == "In Progress")
		{
			?>
			<font color="orange">
			<?php			
			echo $row['status'];
		}
		else
		{
			?>
			<font color="red">
			<?php			
			echo $row['status'];
		}
?>
</font>
</th></tr>
<tr><td>
<?php
		echo 'Phase Name: '.$row['taskName'];
?>
</td></tr>
<tr><td>
<?php
		echo 'Estimated Cost: '.$row['estimatedCost'];
?>
</td></tr>
<tr><td>
<?php
		if($row['status'] == "Complete")
			echo 'Actual Cost: '.$row['actualCost'];
		else if($row['status'] == "In Progress")
			echo 'Actual Cost so far: '.$row['actualCost'];
		else
			echo 'Actual Cost: NA';
?>
</td></tr>
<tr><td>
<?php
		$difference = $row['actualCost'] - $row['estimatedCost'];
		if($row['status'] == "Complete")
			echo 'Expenses(Actual Cost - Estimated Cost): '.$difference;
		else if($row['status'] == "In Progress")
			echo 'Expenses(Actual Cost - Estimated Cost : '.$difference;
		else
			echo 'Expenses(Actual Cost - Estimated Cost): NA';
?>
</td></tr>
<tr><td>
<?php

		echo 'Estimated date: '.$row['estimatedStartDate'].' to '.$row['estimatedEndDate'];
?>
</td></tr>
<tr><td>
<?php
		if($row['status'] == "Complete")
			echo 'Actual date: '.$row['actualStartDate'].' to '.$row['actualEndDate'];
		else if($row['status'] == "In Progress")
			echo 'Actual date: '.$row['actualStartDate'].' to NA';
		else
			echo 'Actual date: NA to NA';
?>
</td></tr>
<tr><td>
<?php
	if($row['status'] == 'Complete' || $row['status'] == 'In Progress')
	{	$queryDays = 'SELECT DATEDIFF("'.$row['estimatedEndDate'].'","'.$row['estimatedStartDate'].'") AS DiffDate from phase where phaseID = 1 and projectID = 7';
		$result = mysqli_query($connection, $queryDays);

		$days = mysqli_fetch_assoc($result);
		if($row['status'] == 'Complete')
		{
			if($days['DiffDate'] < 0)
			{
				echo "The phase was overdue by ".abs($days['DiffDate']).' days.';
			}
			elseif($days['DiffDate'] > 0)
				echo "The phase was completed ".$days['DiffDate']." days early.";
			else
				echo "The phase was completed on time.";
		}
		else
		{
			if($days['DiffDate'] < 0)
			{
				echo "The phase is overdue by ".abs($days['DiffDate']).' days.';
			}
			elseif($days['DiffDate'] > 0)
				echo "The phase has ".$days['DiffDate']." estimated days left.";
			else
				echo "The phase was completed on time.";
		}
	}
	else
		echo "Phase Not Started yet.";
?>
</td></tr>
<tr><td>
<?php
	if($row['status'] == "Complete")
	{
?>
	<button type="submit" disabled >Modify Phase</button> <button type="submit" disabled >Remove Phase</button> <button disabled type="submit">Order</button> <button type="submit">Payments</button>
<?php } 
	else{
?>

<form action="/Damavand/modifyPhase.php" method="POST">
<input id="Pid" name="Pid" type="hidden" value=<?php echo $projectID ?>>
<button type="submit">Modify Phase</button> 
</form>

<button type="submit">Remove Phase</button> 

<form action="/Damavand/getOrders.php" method="GET">
	<input name="id" id="id" type="hidden" value=<?php echo $projectID ?>>
	<input name="type" id="type" type="hidden" value = "Project">
	<button type="submit">Order</button>
</form> 
<button type="submit">Payments</button>
<?php }?>
</tr></td>
<?php
} #while condition brace

?>
</table>
<?php
mysqli_free_result($results);
mysqli_close($connection);
?>
</td>
</tr>
</table>
</body>
</html>