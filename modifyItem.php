<?php 
 session_start();
 require 'connection.php';
$projectID = $_SESSION['projectID'];
$itemID = $_POST['id'];
$alter = $_POST['alter'];

if($alter == 1)
{
	$query =  'select itemName, unitCost, quantity from items where itemID ="'.$itemID.'"';
	$results = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($results)
	?>
	<form action="/Damavand/modifiedItem.php" method="POST">
	Item Name: <input type="text" name="itemName" value=<?php echo $row['itemName']; ?>><br><br>
	Unit Cost: <input type="text" name="unitCost" value=<?php echo $row['unitCost']; ?>><br><br>
	Quantity: <input type="text" name="quantity" value=<?php echo $row['quantity']; ?>><br><br>
	Supplier ID: <select name="supID" id="supID">
	<?php
	$query =  'select supplierID from supplier';   
	$results = mysqli_query($connection, $query);
	while($supplier = mysqli_fetch_assoc($results))
	{
	?>
	<option value=<?php echo $supplier['supplierID']; ?>> <?php echo $supplier['supplierID']; ?> </option>
	<?php
	}
	?>
	</select><br><br>
	<button type="submit" name="id" value=<?php echo $itemID; ?>>Modify</button>
	</form>
	<?php
}
else
{
	$query =  'DELETE FROM items where itemID ="'.$itemID.'"';
	$connection->query($query);
    header('Location: /Damavand/getItems.php?id='.$projectID.'&type=Project');
}
mysqli_close($connection);
?>