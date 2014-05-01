<?php
include 'system/header.php';
include 'inc/sollinav.php'
?>
</span>
</div>

<div id="marginy">
	<div id="main-left">
		<br><br><br>
		<div class="glipperflexbox">
			<div class="glipperflexbar">
				<h2 class="title">Solliciteren</h2>
			</div>
			<div class="glipperflexcont" style="padding: 0px 70px 20px 70px;">
				<div class="solli-1">
					<div class="solli-2">
						<h1>Proef-Moderator    <img src="r63/c_images/album1584/PMOD.gif"></h1>
						<div class="summary clearfix">
							<div class="solli-3">
								<div class="solli-lol-box1" id="solli-lol-box1">
									<p>Spammers, hackers en zelfs spelers die opeens reclame gaan maken! Als Moderator ben jij verantwoordelijk om het hotel veilig te maken en ook zo te houden. Je houd dus de 'bad-guys' buiten en je staat altijd klaar voor noodoproepen. Hiervoor moet je maximale kennis hebben van Glipper en alles wat er mee te maken heeft. Naast al deze taken die je krijgt heb je ook veel zeggenschap binnen Glipper!</p>
								</div>
                                <div class="solli-lol-box1" id="solli-lol-box2" style="display: none;">
                                	<p>
                                    	<strong>
                                            <input id="expres" type="text" placeholder="Ervaringen.." name="exp_pmod" />
                                            <br />
                                            <textarea id="whyshould" placeholder="Waarom jou aannemen?.." name="why_pmod" class="inputje"></textarea>
                                            <br />
                                            <textarea id="wannachange" placeholder="Wat wil je in Glipper verbeteren?.." name="what_pmod" class="inputje"></textarea>
                                        </strong>
                                    </p>
                                </div>
							</div>
							<div class="solli-4">
								<p id="first">Enige intresse? Solliciteer dan snel!</p>
								<center id="lol">
                                	<a href="#" id="pmod">
                                        <img src="app/tpl/skins/Paint/images/open.png">
                                    </a>
								</center>
								<center id="lol1" style="display: none;">
                                	<a href="#" id="pmod-go">
                                        <img src="app/tpl/skins/Paint/images/open.png">
                                    </a>
								</center>
							</div>
						</div>
					</div>
				</div>
				<div class="solli-1">
					<div class="solli-2" style="">
						<h1>Event manager    <img src="r63/c_images/album1584/EV1.gif"></h1>
						<div class="summary clearfix">
							<div class="solli-3">
								<div class="solli-lol-box1">
									<p>Per maand zijn er genoeg Glipper's die onze website bezoeken. Al deze Glipper's willen vermaakt worden met competities, avtiviteiten en evenementen. Als Event Manager organiseer jij competities, verlotingen, prijsvragen, activiteiten in het hotel en nog veel meer. Ook werk je mee aan grotere campagnes zoals Kerst, Pasen en Halloween. </p>
								</div>
							</div>
							<div class="solli-4">
								<p>Enige intresse? Solliciteer dan snel!</p>
								<center>
                                	<a href="#">
                                        <img src="app/tpl/skins/Paint/images/open.png">
                                    </a>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var thefirsttext = "<p>Spammers, hackers en zelfs spelers die opeens reclame gaan maken! Als Moderator ben jij verantwoordelijk om het hotel veilig te maken en ook zo te houden. Je houd dus de 'bad-guys' buiten en je staat altijd klaar voor noodoproepen. Hiervoor moet je maximale kennis hebben van Glipper en alles wat er mee te maken heeft. Naast al deze taken die je krijgt heb je ook veel zeggenschap binnen Glipper!</p>";

$('#pmod').click(function() {
	$('.summary.clearfix').first().css('border-color', '#F9C');
	$('p#first').first().html("Alles nagelezen? Druk dan op de knop hieronder!");
	$('div.solli-lol-box1').first().html('<img src="app/tpl/skins/Paint/images/loading.gif" style="margin-top: 90px;" /><br />Laden..');
	setTimeout(function() {
		$('div.solli-lol-box1').first().hide();
		$('#solli-lol-box2').first().show();
	}, 1500);
	$('div.solli-lol-box1').first().hide;
	$('#lol').first().hide();
	$('#lol1').first().show();
});
$('#pmod-go').click(function() {
	var expres = $('#expres').val().length;
	var whyshould = $('#whyshould').val().length;
	var wannachange = $('#wannachange').val().length;
	
	if (expres <= 0)
	{
		$('#expres').css('border-color', '#F00');
		var proceed = 0;
	}
	if (whyshould <= 0)
	{
		$('#whyshould').css('border-color', '#F00');
		var proceed = 0;
	}
	if (wannachange <= 0)
	{
		$('#wannachange').css('border-color', '#F00');
		var proceed = 0;
	}
	if ((wannachange > 0 && whyshould > 0 && expres > 0) && (proceed != 1))
	{
		if (wannachange <= 10)
		{
			$('#wannachange').css('border-color', '#F60');
		}
		if (whyshould <= 10)
		{
			$('#whyshould').css('border-color', '#F60');
		}
		if (expres <= 5)
		{
			$('#expres').css('border-color', '#F60');
		}
		if ((wannachange > 10 && expres > 5 && whyshould > 10))
		{
			$('#solli-lol-box2').first().html('<img src="app/tpl/skins/Paint/images/loading.gif" style="margin-top: 90px;" /><br />Laden..');
			
			var expres = $('#expres').val();
			var whyshould = $('#whyshould').val();
			var wannachange = $('#wannachange').val();
			
			$.post('index.php?url=solli&post', {
				expres: expres,
				whyshould: whyshould,
				wannachange: wannachange
			}, function() {
				$('#solli-lol-box2').first().html('<img src="app/tpl/skins/Paint/images/respect.png" style="margin-top: 90px;" /><br />Klaar!');
				setTimeout(function() {
					$('#solli-lol-box2').first().fadeOut(500, function() {
						$('#solli-lol-box1').first().html(thefirsttext);
						$('.summary.clearfix').first().css('border-color', 'rgb(204, 204, 204)');
						$('#solli-lol-box1').first().fadeIn();
						$('#lol1').first().hide();
						$('#lol').first().show();
						$('p#first').first().html("Enige intresse? Solliciteer dan snel!");
						$("input[type=text]").first().val();
						$("textarea").val();
					});
				}, 1000);
			});
		}
	}
});
$(document).ready(function() {
	$('#expres').keyup(function() {
		$("#expres").css('border-color', 'rgb(224, 224, 224)');
	});
	$('#whyshould').keyup(function() {
		$("#whyshould").css('border-color', 'rgb(224, 224, 224)');
	});
	$('#wannachange').keyup(function() {
		$("#wannachange").css('border-color', 'rgb(224, 224, 224)');
	});
});
</script>