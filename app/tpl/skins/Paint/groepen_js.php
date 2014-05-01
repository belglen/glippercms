<?php
exit();
?>
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
