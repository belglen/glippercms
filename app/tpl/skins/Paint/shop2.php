<?php
include 'system/header.php';
include 'inc/shopnav.php'; 
?>
<script src="https://www.targetpay.com/send/include.js"> </script>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<?php
if(isset($_POST['koop']))
{
?>
<div class="content-box"> 
<div class="content-box-orange"> 
<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 
    <script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
            $('#notice').hide();
            $('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
</script>

	<?php
	$id = clean($_POST['id']);
	$checkid = mysql_query("SELECT * FROM `badge_shop` WHERE `badge_id`='$id' AND `ster`='1'");
	$checkbadge = mysql_num_rows(mysql_query("SELECT * FROM `user_badges` WHERE `user_id`='$userid' AND badge_id = '$id'"));
	if(mysql_num_rows($checkid) == 0)
	{
            echo "Er bestaat geen badge met het aangevraagde id. Klik <a href=\"index.php?url=shop\">hier</a> om terug te gaan.";
	}
	elseif ($userdata->online == '1')
	{
            echo "Vanwege veiligheidsproblemen mag je niet online zijn op het hotel tijdens het kopen van een badge. Klik <a href=\"index.php?url=shop\">hier</a> om terug te gaan.";
	}
	else
	{
		$item = mysql_fetch_object($checkid);
		if($userdata->vip_points < $item->cost)
		{
			echo "Je hebt niet genoeg sterren. Klik <a href=\"index.php?url=shop\">hier</a> om terug te gaan.";
		}
		else
		{
                    if ($checkbadge == '0')
                    {
                        echo'<div id="notice">';
                        echo"Bezig met toevoegen.. Een ogenblik geduld!";
                        echo"</div>";
                        echo '<div id="download" style="display: none">';
                        mysql_query("UPDATE `users` SET `vip_points`=`vip_points`-'$item->cost' WHERE `id`='$userdata->id'");
                        mysql_query("INSERT INTO user_badges (user_id, badge_id, badge_slot) VALUES ('$userdata->id', '$item->badge_id', '0')");
                        mysql_query("INSERT INTO user_activity (user_id,activity,buy,tijd) VALUES ('$userdata->id', 'badge $item->badge_id','1', NOW())");
                        echo"Je badge is succesvol aangekocht in onze spiksplinternieuwe-geupdate badgeshop! Hopelijk mogen we je nog eens verwelkomen in deze shop! Klik <a href=\"index.php?url=shop\">hier</a> om terug te gaan.";
                        echo"<img src=\"r63/c_images/album1584/$item->badge_id";
                        echo".gif\" alt=\"$item->badge_id\" align=\"right\"/>";
                        echo"<br/><br/></div>";
                    }
                    else
                    {
                        echo"Je hebt deze badge al! Klik <a href=\"index.php?url=shop\">hier</a> om terug te gaan.";
                    }
		}
	}
	
	?>
	</div>
  </div>
<br />
	<?php
}

?>
  
  

    
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Kopen</h2> 
</div> 
<div class="content-box-content"> 
<div class="shop">
<a href="javascript: targetpay(46214, 82545, 'auto', 'auto', '');">
<div class="price" style="margin-left: 10px;">
 <div class="pricetext">
                                        <b class="amount">10</b><b>
&#8364;1,10</b>
                                    </div>
</div></a>

<a href="javascript: targetpay(46218, 82545, 'auto', 'auto', '');"><div class="price" style="margin-left: 2px;">

 <div class="pricetext">
                                        <b class="amount">30</b><b>
&#8364;2,20</b>
                                    </div>
</div></a>

<a href="javascript: targetpay(46219, 82545, 'auto', 'auto', '');"><div class="price" style="margin-left: 2px;">

 <div class="pricetext">
                                        <b class="amount">60</b><b>
&#8364;4,40</b>
                                    </div>
</div></a>
<a href="javascript: targetpay(46950, 82545, 'auto', 'auto', '');">
<div class="price2" style="margin-left: 2px;">
 <div class="pricetext">
                                        <b class="amount">25</b><b>
&#8364;2,50</b>
                                    </div>
</div></a>


<a href="javascript: targetpay(46951, 82545, 'auto', 'auto', '');">
<div class="price2" style="margin-left: 2px;">
 <div class="pricetext">
                                        <b class="amount">50</b><b>
&#8364;4,75</b>
                                    </div>
</div></a>


</div>
</div>

<div style="margin-bottom:120px"></div>

  </div>




<br />  


	  

<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Sterren: badges</h2> 

</div> 
<div class="content-box-content">
<?php
$query = mysql_query("SELECT badge_id,cost,ster FROM `badge_shop` WHERE `ster` = '1' ORDER BY cost ASC");

echo"<table width=\"900px\">";
echo"<tr><td><b>Badge</b></td><td><b>Prijs</b></td><td><b>#</b></td></tr>";
while($info = mysql_fetch_array($query))
{
	echo"<tr><td><img src=\"r63/c_images/album1584/".$info['badge_id'].".gif\" alt=\"\"";
	echo"\" /></td><td><strong>";
	echo $info['cost'];
	echo"</strong></td><td><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"";
	echo $info['badge_id'];
	echo"\" /><input type=\"submit\" class=\"glipperflexbtn\" name=\"koop\" value=\"Koop\" /></form></td></tr>";
}
echo"</table>";
?>  
</div>
  </div>


</div>

<div id="main_right"> 

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Sterren</h2> 

	  </div> 

	  <div class="content-box-content"> 

	<img src="app/tpl/skins/Paint/images/star_310.gif" align="left"/>
			&nbsp;&nbsp;Je hebt momenteel:<br>
			<b style="font-size: 1.2em;">&nbsp;&nbsp; <?php echo $userdata->vip_points; ?> Sterren</b><br /><br />
<strong>Wat zijn Sterren?</strong><br />
Sterren zijn ook betaalmiddelen, net zoals credits en pixels. Omdat sterren echt geld kost, moet daarvoor een bepaalde leeftijd zijn (bekijk de tekst hieronder in het <font color="red">rood</font>).
<br /><br><p><strong>Zijn er voordelen?</strong></br /></p>
Natuurlijk! Met sterren kan je VIP in een paar kliks kopen! Dan hoef je dus maar een keer te betalen.<br /><br />
<font color="red">Ben je jonger dan 14 jaar? Vraag dan eerst toestemming aan je ouders/verzorgers.</font>

</font>


	  </div>

	</div>
<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> 
<div id="clear"></div></div> 

</div>
</body></html>