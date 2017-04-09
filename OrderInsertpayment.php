 <?php
 session_start(); 
  require'connection.php';
$paid = $_POST['paid'];
$ttlAmnt = $_POST['ttlAmnt'];
$alterType = $_POST['altertype'];

    if($alterType == 1)
    { 
      $supplierID = $_POST['supID']; #THE SUPPLIER ID THAT WILL BE REPLACED
      $orderID = $_POST['orderID'];

      $newID =  'SELECT MAX(paymentOrderID) as newID from paymentsorders';
        $result = mysqli_query($connection, $newID);
        $NewPayId = mysqli_fetch_assoc($result);
      
       $newAssignedID = $NewPayId['newID'] + 1;

      $query =  'INSERT INTO paymentsorders(paymentOrderID, orderID,supplierID,paid,totalAmount) VALUES 
      ("'.$newAssignedID.'","'.$orderID.'","'.$supplierID.'","'.$paid.'","'.$ttlAmnt.'"';
      $connection->query($query);
    }
    else if($alterType == 2)
    {
       $paymentOrderID = $_SESSION['paymentOrderID'];
       $query = 'UPDATE paymentsorders SET paid ="'.$paid.'",totalAmount = "'.$ttlAmnt.'" WHERE paymentOrderID = "'.$paymentOrderID.'"';
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