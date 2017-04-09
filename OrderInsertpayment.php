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

       $query =  'INSERT INTO paymentsorders(orderID,supplierID,paid,totalAmount) VALUES 
      ("'.$orderID.'","'.$supplierID.'","'.$paid.'","'.$ttlAmnt.'")';
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
    }
mysqli_close($connection);
header('Location: /Damavand/taskPayment.php');
  ?>