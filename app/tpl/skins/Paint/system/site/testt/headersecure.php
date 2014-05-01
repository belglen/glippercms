<?php
include 'app/tpl/skins/Paint/system/scripts.php';
if (!isset($_SESSION['user']['id']))
{
	header("Location: index.php?url=index");
}
if ($_SESSION['user']['id'] != '232')
{
	header("Location: me");		
}
?>
<script> 
var cimagesLocation = '<?php echo $_CONFIG['hotel']['url']; ?>/';
var news = new Array();
news[1] = ["{newsID-1}","{newsIMG-1}","{newsCaption-1}","{newsTitle-1}"];
news[2] = ["{newsID-2}","{newsIMG-2}","{newsCaption-2}","{newsTitle-2}"];
news[3] = ["{newsID-3}","{newsIMG-3}","{newsCaption-3}","{newsTitle-3}"];
news[4] = ["{newsID-4}","{newsIMG-4}","{newsCaption-4}","{newsTitle-4}"];
news[5] = ["{newsID-5}","{newsIMG-5}","{newsCaption-5}","{newsTitle-5}"];
</script> 
<head><script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='../js/jquery.simplemodal.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type='text/javascript' src='../js/jquery.noty.js'></script>
<script type='text/javascript' src='../js/top.js'></script>
<script type='text/javascript' src='app/tpl/skins/Paint/hint.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
mango.news.init();
});
</script> 

</head>

<div id="header_bar"> 
<div id="container-me"> 
<div class="mid"> 
<div class="lefts"> 
Welkom, {username}! <?php $userid = $_SESSION['user']['id']; $gebruikerid = new newdata($userid); new newdata($adminrank); echo $gebruikerid->DJ(); echo $gebruikerid->Admin(); ?>
</div>
<div class="right">
<?php
		echo "<span style=\"\"><img src=\"app/tpl/skins/Paint/images/star.png\" style=\"vertical-align:middle;margin-right:5px;margin-top:-4px;\"/><span>".$userdata->vip_points."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
		echo "<span style=\"\"><img src=\"app/tpl/skins/Paint/images/gift.gif\" style=\"vertical-align:middle;margin-right:5px;margin-top:-4px;\"/><span>".$userdata->sorry_points."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
		echo "<span style=\"\"><img src=\"app/tpl/skins/Paint/images/creditIcon.png\" style=\"vertical-align:middle;margin-right:5px;\"/><span>".$userdata->credits."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<span style=\"\"><img src=\"app/tpl/skins/Paint/images/pixelIcon.png\" style=\"vertical-align:middle;margin-right:5px;\"/><span>".$userdata->activity_points."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=""> 
<span style=""><img src="app/tpl/skins/Paint/images/icon_users.png" style="vertical-align:middle;margin-right:5px; margin-left: -30px; margin-top: -2px;"/>
<script src="http://code.jquery.com/jquery-latest.js"></script>
{online} online!
</span>
</div>
</div>
</div>
</div>
<div id="content">
<div id="headertje">
<div id="frankie">
	<div><center>Op dit moment te beleven op Glipper</center></div>
	<div style="height: 6px;"></div>
	<div><marquee><a href="index.php?url=news&id={newsID-1}">{newsTitle-1}<a/> - <a href="index.php?url=news&id={newsID-2}">{newsTitle-2}</a> - <a href="index.php?url=news&id={newsID-3}">{newsTitle-3}<a/></marquee></div>
</div>
<div id="enter-hotel" style="margin-top:36px; margin-right: 5px;">
	<div class="open" style="margin-top: -45px;">

		<a href="index.php?url=client" target="ClientWndw" onclick="window.open('index.php?url=client','ClientWndw','width=980,height=597,resizable=1');return false;">Ga naar Glipper<i></i></a><b></b>

	</div>
</div>

</div>
<?php
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}
?>
<div id="menubalkie">
<span class="class1">