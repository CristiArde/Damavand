
<div id='items-main' class='center'>
    <?php
    $id = $_GET['id'];
    //$type = $_GET['type'];
    require 'connection.php';
    $sql="SELECT supplierName, o.projectID, phaseID, i.orderID , itemName, unitCost, quantity FROM items i INNER JOIN orders o on i.orderID = o.orderID INNER JOIN supplier s ON i.supplierID = s.supplierID WHERE o.projectID = '".$id."' GROUP BY supplierName,o.projectID, i.orderID , itemName, unitCost, quantity HAVING o.projectID = '".$id."'";

    $result = mysqli_query($connection,$sql);   
    echo '<h1>Damavand Construction INC.</h1>';
    echo '<h3>Items Ordered for Project '.$id.'</h3>';  
    echo 
    "<table id='items-table'>
        <tr>
            <th>Project Number</th>
            <th>Phase Number</th>
            <th>Order Number</th>
            <th>Supplier</th>
            <th>Item Name</th>
            <th>Cost Per Unit</th>
            <th>Quantity</th>
        </tr>";
    $count = 0;
    $supplierName = "";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['projectID'] . "</td>";
        echo "<td>" . $row['phaseID'] . "</td>";
        echo "<td>" . $row['orderID'] . "</td>";
        echo "<td>" . $row['supplierName'] . "</td>";
        echo "<td>" . $row['itemName'] . "</td>";
        echo "<td>$" . $row['unitCost'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
       $count += 1;
    }
    echo "</table>";
    mysqli_close($connection);
    ?>
</div>
