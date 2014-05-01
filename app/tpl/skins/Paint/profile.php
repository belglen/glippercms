<?php
include'system/header.php';
include'system/site/profile/scripts.php';
include'inc/homenav.php';
?>
</span>
</div>
<script>
$(document).ready(function() {
	var p = $('.title:first');
	var position = p.position();
	$('#colors').css('display', 'none');
	$('.content-box.kleurtjes').css('display', 'none');
	
	$('#wmenu').click(function() {
		$.ajax ({
		type: "GET",
			  url: "widget_color.xml",
			  dataType: "xml",
			  success: function(xml) {
			      var id = $(xml).find('colors').text();
				  for (var i = 0; i <= $(xml).find('body').last().attr('id'); i++) 
				  {
					  if (i != 0)
					  {
					      var ida = $(xml).find('body[id="' + i + '"]').attr('name');
					      $('#colors').append("<a href='index.php?url=blie" + ida + "'><img src='app/tpl/skins/Paint/images/" + ida + ".png'></a>");
					  }
				  }
		 	  }
		});
		$('#colors').fadeIn(1500, function() {
			
		});
		$('#wmenu').add('#widgetts').add('#wmenu5').fadeOut(100, function() {
		});
		$('.content-box.kleurtjes').fadeIn(1500, function() {
			
		});
	});
});
</script>
<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-deep-blue"> 
<?php
if ($_SESSION['user']['username']==$pers->username)
{
	$widgets .= "<span id=\"wmenu5\">|</span> <span style=\"color: lightblue; cursor: pointer; font-weight: bold;\" id=\"wmenu\">Widgets</span>";
}
$GetBans = mysql_query("SELECT id,expire,bantype,value FROM bans WHERE value = '$pers->username'");
$ban = mysql_fetch_object($GetBans);
if (mysql_num_rows($GetBans) == '0') 
{
	echo"<h2 class=\"title\">Profiel van <span style=\"color: white;\">$pers->username</span> $widgets</h2>";
}
else if (mysql_num_rows($GetBans) != 0 && $ban->expire > time())
{	
	echo"<h2 class=\"title\">Profiel van <del style=\"color: red; margin-top: -500px;\"><span style=\"color: white;\">$pers->username</span></del> $widgets</h2>";
}
?>
</div>  
<div class="content-box-content"> 
<table width="100%"><tr><td><b>Naam</b></td><td>
<span class="<?php echo $pers->colorpick; ?>"><?php echo $pers->username; ?> </span><span id="colors"></span>


</div>
</td></tr><tr><td><b>Rank</b></td><td><?php
if ($pers->rank == '11')
{
	echo'Eigenaar';
}
elseif ($pers->rank == '10')
{
	echo"Glipper";
}
elseif ($pers->rank == '9')
{
	echo"Manager";
}
elseif ($pers->rank == '8')
{
	echo"Administrator";
}
elseif ($pers->rank == '7')
{
	echo"Hoofd-Moderator";
}
elseif ($pers->rank == '6')
{
	echo"Moderator";
}
elseif ($pers->rank == '5')
{
	echo"Proef-Moderator";
}
elseif ($pers->rank == '4')
{
	echo"Expert";
}
elseif ($jour == '1')
{
	echo"Event Manager";
}
elseif ($dj->rank == 'pdj')
{
	echo"Proef DJ";
}
elseif ($dj->rank == 'dj')
{
	echo"DJ";
}
elseif ($dj->rank == 'hdj')
{
	echo"Hoofd DJ";
}

elseif ($pers->rank == '3')
{
	echo"Super VIP";
}
elseif ($pers->vip == '1')
{
	echo"VIP";
}
elseif ($pers->rank == '1')
{
	echo"Glipper";
}
?></td><td rowspan="6"><img src="<?php echo $image; ?>" alt="<?php echo $pers->username; ?>" /></td></tr>
<tr><td><b>Missie</b></td><td><?php echo filter(htmlspecialchars_decode($pers->motto)); ?></td></tr>

<tr><td><b>Laatste login</b></td><td>
<?php
echo strftime('%#d-%m-%Y om %Hu%M', $pers->last_online);
?>
    </td></tr>
