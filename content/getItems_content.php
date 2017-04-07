
<div id='items-main' class='center'>
    <?php
    session_start();
    $id = $_GET['id'];
    //$type = $_GET['type'];
    require 'connection.php';
    $sql="SELECT supplierName, o.projectID, phaseID, i.orderID , itemName, unitCost, quantity FROM items i INNER JOIN orders o on i.orderID = o.orderID INNER JOIN supplier s ON i.supplierID = s.supplierID WHERE o.projectID = '".$id."' GROUP BY supplierName,o.projectID, i.orderID , itemName, unitCost, quantity HAVING o.projectID = '".$id."'";

    $result = mysqli_query($connection,$sql);
    $check = mysqli_num_rows($result);

    if($check != 0){   
        echo '<h1>Damavand Construction INC.</h1>';
        echo '<h3>Items Ordered for Project '.$id.'</h3>';  

        echo "<ul>
                <li>
                    <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
                    >>
                    <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Project " .$id. "  Details</button> 
                    >>
                    <button onclick=\"location.href ='getOrders.php?id=".$id."&type=Project';\" class=\"button button2\">Phase orders</button>
                    >>
                     <button onclick='window.location.reload(true);' class=\"button button2\">Ordered Items</button>  
                </li>
            </ul>";


        echo 
        "<table id='items-table'>
            <tr>
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
            echo "<td>" . $row['phaseID'] . "</td>";
            echo "<td>" . $row['orderID'] . "</td>";
            echo "<td>" . $row['supplierName'] . "</td>";
            echo "<td>" . $row['itemName'] . "</td>";
            echo "<td>$" . $row['unitCost'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
           $count += 1;
        }
        echo "</table>";
    }
    else
    {
        //TODO
        /*SHOW NAVIGATION BAR
        SHOW BACK BUTTON
        SHOW ADD ORDERS BUTTON IF PROJECT/PHASE/TASK NOT COMPLETED*/
        echo " No Items ";
    }
    ?>


    <form action="createFunctionPage.php" method="POST">
        <input type="hidden" id="type" name="type" value="Item">
        <input type="Submit" value="Create New Item">
    </form>

    <?php
    mysqli_close($connection);
    ?>
</div>
