<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title"></h2> 
</div> 
<div class="glipperflexcont">
<form method="post" action="index.php?url=adminrooms" id="feedbackform">
<fieldset class="sectionwrap">
<legend>Prijzen uitreiken</legend>
<?php
echo"<select name='room' id='tweet_box'>";
$var = array();
$welkom = mysql_query("SELECT id,longstory FROM cms_news WHERE longstory LIKE '%[WELKOM%' OR longstory LIKE '%[KVDW%' ORDER BY id DESC");
$i = 0;
while($kamer = mysql_fetch_object($welkom))
{
	$expl = explode("[", $kamer->longstory);
	$expl2 = explode("]", $expl[1]);
	if (!in_array("$expl2[0]", $var)) 
	{
		array_push($var, "$expl2[0]");
		echo'<option id="tweet_box" value="'.$var[$i].'">'.$var[$i].'</option>';
		$i++;
	}
}
echo"</select>";
?>
<br><br><br>

<hr />
<?php
echo"<select name='room'>";
$var = array();
$welkom = mysql_query("SELECT id,longstory FROM cms_news WHERE longstory LIKE '%[WELKOM%' OR longstory LIKE '%[KVDW%' ORDER BY id DESC");
$i = 0;
while($kamer = mysql_fetch_object($welkom))
{
	$expl = explode("[", $kamer->longstory);
	$expl2 = explode("]", $expl[1]);
	if (!in_array("$expl2[0]", $var)) 
	{
		array_push($var, "$expl2[0]");
		//cho'<option value="'.$var[$i].'">'.$var[$i].'</option>';
		echo'<option id="tweet_box" value="'.$var[$i].'">HIER DE KAMERS VAN HIERBOVEN</option>';
		$i++;
	}
}
echo"</select>";
?>
<br><br><br>
<input type="submit" value="Ga verder" name="go1" class="glipperflexbtn">
</fieldset>
</form>
</div> 
</div>
<p></p>
<script type="text/javascript">
$("#tweet_box").change(function () {
var str = "";
$("#tweet_box option:selected").each(function () {
str += $(this).text() + " ";
});
$("p").text(str);
})
.change();
</script>