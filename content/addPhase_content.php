<?php 
  require'connection.php';
  session_start(); 
  $projectID = $_SESSION['projectID'];
  ?>
  <form action="/Damavand/addThePhase.php" method="POST">
    <h1>Damavand Construction INC.</h1>
    <h3>Add Phase for Project <?php echo $projectID ?></h3>
    <table id='add-phase-table' class='center'>
      <tr>
        <td>Phase Name: </td>
        <td><input type="text" name="phaseName"/></td>
      </tr>
      <tr>
        <td>Estimated Cost: </td>
        <td><input type="text" name="estCost"/></td>
      </tr>
      <tr>
        <td>Actual Cost: </td>
        <td><input type="text" name="actualCost"/></td>
      </tr>
      <tr>
        <td>Estimated Start Date: </td>
        <td><input type="date" name="estStartDate"/></td>
      </tr>
      <tr>
        <td>Estimated End Date: </td>
        <td><input type="date" name="estEndDate"></td>
      </tr>
      <tr>
        <td>Actual Start Date: </td>
        <td><input type="date" name="actualStartDate"></td>
      </tr>
      <tr>
        <td>Actual End Date: </td>
        <td><input type="date" name="actualEndDate"/></td>
      </tr>
      <tr>
        <td>Current Status (Complete, In Progress, Not Started): </td>
        <td><input type="text" name="status"/></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Submit"></td>
      </tr>
</form>