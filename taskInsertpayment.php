 <?php
 session_start(); 
  require'connection.php';
$taskID = $_SESSION['taskID'];
$phaseID =  $_SESSION['phaseID'];
$projectID = $_SESSION['projectID'];
$paymentTaskID = $_SESSION['paymentTaskID'];
$supplierID = $_POST['superID'];
$paid = $_POST['paid'];
$ttlAmnt = $_POST['ttlAmnt'];
//$supID = $_POST['supID']; # THE SUPPLIER ID THAT THE USER WANTS TO REPLACE BY 
$alterType = $_POST['altertype'];
$supplierID = $_POST['supID']; #THE SUPPLIER ID THAT WILL BE REPLACED
    if($alterType == 1)
    { 
      $newID =  'SELECT MAX(paymentTaskID) as newID from paymentstask where projectID ="'.$projectID.'"
      AND taskID ="'.$taskID.'" AND phaseID ="'.$phaseID.'"';
        $result = mysqli_query($connection, $newID);
        $NewPayId = mysqli_fetch_assoc($result);
      
       $newAssignedID = $NewPayId['newID'] + 1;

      $query =  'INSERT INTO paymentstask(paymentTASKID, projectID,phaseID,taskID,supplierID,paid,totalAmount) VALUES ("'.$newAssignedID.'","'.$projectID.'","'.$phaseID.'","'.$taskID.'","'.$supID.'","'.$paid.'","'.$ttlAmnt.'")';
      $connection->query($query);
    }
    else if($alterType == 2)
    {
       $query = 'UPDATE paymentstask SET paid ="'.$paid.'",totalAmount = "'.$ttlAmnt.'" WHERE paymentTaskID = "'.$paymentTaskID.'"';
        //print_r($query);
        if (mysqli_query($connection, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
      //$connection->query($query);
    }
mysqli_close($connection);
//header('Location: /Damavand/taskPayment.php');
  ?>