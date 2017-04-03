<!DOCTYPE html>
<html>
<head>
<title>Add Phase</title>
</head>
<body>
<?php
require'connection.php';
session_start();

$phaseID = $_SESSION['phaseID'];
$projectID = $_SESSION['projectID'];  //DOESNT WORK

$_SESSION['phaseID'] = $phaseID;
$_SESSION['pID'] = $projectID; #not needed if the hidden PID works

  $query =  'select taskName, estimatedCost, actualCost, estimatedStartDate, estimatedEndDate, actualStartDate,
  actualEndDate, status from Phase where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'"';
  $results = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($results);

?>

  <form action="/Damavand/modifiedPhase.php" method="POST">
  <input type="hidden" name="PID" id="PID" value=<?php echo $projectID ?>/> <!--  THIS DOESNT WORK   -->
  Phase Name: <input type="text" name="phaseName" value=<?php echo $row['taskName']?>><br><br>
  Estimated Cost: <input type="text" name="estCost" value=<?php echo $row['estimatedCost']?>><br><br>
  Actual Cost: <input type="text" name="actualCost" value=<?php echo $row['actualCost']?>><br><br>
  Estimated Start date: <input type="date" name="estStartDate" value="<?php echo date('Y-m-d',strtotime($row['estimatedStartDate'])) ?>"><br><br>
  Estimated End date: <input type="date" name="estEndDate" value="<?php echo date('Y-m-d',strtotime($row['estimatedEndDate'])) ?>"><br><br>
  Actual Start Date: <input type="date" name="actualStartDate" value="<?php echo date('Y-m-d',strtotime($row['actualStartDate'])) ?>"><br><br>
  Actual End Date: <input type="date" name="actualEndDate" value="<?php echo date('Y-m-d',strtotime($row['actualEndDate'])) ?>"><br><br>
  Current Status:(Complete, In Progress, Not Started): <input type="text" name="status" value=<?php echo $row['status']?>><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
mysqli_free_result($results);
mysqli_close($connection);
?>