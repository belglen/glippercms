<?php
// Database config
$host = "localhost"; // Your database host, normaly localhost
$user = "root"; // Database username
$password = "tareq10"; // Your database password
$database = "rev_phoenix"; // The name of the database on your server




mysql_connect($host, $user, $password) or die(mysql_error()); 
mysql_select_db($database) or die(mysql_error()); 

?>