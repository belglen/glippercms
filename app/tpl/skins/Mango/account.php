<script> 
var cimagesLocation = '<?php echo $_CONFIG['hotel']['url']; ?>/';
var news = new Array();
news[1] = ["{newsID-1}","{newsIMG-1}","{newsCaption-1}","{newsTitle-1}"];
news[2] = ["{newsID-2}","{newsIMG-2}","{newsCaption-2}","{newsTitle-2}"];
news[3] = ["{newsID-3}","{newsIMG-3}","{newsCaption-3}","{newsTitle-3}"];
</script> 
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
	mango.news.init();
});
</script> 

<div class="bgtop"></div>
<div id="header_bar"> 
<div id="container-me"> 
<div class="mid"> 
<div class="lefts"> 
Welcome, {username}!
</div>
<div class="right">
<span style=""><img src="app/tpl/skins/Mango/images/creditIcon.png" style="vertical-align:middle;margin-right:5px;"/><span>{coins}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<span style=""><img src="app/tpl/skins/Mango/images/pixelIcon.png" style="vertical-align:middle;margin-right:5px;"/>{activitypoints}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<span style=""><img src="app/tpl/skins/Mango/images/icon_users.png" style="vertical-align:middle;margin-right:5px;"/><script src="http://code.jquery.com/jquery-latest.js"></script>
{online} {hotelName}'s Online!
</span> 
</div> 
</div> 
</div> 
</div> 

<div id="content"> 
<div id="headertje">
<div id="margin" style="margin-left: 15px; margin-top: 33px;"></div> 
<div id="enter-hotel" style="margin-top:40px; margin-right: 5px;">
<div class="open" style="margin-top: -45px;">
<a href="index.php?url=client" target="ClientWndw" onclick="window.open('index.php?url=client','ClientWndw','width=980,height=597,resizable=1');return false;">Enter {hotelName} Hotel<i></i></a><b></b>
</div>
</div>
</div>

<div id="menubalkie">
<span class="class1">
<div class="menuitems"><a href="index.php?url=me"><b>{username}</b></a></div>
<div class="menuitems"><a href="index.php?url=news">Community</a></div>
<div class="menuitems"><a href="index.php?url=logout">Log out</a></div>
{housekeeping}
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=me">Homepage</a></div>
<div class="menuitems2"><a href="index.php?url=account"><b>Account Settings</b></a></div>
</span>
</div>

<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Account Settings</h2> 
</div> 
<div class="content-box-content"> 
<?php if(isset($template->form->error)) { echo '<div id="message">'.$template->form->error.'</div>'; } ?>
From here you can modify your account information such as email address and password! <br/> 
<br/> 
<form action="" method="post"> 
<table width="766" border="0"> 
<tr> 
<td width="150"><strong>Email</strong></td> 
<td width="606"><input name="acc_email" type="text" id="email" value="{email}"/></td> 
</tr> 
<tr> 
<td><strong>Motto</strong></td> 
<td><label for="motto"></label> 
<input name="acc_motto" type="text" id="motto" value="{motto}"/></td> 
</tr> 
<tr> 
<td width="150">&nbsp;</td> 
<td width="500"><i>Only fill out passwords if you wish to change them.</i></td> 
</tr> 
<tr> 
<td><strong>Current Password:</strong></td> 
<td><input type="password" name="acc_old_password" id="password"/></td> 
</tr> 
<tr> 
<td><strong>New Password:</strong></td> 
<td><input type="password" name="acc_new_password" id="confirm_password"/></td> 
</tr> 
<tr> 
<td>&nbsp;</td> 
<td><input type="submit" name="account" id="button" value="Update"/></td> 
</tr> 
</table> 
</form> 
</div> 
</div> 
</div> <div id="main_right"> 
<div id="top_stories"> 
<div id="top-story"> 
<div id="top-snippet"></div> 
</div> 
<div id="top-headlines-holder"> 
<div class="subnews_1"><a href="index.php?url=news&id={newsID-1}">{newsTitle-1} &raquo;</a> 
<div class="sub-news-date">{newsDate-1}</div> 
</div> 
<div class="subnews_0"><a href="index.php?url=news&id={newsID-2}">{newsTitle-2} &raquo;</a> 
<div class="sub-news-date">{newsDate-2}</div> 
</div> 
<div class="subnews_1"><a href="index.php?url=news&id={newsID-3}">{newsTitle-3} &raquo;</a> 
<div class="sub-news-date">{newsDate-3}</div>
</div> 
<div style="text-align:right; margin:3px;"><a href="news">More news &raquo;</a></div> 
</div> 
</div> 
<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> 
<div id="clear"></div>
<br />
</div></body></html>