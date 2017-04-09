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
    $projectID = $_POST['projectID'];
    $phaseID = $_POST['phaseID'];
    $taskID = $_POST['taskID'];
  ?>

  <form action="/Damavand/OrderInsertpayment.php" method="POST">
  Paid: <input type="text" id="paid" name="paid"><br><br>
  Total Amount: <input type="text" id="ttlAmnt" name="ttlAmnt"><br><br>
  Supplier ID: <select name="supID" id="supID">
  <?php
  $query =  'select supplierID from paymentstask WHERE projectID = "'.$projectID.'"AND phaseID = "'.$phaseID.'" AND 
  taskID = "'.$taskID.'"';  
  $results = mysqli_query($connection, $query);
  while($supplier = mysqli_fetch_assoc($results))
  {
    ?>
    <option value=<?php echo $supplier['supplierID']; ?>> <?php echo $supplier['supplierID']; ?> </option>
    <?php
  }
  ?>
  </select>
  Order ID: <select name="orderID" id="orderID">
  <?php
  $query =  'select orderID from orders WHERE projectID = "'.$projectID.'"AND phaseID = "'.$phaseID.'" AND 
  taskID = "'.$taskID.'"';  
  $results = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($results))
  {
    ?>
    <option value=<?php echo $row['orderID']; ?>> <?php echo $row['orderID']; ?> </option>
    <?php
  }
  ?>
  </select>
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
  else if ($alterType == 3)
  {
    echo "we in alter 3";
    echo $paymentOrderID;
    $query =  'DELETE FROM paymentsorders where paymentOrderID ="'.$paymentOrderID.'"';
    $connection->query($query);
    header('Location: /Damavand/taskPayment.php');
  }
  ?>

</form>
</body>
</html>