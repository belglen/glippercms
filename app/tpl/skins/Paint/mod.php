<?php
include 'system/header.php';
include 'inc/staffnav.php'; 
?>
</span>
</div>
<div id="marginy">
<div id="main_left"> 


<?php
	$GetUsers = mysql_query("SELECT id,username,colorpick,look,online,rank,rankname,description,motto,land,land2 FROM users WHERE `rank` in (5,6) ORDER BY id");
	while($staff = mysql_fetch_object($GetUsers))
	{
		$getrank = mysql_fetch_object(mysql_query("SELECT id,badgeid FROM ranks WHERE id = '$staff->rank'"));
		echo"<div class=\"content-box\" style=\"margin-top:0px; height:145px;\">\n";
		echo"<div class=\"content-box-content\">\n";
		echo"<div id=\"StaffBox2\" style=\"margin-top:-20px;\"><div id=\"StaffBox2\">\n";
		echo"<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$staff->look&gesture=sml&action=crr=667\" style=\"float:left\"/>\n";
		echo"<div id=\"staff_online\"><div id=\"offline\"><img src=\"r63/c_images/album1584/$getrank->badgeid.gif\" align=\"right\"></img></div></div>\n";
		echo"<div id=\"staff_username\">";
		echo"<a href=\"index.php?url=profile&id=$staff->username\">";
		echo"<p><span class=\"$staff->colorpick\">$staff->username</span></a> - $staff->rankname"; 
		echo"</div></p><font size=\"1px\">Motto: $staff->motto</font></br>\n";
		echo"<br />$staff->description<br /><br />";
		echo"<div style=\"margin-left:60px;\">";
	    echo"</div></div><br><br><br><br><div style=\"margin-left: 70px;\">";
		echo"<img src=\"{url}/r63/c_images/land/$staff->land.png\"/>";    
		echo"<img src=\"{url}/r63/c_images/land/$staff->land2.png\"/></div>";
        echo"</div>  </div>  </div>\n<br />\n";
	}
?>

  </div>
<div id="main_right"> 
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Moderatie</h2> 

	  </div> 

	  <div class="content-box-content"> 
<strong>Moderatoren</strong><br />
Moderatoren zijn Glipper's die ervoor zorgen dat jij je veilig kunt voelen in Glipper. Deze Glipper's zorgen ervoor dat de <i>'bad-boys'</i> worden verbannen en verbeteren de sfeer in het hotel.<br /><br /><strong>Hoe word ik een Moderator?</strong><br />
Je kunt momenteel niet meer rechtstreeks solliciteren voor een functie als moderatoren. Wij houden sollicitaties voor nieuwe MIO's. Uit deze groep zullen wij uiteindelijk nieuwe moderatoren kiezen.
</div>	

	  </div>


	  
	</div>

<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> 
<div id="clear"></div></div> 

</div>  </body></html>