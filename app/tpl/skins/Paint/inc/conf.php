<?php
if (!isset($_SESSION['user']['id']))
{
	header("Location: index.php?url=index");
}
// CONFIGURATION
$startroom = "461280";
?>