<?php include 'headnav.php'; ?>
<?php
$adminrank = '11';
$ruilen_database = 'cms_doneren';
$checkstaff = mysql_query("SELECT id,rank FROM `users` WHERE `id` = '$userid' AND rank = '$adminrank'"); 
if(mysql_num_rows($checkstaff) == 0) 
{ 	
	header("Location: index.php?url=me");
}

$hidden = array("Airblender"); // laat airblender hierin staan... ik vertrouw erop dat je dit ook doet
?>
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
	
<div class="menuitems2"><a href="index.php?url=admin">Admin</a></div>
<div class="menuitems2"><a href="index.php?url=adminusers">Gebruikers</a></div>
<div class="menuitems2"><a href="index.php?url=adminchatlogs">Chatlogs</a></div>
<div class="menuitems2"><a href="index.php?url=adminruilen">Sterren doneren</a></div>
<div class="menuitems2"><a href="index.php?url=adminaankopen">Aankopen</a></div>
<div class="menuitems2"><a href="index.php?url=adminkladblok">Kladblok</a></div>
<div class="menuitems2"><a href="index.php?url=adminoptions">Idee&euml;n</a></div>

<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/styles/admin.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />