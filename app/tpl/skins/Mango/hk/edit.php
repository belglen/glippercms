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
         <?php
          
        if(isset($_POST['update']))
		{
			mysql_query("UPDATE users SET username = '" . filter($_POST['username']) . "', mail = '" . filter($_POST['email']) . 		"', motto = '" . filter($_POST['motto']) . "', rank = '" . filter($_POST['rank']) . "', credits = '" . filter($_POST['credits']) . "', activity_points = '" . filter($_POST['pixels']) . "' WHERE username = '" . filter($_POST['username_current']) . "'") or die(mysql_error());
			 	echo $_POST['username_current'] . "'s account updated."; 
		}
		

if(isset($_POST['lookup']))
{	
	
	if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '". filter($_POST['l_username']) ."'")) == 0) { echo "User does not exist."; }
	else { 
				$two = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '" . filter($_POST['l_username']) . "'"));
	?>
	
	Editing account: <?php echo $username; ?></a>
	<form method='post'>
	<input type="hidden" name="username_current" value="<?php echo $_POST['l_username']; ?>" />
	
		<table style="width: 100%;">
				
			<tr>
				<td>Username</td></td>
				<td><input type="text" name="username" value="<?php echo $_POST['l_username']; ?>" style="width: 95%" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $two['mail']; ?>" style="width: 95%" /></td>
			</tr>
			<tr>
				<td>Motto</td>
				<td><input type="text" name="motto" value="<?php echo $two['motto']; ?>" style="width: 95%" /></td>
			</tr>
			<tr>
				<td>Rank</td>
				<td><input type="text" name="rank" value="<?php echo $two['rank']; ?>" style="width: 95%" /></td>
			</tr>
			<tr>
				<td>Credits</td>
				<td><input type="text" name="credits" value="<?php echo $two['credits']; ?>" style="width: 95%" /></td>
			</tr>
			<tr>
				<td>Pixels</td>
				<td><input type="text" name="pixels" value="<?php echo $two['activity_points']; ?>" style="width: 95%" /></td>
			</tr>
		</table>
		<input type="submit" value="  Update account  " name="update"/>
	</form>
	<br />
	<?php
	}
	}
	?>

	<form method='post'>
	Username <br /> <input type="text" name="l_username" /> <br /> <br />
	<input type="submit" value="  Lookup user  " name="lookup"/>
	</form>

</div>
        </div>

      </div>
    </div>
  </div>
   <font color="black">   <center>Powered by GrapeASE by Grapefruit - Design by Grapefruit</center><br />  <center>Implemented into RevCMS by Kryptos</center><br />