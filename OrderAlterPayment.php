<!DOCTYPE html>
<html>
<head>
<title>Add Order Payment</title>
</head>
<body>
  <?php session_start(); 
  require'connection.php';

  $alterType = $_POST['alter'];
  $paymentOrderID = $_POST['id'];
  $SupplierID = $_POST['superid'];

  $_SESSION['paymentOrderID'] = $paymentOrderID;

  if($alterType == 1) #Add
  {

  ?>

  <form action="/Damavand/OrderInsertpayment.php" method="POST">
  Paid: <input type="text" id="paid" name="paid"><br><br>
  Total Amount: <input type="text" id="ttlAmnt" name="ttlAmnt"><br><br>
  Supplier ID: <input type="text" id="supID" name="supID"><br><br>
  Order ID: <input type="text" id="orderID" name="orderID"><br><br>
  <button type="submit" name="altertype" value="1">Add</button>
</form>
  <?php
  }
  else if( $alterType == 2){
      
 $query =  'select paid, totalAmount from paymentsorders where paymentOrderID = "'.$paymentOrderID.'"';
  $results = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($results);

  ?>
  <form action="/Damavand/OrderInsertpayment.php" method="POST">
  Paid: <input type="text" name="paid" value=<?php echo $row['paid']; ?>><br><br>
  Total Amount: <input type="text" name="ttlAmnt" value=<?php echo $row['totalAmount'];?>><br><br>
  <input type="hidden" id='superid' name="superid" value= <?php echo $SupplierID; ?>>
  <button type="submit" name="altertype" value="2">Modify</button>
  </form>
  <?php
  }
  else
  {
    $query =  'DELETE FROM paymentorders where paymentOrderID ="'.$paymentOrderID.'"';
    $connection->query($query);
  }
  ?>

</form>
</body>
</html>