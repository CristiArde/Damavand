  <?php
  require'connection.php';
  session_start();

  $phaseID = $_POST['submitPID'];
  $projectID = $_SESSION['projectID'];  //DOESNT WORK

  $_SESSION['phaseID'] = $phaseID;
  $_SESSION['pID'] = $projectID; #not needed if the hidden PID works

  $query =  'select phaseName, estimatedStartDate, estimatedEndDate, actualStartDate,
  actualEndDate, status from Phase where projectID ="'.$projectID.'" AND phaseID = "'.$phaseID.'"';
  $results = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($results);
  
  $dateQuery = 'select startDate from project where projectID = "'.$projectID.'"';
  $dateResult = mysqli_query($connection, $dateQuery);
  $dateRow = mysqli_fetch_assoc($dateResult);
  
  ?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
  <script type="text/javascript">
   
  function validateForm()
  {
          var phaseName= document.forms["myForm"]["phaseName"].value;
          var status= document.forms["myForm"]["status"].value;
          var estStartDate = document.forms["myForm"]["estStartDate"].value;
          var estEndDate = document.forms["myForm"]["estEndDate"].value;
          var actualStartDate = document.forms["myForm"]["actualStartDate"].value;
          var actualEndDate = document.forms["myForm"]["actualEndDate"].value;
          var projectDate = "<?php echo $dateRow['startDate']; ?>";
         // alert(projectDate);
          //return false;
      
         if (phaseName == "")
         {
            alert("Phase Name must be filled")
            return false;
         }
         else if ((status =="") || !(status == "Complete" || status == "In Progress" || status == "Not Started"))
         {
           alert("Current Status is not filled properly");
          return false;
         }
         else if((Date.parse(estStartDate)-Date.parse(projectDate))<0 || estStartDate == "")
         {
          alert("Invalid Estimated Start date");
          return false;
         }
         else if((Date.parse(actualStartDate)-Date.parse(projectDate))<0 || actualStartDate == "")
         {

          alert("Invalid Actual Start date");
          return false;
         }
         else if(((Date.parse(estEndDate)-Date.parse(projectDate))<0 || (Date.parse(estEndDate)-Date.parse(estStartDate))<0) || estEndDate =="")
         {

          alert("Invalid Estimate End date");
          return false;
         } 
         else if(((Date.parse(actualEndDate)-Date.parse(projectDate))<0 || (Date.parse(actualEndDate)-Date.parse(actualStartDate))<0)|| actualEndDate =="")
         {

          alert("Invalid Actual End date");
          return false;
         }
    }
  </script>
</head>


<div id='modify-phase-main' class='center'>
  
    <h1>Damavand Construction INC.</h1>
    
<ul>
    <li>
      <button onclick="location.href ='Welcome.php';" class="button button2">Home</button>
      >>
      <button onclick="location.href ='projectDetails.php';" class="button button2">Project <?php echo $projectID ?> Details</button>
      >>
      <button onclick='window.location.reload(true);' class="button button2">Modify Phase <?php echo $phaseID ?></button> 
    </li>
  </ul>
    <h3>Modify Project <?php echo $projectID.' Phase '.$phaseID ?></h3>
    <form name="myForm" action="modifiedPhase.php" onsubmit="return validateForm()" method="POST">
      <input type="hidden" name="PID" id="PID" value=<?php echo $projectID ?>/> <!--  THIS DOESNT WORK   -->
      <table id='modify-phase-table' class='center'>
        <tr>
          <td>Phase Name: </td>
          <td><input type="text" name="phaseName" id="phaseName" value=<?php echo $row['phaseName']?>></td>
        </tr>
        <tr>
          <td>Estimated Start Date: </td>
          <td><input type="date" name="estStartDate" value="<?php echo date('Y-m-d',strtotime($row['estimatedStartDate'])) ?>"></td>
        </tr>
        <tr>
          <td>Estimated End Date: </td>
          <td><input type="date" name="estEndDate" value="<?php echo date('Y-m-d',strtotime($row['estimatedEndDate'])) ?>"></td>
        </tr>
        <tr>
          <td>Actual Start Date: </td>
          <td><input type="date" name="actualStartDate" value="<?php echo date('Y-m-d',strtotime($row['actualStartDate'])) ?>"></td>
        </tr>
        <tr>
          <td>Actual End Date: </td>
          <td><input type="date" name="actualEndDate" value="<?php echo date('Y-m-d',strtotime($row['actualEndDate'])) ?>"/></td>
        </tr>
        <tr>
          <td>Current Status (Complete, In Progress, Not Started): </td>
          <td><input type="text" name="status" value="<?php echo $row['status']?>"/></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="Submit"></td>
        </tr>
      </table>
  </form>
</div>
</html>