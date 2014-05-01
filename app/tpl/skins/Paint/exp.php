<?php
include 'system/header.php';
include 'inc/staffnav.php'; 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 

<?php
	$GetUsers = mysql_query("SELECT * FROM users WHERE rank = 4 ORDER BY id");
	// $GetUsers = mysql_query("SELECT username,motto,rank,last_online,online,look,description,twitter FROM users WHERE id='243' ORDER BY id");
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
	    echo "</div></div><br><br><br><div style=\"margin-left: 70px;\"><br>
	<img src=\"{url}/r63/c_images/land/{$Users['land']}.png\"/> 
            
	<img src=\"{url}/r63/c_images/land/{$Users['land2']}.png\"/></div> </div>  </div>  </div>\n<br />\n";




	}
?>
  
  </div>
<div id="main_right"> 



<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 







	  <div class="content-box-deep-blue2" style="width:290px"> 


	    <h2 class="title" style="padding:0;line-height:30px;">Wat zijn Experts?</h2> 


	  </div> 

	  <div class="content-box-content"> 
<img src="{url}/app/tpl/skins/Paint/images/habboX.gif" align="right"></img>
Glipper Experts zijn personen die zich bewezen hebben als ervaren spelers. Ze helpen beginners en zijn goed in het beantwoorden van vragen. Zij hebben geen extra rechten binnen het hotel. Wel kun je ze herkennen aan hun eXpert badge.

</div>	

	  </div>
<!--
<div class="content-box" style="width:300px; margin-bottom: 0px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 







	    <h2 class="title" style="padding:0;line-height:30px;">Ex-Experts</h2> 
	  </div> 

	  <div class="content-box-content"> 
De volgende personen zijn in het verleden een Holo Expert geweest. Deze status hebben ze vanwege promovatie naar Proef-MOD of door gebrek aan tijd ingeleverd.<br /><br />
<i><img src="http://images.habbohotel.nl/c_images/album1584/NL089.gif" align="right"></img>
- Can (10-12-11 - 17-12-11)<br />
- Melissa ( 15-12-11 - 29-12-11)<br /> 
- Just.Sophie ( 15-12-11 - 28-12-11)<br />
- Elsie (04-01-12 - 15-02-12)<br />
- Funfur (04-01-12 - 17-02-12)<br />
- X2pacX (17-03-12 - 14-04-12)
</i>

</div> 

</div><br/> 
-->

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: -30px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 







	    <h2 class="title" style="padding:0;line-height:30px;">Hoe word ik Expert?</h2> 
	  </div> 

	  <div class="content-box-content"> 
Expert kan je worden door te solliciteren voor expert of in de sollicitaties voor MIO ook goed zijn, maar toch expert word. Of als je heel erg goed beginnelingen helpt met vragen, dan maak je kans op expert! Er zijn 3 manieren dus!</i>

</div> 

</div>


</script> 
<br/><br/> 
</div> 
<div id="clear"></div></div> 
 </div>  </body></html>