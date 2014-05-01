<?php
include 'system/header.php';
include 'inc/staffnav.php'; 
echo'<style>';
echo"
@font-face {
	font-family: myFirstFont; src: url('app/tpl/skins/Paint/styles/Volte.ttf')
} 

#pixelMottoFont 
{
	font-family:myFirstFont,Verdana,Arial;
	font-size: 9px; 
	word-wrap:breakword;
}
";
echo'</style>';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
		<?php
        $GetUsers = mysql_query("SELECT id,username,colorpick,look,online,rank,rankname,description,motto,land,land2 FROM users WHERE `rank` in (10,11) ORDER BY id");
            while($staff = mysql_fetch_object($GetUsers))
            {
                $staff->motto = clean($staff->motto);
                $getrank = mysql_fetch_object(mysql_query("SELECT id,badgeid FROM ranks WHERE id = '$staff->rank'"));
				echo"<div class=\"content-box\" style=\"margin-top:0px; height:145px;\">\n";
				echo"<div class=\"content-box-content\">\n";
				echo"<div id=\"StaffBox2\" style=\"margin-top:-20px;\"><div id=\"StaffBox2\">\n";
				echo"<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$staff->look&gesture=sml&action=crr=667\" style=\"float:left\"/>\n";
				echo"<div id=\"staff_online\"><div id=\"offline\"><img src=\"r63/c_images/album1584/$getrank->badgeid.gif\" align=\"right\"></div></div>\n";
				echo"<div id=\"staff_username\">";
				echo"<a href=\"index.php?url=profile&id=$staff->username\">";
				echo"<p><span class=\"$staff->colorpick\">$staff->username</span></a> - $staff->rankname"; 
				echo"</div></p><font size=\"1px;\" style=\"margin-top: 5px;\" id=\"pixelMottoFont\">Motto: $staff->motto</font></br>\n";
				echo"<br />".clean($staff->description)."<br /><br />";
				echo"<div style=\"margin-left:60px;\">";
				echo"</div></div><br><br><br><br><div style=\"margin-left: 70px;\">";
				echo"<img src=\"r63/c_images/land/$staff->land.png\"/>";    
				echo"<img src=\"r63/c_images/land/$staff->land2.png\"/></div>";
				echo"</div>  </div>  </div>\n<br />\n";
            }
        ?>
</div>
<div id="main_right"> 
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Management</h2> 

	  </div> 

	  <div class="content-box-content"> 
	  <center><img src="http://www.animaatjes.nl/plaatjes/h/habbo/animaatjes-habbo-98289.gif" align="right"></center>

<strong>Het Glipper Management</strong><br />
Het management regelt, organiseert en bestuurt Glipper. Nevenstaande personen zorgen dat Glipper blijft draaien. Dit gebeurt uiteraard met behulp van Moderatoren, maar ook deze worden weer aangestuurd door het Management. <br /><br />
<strong>Hoe kom ik bij dit groepje?</strong><br />
Dit zal helaas niet zomaar gaan! Glipper neemt enkel personen aan, waarmee het team allang bekend is. Om eventueel ooit bij het management uit te komen, zul je onderaan moeten beginnen. Dan is het natuurlijk wel mogelijk!
</div>	

	  </div>

	
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Altijd up-to-date?!</h2> 

	  </div> 

	  <div class="content-box-content"> 
Altijd door ons op de hoogte gehouden willen worden? En ook gemakkelijk met ons willen communiceren?! Die kans bieden we je nu. Hiervoor gebruiken we de Social Media website, Twitter. Een knop om ons te kunnen volgen vind je links.
</div></div>
	
	</div>
</div> 
</div> 
<?php
		/*echo"<div class=\"content-box\" style=\"margin-top:0px; height:145px;\">\n";
		echo"<div class=\"content-box-content\">\n";
		echo"<div id=\"StaffBox2\" style=\"margin-top:-20px;\"><div id=\"StaffBox2\">\n";
		echo"<img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$staff->look&gesture=sml&action=crr=667\" style=\"float:left\"/>\n";
		echo"<div id=\"staff_online\"><div id=\"offline\"><img src=\"r63/c_images/album1584/$getrank->badgeid.gif\" align=\"right\"></div></div>\n";
		echo"<div id=\"staff_username\">";
		echo"<a href=\"index.php?url=profile&id=$staff->username\">";
		echo"<p><span class=\"$staff->colorpick\">$staff->username</span></a> - $staff->rankname"; 
		echo"</div></p><font size=\"1px;\" style=\"margin-top: 5px;\" id=\"pixelMottoFont\">Motto: $staff->motto</font></br>\n";
		echo"<br />".clean($staff->description)."<br /><br />";
		echo"<div style=\"margin-left:60px;\">";
	    echo"</div></div><br><br><br><br><div style=\"margin-left: 70px;\">";
		echo"<img src=\"r63/c_images/land/$staff->land.png\"/>";    
		echo"<img src=\"r63/c_images/land/$staff->land2.png\"/></div>";
        echo"</div>  </div>  </div>\n<br />\n";*/

?>