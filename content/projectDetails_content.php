<div id="project-details-main" class="center">
	<h1>Damavand Construction INC.</h1>
	<h3>Project Details and Phases</h3>
	
					<?php
				require'connection.php';
				session_start();

				if(@$_POST['projectID'] == "")
					$projectID = $_SESSION['projectID'];
				else
					$projectID = $_POST['projectID']; #needs the value of current poject id from other pages
				?>
	<ul>
		<li>
			<button onclick="location.href ='Welcome.php';" class="button button2">Home</button>
			>>
			<button onclick='window.location.reload(true);' class="button button2">Project <?php echo $projectID; ?> Details</button> 
		</li>
	</ul>
	<table>
		<tr>
			<td>

			<?php

				$newPhaseIDQuery =  'SELECT MAX(phaseID) as newIDPhase from Phase where projectID ="'.$projectID.'"';
				$result = mysqli_query($connection, $newPhaseIDQuery);
				$newPhaseID = mysqli_fetch_assoc($result);
				$_SESSION["PhaseIDNew"] = $newPhaseID['newIDPhase'];
				$_SESSION['projectID'] = $projectID;  #TRYING TO PUT PROJECT ID IN SESSION, DOESNT WORK EITHER

				$query =  'select phaseID,phaseName, estimatedStartDate, estimatedEndDate, actualStartDate,
				actualEndDate, status from Phase where projectID ="'.$projectID.'" ORDER BY status';
				$results = mysqli_query($connection, $query);

				echo "This section contains detailed information on each phase. You may proceed to place an order or make a payment as well";
				?>
			</td>
		</tr>
		<tr>
			<td>
				<form action="addPhase.html" method="POST">
					<input id="Pidadd" name="Pidadd" type="hidden" value='"'<?php echo $projectID ?>'"'>
					<button type="submit">Add A Phase</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<?php
					while ($row = mysqli_fetch_assoc($results))
					{
						$_SESSION['phaseID'] = $row['phaseID'];  #for modify phase page
						$query2 = 'select SUM(estimatedCost) as "estimatedCost", SUM(actualCost) as "actualCost" from TASK t WHERE t.projectID = "'.$_SESSION['projectID'].'" AND t.phaseID = "'.$row['phaseID'].'"';
				        $result2 = mysqli_query($connection, $query2);
				        $costArray = mysqli_fetch_assoc($result2);
				    

					?>
					<tr>
						<th colspan="2">
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
						</th>
					</tr>
					<tr>
						<td>Phase Name: </td>
						<td><?php echo $row['phaseName']; ?></td>
					</tr>
					<tr>
						<td>Estimated Cost: </td>
						<td><?php echo '$'.$costArray['estimatedCost']; ?></td>
					</tr>
					<tr>
						<?php
						if($row['status'] == "Complete") {
							echo '<td>Actual Cost: </td>';
							echo '<td>$'.$costArray['actualCost'].'</td>';
						}	
						else if($row['status'] == "In Progress") {
							echo '<td>Actual Cost so far: </td>';
							echo '<td>$'.$costArray['actualCost'].'</td>'; 
						}		
						else {
							echo '<td>Actual Cost: </td>';
							echo '<td>N/A</td>';
						}										
						?>
					</tr>
					<tr>
						<td>Expenses (Actual Cost - Estimated Cost): </td>
						<td>
							<?php
							$difference = $costArray['actualCost'] - $costArray['estimatedCost'];
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
						<td>Estimated start date: </td>
						<td>									
							<?php 
							if ($row['status'] == "Not Started")
								echo 'N/A';
							else
								echo $row['estimatedStartDate']; 
							?>
						</td>
					</tr>
					<tr>
						<td>Estimated end date: </td>
						<td>
							<?php 
							if ($row['status'] == "Not Started")
								echo 'N/A';
							else
								echo $row['estimatedEndDate']; 
							?>
						</td>
					</tr>
					<tr>
						<td>Actual start date: </td>
						<td>
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
						<td>Actual end date: </td>
						<td>
							<?php
							if($row['status'] == "Complete")
								echo $row['actualEndDate'];
							else
								echo 'N/A';
							?>
						</td>								
					</tr>
					<tr>
						<td colspan="2">
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
										echo "The phase was overdue by ".abs($days['DiffDate']).' day(s).';
									}
									elseif($days['DiffDate'] > 0)
										echo "The phase was completed ".$days['DiffDate']." day(s) early.";
									else
										echo "The phase was completed on time.";
								}
								else
								{
									if($days['DiffDate'] < 0)
										echo "The phase is overdue by ".abs($days['DiffDate']).' day(s).';			
									elseif($days['DiffDate'] > 0)
										echo "The phase has ".$days['DiffDate']." estimated day(s) left.";
									else
										echo "The phase was completed on time.";
								}
							}
							else
								echo "Phase not started yet.";
							?>
						</td>
					</tr>
					<tr>
						<td>
							<?php
							if($row['status'] == "Complete") {
							?>	<form>
								<button type="submit" disabled >Modify Phase</button> 
								</form>
								<form>
								<button type="submit" disabled >Remove Phase</button>
								</form>
							<?php 
							} else {
							?>
								<form action="modifyPhase.php" method="POST">
									<input id="Pid" name="Pid" type="hidden" value=<?php echo $projectID; ?>>
									<button type="submit" name="submitPID" value=<?php echo $row['phaseID'] ?>>Modify Phase</button>
								</form>
								<form action="/Damavand/removePhase.php" method="POST">
									<button type="submit" name="submitPID" value=<?php echo $row['phaseID'] ?>>Remove Phase</button>
								</form>
							<?php 
							} #if condition brace
							?>
							<form action="getOrders.php" method="GET">
								<input name="id" id="id" type="hidden" value=<?php echo $projectID; ?>>
								<input name="type" id="type" type="hidden" value = "Project">
								<button type="submit">Order</button>
							</form> 
							<form action="/Damavand/task.php" method="POST">
								<button type="submit" name="submitPID" value=<?php echo $row['phaseID'] ?>>Tasks</button>
							</form>

							<button type="submit">Payments</button>
						</td>
					</tr>
					<?php } #while condition brace ?>
				</table>
			<?php
			mysqli_free_result($results);
			mysqli_close($connection);
			?>
			</td>
		</tr>
	</table>
</div>