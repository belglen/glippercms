<?php
include 'system/header.php';
include 'inc/communitynav.php';
echo'</span>';
echo'</div>';
echo'<style>';
echo"@font-face{font-family: myFirstFont; src: url('app/tpl/skins/Paint/styles/Volte.ttf')} .glipperflexspotlight div {font-family:myFirstFont,Verdana,Arial;font-size: 9px; word-wrap:breakword;}";
echo'</style>';
echo'<div id="marginy">';
echo'<div id="main_left">';
echo'<div class="content-box">';
echo'<div class="content-box-black">';
echo'<h2 class="title">In de spotlights!</h2>';
echo'</div>';
echo'<div class="content-box-content">';
echo'<img src="app/tpl/skins/Paint/images/bluesweater.gif" align="right">';
echo "De spotlights! Eindelijk! Ben jij niet in de spotlights? Nee? Geen zorgen! Dit heeft niks persoonlijks te maken. Je moet niet teleurgesteld zijn als je hier niet in bent! Vind jij dat je in de spotlights moet staan? Stuur dan een mailtje naar admin@glipper.be met als onderwerp spotlights! En vertel ook waarom dat je in de spotlights zou willen staan. Heb jij nog een ideetje of iets degelijks voor deze pagina? Je weet mijn emailadres! ;-) Rechts van je zie je van die leuke tekstballonnetjes, die zeggen wie het is, welke rank het is, hoeveel koekjes diegene heeft en hoeveel kamerberzoeken diegene heeft gedaan. Normaal is alles goed gefuncioneerd, gelieve bij een foutje mij te contacteren :-). Hopelijk vinden jullie deze pagina mooi, want het was een snellertje dat ik moest maken!";
echo'</div>';
echo'</div>';
echo'</div>';
echo'</div>';
echo'<div id="main_right">';
$getspot = mysql_query("SELECT cs.userid,u.id,u.username,u.look,u.rank,u.rankname,u.description,u.account_created,u.vip,u.last_online,us.id,us.Respect FROM cms_spotlight cs JOIN users u ON (cs.userid = u.id) JOIN user_stats us ON (us.id = u.id)");

while ($user = mysql_fetch_object($getspot))
{
	echo"<div class=\"glipperflexbox-normaal\" style=\"width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff; height:181px;\">";
	echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
	echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">$user->username in de spotlights!</h2>";
	echo"</div>";
	echo"<div class=\"content-box-content\">";
	echo"<div class=\"glipperflexspotlight\" style=\"background-image:url('cache/avatarhead/index.php?figure=$user->look'); background-repeat: no-repeat; word-wrap:break-word;\">";
	echo"<hr><div class=\"glipperflexspotlight-vertical-bar\"</div>";
	echo"<div style=\"margin-left: 10px; margin-top: -60px;\">$user->username<br><br>Geboren op: ".strftime('%#d/%m/%Y', $user->account_created)."<br>Laatst ingelogd: ".strftime('%#d/%m/%Y', $user->last_online)."</div><br>";
	echo"<div style=\"margin-left: -50px; margin-top: 8px;\">$user->description</div>";
	echo"</div>";
	echo"</div>";
	echo"</div><br>";
}
?>

</div>
      


<br/>&nbsp;<br/> 
<br/><br/> 
</div> </div>
<div id="clear"></div></div> 
 </div>  </body></html>