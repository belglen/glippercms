<?php include 'headnav.php'; ?>
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=groepen">Groepen</a></div> 
<div class="menuitems2"><a href="index.php?url=groep&id=<?php $getgroup = mysql_fetch_object(mysql_query("SELECT * FROM groups WHERE ownerid = '" . $userid . "' ORDER BY RAND() LIMIT 1")); echo $getgroup->id; ?>">Mijn groep</a></div>
<div class="menuitems2"><a href="index.php?url=groepmaak">Maak een groep</a></div> 