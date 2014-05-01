<?php
include 'system/header.php';
include 'inc/groepnav.php';

$user = new User($_SESSION['user']['id']);
?>
</span>
</div>

<div id="marginy">
	<div id="main_left"> 
		<div class="content-box"> 
			<div class="content-box-black"> 
				<h2 class="title">Jouw eigen groep, jou eigen plek </h2> 
			</div> 
			<div class="content-box-content">
            	<img src="app/tpl/skins/Paint/images/groepen.png" align="right" />
                Ben jij helemaal dol op <strong>pixelarten</strong>, helemaal verliefd op <strong>Justin Bieber</strong> of dans je, je helemaal suf op die platen van die ene vette groep?<br />
                Het kan natuurlijk allemaal.<br /><br />
                
                Misschien ben jij wel helemaal niet de enige! Laat heel {hotelName} zien waar jij gek op bent door een groep aan te maken of jouw interesses delen met anderen door simpel lid te worden van een andere groep. <?php /*Het werkt eigenlijk hetzelfde als jouw Home bewerken, alleen heb je nu meer mogelijkheden omdat jij degene bent die de leden zal mogen onderhouden.*/ ?>
                <br /><br />
                Maak jouw groep <strong>cool</strong> door een toffe badge en zorg ervoor dat hij opvalt doormiddel van een sterke naam en het is ook leuk om jouw groep helemaal op te pimpen zodat iedereen meteen lid wil worden! <?php /*Dat kun je doen met dezelfde items als op je Home: de achtergronden, de widgets, en de stickers zijn natuurlijk ook op jouw groep(en) beschikbaar. */ ?>
                <br /><br />
                Een groep kopen kan iedereen doen, VIPlid of niet. Het maken van een groep kost eenmalig <strong>100 credits</strong>.
                <br /><br />
                Waar wacht je nog op? Maak vandaag nog je eigen Groep!
			</div> 
		</div>
	</div>
</div>
<div id="main_right">
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px; position: relative;"> 
		<h2 class="title">Groepen<a href="#" id="groupsInfo" class="new-button1"><strong>Overzicht</strong><i></i></a><a style="margin-left: 15px !important; margin-right: -12px !important;" href="#" id="groupsOvr" class="new-button1 selected"><strong>Groepen</strong><i></i></a></h2> 
	</div> 
	<div class="content-box-content"> 
        
       	<span id="groupsInformation">
     	   <div style="border-bottom: 1px dashed rgb(204, 204, 204);">
             Laat de groepen zien waar je lid van bent, maak je eigen groep, of doe wat informatie op van de 'belangstellende groepen'!<br /><br />
                     </div><br />
        <a href="#" id="groupOpen" class="new-button"><strong>Maak/koop een groep</strong><i></i></a>
        <br clear="all" />

        </span>
       	<span id="groupsOverzicht" style="display: none">
             		<ul style="padding: 0px; margin: 0px 0px 0px;">
        	<?php
			global $users;
			$select = mysql_query("SELECT * FROM groups WHERE ownerid = '".$_SESSION['user']['id']."'");
			while ($group = mysql_fetch_object($select))
			{
			?>
        	<li style="cursor: pointer; background: url(/r63/c_images/album1584/<?php echo $group->badge; ?>.gif); background-position: 7px 50%; padding: 0px; width: 50%; background-repeat: no-repeat; line-style: none outside none;">
            	<a href="index.php?url=groep&id=<?php echo $group->id; ?>" style="text-decoration: none; border: 1px solid rgb(217, 217, 217); border-radius: 4px 4px 4px 4px;margin-right: 30px; width: 155%; display: block; height: 42px; padding: 2px 0px 2px 60px;"><span style="margin-top: 11px; font-weight: 600; display: block;"><?php echo $group->name; ?></span></a>
            </li>
            <?php
			}
			?>
        </ul>
        <br clear="all" />

        </span>
	</div>	
