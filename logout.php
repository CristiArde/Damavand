<?php
session_start();
if(session_destroy())
{
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'loginPage.php';
		header("Location: http://$host$uri/$extra");
		exit;
}
?>