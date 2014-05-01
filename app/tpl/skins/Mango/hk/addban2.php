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
          <br />          <?php
include_once('databaseconfig.php');

{ 
$ban_id = mysql_real_escape_string($_POST['ban_id']);
$type = mysql_real_escape_string($_POST['type']);
$user = mysql_real_escape_string($_POST['username']);
$reason = mysql_real_escape_string($_POST['reason']);
$author = mysql_result(mysql_query("SELECT username FROM users WHERE id = '".$_SESSION['user']['id']."' LIMIT 1"), 0);
$expire = mysql_real_escape_string($_POST['expire']);

mysql_query("INSERT INTO bans (id,bantype,value,reason,added_by,expire) VALUES ('$ban_id','$type','$user','$reason','$author','$expire')");
echo ("Ban has been added!"); 
}



?>
<html>
<body>
<h1>Okay. If you see 'Ban has been added!' at the top, then it has completed successfully.</h1>


 </div>

      </div>
    </div>
  </div>
   <font color="black">   <center>Powered by GrapeASE by Grapefruit - Design by Grapefruit</center><br />  <center>Implemented into RevCMS by Kryptos</center><br />

