$(document).ready(function(){var currentPosition=0;var slideWidth=586;var slides=$('.slides');var numberOfSlides=slides.length;var slideShowInterval;var speed=5000;slideShowInterval=setInterval(changePosition,speed);slides.wrapAll('<div class="slide_holder"></div>')
slides.css({'float':'left'});$('.slide_holder').css('width',slideWidth*numberOfSlides);$('.slider').prepend('<span class="nav" id="nav_left">Left</span>').append('<span class="nav" id="nav_right">Right</span>');manageNav(currentPosition);$('.nav').bind('click',function(){currentPosition=($(this).attr('id')=='nav_right')?currentPosition+1:currentPosition-1;manageNav(currentPosition);clearInterval(slideShowInterval);slideShowInterval=setInterval(changePosition,speed);moveSlide();});function manageNav(position){if(position==0){$('#nav_left').hide()}
else{$('#nav_left').show()}
if(position==numberOfSlides-1){$('#nav_right').hide()}
else{$('#nav_right').show()}}
function changePosition(){if(currentPosition==numberOfSlides- 1){currentPosition=0;manageNav(currentPosition);}else{currentPosition++;manageNav(currentPosition);}
moveSlide();}
function moveSlide(){$('.slide_holder').animate({'marginLeft':slideWidth*(-currentPosition)});}});function previewAvatar(el){var newsrc='./avatar.php?figure='+ el+'&direction=4&head_direction=4&size=l';$('.selected_avatar_display').fadeOut(300,function(){$(this).attr('src',newsrc).bind('onreadystatechange load',function(){if(this.complete)$(this).fadeIn(300);});});document.getElementById('rAvatar').value=''+ el+'';}
function newPopup(url){popupWindow=window.open(url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')}