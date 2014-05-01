<link rel="stylesheet" href="{url}/app/tpl/skins/{skin}/hk/styles/global.css" type="text/css">
 <div id="main">
    <div id="links"></div>
    <div id="header"><img src="{url}/app/tpl/skins/{skin}/images/logo.png" align=right style="margin-right: 480px; margin-top: 5px;">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the color of the logo text -->
         <h1>{hotelname} Housekeeping -- Welcome {username}</h1>
        </div>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <!-- insert your sidebar items here -->
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
           <br />
		   [ <a href='dash'>Return to Dashboard</a> ] [ <a href='logout'>Log out</a> ]<br /> <br />
            <p>
			<?php if(mysql_result(mysql_query("SELECT rank FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0) >= 5)
			{ ?>
			Player Management <br /> <img src='../app/tpl/skins/<?php echo $_CONFIG['template']['style']; ?>/hk/images/line.png'> <br />
			
			&raquo; <a href='vip'>Give a user Regular VIP</a> <br />
			
			&raquo; <a href='edit'>Edit a users account</a> <br />
			<br />
			Administration <br /> <img src='../app/tpl/skins/<?php echo $_CONFIG['template']['style']; ?>/hk/images/line.png'> <br />
			&raquo; <a href='news'>Post news article</a><br />
			&raquo; <a href='delnews'>Delete a news article (By ID)</a><br />
			&raquo; <a href='cmdlogs'>Command logs</a><br />
			<br />
			<?php } if(mysql_result(mysql_query("SELECT rank FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0) >= 4) { ?>
			Moderation <br /> <img src='../app/tpl/skins/<?php echo $_CONFIG['template']['style']; ?>/hk/images/line.png'> <br />
			&raquo; <a href='banlist'>Ban List</a> <br />
			&raquo; <a href='ip'>IP lookup</a> <br />
			&raquo; <a href='unban'>Unban a User</a> <br />&raquo; <a href='addban'>Ban a user</a><br />
			<br />
			Badges <br /> <img src='../app/tpl/skins/<?php echo $_CONFIG['template']['style']; ?>/hk/images/line.png'> <br />
			&raquo; <a href='listbadge'>List badges</a><br />&raquo; <a href='addbadge'>Add a badge</a><br />&raquo; <a href='delbadge'>Delete a badge</a><br />
			
			<?php } ?>
			<br />
			Statistics<br />
			<img src='../app/tpl/skins/<?php echo $_CONFIG['template']['style']; ?>/hk/images/line.png'> <br />
					Server Status: 
			{status} <br />
			{online} user(s) online <br />
	
			</p>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content_container">

        <div id="content">
          <!-- insert the page content here -->
          <br />          
<form method="post" action="timer2">
	Timer (in minutes)<br />
	<input type="text" name="timer"/> <br /> <br />
	Pixels (per minutes of timer set above) <br />
	<input type="text" name="pixels"/> <br /> <br />
	Credits (per minutes of timer set above)<br />
	<input type="text" name="credits"/> <br /> <br />
	<input type="submit" value="Change Timer" name="timer1" />
	</form>

 </div>

      </div>
    </div>
  </div>
   <font color="black">   <center>Powered by GrapeASE by Grapefruit - Design by Grapefruit</center><br />  <center>Implemented into RevCMS by Kryptos</center><br />