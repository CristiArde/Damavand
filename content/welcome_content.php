<div id="auth-main" class="center">
	<h1>Damavand Construction INC.</h1>
	<h3>Project Management</h3>
	<p><b id="welcome">Welcome, <i><?php echo $_SESSION['username']; ?></i> (<a id="logout" href="logout.php">Log Out</a>)</b></p>
	<select id='dropdown' onchange="showProject(this.value)">
	<option value="">Select a Project </option>


	<?php

	foreach ($_SESSION['ProjectID'] as $value) {
	 echo '<option value="'.$value['projectID'].'">Project '.$value['projectID'].'</option>';
	}?>
	</select>

	<div id="project-info">
		<div id="txtHint"><b>Project Information Will be Displayed Here</b></div>
		<div id="txtHint2"></div>
	</div>
</div>