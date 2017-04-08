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
		<title>Project Management</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<?php
	$page_content = 'content/welcome_content.php';
	$page_name = 'welcome';
	include('master.php');	
	?>	
</html>