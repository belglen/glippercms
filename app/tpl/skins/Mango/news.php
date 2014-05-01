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
<div class="menuitems"><a href="index.php?url=me">{username}</a></div>
<div class="menuitems"><a href="index.php?url=news"><b>Community</b></a></div>
<div class="menuitems"><a href="index.php?url=logout">Log out</a></div>
{housekeeping}
</span>
</div>

<div id="menusubbalkie">
<span class="class2">
<div class="menuitems2"><a href="index.php?url=news"><b>News</b></a></div>
<div class="menuitems2"><a href="index.php?url=staff">{hotelName} Staff</a></div>
</span>
</div>

<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">{newsTitle}</h2> 
</div> 
<div class="content-box-content"> 
{newsContent}</br>
<hr>
<div style="text-align:right;margin-top: 7px;margin-left: 3px; margin-bottom:4px;">Article written by: <b>{newsAuthor}</b> at <strong>{newsDate}</strong></div>
</div> 
</div> 
</div> 
<div id="main_right"> 
<div class="content-box" style="width:300px; margin-top: 0px; background-color:#fff;"> 
 <div class="content-box-deep-blue2" style="width:290px"> 
 <h2 class="title" style="padding:0;line-height:30px;">More articles</h2> 
 </div> 
<div style="padding:10px;"> 
{newsList}
</div> 
</div><br/><br/> 
</div> 
<div id="clear"></div>
<br />
</div></body></html>