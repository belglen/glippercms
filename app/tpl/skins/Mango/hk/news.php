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

if(mysql_result(mysql_query("SELECT rank FROM users WHERE id = '" . $_SESSION['user']['id'] . "'"), 0) >= 5)
{
	if(isset($_GET["done"]))
	{
		$get = filter($_GET["done"]);
		if($get == true)
		{
			echo '<h3>Article posted.</h3>';
			exit;
		}
	}
	if(isset($_POST["step1"]))
	{
		if($_POST["title"] == NULL || $_POST["shortstory"] == NULL || $_POST["longstory"] == NULL)
		{
			echo "<h2>Please fill in all the fields!</h2>";
		}
		else
		{
			$_SESSION["title"] = filter($_POST["title"]);
			$_SESSION["shortstory"] = filter($_POST["shortstory"]);
			$_SESSION["longstory"] = mysql_real_escape_string($_POST["longstory"]);
			
			header("Location: ".$_CONFIG['hotel']['url']."/ase/news2");
			exit;
		}
			
	}
	else
	{ ?>
	
	<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	      <script type="text/javascript">
		  tinyMCE.init({
          mode : "textareas",
          theme : "simple",
          editor_selector : "mceEditor",
          editor_deselector : "mceNoEditor"
		  });
		  </script>

	<form method="post">
	Title of the news article <br />
	<input type="text" name="title"/> <br /> <br />
	Short story <br />
	<input type="text" name="shortstory"/> <br /> <br />
	Main story <br />
	<textarea id="content1" name="longstory"  cols="85" rows="10" class="mceEditor"></textarea>
	<br /> <br /> <input type="submit" value="  Proceed to next step (Image chooser)  " name="step1" />
	</form>
	<?php
	}
}

?>