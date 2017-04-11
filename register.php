<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
For Customers:
<form action="/Damavand/registeration.php" method="POST">
Email : <input type="text" id="email" name="email"><br><br>
Password: <input type="password" id="password" name="password"><br><br>
First Name : <input type="text" id="firstName" name="firstName"><br><br>
Last Name: <input type="text" id="lastName" name="lastName"><br><br>
Address: <input type="text" id="address" name="address"><br><br>
telephone : <input type="text" id="telephone" name="telephone"><br><br>
<button type="submit" name="type" value="2">Register</button>
</form>
</body>
</html>