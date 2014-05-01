<?php 
include 'headnav.php'; 

$checkstaff = mysql_fetch_object(mysql_query("SELECT id,rank FROM users WHERE id = '$userid'"));
if ($checkstaff->rank < 5) 
{ 
	header("Location: me"); 
}
?>
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=tickets">Ticketsysteem</a></div>