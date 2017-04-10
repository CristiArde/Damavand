<head>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="js/jquery-validation-1.16.0/lib/jquery-3.1.1.js"></script>
<script>
$(document).ready(function(){
    $(document.getElementById("itemButton")).click(function(){
        $(document.getElementById("form2")).clone().appendTo("body");
    });
});
</script>
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
    $_SESSION['type'] = $type;
    $projectID = ['projectID'];
    //$phaseID = $_POST['phaseID'];

    if($type=='Project'){
        $sql="SELECT projectName as 'Project Name', projectManagerID as 'Project Manager ID', customerID as 'Customer ID', startDate as 'Start Date', endDate as 'End Date', siteAddress as 'Address', status as 'Status', estimatedCost as 'Estimated Cost', actualCost as 'Actual Cost' FROM Project ORDER BY projectID ASC LIMIT 1";
    }else if($type=='Order'){
        $sql="SELECT projectID as 'Project ID', phaseID as 'Phase ID', taskID as 'Task ID', supplierID as 'Supplier ID', totalCost as 'Total Cost', orderDate as 'Order Date', estimatedDeliveryDate as 'Estimated Delivery Date' FROM Orders ORDER BY orderID ASC LIMIT 1";
       // $sql2="SELECT itemID as 'Item ID',  itemName as 'Item Name', unitCost as 'Unit Cost', quantity as 'Quantity', orderID as 'Order Number', supplierID as 'Supplier ID' FROM Items ORDER BY itemID ASC LIMIT 1";


    /*$result2 = mysqli_query($connection,$sql);
    $fieldCount2 = mysqli_num_fields($result2);
    $fields2 = mysqli_fetch_fields($result2);
    $fieldArray2 = array();
    $fieldOrig2 = array();   //original table name
    $fieldType2 = array();

    while($fields=mysqli_fetch_field($result2)) {
        $fieldArray2[$count] = $fields->name;
        $fieldOrig2[$count] = $fields->orgname;      //name within tables
        $fieldType2[$count] = $fields->type;
        $count ++;
    }
*/
    }else if($type=='Item'){
    	$sql2="SELECT  orderID as 'Order ID' FROM Orders ORDER BY orderID ASC";
    	$sql="SELECT itemName as 'Item Name', unitCost as 'Unit Cost', quantity as 'Quantity', supplierID as 'Supplier ID' FROM Items ORDER BY itemID ASC LIMIT 1";
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
            <button onclick=\"location.href ='projectDetails.php';\" class=\"button button2\">Create Project  </button> 
        </li>
    </ul>";
    }else if($type=='Order'){
       echo "<ul>
        <li>
            <button onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
            >>
           <button onclick='window.location.reload(true);' class=\"button button2\">Create New Order</button>
        </li>
    </ul>";
    }
    else if ($type == 'Item')
    {
         echo "<ul>
                <li>
                    <button  onclick=\"location.href ='Welcome.php';\" class=\"button button2\">Home</button>
                    >>
                     <button onclick='window.location.reload(true);' class=\"button button2\">Create New Item</button>    
                </li>
            </ul>";
    }


    echo '<form id="form1" name="form1" action="createFunction.php" method="POST" onsubmit="return validateForm()">';
    echo 
    "<table id='modifyTable'>
        <tr>
            <th>Attribute Names</th>
            <th>Values</th>
            <th></th>
        </tr>";
    for($x = 0; $x < $fieldCount; $x++){
        echo "<tr>";
        $displayName = $fieldArray[$x];
        $colName = $fieldOrig[$x];

        //Decide Input type
        $inputType ="";
        if (strpos($colName, 'ID') !== false) {
            $optionID = "";
            $inputType = "<tr><td>$displayName</td> <td><select name='$colName' id='$colName'>";
            switch($colName) {
                case "projectManagerID":
                    $allOptions = "select staffid as 'Project Manager ID' from companystaff";
                    $optionID = 'pmid';                  
                    break;
                case "customerID":
                    $allOptions = "select customerid as 'Customer ID' from customer";
                    $optionID = 'cid';                  
                    break;
                case "projectID":
                    $allOptions = "select projectid as 'Project ID' from project";
                    $optionID = 'prid';                  
                    break;
                case "phaseID":
                    $allOptions = "select distinct phaseid as 'Phase ID' from phase";
                    $optionID = 'phid';                  
                    break;
                case "taskID":
                    $allOptions = "select distinct taskid as 'Task ID' from task";
                    $optionID = 'tid';                  
                    break;
                case "supplierID":
                    $allOptions = "select supplierid as 'Supplier ID' from supplier";
                    $optionID = 'sid';                  
                    break;
            }
            /*
            $result = mysqli_query($connection,$sql2);
            while($row = mysqli_fetch_array($result)) {
                $addOn .= "<option id=oid name=oid value=".$row['Order ID'].">Order ID ".$row['Order ID']."</option>";
            }
            $addOn .= "</select></td></tr>";
            echo $addOn;
            */
            $result = mysqli_query($connection, $allOptions);
            while ($row = mysqli_fetch_array($result)) {
                // var_dump($displayName);
                // var_dump($row["$displayName"]);
                $inputType .= "<option id=$optionID name=$optionID value=".$row["$displayName"].">".$row["$displayName"]."</option>";
            }
            $inputType .= "</select></td></tr>";
            echo $inputType;
            continue;
        }       

        switch ($fieldType[$x]) {
            case "3":                                       //Integer
            case "253":                                     //VarChar
            case "246":                                     //Decimal
                $inputType = '<input type="text"';
                break;
            case "10":                                      //Date
                $inputType = '<input type="Date"';      
                break;
        }
        echo "<td>".$fieldArray[$x]."</td>";
        echo "<td>".$inputType." id=".$fieldOrig[$x]." name=".$fieldOrig[$x].">"."</td>";
        echo "</tr>";
    }
    $addOn = "";
    if($type=='Item'){
        $addOn ="<tr><td>Add to Order:</td> <td><select name='OrderID' id='OrderID'>";
        $result = mysqli_query($connection,$sql2);
        while($row = mysqli_fetch_array($result)) {
            $addOn .= "<option id=oid name=oid value=".$row['Order ID'].">Order ID ".$row['Order ID']."</option>";
        }
        $addOn .= "</select></td></tr>";
        echo $addOn;
    }
    echo '<tr> <td colspan="2"><input id="submit" type="submit" value="Submit"><input id="submit" type="submit" value="Cancel"></td></tr>';
    echo "</table>";
    echo '</form>';
    mysqli_close($connection);
    ?>
