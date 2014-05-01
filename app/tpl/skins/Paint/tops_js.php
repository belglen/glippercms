<?php
header("Location: index");
exit();
?>
$(document).ready(function () {
	Cufon.replace('ubuntu');
    $('#pi').click(function () {
        $('#cr').removeClass('selected');
        $('#st').removeClass('selected');
        $('#ca').removeClass('selected');
        $('#ko').removeClass('selected');
        $('#ur').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Pixels');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$.post('jquery.php',{type:'activity_points'},function(result) {
				$('.content-box-content').first().html(result);
				$('.content-box-content').fadeIn();
				Cufon.replace('.content-box-content');
			});
		});
    });
    $('#cr').click(function () {
        $('#pi').removeClass('selected');
        $('#st').removeClass('selected');
        $('#ca').removeClass('selected');
        $('#ko').removeClass('selected');
        $('#ur').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Credits');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$('.content-box-content').first().fadeIn();
			$('.content-box-content').first().html('...');
			$.post('jquery.php',{type:'credits'},function(result) {
				$('.content-box-content').first().html(result);
				Cufon.replace('.content-box-content');
			});
		});
    });
    $('#st').click(function () {
        $('#pi').removeClass('selected');
        $('#cr').removeClass('selected');
        $('#ca').removeClass('selected');
        $('#ko').removeClass('selected');
        $('#ur').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Sterren');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$('.content-box-content').first().fadeIn();
			$('.content-box-content').first().html('...');
			$.post('jquery.php',{type:'vip_points'},function(result) {
				$('.content-box-content').first().html(result);
				Cufon.replace('.content-box-content');
			});
		});
    });
    $('#ca').click(function () {
        $('#pi').removeClass('selected');
        $('#cr').removeClass('selected');
        $('#st').removeClass('selected');
        $('#ko').removeClass('selected');
        $('#ur').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Cadeaupunten');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$('.content-box-content').first().fadeIn();
			$('.content-box-content').first().html('...');
			$.post('jquery.php',{type:'sorry_points'},function(result) {
				$('.content-box-content').first().html(result);
				Cufon.replace('.content-box-content');
			});
		});
    });
    $('#ko').click(function () {
        $('#pi').removeClass('selected');
        $('#cr').removeClass('selected');
        $('#st').removeClass('selected');
        $('#ur').removeClass('selected');
        $('#ca').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Koekjes');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$('.content-box-content').first().fadeIn();
			$('.content-box-content').first().html('...');
			
			$.post('jquery.php',{type:'Respect'},function(result) {
				$('.content-box-content').first().html(result);
				Cufon.replace('.content-box-content');
			});
		});
    });
    $('#ur').click(function () {
        $('#pi').removeClass('selected');
        $('#cr').removeClass('selected');
        $('#st').removeClass('selected');
        $('#ko').removeClass('selected');
        $('#ca').removeClass('selected');
        $(this).addClass('selected');
		$('.title').first().fadeOut(500, function() {
			$('.title').first().html('Top 10 Uren');
			$('.title').first().fadeIn(500);
		});
		$('.content-box-content').first().fadeOut(500, function() {	
			$('.content-box-content').first().fadeIn();
			$('.content-box-content').first().html('...');
			
			$.post('jquery.php',{type:'OnlineTime'},function(result) {
				$('.content-box-content').first().html(result);
				Cufon.replace('.content-box-content');
			});
		});
    });
});
