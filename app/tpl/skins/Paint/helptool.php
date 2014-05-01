<?php
include 'system/header.php';
include 'inc/homenav.php';

$usertje = new User($_SESSION['user']['id']);
$userid = (int)$_SESSION['user']['id'];
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box">
	<div class="content-box-deep-blue"> 
		<h2 class="title">Mijn tickets</h2> 
	</div> 
	<div class="content-box-content" id="overzicht"> 
    	<?php
		$begin = ($_GET['p'] >= 0) ? $_GET['p']*5 : 0;;
		
		$ticket['query'] = mysql_query("
		SELECT ht.*, u.id as userid, u.username
			FROM helptool_tickets ht
				JOIN users u
					ON (u.id = ht.user_id AND ht.user_id = $userid)
						ORDER BY status ASC
							LIMIT $begin,20
		");
		if (mysql_num_rows($ticket['query']) <= 0)
		{
			print
			('
			<i>
				Je hebt nog geen tickets gemaakt, hiernaast kan je er een aanmaken!
			</i>
			');
		}
		while ($ticket['fetch'] = mysql_fetch_assoc($ticket['query']))
		{
			$ticket['status']['var'] = $ticket['fetch']['status']=='orange'?'nieuw':($ticket['fetch']['status']=='green'?'geantwoord':'gesloten');
			$ticket['fetch']['subject'] = strlen($ticket['fetch']['subject'])>50?substr($ticket['fetch']['subject'], 0, 60)."...":substr($ticket['fetch']['subject'], 0, 50);
		?>
        <a href="index.php?url=tickettool&amp;id=<?php echo $ticket['fetch']['id'];?>" class="mi" id="xdsf">
            <span id="ticket" class="hotspot" onmouseover="tooltip.show('<strong>Ticket informatie</strong><br />Er heeft nog niemand op dit ticket geantwoord.<br>De status is \'<?php echo $ticket['status']['var']; ?>\'.<br><br><a href=\'#\' style=\'text-decoration: none; color: white;\'>Klik hier om het ticket te bekijken (en eventuele reacties)</a>');" onmouseout="tooltip.hide();">
            
                <div class="menuitem">
                   <img src="app/tpl/skins/Paint/images/b_<?php echo $ticket['fetch']['status']; ?>.png"><span id="wajoowdfs"> <?php echo $ticket['fetch']['subject']; ?></span><span class="rightss" style="text-align: right !important;"><?php echo mysql_num_rows(mysql_query("SELECT * FROM helptool_tickets_reacties WHERE ticket_id = '".$ticket['fetch']['id']."'")); ?> reactie(s)</span>
                </div>
            </span>
        </a>
        <div id="titel" style="display:none;"></div>
        <div id="hetbericht" style="display:none;">qsdfqsdf<?php echo $ticket['fetch']['message']; ?></div>
        <?php
		}
		?>
    </div>
	<div class="content-box-content" id="makeTicket" style="display: none;"> 
        <span id="loading"></span>
        <span id="no_loading">
        	Waar gaat je ticket over?<br />
        	<select id="whereAbout">
        		<option value="0">Kies hier</option>
        		<option value="1">Anders, overig</option>
        		<option value="2">Belangrijke vraag</option>
        		<option value="3">Iemand overtreed de regels</option>
        		<option value="4">Iemand pest mij</option>
        		<option value="5">Ik ben gehackt/zie een hacker</option>
        		<option value="6">Ik heb een ernstige bug gevonden</option>
            </select>
        	<br /><br /><br />
            Beschrijf het probleem in een paar woorden
           	<br /><input type="text" class="helpdesk_input" placeholder="Bijvoorbeeld; Len heeft mijn sterren gestolen!" id="subj" maxlength="100" />
            <br />
            <br />
            <br />
            Wat wil je erover zeggen, kan je meer informatie geven?<br />
            <textarea id="msg" spellcheck="false" class="fqsdfsdf" /></textarea>
            <br /><br /><br />
            <input type="submit" id="clickGo" class="glipperflexbtn" value="Ticket verzenden" />
        <br clear="all" />
        </span>
    </div>
</div>
<br />
</div> 
<div id="main_right"> 


<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">Tekens</h2> 
	</div> 
	<div class="content-box-content"> 
		<img src='app/tpl/skins/Paint/images/b_green.png' > Ticket geantwoord <br />
		<img src='app/tpl/skins/Paint/images/b_orange.png' > Ticket in wacht/in behandeling <br />
		<img src='app/tpl/skins/Paint/images/b_red.png' > Ticket gesloten
	</div>	
</div>	
<div class="content-box_news" style="margin-top: 12px;width:300px;background-color:#fff;margin-bottom:13px;">
<div class="content-box-content">
	<a class="mi" id="overzichts" href="#">
		<div class="menuitem">
			Ticket overzicht
		</div>
	</a>
	<a class="mi" id="aanmaken" href="#">
		<div class="menuitem">
			Ticket aanmaken
		</div>
	</a>
    <?php
	if ($usertje->isStaff == '1')
	{
	?>
	<a class="mi" id="aanmaken" href="index.php?url=helppanel">
		<div class="menuitem">
			Paneel
		</div>
	</a>
    <?php
	}
	?>
</div></div>
</div>
</div>
<script>
$(function() {
	$('#xdsf').on('click', '#ticket', function() {
		$('#hetbericht').next('#hetbericht').show();
	});
	$('#xdsf #hetbericht').hide();
});

//<!--   ▲  --> //
//<!--  ▲▲ --> //
//<!-- ▲▲▲ --> //
//<!--▲▲▲▲ --> //

$('#aanmaken').click(function() {
	$('#overzicht').hide();
	$('#makeTicket').show();
	$('h2').first().html('Maak een ticket aan');
	$('span#loading').first().html('<center><img src="app/tpl/skins/Paint/images/loading.gif" /> <br />Laden...</center>');
	
	setTimeout(function() {
		$('#loading').html('');
		$('#no_loading').show();
	}, 1000);
});
$('#overzichts').last().click(function() {
	$('#makeTicket').hide();
	$('#no_loading').hide();
	$('#overzicht').first().show();
	$('h2').first().html('Mijn tickets');
	$("input[type=text]").val("");
	$("textarea").val("");
	$("input[type=text]").css('border-color', 'rgb(224, 224, 224)');
	$("textarea").css('border-color', 'rgb(224, 224, 224)');
});
$('#clickGo').click(function() {
	var lengthh1 = $('#subj').val().length;
	var lengthh2 = $('#msg').val().length;
	
	var ticketabout = $('#whereAbout').val();
	var subject = $('#subj').val();
	var message = $('#msg').val();
	
	if (subject == "" || lengthh1 < 10)
	{
		$('#subj').css("border-color", '#F00');
		var proceed = 0;
	}
	if (message == "" || lengthh2 < 40)
	{
		$('#msg').css("border-color", '#F00');
		var proceed = 0;
	}
	if (ticketabout == 0)
	{
		$('#whereAbout').css("border-color", '#F00');
	}
	if ((message != "" && lengthh2 >= 40) && (subject != "" && lengthh1 >= 10) && (ticketabout != 0))
	{
		var type = $('#whereAbout').val();
		var subject = $('#subj').val();
		var message = $('#msg').val();
		
		$("#whereAbout").css('border-color', 'rgb(224, 224, 224)');
		
		$.post('index.php?url=jquerygroep', {
			type: type,
			subject: subject,
			message: message,
			helptool: 1
		}, function(result) {
			$('#makeTicket').hide();
			$('#no_loading').hide();
			$('#overzicht').first().show();
			$('h2').first().html('Mijn tickets');
			$("input[type=text]").val("");
			$("textarea").val("");
			$("input[type=text]").css('border-color', 'rgb(224, 224, 224)');
			$("textarea").css('border-color', 'rgb(224, 224, 224)');
			window.location = 'index.php?url=helptool';
		});
	}
});
$(document).ready(function() {
	$('#group_desc_check').keyup(function() {
		
	var max_charaa = 100;
	
	var lengthh = $('#subj').val().length;
	var char_leftt = max_charaa - lengthh;

	$("#subj").css('border-color', 'rgb(224, 224, 224)');
	if(lengthh > max_charaa)
	{
		$("#subj").css('border-color', 'red');
	}
	});
	$('#msg').keyup(function() {
		$("#msg").css('border-color', 'rgb(224, 224, 224)');
	});
	$('#subj').keyup(function() {
		$("#subj").css('border-color', 'rgb(224, 224, 224)');
	});
	$('#whereAbout').keyup(function() {
		$("#whereAbout").css('border-color', 'rgb(224, 224, 224)');
	});
});
</script>