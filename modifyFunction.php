<head>
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<div id='items-main' class='center'>
    <?php

    /*=================================================================
            FILE TO MODIFY PROJECTS, ORDERS AND TASKS
    =================================================================*/
    require 'connection.php';
    session_start();
    $id = $_POST['id'];
    $type = $_POST['type'];
    //$phaseID = $_POST['phaseID'];

    if($type=='Project'){
        $sql="SELECT projectID as 'Project Number', projectName as 'Project Name', projectManagerID as 'Project Manager ID', customerID as 'Customer ID', startDate as 'Start Date', endDate as 'End Date', siteAddress as 'Address', status as 'Status', estimatedCost as 'Estimated Cost', actualCost as 'Actual Cost' FROM Project WHERE projectID = '".$id."'";
        $_POST['oid'] = null;
    }else if($type=='Order'){
        $oid = $_POST['oid'];
        $sql="SELECT orderID as 'Order Number', projectID as 'Project Number', phaseID as 'Phase Number', taskID as 'Task Number', supplierID as 'Supplier ID', totalCost as 'Total Cost', orderDate as 'Order Date', estimatedDeliveryDate as 'Estimated Delivery Date' FROM Orders WHERE projectID = '".$id."' AND orderID = '".$oid."'";
    }else if($type=='Task'){
        //primary key =  concatination of projectID,phaseID & taskID
        $sql ="SELECT taskID as 'Task Number', phaseID as 'Phase Number', projectID as 'Project Number', taskName as 'Task Name', estimatedStartDate as 'Estimated Start Date', actualStartDate as 'Actual Start Date', estimatedCost as 'Estimated Cost', estimatedEndDate as 'Estimated End Date', actualEndDate as 'Actual End Date', actualCost as 'Actual Cost', status as 'Status' FROM `task` where CONCAT(taskID,phaseID,projectID) = '".$id."'";
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
    
    if($type=='Project'){
       echo "<ul>
        <li>
            <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
            >>
            <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Modify Project " .$id. " </button> 
        </li>
    </ul>";
    }else if($type=='Order'){
       echo "<ul>
            <li>
                <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
                >>
                <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Project " .$id. "  Details</button> 
                >>
                <button onclick=\"location.href ='getOrders.php?id=".$id."&type=Phase&phaseID=".$valueArray[2]."';\" class=\"button button2\">Phase ".$valueArray[2]." orders</button>
                >>
                <button onclick='window.location.reload(true);' class=\"button button2\">Modify Order ".$oid."</button>

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


    echo '<form name="myForm" action="updateFunction.php" onsubmit="return validateForm()" method="POST">';
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
        echo "<td>".$inputType."value=".$valueArray[$x]." id=".$fieldOrig[$x]." name=".$fieldOrig[$x].">"."</td>";
        echo "</tr>";
    }
    echo '<tr> <td><input id="submit" type="submit" value="Submit"><input id="submit" type="submit" value="Cancel"></td>';
    echo "</table>";
    echo '</form>';
    mysqli_close($connection);
    ?>
</div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
  <script type="text/javascript">

function validateForm()
  {
          var type = "<?=$_POST['type'] ?>";
          alert(type);
          
          if(type == 'Project')
          {
              var projectID = document.forms["myForm"]["projectID"].value;
              var id = "<?=$_POST['id'] ?>";
              var startDate = document.forms["myForm"]["startDate"].value;
              var endDate = document.forms["myForm"]["endDate"].value;
              var actCost = document.forms["myForm"]["actualCost"].value;
              var estCost = document.forms["myForm"]["estimatedCost"].value;
              var status = document.forms["myForm"]["status"].value;
        
             if (projectID != id)
             {
                alert("Project Id cannot be modified please set back to ID "+ id);
                return false;
             }
             else if((Date.parse(endDate)-Date.parse(startDate))<0 || endDate == "")
             {
              alert("Invalid End Date");
              return false;
             }
             else if (!(Number.isInteger(parseInt(actCost)) && Number.isInteger(parseInt(estCost))) || actCost < 0 || estCost < 0)
             {
                alert("Cost must be positive integer");
                return false;
             }
             else if ((status =="") || !(status == "Complete" || status == "In Progress" || status == "Not Started"))
             {
               alert("Current Status is not filled properly");
              return false;
             }
          } 
          
          else if(type=='Order')
          {
            var orderID = document.forms["myForm"]["orderID"].value;
            var id = "<?=$_POST['oid'] ?>";
            var projectID = document.forms["myForm"]["projectID"].value;
            var phaseID = document.forms["myForm"]["phaseID"].value;
             var cost = document.forms["myForm"]["totalCost"].value;
             var orderDate = document.forms["myForm"]["orderDate"].value;
             var deliveryDate = document.forms["myForm"]["estimatedDeliveryDate"].value;

             if (orderID != id)
             {
                alert("Order Id cannot be modified please set back to ID "+ id);
                return false;
            }
            else if (!(Number.isInteger(parseInt(cost))) || cost < 0)
            {
                alert("Cost must be positive integer");
                return false;
            }
            else if((Date.parse(orderDate)-Date.parse(new Date()))<0 || orderDate =="")
             {
                  alert("Invalid Order Date");
                  return false;
             }
             else if((Date.parse(deliveryDate)-Date.parse(orderDate))<0 || endDate == "")
             {
              alert("Invalid Delivery Date");
              return false;
             }
          }
          else if (type == 'Task')
          {
            alert("MODIFY TASK");
          }
          
         
      }
         
  </script>


