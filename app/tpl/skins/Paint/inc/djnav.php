<?php include 'headnav.php'; ?>
<?php
$data = mysql_query("SELECT * FROM dj WHERE user_id = '$userid'");
if (mysql_num_rows($data) == '0') {
	header("Location: index.php?url=me");
}
?>
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=radio">Overzicht</a></div>
<?php
$data = mysql_fetch_object(mysql_query("SELECT * FROM dj WHERE user_id = '$userid'"));
if ($data->rank == 'hdj') {
?>
<div class="menuitems2"><a href="index.php?url=dj">DJ Aanpassen</a></div>

<?php } ?>
<div class="menuitems2"><a href="index.php?url=djlive">Shouts en requests</a></div>
<div class="menuitems2"><a href="index.php?url=djrooster">Rooster</a></div>