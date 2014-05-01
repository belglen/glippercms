<?php
$path = "cache/avatarhead/heads";
if (filesize_r($path) >= '104857600')
{
	$files = glob($path . '/*.png', GLOB_MARK);
	foreach ($files as $file)
	{
		if (!is_dir($file))
		{
			unlink($file);	
		}
	}
	unlink();
	mkdir($path);
}
function filesize_r($path)
{
	if(!file_exists($path)) return 0;
	if(is_file($path)) return filesize($path);
	$ret = 0;
	foreach(glob($path."/*") as $fn)
		$ret += filesize_r($fn);
	return $ret;
}
include 'system/header.php';
include 'inc/communitynav.php'; 
function getAvatarByFigure($figure = "", $params = "") {
	return 'http://www.habbo.nl/habbo-imaging/avatarimage?figure=' . $figure . $params;
}
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
 
<div class="content-box_news"> 
<div class="content-box-content"> 
	<div style="height: 190px; position: relative; padding: 6px; font-size: 11px;">
    <?php
		$r = Array();
		$r['users'] = Array();
		$r['query'] = mysql_query("SELECT * FROM users WHERE look != 'hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100' ORDER BY RAND() LIMIT 18");
		while($r['fetch'] = mysql_fetch_assoc($r['query']))
		{
			$r['users'][] = $r['fetch'];
		}
		for($i = 0; $i < 3; $i++) 
		{
			$al = array('a', 'b', 'c');
			echo'<div class="community_row ' . $al[$i] . '">';
			for($a = ($i * 6); $a < (($i + 1) * 6); $a++) {
				$usr = $r['users'][$a];
				echo'	<div class="community_user">
				<div class="user_bubble">
				<img class="user_head" src="cache/avatarhead/index.php?figure='.$usr['look'].'" />
				<div class="user_info">	

				<a class="user_name" href="index.php?url=profile&id=' . strtolower(htmlentities($usr['username'])) . '">' . $usr['username'] . '</a><br/>
				<span class="user_motto fontPixelMission">' . htmlentities($usr['motto']) . '</span>
				</div>
				
				<div class="status ' . (($usr['online'] == '1') ? 'online' : 'offline') . '"></div>
				</div>
				<div class="user_image_ph">
				<a href="index.php?url=profile&id=' . strtolower(htmlentities($usr['username'])) . '">
				<img class="user_image" src="' . getAvatarByFigure($usr['look'], randomAction(true, true, true)) . '" />
											</a>
										</div>
									</div>';
							}
							echo'<div style="clear: both;"></div>';
						echo'</div>';
					}
		?>
    </div>
    
</div> 
</div>
<br>



</div>
  


<div id="main_right"> 

<div id="top_stories"> 
<div id="top-story"> 
<div id="top-snippet"></div> 
</div> 
<div id="top-headlines-holder"> 
<div class="subnews_1"><a href="index.php?url=news&id={newsID-1}">{newsTitle-1} &raquo;</a> 
<div class="sub-news-date">{newsDate-1}</div> 
</div> 
<div class="subnews_0"><a href="index.php?url=news&id={newsID-2}">{newsTitle-2} &raquo;</a> 
<div class="sub-news-date">{newsDate-2}</div> 
</div> 
<div class="subnews_1"><a href="index.php?url=news&id={newsID-3}">{newsTitle-3} &raquo;</a> 
<div class="sub-news-date">{newsDate-3}</div> 
</div> 

<div style="text-align:right; margin:3px;"><a href="news">Meer nieuws &raquo;</a></div> 
</div>

<br />
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">{hotelName}'s houden van...</h2> 
	</div> 
	<div class="content-box-content"> 
    	<?php
		$sql = mysql_query("SELECT tag, COUNT(id) AS quantity FROM user_tags GROUP BY tag ORDER BY quantity DESC LIMIT 20");
		if(mysql_num_rows($sql) < 1){ echo"Geen tags om weer te geven."; }else{
		echo "	    <ul class=\"tag-list\">";
			for($i=0;($array[$i] = @    mysql_fetch_array($sql,1))!="";$i++)
			{
				$row[] = $array[$i];
			}
			sort($row);
			$i = -1;
			while($i <> mysql_num_rows($sql)){
				$i++;
				$tag = $row[$i]['tag'];
				$count = $row[$i]['quantity'];
				$tags[$tag] = $count;
			}
				
				$max_qty = max(array_values($tags));
				$min_qty = min(array_values($tags));
				$spread = $max_qty - $min_qty;
		
				if($spread == 0){ $spread = 1; }
		
				$step = (200 - 100)/($spread);
		
				foreach($tags as $key => $value){
					$size = 100 + (($value - $min_qty) * $step);
					$size = ceil($size);
					echo "<li><span style=\"text-decoration: none; font-size:".$size."%\">".trim(strtolower($key))."</span> </li>\n";
				}
		
		echo "</ul>";
		}

		?>
	</div>	
</div>	

<!--
<div class="content-box" style="width:300px; margin: -0x 0px 13px; background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">hallo source kijker</h2> 
	</div> 
	<div class="content-box-content"> 
		noob
    </div>
</div>
-->
