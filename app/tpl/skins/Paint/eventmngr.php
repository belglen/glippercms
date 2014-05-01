<?php
include 'system/header.php';
include 'inc/staffnav.php'; 
?>
</span>
</div>
<div id="marginy">
<div id="main_left"> 
<?php
//	$GetUsers = mysql_query("SELECT username,motto,rank,last_online,online,look,description,twitter,land,land2 FROM users WHERE username='zfantje' ORDER BY id");
	$GetUsers = mysql_query("SELECT u.*, u.id AS uid, ua.* FROM user_achievements ua join users u on (ua.user_id=u.id AND ua.achievement_id IN (48,59,60)) ORDER BY ua.achievement_id DESC");
	while($Users = mysql_fetch_assoc($GetUsers))
	{
			$isCOLOR = "{$Users['colorpick']}";

		echo "<div class=\"content-box\" style=\"margin-top:0px; height:145px;\">\n";
		echo "<div class=\"content-box-content\">\n";
		echo "<div id=\"StaffBox2\" style=\"margin-top:-20px;\"><div id=\"StaffBox2\">\n";
		echo "<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure={$Users['look']}&gesture=sml&action=crr=667\" style=\"float:left\"/>\n";
		echo "<div id=\"staff_online\"><div id=\"offline\"><img src=\"app/tpl/skins/Paint/images/".(($Users['online'] == 0)?"offline":"online") . ".gif\"></img></div></div>\n";
		echo "<div id=\"staff_username\">
			<a href=\"index.php?url=profile&id={$Users['username']}\">
		<p>	  	 <style type=\"text/css\">
A:link {text-decoration: none}
A:visited {text-decoration: none;}
A:active {text-decoration: none;}
A:hover {text-decoration: none;}
</style><span class=\"{$Users['colorpick']}\">{$Users['username']}</span></a> - {$Users['rankname']} "; ?>
<!--
// (<font color="<?php 
// if ($Users['vote'] == '0') { 
// echo '#FF9900"'; 
// } else {
// echo '#00C103';
// } ?>"><?php echo ''.$Users['vote'].'';?></font>) --><?php 
// echo "<img src=\"browse.png\">";

 echo "</div></p><font size=\"1px\">Motto: {$Users['motto']}</font></br>\n";
		echo "<br />{$Users['description']}<br /><br />";
		echo "<div style=\"margin-left:60px;\">";
			// echo "<a href=\"https://twitter.com/{$Users['twitter']}\" class=\"twitter-follow-button\" data-show-count=\"false\" data-lang=\"nl\">@{$Users['username']} volgen</a>\n";
		echo "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"//platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>\n";
	    echo "</div></div><br><br><br><div style=\"margin-left: 70px; margin-top: 5px;\">
	<img src=\"{url}/r63/c_images/land/{$Users['land']}.png\"/> 
            
	<img src=\"{url}/r63/c_images/land/{$Users['land2']}.png\"/></div>  </div>  </div>  </div>\n<br />\n";





	}
?>

  </div>
<div id="main_right"> 
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Event Managers</h2> 

	  </div> 

	  <div class="content-box-content"> 
<strong>Event Managers</strong><br /><img src="" align="right">
Event Managers zijn ervoor om het gezellig te houden in Glipper! Zij doen dan ook leuke events, waar natuurlijk ook fantastische prijsjes bij zijn!</div>	
<br><br><br>
	  </div>


	  
	</div>

<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> 
<div id="clear"></div></div> 

</div>  </body></html>