</div>	
<?php if (isset($_GET['my_groups'])) { ?>
<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px; position: relative;"> 
		<h2 class="title">Zelfgemaakte groepen</h2> 
	</div> 
	<div class="content-box-content"> 
		<ul style="padding: 0px; margin: 0px 0px 0px;">
        	<?php
			global $users;
			$select = mysql_query("SELECT * FROM groups WHERE ownerid = '".$_SESSION['user']['id']."'");
			while ($group = mysql_fetch_object($select))
			{
			?>
        	<li style="cursor: pointer; background: url(/r63/c_images/album1584/<?php echo $group->badge; ?>.gif); background-position: 7px 50%; padding: 0px; width: 50%; background-repeat: no-repeat; line-style: none outside none;">
            	<a href="index.php?url=groep&id=<?php echo $group->id; ?>" style="text-decoration: none; border: 1px solid rgb(217, 217, 217); border-radius: 4px 4px 4px 4px;margin-right: 30px; width: 155%; display: block; height: 42px; padding: 2px 0px 2px 60px;"><span style="margin-top: 11px; font-weight: 600; display: block;"><?php echo $group->name; ?></span></a>
            </li>
            <?php
			}
			?>
        </ul>
        <br clear="all" />
	</div>	
</div>	
<?php } ?>
<div id="groupOpenUp" class="content-box" style="display: none; width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px; position: relative;"> 
		<h2 class="title">Maak een groep</h2> 
	</div> 
	<div class="content-box-content">
    	<div id="firstGroup">
            <img src="app/tpl/skins/Paint/images/0503s09114s05013s05015.gif" align="right" />
            Prijs: <strong>100 credits</strong>.<br />
            Je hebt: <strong><?php echo $user->credits; ?> credits</strong>.<br /><br />
            <strong>Groep-naam:</strong><br />
            <form method="post" action="index.php?url=groepen">
                <input type="text" id="groupName" name="name" style="border-radius: 7px 7px 7px 7px; width: 95%;" />
                <br /><br /><br />
                <strong>Groep-beschrijving:</strong><br />
                <textarea maxlength="255" id="group_desc_check" style="width: 95%; height: 150px; border-radius: 7px 7px 7px 7px;" name="group_descr"></textarea><br /> <center>
                <span id="group_desc_report" style="font-weight: normal; text-align: center; position: relative;">
                   
                       Characters beschikbaar: <b>255</b>
                   
                </span> </center>
                <br />
                <a href="#" id="buyGroupProceed" class="new-button"><strong>Koop deze groep</strong><i></i></a>
                <a href="#" id="declineGroup" class="new-button"><strong>Annuleer</strong><i></i></a>
            
            <br clear="all" />
    	</div>
    	<div id="twoGroup" style="overflow: hidden;display: none;"></div>
        <div id="twoGroup2" style="overflow: hidden;display: none;">
            <a href="#" id="finalGroupBuy" class="new-button"><strong>Koop</strong><i></i></a>
            <a href="#" id="declineGroup2" class="new-button"><strong>Annuleer</strong><i></i></a></div>
    	<div id="latest" style="display: none;"></div>
    	<div id="latest1" style="display: none;">
        	<a href="#" id="gatochverder" class="new-button"><strong>Ga verder</strong><i></i></a>
            <br clear="all" />
        </div>
        </form>
	</div>	
</div>	
</div>
<script>
$('#declineGroup2').click(function() {
	$("#groupOpenUp").hide('fast');
});

$('#groupsOvr').click(function() {
	$("#groupsInfo").removeClass("selected");
	$("#groupsOvr").addClass("selected");
	$("#groupsOverzicht").hide();
	$("#groupsInformation").show();
});

$('#groupsInfo').click(function() {
	$("#groupsOvr").removeClass("selected");
	$("#groupsInfo").addClass("selected");
	$("#groupsInformation").hide();
	$("#groupsOverzicht").show();
});

$('#gatochverder').click(function() {
	window.location.replace("index.php?url=groepen&my_groups");
});

$('#finalGroupBuy').click(function() {
	var name = $('#groupName').val();
	var desc = $('#group_desc_check').val();
	$.post('index.php?url=jquerygroep', {
		naam: name,
		desc: desc,
		final: 1
	}, function(result) {
		$("#twoGroup2").fadeOut(1000);
		$('#twoGroup').fadeOut(1000, function (){
			$('#latest').html('<img src="app/tpl/skins/Paint/images/0503s09114s05013s05015.gif" align="right" />Gefeliciteerd! Je bent de trotse eigenaar van <strong>' + name + '</strong>!<br><br>');
			$("#latest").fadeIn();
			$("#latest1").fadeIn();
		});
	});
});

$('#groupOpen').click(function() {
	$("#groupOpenUp").show();
});

$('#buyGroupProceed').click(function() {
	if ($('#groupName').val().length == '0')
	{
		$("#groupName").css('border-color', '#F00');
	}
	if ($('#group_desc_check').val().length == '0')
	{
		$("#group_desc_check").css('border-color', '#F00');
	}
	if ($('#group_desc_check').val().length != '0' && $('#groupName').val().length != '0')
	{
		var proceed = 1;
	}
	if (proceed == 1)
	{
		var name = $('#groupName').val();
		var desc = $('#group_desc_check').val();
		$('#firstGroup').fadeOut(1000, function (){
		$('#twoGroup').html('<img src="app/tpl/skins/Paint/images/0503s09114s05013s05015.gif" align="right" />Naam: <b>' + name + '</b><br>Beschrijving: <b>' + desc + '</b><br>Je hebt: <b><?php echo number_format($user->credits); ?> credits</b><br><br clear="all" />');
			$("#twoGroup").fadeIn();
			$("#twoGroup2").fadeIn();
		});
	}
});

$('#declineGroup').click(function() {
	$("#groupOpenUp").hide('fast');
});
$(document).ready(function() {
	$('script').remove();
	var max_chara = 255;
	
	$('#group_desc_check').keyup(function() {
		var length = $('#group_desc_check').val().length;
		var char_left = max_chara - length;
		
		$("#group_desc_check").css('border-color', 'rgb(224, 224, 224)');
		$('#group_desc_report').html('Characters beschikbaar: <b>' + char_left + '</b>');        
		if(length > max_chara)
		{
	    	$("#group_desc_check").css('border-color', 'red');
	    }
	});
	$('#groupName').keyup(function() {
		$("#groupName").css('border-color', 'rgb(224, 224, 224)');
	});
});
</script>