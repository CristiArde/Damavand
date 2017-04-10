<?php
session_start();
require'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$type = $_POST['type'];

if($type == 1) #employee
{
	$staffPosition = $_POST['staffPosition'];
	if (strpos($email, 'damavand') !== false) #make sure the user is trying to register as emplyee 
	{	#employee  
	    $query = 'INSERT INTO companystaff(firstName, lastName, staffPosition, email) VALUES 
	    ("'.$firstName.'", "'.$lastName.'", "'.$staffPosition.'", "'.$email.'")';
	    $connection->query($query);

	    $query = 'INSERT INTO login(userName, password) VALUES 
	    ("'.$email.'", "'.$password.'")';
	    $connection->query($query);	
	}
}
else #customer
{
	$telephone = $_POST['telephone'];
	$address = $_POST['address'];

	if (strpos($email, 'damavand') === false) #make sure the user is trying to register as customer
    {
    	$query = 'INSERT INTO customer(firstName, lastName, address, telephone, email) VALUES 
    	("'.$firstName.'", "'.$lastName.'", "'.$address.'", "'.$telephone.'", "'.$email.'")';
    	$connection->query($query);

   		$query = 'INSERT INTO login(userName, password) VALUES 
    	("'.$email.'", "'.$password.'")';
    	$connection->query($query);	
	}
}
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.php';
		header("Location: http://$host$uri/$extra");
		exit;
?>