<?php
error_reporting(0);
$connectie = mysqli_connect('db.glipper.be','root','FCDKfun1','newbut');

if ($connectie == false)
{
	printf("Er kan geen verbinding worden gemaakt met de database. Foutmelding: %s\n", mysqli_connect_error());
}
?>