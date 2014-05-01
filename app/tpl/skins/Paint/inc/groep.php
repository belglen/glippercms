<?php include 'app/tpl/skins/Paint/inc/headnav.php'; ?>
<?php
include 'scripts.php';
?>


</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=groepen">Groepen</a></div> 
<div class="menuitems2"><a href="index.php?url=groep&id=<?php 

$sql = mysql_query("SELECT * FROM groups WHERE ownerid = '" . $userid . "' ORDER BY RAND() LIMIT 1");
$assocd = mysql_fetch_assoc($sql);

echo $assocd['id'];
?>">Mijn groep</a></div>
<div class="menuitems2"><a href="index.php?url=groepmaak">Maak een groep</a></div> 