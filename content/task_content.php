
	<h1>Damavand Construction INC.</h1>
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
	echo "<h3>Tasks for Phase $phaseID of Project $projectID</h3>";
	$_SESSION['phaseID'] = $phaseID;

	$query =  'select taskID, taskName, estimatedStartDate, actualStartDate, estimatedCost, estimatedEndDate, actualEndDate, 
				actualCost, status from task where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'" ORDER BY status';
	$results = mysqli_query($connection, $query);
	?>

	<table>
		
		<ul>
			<li>
				<button onclick="location.href ='Welcome.php';" class="button button2">Home</button>
				>>
				<button onclick="location.href ='projectDetails.php';" class="button button2">Project <?php echo $projectID; ?> Details</button>
				>>
				<button onclick='window.location.reload(true);' class="button button2">Phase  <?php echo $phaseID; ?> Tasks</button>
			</li>
		</ul>

		<tr>
				<td>
					<form action="addTask.html" method="POST">
						<button type="submit">Add A Task</button>
					</form>
				</td>
			</tr>
	<?php
	while ($row = mysqli_fetch_assoc($results))
	{

	?>
	<tr><td>
	
	<?php
		echo 'Task Name:  '.$row['taskName'];
		?>
		</td></tr>
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
			
			if (strpos($_SESSION['username'], 'damavand') !== false)
			{
			?>
			<form action="getOrders.php" method="GET">
				<input name="type" id="type" type="hidden" value = "Task">
				<button type="submit" name="id" value=<?php echo $row['taskID'].$phaseID.$projectID; ?>>Task Orders</button>
			</form> 
			<form action="taskPayment.php" method="POST">
				<input type="hidden" id='taskID' name="taskID" value= <?php echo $row['taskID']; ?>>
				<input type="hidden" id='phaseID' name="phaseID" value= <?php echo $phaseID; ?>>
			<button type="submit" name="id" value=<?php echo $projectID; ?>>Payments</button>
		</form>
			<?php 
			}
			?> 
		</td>
	</tr>
	<?php } #while condition brace 
	mysqli_free_result($results);
	mysqli_close($connection);
	?>
	</table>
