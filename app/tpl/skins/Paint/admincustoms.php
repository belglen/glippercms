<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>
<script>
$(document).ready(function () {
    var counter = 1;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
       } else {
            $('#one').hide();
            $('#two').show();
            clearInterval(id);
       }
    }, 1000);
});
$(document).ready(function () {
    var counter2 = 4;
    var id2 = setInterval(function() {
       counter2--;
       if(counter2 > 0) {
       } else {
            $('#twotwo').show();
            clearInterval(id2);
       }
    }, 1000);
});
</script>

<style>

h1{
	font-family:Rancho;
	text-align:center;
	font-size:72px;
	text-shadow: 0.04em 0.04em #FFFFFF,  0.08em 0.08em #1ba29a;
	/*text-shadow:side top-down #color */
}
.twoo{
	font-family:Rancho;
	font-size:40px;
	text-shadow: 0.04em 0.04em #FFFFFF, 0.08em 0.08em #ed77a6;
	text-align:center;
}
#mblfireworks{
	display: block;     
	width: 1000px;
	height: 200px;
	float: center;
	color:#6F6F6F;
	text-align: center;
	font-size: 12px;
}
#mblfireworks a {
	color:#6F6F6F;
}
</style>
<script src="http://mybloggerlab.com/Scripts/fireworks.js" type="text/javascript"></script>

<script>
/*Fire Works By MyBloggerLab.com*/  
jQuery(function($){              
Xteam.fireworkShow('#mblfireworks', 100);                
});  
</script>
<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Ontspanning</h2> 
</div> 
<div class="glipperflexcont">
<div id="container2"></div>
<div id="twotwo" style="display:none;"><br />> Klaar! Je wordt doorgestuurd.. <?php header("refresh:7;url=index.php?url=admincustoms2"); ?> </div>
<span id="one">
<h1 class="onee">Tijd voor ontspanning!</h1>
<h2 class="twoo">Blijf even, er gaat wat gebeuren!..</h2>
</span>
</div> 
</div>
<span id="two" style="display:none;">
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<span id="mblfireworks"></span>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script><script>
/*-------------------------
My Simple Typewriter Animated Script
--------------------------*/
(function($){
	$.fn.shuffleLetters = function(prop){
		var options = $.extend({
			"step"		: 8,	
			"fps"		: 25,	
			"text"		: "",
			"callback"	: function(){}
		},prop)
		
		return this.each(function(){
			
			var el = $(this),
				str = "";
			if(el.data('animated')){
			return true;
			}
			el.data('animated',true);
			if(options.text) {
				str = options.text.split('');
			}
			else {
				str = el.text().split('');
			} 
			var types = [],
				letters = [];
			for(var i=0;i<str.length;i++){
				
				var ch = str[i];
				
				if(ch == " "){
					types[i] = "space";
					continue;
				}
				else if(/[a-z]/.test(ch)){
					types[i] = "lowerLetter";
				}
				else if(/[A-Z]/.test(ch)){
					types[i] = "upperLetter";
				}
				else {
					types[i] = "symbol";
				}
				
				letters.push(i);
			}
			el.html("");			
			(function shuffle(start){
				var i,
					len = letters.length, 
					strCopy = str.slice(0); 
				if(start>len){ 
					el.data('animated',false);
					options.callback(el);
					return;
				}
				for(i=Math.max(start,0); i < len; i++){
					if( i < start+options.step){
						strCopy[letters[i]] = randomChar(types[letters[i]]);
					}
					else {
						strCopy[letters[i]] = "";
					}
				}
				el.text(strCopy.join(""));
				setTimeout(function(){
					shuffle(start+1);
				},1000/options.fps);
			})(-options.step);
		});
	};
	function randomChar(type){
		var pool = "";
		if (type == "lowerLetter"){
			pool = "abcdefghijklmnopqrstuvwxyz0123456789";
		}
		else if (type == "upperLetter"){
			pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		else if (type == "symbol"){
			pool = ",.?/\\(^)![]{}*&^%$#'\"";
		}
		var arr = pool.split('');
		return arr[Math.floor(Math.random()*arr.length)];
	}
})(jQuery);
$(function(){
	var container = $("#container2")
	userText = $('#userText'); 
	container.shuffleLetters();
	userText.click(function () {
	userText.val("");
	}).bind('keypress',function(e){
	if(e.keyCode == 13){
	container.shuffleLetters({
	"text": userText.val()
		});
	userText.val("");
		}
	}).hide();
	setTimeout(function(){
	container.shuffleLetters({
	"text": "> Updaten naar feest-mode..."
		});
		userText.val("Type and hit Enter here !!").fadeIn();
	},1000);
});</script>
<div id="mblfireworks"></div> 
</span>
