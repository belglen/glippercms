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
 <table width="100%">
<tr><td><b>Username:</b></td><td><b>Email:</b></td><td><b>IP:</b></td></tr>
<?php                               

include_once('databaseconfig.php');  // Make a MySQL Connection
$ip_last = mysql_real_escape_string($_POST['ip_last']);
$lerp = mysql_query("SELECT * FROM users WHERE ip_last = '$ip_last'");
echo "There are " . mysql_num_rows($lerp) . " account(s) on this IP. <br /><br />";





                                $query = "SELECT username FROM users WHERE ip_last='$ip_last' ORDER by id DESC"; 
     
                                $result = mysql_query($query) or die(mysql_error());
								
								$query2 = "SELECT mail FROM users WHERE ip_last='$ip_last' ORDER by id DESC"; 

$result2 = mysql_query($query2) or die(mysql_error());


                                while($row = mysql_fetch_array($result))
								while($row2 = mysql_Fetch_Array($result2))
                                {
                                echo("<tr>");
                                echo("<td>" . $row['username'] . "</td>");
                                echo("<td>" . $row2['mail'] . "</a></td>");
								echo("<td>" . $ip_last . "</td>");
							
								
                                
                               
                                }
                                ?>

</table>
        </div>

      </div>
    </div>
  </div>
   <font color="black">   <center>Powered by GrapeASE by Grapefruit - Design by Grapefruit</center><br />  <center>Implemented into RevCMS by Kryptos</center><br /><table width="100%">
<tr><td><b>Username</b></td><td><b>E-Mail</b></td><td><b>IP</b></td></tr>
<?php
	if(isset($_POST['get_ip']))
	{
		$derp = mysql_fetch_array(mysql_query("SELECT ip_last FROM users WHERE username = '" . filter($_POST['username']) . "'"), MYSQL_ASSOC);
		$lerp = mysql_query("SELECT * FROM users WHERE ip_last = '" . $derp['ip_last'] . "'");
		
		echo "There are " . mysql_num_rows($lerp) . " account(s) on this IP. <br /><br />";
		while($ferp = mysql_fetch_array($lerp, MYSQL_ASSOC)) {
		echo "<tr><td>" . $ferp['username'] . "</td><td>" . $ferp['mail'] . "</td><td>" . $ferp['ip_last'] . "</td></tr>"; }
	} ?>
	
	
</table>