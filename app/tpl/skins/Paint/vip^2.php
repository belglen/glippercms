<?php
include 'system/header.php';
include 'inc/shopnav.php'; 
?>
</span>
</div>
<div id="marginy">
<div id="main_left"> 
<div class="glipperflexbox"> 
<div class="glipperflexbar"> 
<h2 class="title">Koop nu VIP
</h2> 
</div>
<div class="glipperflexcont" style="background: #FFFFFF url(app/tpl/skins/Paint/images/berg.png) no-repeat scroll right bottom;"> 
					<div class="floatLeft" style="width: 65%; font-weight: bold; font-size: 14px;">
						Voordelen van VIP<br><br>
						- 25.000 credits en 25.000 pixels.<br>
						- :pull en :push (duw en trek iemand naar je toe)<br>
						- :moonwalk (met dit commando loop je achteruit)<br>
						- :flagme (met dit commando kan je je naam veranderen)<br>
						- :enable (coole effecten)<br>
						- :follow x (volg diegene)<br>
						- :mimic x (kopie�rt de look van diegene)<br><br>
						<br>
						<font color="#0087FF">VIP bent u voor altijd na uw aankoop!</font><br><br>
						<font color="#DF7401">Problemen met uw aankoop?! Contacteer ons op admin@glipper.be</font><br><br>
					</div><br>
					<div class="floatLeft" style="width: 35%; font-size: 16px; color:#0087FF; font-weight: bold;">
						Koop nu VIP voor 40 Sterren!<br><br>
					</div>
						
		<div class="floatLeft" style="color:#DF0101; margin-top: 10px;  margin-left: 50px;">
		<script>
function offline()
	{
		alert("U moet eerst offline zijn om uw product aan te schaffen!");
	}
function sterren()
	{
		alert("U hebt helaas niet genoeg sterren!");
	}
	function isVIP()
	{
		alert("U moet helaas VIP zijn om dit product aan te schaffen!");
	}
	function alVIP()
	{
		alert("U kunt dit product niet meer kopen, omdat het u al bent! ;-)");
	}	
</script>
						<?php
	global $users;
	$userid = $_SESSION['user']['id'];
	$sql = mysql_query("SELECT * FROM users WHERE id = '".$userid."'");
	$mysql = mysql_fetch_assoc($sql);
	
	$vip_points = $mysql['vip_points'];
	$isVIP = $mysql['vip'];
	$min_points = 40;

	if ($isVIP == 1) {
					echo '<input type="button" onclick="alVIP()" name="online" value="Koop nu!">';
		
			} else {
		if (isset($_POST['vip'])) {
			mysql_query("UPDATE users SET vip = '1', vip_points = vip_points - $min_points WHERE id = $userid");
			mysql_query("UPDATE users SET credits = credits +25000 WHERE id = $userid");
			mysql_query("UPDATE users SET activity_points = activity_points +25000 WHERE id = $userid");

			$_SESSION['user']['vip_points'] = $_SESSION['user']['vip_points'] - $min_points;
			$_SESSION['user']['vip'] = 1;
			echo '<div style="margin-top: 20px;">Proficiat! Je bent nu VIP!</div>';
		} else {
			if ($vip_points >= $min_points) {
				echo '<form method="post">';
				
				 	global $users;
	$userid = $_SESSION['user']['id'];

	$GetBasic = mysql_query("SELECT * FROM users WHERE `id` = '".$userid."'");

	while($Basic = mysql_fetch_assoc($GetBasic))
	{
	if ($Basic['online'] == '0') {
	
					echo '<input type="submit" class="glipperflexbtn" name="vip" value="Koop nu!">';
					} else {
					echo '<input type="button" onclick="offline()" name="online" value="Koop nu!">';
}
	}
					
					echo '</form>';
			} else {
		echo '<input type="button" onclick="sterren()" name="online" value="Koop nu!">';

			}
		} 
	}
// }
?>
</div>


</div> 
</div>
<br>
<div class="glipperflexbox"> 
<div class="glipperflexbar"> 
<h2 class="title">Koop nu Super VIP
</h2> 
</div>
<div class="glipperflexcont" style="background: #FFFFFF url(app/tpl/skins/Paint/images/berg.png) no-repeat scroll right bottom;"> 
					<div class="floatLeft" style="width: 45%; font-size: 14px; font-weight: bold;">
						Voordelen van Super VIP<br><br>
						- 35.000 credits en 35.000 pixels.<br>
						- 5 sterren.<br>
						- :spull<br>
						<br>
						<font color="#0087FF">Super VIP ben je voor altijd na uw aankoop!</font><br><br>
						<font color="#DF7401">Problemen?! Contacteer ons op admin@glipper.be</font><br><br>
			<br>
			<br>
			<br>
			
			</div>
					<div class="floatLeft" style="width: 35%; font-size: 16px; color:#0087FF; font-weight: bold; margin-left: 165px;">
						Koop nu Super VIP voor 30 Sterren!<br><br>
					</div>
						
		<div class="floatLeft" style="color:#DF0101; margin-top: 40px; margin-left: -240px;">
	
						<?php
	global $users;
	$userid = $_SESSION['user']['id'];
	$sql = mysql_query("SELECT * FROM users WHERE id = '".$userid."'");
	$mysql = mysql_fetch_assoc($sql);

	$vip_points = $mysql['vip_points'];
	$isVIPplus = $mysql['svip'];
	$min_points = 30;

	if ($isVIPplus == 1) {
					echo '<input type="button" onclick="alVIP()" name="online" value="Koop nu!">';
		
			} else {
		if (isset($_POST['vipplus'])) {
		    mysql_query("UPDATE users SET rank = '3' WHERE id = $userid AND rank < 3");
			mysql_query("UPDATE users SET svip = '1', vip_points = vip_points - $min_points WHERE id = $userid");
			mysql_query("INSERT INTO permissions_users(userid, cmd_spull, cmd_coords, cmd_enable, cmd_update_bots)"
				. " VALUES($userid, 1, 1, 1)");
			mysql_query("INSERT INTO user_badges(user_id, badge_id) VALUES($userid, 'svip')");
			mysql_query("UPDATE users SET credits = credits +35000 WHERE id = $userid");
			mysql_query("UPDATE users SET activity_points = activity_points +35000 WHERE id = $userid");
			mysql_query("UPDATE users SET vip_points = vip_points +5 WHERE id = $userid");
			$_SESSION['user']['vip_points'] = $_SESSION['user']['vip_points'] - $min_points;
			$_SESSION['user']['svip'] = 1;
			echo 'Proficiat! Je bent nu Super VIP!';
		} else {
				echo '<form method="post">';
				
				 	global $users;
	$userid = $_SESSION['user']['id'];

	$GetBasic = mysql_query("SELECT * FROM users WHERE `id` = '".$userid."'");

	while($Basic = mysql_fetch_assoc($GetBasic))
	{
		if ($Basic['vip'] == '1') {
			if ($Basic['online'] == '0') {
				if ($vip_points >= $min_points) {
					echo '<input type="submit" class="glipperflexbtn" name="vipplus" value="Koop nu!">';
				} else {	
					echo '<input type="button" onclick="sterren()" name="online" value="Koop nu!">';
				}
			} else {
				echo '<input type="button" onclick="offline()" name="online" value="Koop nu!">';
			}	
			echo '</form>';
		}
}
}
}
?>
</div>


</div> 
</div>

<div id="clear"></div></div> 
</div> 
</body></html>