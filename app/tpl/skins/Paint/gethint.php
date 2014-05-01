<?php
 function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

// RUILEN.PHP -> STERREN
if (isset($_GET['ster']))
{
    $ster = clean($_GET['ster']);
    $total = clean(ceil($_GET['ster'] * 1.10));

    if ($ster != '0')
    {
        echo"Om $ster sterren te doneren, raak je $total sterren kwijt.<br><br>";
    }
    else
    {
        echo"Om 0 sterren te doneren, raak je 0 sterren kwijt.<br><br>";
    }
}else if (isset($_GET['user'])){
	$a = clean($_GET['user']);
	if (strlen($a) > 0)
	{
		$hint = $a;
		$getweirdousers = mysql_query("select id,username,rank,look,motto,last_online,vip_points,credits,activity_points from users where username = '$hint'");
	}
	else
	{
		$response =  "Nog geen geldige gebruiker gekozen.";
	}
      if (($hint == "" || empty($hint)) || mysql_num_rows($getweirdousers) == 0)
      {
              $response=" <br><div class='content-box'> 
    <div class='content-box-deep-blue'> 
    <h2 class='title'>Gebruikersinformatie</h2> 
    </div> 
    <div class='content-box-content' style='overflow:hidden'> Nog geen geldige gebruiker gekozen.</div></div>";
      }
    else
      {
		  $getweirdouser = mysql_fetch_object($getweirdousers);
              $getRank = mysql_fetch_array(mysql_query("SELECT id,name FROM ranks WHERE id ='".$getweirdouser->rank."'"));
              $a = mysql_fetch_assoc(mysql_query("SELECT id,OnlineTime FROM user_stats WHERE id ='".$getweirdouser->id."'"));
              $response="

               <br><div class='content-box'> 
    <div class='content-box-deep-blue'> 
    <h2 class='title'>Gebruikersinformatie</h2> 
    </div> 
    <div class='content-box-content' style='overflow:hidden'> <table width='100%'>
    <font style='font-size: small;'>  <img src='http://www.habbo.nl/habbo-imaging/avatarimage?figure=".$getweirdouser->look."&head_direction=3&direction=4&action=crr=9&gesture=sml' align='right'>
              <span style='margin-left: 20px;'><strong>Naam</strong></span>
              <span style='margin-left: 193px;'>".$getweirdouser->username."</span>

            <br>
              <span style='margin-left: 20px;'><strong>Rank</strong></span>
              <span style='margin-left: 200px;'>".$getRank['name']."</span>
              <br>
              <span style='margin-left: 20px; margin-top: 20px;'><strong>Missie</strong></span>
              <span style='margin-left: 190px;'>".filter($getweirdouser->motto)."</span>
              <br>
              <span style='margin-left: 20px; margin-top: 20px;'><strong>Laatst ingelogd</strong></span>
              <span style='margin-left: 123px;'>".strftime('%#d-%m-%Y om %Hu%M', $getweirdouser->last_online)."</span>
                      <br>
              <span style='margin-left: 20px; margin-top: 20px;'><strong>Online tijd</strong></span>
              <span style='margin-left: 161px;'>".round($a['OnlineTime']/3600)." Uren</span>
                      <br>
              <span style='margin-left: 20px; margin-top: 20px;'><strong>Aantal Sterren</strong></span>
              <span style='margin-left: 130px;'>".$getweirdouser->vip_points."</span>
                      <br>	

              <span style='margin-left: 20px; margin-top: 20px;'><strong>Aantal Credits</strong></span>
              <span style='margin-left: 131px;'>".$getweirdouser->credits."</span>
                      <br>
              <span style='margin-left: 20px; margin-top: 20px;'><strong>Aantal Pixels</strong></span>
              <span style='margin-left: 141px;'>".$getweirdouser->activity_points."</span>
              </font></table>
    </div>
      </div>
    ";
      }
    echo $response;
}else if (isset($_GET['rotation']))
{
	$username = clean($_GET['username']);
	$look = clean($_GET['look']);
	$rotation = clean($_GET['rotation']);
	echo"<img src='http://www.habbo.nl/habbo-imaging/avatarimage?hb=img&figure=".$look."&direction=".$rotation."&head_direction=".$rotation."' alt='".$username."'>";
} else if (isset($_GET['badge']))
{	$badge = clean($_GET['badge']);
	$filename= 'http://images.habbo.com/c_images/album1584/'.$badge.'.gif';
	$file_headers = @get_headers($filename);
	if($file_headers[0] == 'HTTP/1.0 404 Not Found')
	{
		echo'<img src="app/tpl/skins/Paint/images/toolbar_06.gif" align="right">';
	} 
	else 
	{
		if ($badge == 'ADM' || $badge == 'VIP')
		{
			echo'<img src="app/tpl/skins/Paint/images/toolbar_08.gif" align="right" class="hotspot" onmouseover="tooltip.show(\'Gelieve geen staffbadges te kiezen.\');" onmouseout="tooltip.hide();">';
		}
		else
		{
			echo'<img src="http://images.habbo.com/c_images/album1584/'.$badge.'.gif" align="right">';
		}
	}
}
else {
	header("Location: /index");
exit;
}

?>