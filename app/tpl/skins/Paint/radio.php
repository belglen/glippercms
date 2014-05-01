<?php
include 'system/header.php';
include 'inc/djnav.php'; 

$userid = $_SESSION['user']['id']; $checkdj = mysql_query("SELECT * FROM `dj` WHERE `user_id` = '$userid'"); if(mysql_num_rows($checkdj) < 0) { header("Location: index.php?url=me"); }
?>
</span>


</div>
<div id="marginy">
<div id="main_left"> 
<div class="content-box">
	<div class="content-box-deep-blue">
		<h2 class="title">Overzicht DJ's</h2>
	</div>

	<div class="content-box-content"><?php
$sql = mysql_query("SELECT u.*, dj.onair as onair, dj.*
FROM users u 
JOIN dj ON dj.user_id=u.id ORDER BY dj.rank;");
	while ($djs = mysql_fetch_assoc($sql)) {
	echo '
	<div id="StaffBox8" style="font-size: small;">
		
			<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$djs['look'].'&action=crr=33"style="float:left; margin-top: -50px;"/>
			
	<a href="index.php?url=profile&id='.$djs['username'].'">
		<p>	  	<b><div style="margin-top: 40px; margin-left: 100px;">'.$djs['username'].'</div></b></a><div style="margin-top: -15px; margin-left: 270px;">';
if ($djs['onair'] == '0') {
  echo 'Niet draaiende';
	if ($userid == $djs['user_id'])
		 {
	       	$aza = mysql_query("SELECT * FROM dj WHERE onair = '1'");
			
	       		if (mysql_num_rows($aza) == '0') {
 echo '<font style="margin-left: 80px;"><a href="index.php?url=startdraaien"><b>Draai!</b></a></font>';
					    }
		}	
}
else
{
  echo '<font style="color: blue;"><b>Draaiend</b></font>';
  $checkHDJ = mysql_query("SELECT * FROM dj WHERE user_id = '$userid' AND rank = 'hdj'");
	if ($userid == $djs['user_id'] || mysql_num_rows($checkHDJ) == '1') {
 			echo '<font style="margin-left: 80px;">';
			if ($userid == $djs['user_id']) 
			{
				echo '<a href="index.php?url=stopdraaien"><b>Stop draaien!';
			}
			else
			{
				echo '<a href="index.php?url=plaatjedj&userid='.$djs['user_id'].'"><b>Forceer stoppen!';
			}
			echo'</b></a></font>';
		}
}
 echo '</div>
			</div>
	';
	}
?>
	</div>
</div></div> 
<div id="main_right"> 



<div class="content-box" style="width:300px; background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Uitleg DJ</h2> 
	  </div> 
	  <div class="content-box-content"> 
Wanneer het jouw beurt is om te gaan draaien klik je op "Draai!". Wanneer je moet stoppen met draaien, dus als je tijd voorbij is, dan klik je op "Stop draaien". Dit is verplicht en moet altijd gedaan worden, anders kan jij, of de DJ na jou, niet de requests en/of shoutouts zien.
</div>

</div>