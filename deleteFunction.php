<<<<<<< HEAD
<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO DELETE PROJECTS AND TASKS
    =================================================================*/
    require 'connection.php';
    session_start();
    $id = $_POST['id'];
    $oid = $_POST['oid'];
    $type = $_POST['type'];

    if($type=='Project'){
        $sql="SELECT projectID as 'Project Number', projectName as 'Project Name', projectManagerID as 'Project Manager ID', customerID as 'Customer ID', startDate as 'Start Date', endDate as 'End Date', siteAddress as 'Address', status as 'Status', estimatedCost as 'Estimated Cost', actualCost as 'Actual Cost' FROM Project WHERE projectID = '".$id."'";
    }else if($type=='Order'){
        $sql="SELECT orderID as 'Order Number', projectID as 'Project Number', phaseID as 'Phase Number', taskID as 'Task Number', supplierID as 'Supplier ID', totalCost as 'Total Cost', orderDate as 'Order Date', estimatedDeliveryDate as 'Estimated Delivery Date' FROM Orders WHERE projectID = '".$id."' AND orderID = '".$oid."'";
    }else if($type=='Task'){
        //primary key =  concatination of projectID,phaseID & taskID
        $sql ="SELECT taskID as 'Task Number', phaseID as 'Phase Number', projectID as 'Project Number', taskName as 'Task Name', estimatedStartDate as 'Estimated Start Date', actualStartDate as 'Actual Start Date', estimatedCost as 'Estimated Cost', estimatedEndDate as 'Estimated End Date', actualEndDate as 'Actual End Date', actualCost as 'Actual Cost', status as 'Status' FROM `task` where CONCAT(projectID,phaseID,taskID) = '".$id."'";
    }
    
    $result = mysqli_query($connection,$sql);
    $fieldCount = mysqli_num_fields($result);
    $fields = mysqli_fetch_fields($result);
    $numRows = mysqli_num_rows($result);
    $fieldArray = array();
    $fieldOrig = array();   //original table name
    $valueArray = array();
    $fieldType = array();
    $count = 0;

    //store attribute Name and type
    while($fields=mysqli_fetch_field($result)) {
        $fieldArray[$count] = $fields->name;
        $fieldOrig[$count] = $fields->orgname;      //name within tables
        $fieldType[$count] = $fields->type;
        $count ++;
    }
    echo "</tr>";
    echo "<tr>";
    
    //store attribute Value
    while($row=mysqli_fetch_array($result)){
        $count = 0;
        for($x = 0; $x < $fieldCount; $x++){
            $valueArray[$count] = $row[$x];
            $count ++;
        }
    }

    //print_r($fieldType);
    echo '<h1>Damavand Construction INC.</h1>';
    echo '<h3>Modify '.$type.'</h3>';  
    echo 
    "<table id='modifyTable'>
        <tr>
            <th>Attribute Names</th>
            <th>Values</th>
        </tr>";
    for($x = 0; $x < $fieldCount; $x++){
        echo "<tr>";
        //Decide Input type
        $inputType ="";
        switch ($fieldType[$x]) {
            case "3":                                       //Integer
            case "253":                                     //VarChar
            case "246":                                     //Decimal
                $inputType = '<input type="text" ';
                break;
            case "10":                                      //Date
                $inputType = '<input type="Date" ';      
        }
        echo "<td>".$fieldArray[$x]."</td>";
        echo "<td>".$inputType."value=".$valueArray[$x]." id=".$fieldOrig[$x]." name=".$fieldOrig[$x].">"."</td>";
        echo "</tr>";
=======

<div id='items-main' class='center'>
    <?php
    session_start();
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
>>>>>>> origin/master
    }
    echo "</table>";
    mysqli_close($connection);
    ?>
</div>