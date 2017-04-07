<head>
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO INSERT PROJECTS, Orders AND ITEMS
    =================================================================*/
    require 'connection.php';
    session_start();
    $count = 0;
    $type = $_POST['type'];
    //$phaseID = $_POST['phaseID'];

    if($type=='Project'){
        $sql="SELECT projectID as 'Project Number', projectName as 'Project Name', projectManagerID as 'Project Manager ID', customerID as 'Customer ID', startDate as 'Start Date', endDate as 'End Date', siteAddress as 'Address', status as 'Status', estimatedCost as 'Estimated Cost', actualCost as 'Actual Cost' FROM Project ORDER BY projectID ASC LIMIT 1";
    }else if($type=='Order'){
        $sql="SELECT orderID as 'Order Number', projectID as 'Project Number', phaseID as 'Phase Number', taskID as 'Task Number', supplierID as 'Supplier ID', totalCost as 'Total Cost', orderDate as 'Order Date', estimatedDeliveryDate as 'Estimated Delivery Date' FROM Orders ORDER BY orderID ASC LIMIT 1";
        $sql2="SELECT itemID as 'Item ID',  itemName as 'Item Name', unitCost as 'Unit Cost', quantity as 'Quantity', orderID as 'Order Number', supplierID as 'Supplier ID' FROM Items ORDER BY itemID ASC LIMIT 1";


    $result2 = mysqli_query($connection,$sql);
    $fieldCount2 = mysqli_num_fields($result2);
    $fields2 = mysqli_fetch_fields($result2);
    $fieldArray2 = array();
    $fieldOrig2 = array();   //original table name
    $fieldType2 = array();

    while($fields=mysqli_fetch_field($result2)) {
        $fieldArray[$count] = $fields->name;
        $fieldOrig[$count] = $fields->orgname;      //name within tables
        $fieldType[$count] = $fields->type;
        $count ++;
    }

    }else if($type=='Item'){
    	$sql2="SELECT  orderID as 'Order Number' FROM Orders ORDER BY orderID ASC";
    	$sql="SELECT itemID as 'Item ID',  itemName as 'Item Name', unitCost as 'Unit Cost', quantity as 'Quantity', orderID as 'Order Number', supplierID as 'Supplier ID' FROM Items ORDER BY itemID ASC LIMIT 1";
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

    //print_r($fieldType);
    echo '<h1>Damavand Construction INC.</h1>';
    echo '<h3>Create '.$type.'</h3>';  
    
    if($type=='Project'){
       echo "<ul>
        <li>
            <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
            >>
            <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Modify Project  </button> 
        </li>
    </ul>";
    }else if($type=='Task'){
       echo "<ul>
        <li>
            <button onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
            >>
            <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Project " .$valueArray[2]. "  Details</button>
            >>
            <button onclick=\"location.href ='task.php';\" class=\"button button2\">Phase " .$valueArray[1]." Tasks</button>
            >>
            <button onclick='window.location.reload(true);' class=\"button button2\">Modify Task ".$valueArray[0]."</button>

        </li>
    </ul>";
    }


    echo '<form id="form1" name="form1" action="createFunction.php" method="POST">';
    echo 
    "<table id='modifyTable'>
        <tr>
            <th>Attribute Names</th>
            <th>Values</th>
            <th></th>
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
        echo "<td>".$inputType." id=".$fieldOrig[$x]." name=".$fieldOrig[$x].">"."</td>";
        echo "</tr>";
    }

    if($type=='Order'){
        echo '<h3>Create Item</h3>'; 
        echo '<form id="form2" name="form2" action="createFunction.php" method="POST">';
        echo 
        "<table id='modifyTable'>
            <tr>
                <th>Attribute Names</th>
                <th>Values</th>
                <th></th>
            </tr>";
        for($x = 0; $x < $fieldCount2; $x++){
            echo "<tr>";
            //Decide Input type
            $inputType ="";
            switch ($fieldType2[$x]) {
                case "3":                                       //Integer
                case "253":                                     //VarChar
                case "246":                                     //Decimal
                    $inputType = '<input type="text" ';
                    break;
                case "10":                                      //Date
                    $inputType = '<input type="Date" ';      
            }
            echo "<td>".$fieldArray2[$x]."</td>";
            echo "<td>".$inputType." id=".$fieldOrig2[$x]." name=".$fieldOrig2[$x].">"."</td>";
            echo "</tr>";
    }   
    }

    echo '<tr> <td><input id="submit" type="submit" value="Submit"><input id="submit" type="submit" value="Cancel"></td>';
    echo "</table>";
    echo '</form>';
    mysqli_close($connection);
    ?>
</div>