<tr><td><b>Aantal Uren</b></td><td>
<?php
$onfetch = mysql_fetch_object(mysql_query("SELECT id,OnlineTime FROM user_stats WHERE id ='$pers->id'"));
echo round($onfetch->OnlineTime/3600)
?>
    </td></tr>
<tr><td><b>Aantal Credits</b></td><td><?php echo $pers->credits; ?></td></tr>
<tr><td><b>Aantal Pixels</b></td><td><?php echo $pers->activity_points; ?></td></tr>
<tr><td><b>Aantal Sterren</b></td><td><?php echo $pers->vip_points; ?></td>

</tr></table>
</div> 
</div>

<br>

<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Badges van <?php echo $pers->username; ?></h2> 
</div>  
<div class="content-box-content"> 
<?php

$getmybadges = mysql_query("SELECT badge_id,user_id FROM user_badges WHERE user_id='".$pers->id."'");

// if (mysql_num_rows($getmybadges) == '0')
// {
while($rowing = mysql_fetch_assoc($getmybadges)){
$badge = $rowing['badge_id'];
echo '<img src="r63/c_images/album1584/'.$badge.'.gif" style="margin-right: 10px;" />';
	}
// } 
// else
// {
	// echo $pers->username." heeft (nog) geen badges!";
// }
?></div></div> 
<br>	

<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Vrienden van <?php echo $pers->username; ?></h2> 
</div>  
<div class="content-box-content"> 

<?php
            $query = mysql_query("SELECT user_one_id,user_two_id FROM messenger_friendships WHERE user_one_id = '".$pers->id."' ORDER BY RAND() LIMIT 15");
            $i = 0;
			if (mysql_num_rows($query) != '0')
			{
            while($friends = mysql_fetch_array($query))
            {
                $getfriend = mysql_query("SELECT id,username,look FROM users WHERE id ='".$friends['user_two_id']."' LIMIT 1");
                if(mysql_num_rows($getfriend) > 0)
                {
                    $i++;
                    if($i == 1)
                    {
                     
                        echo '';
                    }
                    $friend = mysql_fetch_array($getfriend);
					$friendname = $friend['username'];
					$friendlook = $friend['look'];
echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('$friendname');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=profile&id=$friendname\"><img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$friendlook&size=s\"/></a>
</span>";
                }
            }
            }
			else
			{
				echo $pers->username.' heeft (nog) geen vrienden!';
			}
            if($i > 0)
echo '</br>'
?>		
</span> </div> 
</div> <br>
</div> 
<div id="main_right"> 
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Zoeken</h2> 

	  </div> 

	  <div class="content-box-content"> 
	  <center> <form method="get" action="index.php"> 
	  
	  <table width="100" border="0"> 	

				     <tr> 
									<input type="hidden" value="profile" name="url">
                        <td width="58"><strong>Gebruikersnaam</strong></td>
                        <td width="4"><input name="id" type="text" style="width: 120px;"/></td> 
                    </tr> 

    <tr> 
                        <td>&nbsp;</td> 
                        <td><input type="submit" class="glipperflexbtn" value="Zoek" align="center"/>                
</td> 
                    </tr> 

</form> 
</table>	</div>	

	  </div>

	  <?php
		if ($pers->id == $_SESSION['user']['id']) {
		
	  ?>
	  <div class="content-box kleurtjes" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
		<div class="content-box-deep-blue2" style="width:290px">
		<h2 class="title" style="padding:0;line-height:30px;">Kleurtjes</h2>
		</div>
		<div class="content-box-content">
<?php
		if (isset($_POST['buy25'])) 
		{
			
		} 
		else if ($pers->kleuren == '0')
		{
			echo'<img src="r63/c_images/album1584/DE150.gif" align="right">';
			echo'Kleuren is een leuk en creatief idee voor het personalizeren van jouw eigen profiel. <b>Het kopen van de hele set (dus alle kleuren) kost 5 sterren.</b>';
			echo'<input type="submit" name="buy25" id="buy25" value="Koop" style="margin-top: 30px; margin-left: 40px;">';
			echo'<br /><br /><br /><br /><br />';
		}
?>

</div>	
</div> 
<?php 
}
?>
</div>