</div>
<script>
function validateInt(i) {
    return Number.isInteger(parseInt(i)) && i >= 0;
}
function validateForm()
  {
          var type = "<?=$_POST['type'] ?>";
          
          if(type == 'Project')
          {
              var projectName = document.forms["form1"]["projectName"].value;
              var projectManagerID = document.forms["form1"]["projectManagerID"].value;
              var customerID = document.forms["form1"]["customerID"].value;
              var startDate = document.forms["form1"]["startDate"].value;
              var endDate = document.forms["form1"]["endDate"].value;
              var siteAddress = document.forms["form1"]["siteAddress"].value;
              var actCost = document.forms["form1"]["actualCost"].value;
              var estCost = document.forms["form1"]["estimatedCost"].value;
              var status = document.forms["form1"]["status"].value;

             if (!projectName) {
                alert("Project name cannot be null");
                return false;
             }
             if (!validateInt(projectManagerID) || !validateInt(customerID)) {
                alert ("ID must be a positive integer");
                return false;
             }            
             else if((Date.parse(endDate)-Date.parse(startDate))<0 || endDate == "")
             {
              alert("Invalid End Date");
              return false;
             }
             else if (!siteAddress) {
                alert("Site address cannot be null");
                return false;
             }
             else if (!status || !(status == "Complete" || status == "In Progress" || status == "Not Started"))
             {
               alert("Status must be Complete, In Progress, or Not Started");
              return false;
             }
             else if (!validateInt(actCost) || !validateInt(estCost))
             {
                alert("Cost must be positive integer");
                return false;
             }                       
          } 
          
          else if(type=='Order')
          {
            var projectID = document.forms["form1"]["projectID"].value;
            var phaseID = document.forms["form1"]["phaseID"].value;
            var taskID = document.forms["form1"]["taskID"].value;
             var supplierID = document.forms["form1"]["supplierID"].value;
             var totalCost = document.forms["form1"]["totalCost"].value;
             var orderDate = document.forms["form1"]["orderDate"].value;
             var estimatedDeliveryDate = document.forms["form1"]["estimatedDeliveryDate"].value;

            if (!validateInt(projectID)) {
                alert("Project ID must be a positive integer");
                return false;
            }
            else if (!validateInt(phaseID)) {
                alert("Phase ID must be a positive integer");
                return false;
            }
            else if (!validateInt(taskID)) {
                alert("Task ID must be a positive integer");
                return false;
            }
            else if (!validateInt(supplierID)) {
                alert("Supplier ID must be a positive integer");
                return false;
            }
            else if (!validateInt(totalCost)) {
                alert("Total cost must be a positive integer");
                return false;
            }
            else if ((Date.parse(estimatedDeliveryDate)-Date.parse(orderDate))<0 || !orderDate || !estimatedDeliveryDate) {
                alert("Invalid order or estimated delivery dates");
                return false;
            }
          }
          else if (type == 'Item')
          {
            var  itemName = document.forms["form1"]["itemName"].value;
            var  unitCost = document.forms["form1"]["unitCost"].value;
            var  quantity = document.forms["form1"]["quantity"].value;
            var  supplierID = document.forms["form1"]["supplierID"].value;


            if (!itemName) {
                alert("Item name cannot be null");
                return false;
            }
            else if (!validateInt(unitCost)) {
                alert("Unit cost must be a positive integer");
                return false;
            }
            else if (!validateInt(quantity)) {
                alert("Quantity must be a positive integer");
                return false;
            }
            else if (!validateInt(supplierID)) {
                alert("Supplier ID must be a positive integer");
                return false;
            }
          }
          
         
      }
</script>