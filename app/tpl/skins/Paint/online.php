<?php
include 'system/header.php';
include 'inc/communitynav.php';

function randomAction($dir, $act, $gst) {
		$dirs = Array(Array('2', '2'), Array('2', '3'), Array('3', '2'), Array('3', '3'), Array('3', '4'), Array('4', '3'));
		$drks = Array(1, 2, 3, 5, 6, 9, 33, 42, 43, 44, 667);
		$acts = Array('wlk,wav', 'wlk', 'wav', 'wlk,crr=' . $drks[rand(0, (count($drks) - 1))], 'wlk,drk=' . $drks[rand(0, (count($drks) - 1))], 'drk=' . $drks[rand(0, (count($drks) - 1))], 'crr=' . $drks[rand(0, (count($drks) - 1))]);
		$gsts = Array('sml', 'nrm', 'spr', 'spk');
		$out = "";
		if($dir) {
			$sdir = $dirs[rand(0, (count($dirs) - 1))];
			$out .= '&direction=' . $sdir[0] . '&head_direction=' . $sdir[1];
		}
		if($act) {
			$sact = $acts[rand(0, (count($acts) - 1))];
			$out .= '&action=' . $sact;
		}
		if($gst) {
			$sgst = $gsts[rand(0, (count($gsts) - 1))];
			$out .= '&gesture=' . $sgst;
		}
		return $out;
	}

?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 

<div class="glipperflexbox"> 
<div class="glipperflexbar"> 
	<h2 class="title">Online Glipper's</h2> 
</div>
<div class="glipperflexcont"> 
	<?php
	$r['query'] = mysql_query("SELECT * FROM `users` WHERE online = '1' ORDER BY rank DESC");
	while($r['fetch'] = mysql_fetch_assoc($r['query'])) 
	{
		echo'	<div class="user_in_c_box"><a href="index.php?url=profile&id='.$r['fetch']['username'].'"';
					echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('<b>".$r['fetch']['username']."</b><br>Motto: ".$r['fetch']['motto']."');\" onmouseout=\"tooltip.hide();\" />";
					echo'
						<div class="user_avatar" style="background: url(http://www.habbo.nl/habbo-imaging/avatarimage?figure='. $r['fetch']['look'] .randomAction(true, true, true) . ') no-repeat center bottom;"></div>
					</span></a>
				</div>';
	}
	?>
</div>
</div>

</div> 
</div>