<?php
	$connection = mysqli_connect('ctc353_4.encs.concordia.ca', 'ctc353_4', 'dbpass20', 'ctc353_4');
	
	// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>