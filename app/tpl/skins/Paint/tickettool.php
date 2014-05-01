<?php
include 'system/header.php';
include 'system/site/tickettool/scripts.php';
include 'inc/homenav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
	<div class="content-box-deep-blue"> 
		<h2 class="title"><?php echo $title; ?></h2> 
	</div> 
	<div class="content-box-content"> 
    	<?php
		if($macht==0){echo'Je hebt geen toegang tot dit document.';}
		else
		{
			?>
                <span class="helptool_info"><img src="<?php echo $image; ?>" align="right" /><?php echo $msg; ?><br /><br /><hr /><span class="<?php echo $pers->colorpick; ?>"><?php echo $pers->username; ?></span></span>
                
                <br clear="all" />
            <?php
		}
		?>
    </div>
</div>
<br />
<span class="hidethis">
<?php
if($macht==1){
	$begin = ($_GET['p'] >= 0) ? $_GET['p']*5 : 0;
	$id = clean($_GET['id']);
	$replies = mysql_query("SELECT * FROM `helptool_tickets_reacties` WHERE `ticket_id`='$id' LIMIT $begin,5");
	if(mysql_num_rows($replies) != 0)
	{
		for($j=$begin+1; $info = mysql_fetch_object($replies); $j++) 
		{
			$pers = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$info->user_id'"));
			$info->message = nl2br($info->message);
			$info->message = str_replace('`', " undefined ", $info->message);
			$info->message = str_replace("'", " undefined ", $info->message);
			$info->message = str_replace('"', " undefined ", $info->message);
			$info->message = str_replace("<br /><br />", "<br />", $info->message);
			$info->message = str_replace("<br /><br />", "<br />", $info->message);
			/*!*/
			
			echo'<div style="position:relative;background: none repeat scroll 0% 0% rgb(255, 255, 255);max-height:500px;min-height:auto; height: auto; border:1px solid rgb(173,173,173);box-shadow: 0px 2px rgba(0,0,0,0.2);padding:4px;margin-bottom:6px;border-radius:5px 5px 5px 5px; color: rgb(0, 0, 0);float:left;min-height:64px;width:580px;margin-right:9px;'; if ($pers->rank>6){echo'border-color: green;';}echo'">';
			if($pers->id == $_SESSION['user']['id'] && $_SESSION['user']['rank'] > 6)
			{
				echo"<div style=\"float: right;\">
						<form method=\"post\">
							<input type=\"hidden\" name=\"id\" value=\"".$info->id."\"/>	
							<input type=\"submit\" class=\"glipperflexbtn\" value=\"Verander\" name=\"changee\">
						</form>
						<br><br>
						";
						if ($pers->id != $bestaatss->uid)
						{
						echo"
						<img style=\"margin-left: 30px;\" src=\"http://www.habbo.nl/habbo-imaging/avatarimage?direction=4&head_direction=3&gesture=sml&figure=".$pers->look."\">";
						}
						echo"</div>";
			}

				echo'<div style="padding:6px;"><a href="index.php?url=profile&amp;id='.$pers->username.'" style="color:rgb(108,136,168);cursor:pointer;text-decoration:none;font-weight:bold;">'.$pers->username.'</a><br />'.$info->message.'
					</div>';
					/*!*/
			echo'
			</div> 
			<br /><br /><br /><br /><br /><br /><br />
';
		}
	}
}
?>
    </span>              
<span class="hidethis" style="display: none;">
<div class="content-box"> 
	<div class="content-box-deep-blue"> 
		<h2 class="title">Reageren</h2> 
	</div> 
	<div class="content-box-content"> 
    	<textarea maxlength="1000" id="text" style="width: 97%; max-width: 500%; height: 225px;"  spellcheck="false" class="fqsdfsdf"/></textarea>
        <br />
        <input type="submit" id="clickGo" class="glipperflexbtn zetfsqdf" value="Reageren" style="width: 98%;" />
        <br clear="all" />
    </div>
</div>
</span>
<br />
</div>
<div id="main_right"> 


<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">Tekens</h2> 
	</div> 
	<div class="content-box-content"> 
		<?php echo"$sidenav"; ?>
	</div>	
</div>
<div class="content-box_news" style="margin-top: 12px;width:300px;background-color:#fff;margin-bottom:13px;">
<div class="content-box-content">
	<a class="mi" id="overzichts" href="index.php?url=helptool">
		<div class="menuitem">
			Ticket overzicht
		</div>
	</a>
    <?php if($macht==1 && $bestaatss->status != 'red'){ ?>
	<a class="mi" id="reageren" href="#">
		<div class="menuitem2">
			Reageren
		</div>
		<div class="menuitem2" style="display: none;">
			Reacties
		</div>
	</a>
    <?php } ?>
</div></div>

</div>
</div>
<script>
$('.glipperflexbtn.zetfsqdf').click(function() {
	var text = $('#text').val().length;
	var text1 = $('#text').val();
	
	if (text == '')
	{
		$('textarea').css('border-color', '#F00');	
	}
	else
	{
		$.post('index.php?url=jquerygroep', {
		text1: text1,
		reaction: 1,
		ticketid: <?php echo $bestaatss->hid; ?>
		}, function() {
			window.location = "index.php?url=tickettool&id=<?php echo $id; ?>";
		});
	}
});
$('#reageren').click(function() {
	$('.hidethis').toggle();
	$('.menuitem2').toggle();
});
</script>