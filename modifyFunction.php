<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO MODIFY PROJECTS, ORDERS AND TASKS
    =================================================================*/
    require 'connection.php';
    session_start();
    $id = $_POST['id'];
    $type = $_POST['type'];
    
    if($type=='Project'){
        $sql="SELECT * FROM Project WHERE projectID = '".$id."'";
    }else if($type=='Order'){
        $sql="SELECT * FROM Orders WHERE orderID = '".$id."'";
    }else if($type=='Task'){
        //primary key =  concatination of projectID,phaseID & taskID
        $sql ="SELECT * FROM `task` where CONCAT(projectID,phaseID,taskID) = '".$id."'";
    }
    
    $result = mysqli_query($connection,$sql);
    $resultArray = mysqli_fetch_array($result);
    //$fieldCount = mysqli_num_fields($result);
    $fields = mysqli_fetch_fields($result);
    //print_r($fieldCount);
    //print_r($result); 
    echo '<h1>Damavand Construction INC.</h1>';
    echo '<h3>Modify '.$type.'</h3>';  
    echo 
    "<table id='modifyTable'>
        <tr>
            <th>Attribute Names</th>
            <th>Values</th>
        </tr>";
    $count = 0;
    $supplierName = "";
    echo "<tr>";
    foreach($resultArray as $column => $value) {
          echo "<td>" .$column . " " . $value. "</td>";
        
        /*echo "<td>" . $row['projectID'] . "</td>";
        echo "<td>" . $row['phaseID'] . "</td>";
        echo "<td>" . $row['orderID'] . "</td>";
        echo "<td>" . $row['supplierName'] . "</td>";
        echo "<td>" . $row['itemName'] . "</td>";
        echo "<td>$" . $row['unitCost'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
       $count += 1;*/
    }
    echo "</tr>";
    echo "</table>";
    mysqli_close($connection);
    ?>
</div>
