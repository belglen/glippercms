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
<div class="menuitems2"><a href="index.php?url=news">News</a></div>
<div class="menuitems2"><a href="index.php?url=staff"><b>{hotelName} Staff</b></a></div>
</span>
</div>

<div id="main_left"> 
<?php
	$GetRanks = mysql_query("SELECT id,name FROM ranks WHERE id > 3 ORDER BY id DESC");
	while($Ranks = mysql_fetch_assoc($GetRanks))
	{
		echo "<div class=\"content-box\" style=\"background-color:#fff\"><div class=\"content-box-deep-blue\"><h2 class=\"title\" style=\"padding:0;line-height:30px;\">{$Ranks['name']}s</h2></div><div class=\"content-box-content\"><p>";
		$GetUsers = mysql_query("SELECT username,motto,rank,last_online,online,look FROM users WHERE rank = {$Ranks['id']}");
		while($Users = mysql_fetch_assoc($GetUsers))
		{
			if($Users['online'] == 1){ $OnlineStatus = "<font color=\"darkgreen\"><blink><b>Online</b></blink></font>"; } else { $OnlineStatus = "<font color=\"darkred\"><marquee><b>Offline</b></marquee></font>"; }
			echo "<img style=\"position:absolute;\" src=\"http://www.habbo.com/habbo-imaging/avatarimage?figure={$Users['look']}&head_direction=3&direction=3&gesture=sml\">"
				."<p style=\"margin-left:80px;margin-top:20px;\">Username: <strong>{$Users['username']}</strong><br>Motto: <strong>{$Users['motto']}</strong><br>Last visit: <b>". date("D, d F Y H:i", $Users['last_online']) ."</b></p>"
				."<p style=\"float:right;margin-top:-30px;\">{$OnlineStatus}</p><br><br><br>";
		}
		echo "</p></div></div><br>";
	}
?></div>
<div id="main_right"> 
		<div class="content-box" style="width:300px;background-color:#fff;"> 
	  <div class="content-box-deep-blue" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Staff applications</h2> 
	  </div> 
	  <div class="content-box-content"> 
	    <p>
They are at this moment closed.
		</p>
	  </div>
	</div><br/>
	
	<div class="content-box" style="width:300px;background-color:#fff;"> 
	  <div class="content-box-deep-blue" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Who are these people?</h2> 
	  </div> 
	  <div class="content-box-content"> 
	    <p>
			The {hotelName} Hotel staff are people who have the power and authority to maintain the hotel. This covers everything
			from banning users to hosting events, giving users credits and much more. To find a staff member in the hotel
			you will need to look for a user who has a badge like the one below.
		</p>
	  </div>
	</div>
</div> 
<div id="clear"></div>
<br />
</body></html>