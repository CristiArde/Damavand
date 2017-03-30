<?php
require'connection.php';
session_start();

//TODO:   DO REDIRECT IF NOT LOGGED IN
?>
<!DOCTYPE html>
<html>
	<head>
		<script>
			function showProject(projID) {
			  if (projID=="") {
			    document.getElementById("txtHint").innerHTML="";
			    return;
			  } 
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			      document.getElementById("txtHint").innerHTML=this.responseText;
			      document.getElementById("txtHint2").innerHTML="";
			    }
			  }
			  xmlhttp.open("GET","getProject.php?id="+projID,true);
			  xmlhttp.send();
			}
			function showOrders(projID){ 
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			      document.getElementById("txtHint2").innerHTML=this.responseText;
			    }
			  }
			  
			  xmlhttp.open("GET","getOrders.php?type=" + "Project" + "&id="+projID,true);
			  xmlhttp.send();
			}
		</script>
		<title>The Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body onload="ddlFunction()">
		<div id="profile">
		<b id="welcome">Welcome : <i><?php echo $_SESSION['username']; ?></i></b>
		</div>
		<div id="logout">
		<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
		<select id='dropdown' onchange="showProject(this.value)">
		<option value="">Select a Project </option>
		<?php

		foreach ($_SESSION['ProjectID'] as $value) {
		 echo '<option value="'.$value['projectID'].'">Project '.$value['projectID'].'</option>';
		}?>
		</select>
		<div id="txtHint"><b>Project Informaiton Will be Displayed Here</b></div>
		<div id="txtHint2"></div>
	</body>

	
</html>