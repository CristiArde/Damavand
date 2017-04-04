<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>
</head>
<body>
<table>
	<tr><th>TASKS</th></tr>
	<tr>
			<td>
				<form action="addTask.html" method="POST">
					<button type="submit">Add A Task</button>
				</form>
			</td>
		</tr>
<?php 
require'connection.php';
session_start();

if(@$_POST['projectID'] == "")
	$projectID = $_SESSION['projectID'];
else
	$projectID = $_POST['projectID']; #needs the value of current poject id from other pages

if(@$_POST['submitPID'] == "")
	$phaseID = $_SESSION['phaseID'];
else
	$phaseID = $_POST['submitPID']; 

$_SESSION['phaseID'] = $phaseID;

$query =  'select taskID, taskName, estimatedStartDate, actualStartDate, estimatedCost, estimatedEndDate, actualEndDate, 
			actualCost, status from task where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'" ORDER BY status';
$results = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($results))
{

?>
<tr><td>
<?php
	echo 'Task: '.$row['taskID'].' status: ';
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

</td></tr>
<tr>
<td>Estimated Cost: <?php echo $row['estimatedCost']; ?></td>
</tr>
<tr>
<td>Actual Cost: <?php echo $row['actualCost']; ?></td>
</tr>
<tr>
<td>Expenses (Actual Cost - Estimated Cost): 
	<?php
		$difference = $row['actualCost'] - $row['estimatedCost'];
		if ($row['status'] == "Not Started")
			echo 'N/A';
		else if ($difference > 0)
			echo '$'.$difference;
		else if ($difference < 0)
			echo '-$'.abs($difference);
	?>
</td>
</tr>
<tr>
<td>Estimated start date: 				
<?php 
	if ($row['status'] == "Not Started")
		echo 'N/A';
	else
		echo $row['estimatedStartDate']; 
?>
</td>
</tr>
<tr>
	<td>Estimated end date:
	<?php 
	if ($row['status'] == "Not Started")
		echo 'N/A';
	else
		echo $row['estimatedEndDate']; 
?>
</td>
</tr>
<tr>
<td>Actual start date:
<?php
	if($row['status'] == "Complete")
		echo $row['actualStartDate'];
	else if($row['status'] == "In Progress")
		echo $row['actualStartDate'];
	else
		echo 'N/A';
?>
</td>
</tr>
<tr>
<td>Actual end date: 
<?php
	if($row['status'] == "Complete")
		echo $row['actualEndDate'];
	else
		echo 'N/A';
?>
</td>								
</tr>
<tr><td>
<?php
if($row['status'] == 'Complete' || $row['status'] == 'In Progress')
{	
	if ($row['status'] == 'Complete')
		$queryDays = 'SELECT DATEDIFF("'.$row['estimatedEndDate'].'","'.$row['actualEndDate'].'") AS DiffDate from phase where projectID = '.$projectID;
	else if ($row['status'] == 'In Progress')
		$queryDays = 'SELECT DATEDIFF("'.$row['estimatedEndDate'].'","'.$row['actualStartDate'].'") AS DiffDate from phase where projectID = '.$projectID;
	$result = mysqli_query($connection, $queryDays);

	$days = mysqli_fetch_assoc($result);
	if($row['status'] == 'Complete')
	{
		if($days['DiffDate'] < 0)
		{
			echo "The task was overdue by ".abs($days['DiffDate']).' day(s).';
		}
		elseif($days['DiffDate'] > 0)
			echo "The task was completed ".$days['DiffDate']." day(s) early.";
		else
			echo "The task was completed on time.";
	}
	else
	{
		if($days['DiffDate'] < 0)
			echo "The task is overdue by ".abs($days['DiffDate']).' day(s).';			
		elseif($days['DiffDate'] > 0)
			echo "The task has ".$days['DiffDate']." estimated day(s) left.";
		else
			echo "The task was completed on time.";
	}
}
else
	echo "Task not started yet.";
?>
</td></tr>
<tr>
	<td>
		<?php
		if($row['status'] == "Complete") {
		?>	<form>
			<button type="submit" disabled >Modify Task</button> 
			</form>
			<form>
			<button type="submit" disabled >Remove Task</button>
			</form>
		<?php 
		} else {
		?>
			<form action="modifyFunction.php" method="POST">
				<input name="type" id="type" type="hidden" value = "Task">
				<button type="submit" name="id" value=<?php echo $row['taskID'].$phaseID.$projectID; ?>>Modify Task</button>
			</form>
			<form action="/Damavand/deleteFunction.php" method="POST">
				<input name="type" id="type" type="hidden" value = "Task">
				<button type="submit" name="id" value=<?php echo $row['taskID'].$phaseID.$projectID; ?>>Remove Task</button>
			</form>
		<?php 
		} #if condition brace
		?>
		<form action="getOrders.php" method="GET">
			<input name="id" id="id" type="hidden" value=<?php echo $projectID; ?>>
			<input name="id" id="id" type="hidden" value=<?php echo $phaseID; ?>>
			<input name="type" id="type" type="hidden" value = "Task">
			<button type="submit" name="taskID" value=<?php echo $row['taskID'] ?>>Order</button>
		</form> 
		<button type="submit">Payments</button>
	</td>
</tr>
<?php } #while condition brace 
mysqli_free_result($results);
mysqli_close($connection);
?>
</table>
</body>
</html>