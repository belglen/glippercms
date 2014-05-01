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
<div class="menuitems2"><a href="index.php?url=me"><b>Homepage</b></a></div>
<div class="menuitems2"><a href="index.php?url=account">Account Settings</a></div>
</span>
</div>

<div id="marginy">
<div id="main_left2"> 
<div class="column" id="column1" style="padding: 0px 0px 0px 0px; width: 914px;"></div>
<div class="myOverview">
					<div id="enter-hotel" style="width:250px;">
						<div class="open" style="float:right;">
							<a href="index.php?url=client" target="ClientWndw" onclick="window.open('index.php?url=client','ClientWndw','width=980,height=597,resizable=1');return false;">Check in! <i></i></a><b></b>
						</div>
					</div>

					<div id="avatar-plate" onclick="location.href='index.php?url=account'">
						<img src="http://www.habbo.com/habbo-imaging/avatarimage?figure={figure}&head_direction=3&direction=3&gesture=sml" alt="{username}" style="margin:0 0 0 15px;" />
					</div>
				</div>

				<div class="avatarinfo">
					<div class="MottoContainer">
						<div class="Usersname" style="margin-top:4px; margin-left: 6px;"><strong>{username}:</strong> {motto}</div>
						<div class="Usersmotto" style="min-width:200px; min-height:30px;"></div>
						<input class="UserMotto" type="text" value="" style="display:none"/>
					</div>
				</div><br />

<div class="content-box3"> 
<div class="content-box-smaller"> 
<h2 class="title">{hotelName}'s Exclusive!</h2> 
</div> 
<div class="content-box-content"> 
<div class="campaign_images"> 
<img src="app/tpl/skins/Mango/images/exclusive.gif"></img>
</div> 
<div class="campaign_content"> 
<strong>
PainterCMS (based on RevCMS)
</strong><br />
PainterCMS is a original Mango Style edit.<br>
Copyright goes to Yvo (Holomind).
</div> 
<p class="gothere"><a href="index.php?url=me">More information &raquo;</a></p> 
<div style="clear:both;"></div> 
</div></div>
</div> 
</div>

<div id="main_right2"> 
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

<div class="content-box" style="width:300px;  margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Twitter</h2> 
	  </div> 
	  <div class="content-box-content">
<div class="texty" style="margin-left:-3px;">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 2,
  interval: 6000,
  width: 285,
  height: 120,
  theme: {
    shell: {
      background: 'F0F0F0',
      color: '#000000'
    },
    tweets: {
      background: '#f0f0f0',
      color: '#666666',
      links: '#000000'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    hashtags: false,
    timestamp: false,
    avatars: true,
    behavior: 'all'
  }
}).render().setUser('{twitter}').start();
</script>
</div>	
	  </div></div>
</div>
</script> 
</div>

<div id="main_side"> 
<div class="content-box4" style="margin-bottom: 13px;" align="center">
<div class="content-box-smallest">
 <h2 class="title" style="padding:0;line-height:30px;">Social Network</h2> 
</div>
<br />
			<strong>Follow us today!</strong> <br /><br />
<A href="http://facebook.com/{facebook}/" target=_blank"><img src="http://www.joshoon.com/images/facebook.png" border="0"></a>&nbsp;&nbsp;

			<A href="http://twitter.com/#!/{twitter}" target=_blank"><img src="http://www.joshoon.com/images/twitter.png" border="0"></a><br /><br />
Stay up-to-date.
<br /><br />
</div>


<div class="content-box4" style="margin-bottom: 13px;">
<div class="content-box-smallest">
 <h2 class="title" style="padding:0;line-height:30px;">Vote for us</h2> 
</div>
<center><br /><strong>Vote</strong> everyday for us for more players and a bigger community!<br /><br />
<a href="http://thehabbos.org/vote/{thehabbos}"><img src="http://thehabbos.org/button.php?u=xenHotel" alt="Habbo Retros (Habbo) - Play Habbo for Free!" border="0" /></a>
<br /><br />
</center>
</div>
</div>
<div id="clear"></div>
<br />
</div></body></html>