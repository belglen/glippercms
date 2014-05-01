<?php
include 'system/header.php';
include 'inc/adminnav.php';

// INDIEN JE EEN WITTE PAGINA KRIJGT, ADD DE CLEAN FUNCTION
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Zoeken</h2> 
</div> 
<div class="glipperflexcont"> 
	<form method="get" action="index.php">
		<table>
			<tr>
				<td>
					Gebruikersnaam
				</td>
				<td>
					<input type="hidden" name="url" value="adminchatlogs">
					<input type="text" name="user" style="margin-left: -126px;" id="chatlogsinput one">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Zoeken" class="glipperflexbtn" style="margin-left: 200px;">
				</td>
			</tr>
		</table>
	</form>
</div> 
</div>

<?php
if (($_GET['user2'] == "" && isset($_GET['user'])) || (((isset($_GET['p']) && isset($_GET['user'])))))
{
	$bestaat = 1;
	$error = 0;
	$begin = ($_GET['p'] >= 0) ? $_GET['p']*20 : 0;
	$user = mysql_fetch_object(mysql_query("SELECT id,username,ip_last FROM users WHERE username = '".clean($_GET['user'])."'"));
	$bestaat = mysql_query("SELECT u.id,u.username,c.* FROM users u JOIN chatlogs c ON (u.id = ".$user->id." AND user_id = ".$user->id." AND room_id <> 0) ORDER BY c.id DESC LIMIT $begin,20");
	if (mysql_num_rows($bestaat) == '0')
	{
		$bestaat--;
		$error++;
	}
	if (($bestaat < 1 || $error > 0) || empty($_GET['user']))
	{
		echo'<br /><div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Fout</h2> 
</div> <div class="glipperflexcont">
';
		echo"<div class=\"error\">Deze gebruiker bestaat niet of diegene heeft nog niets gezegd!</div>";
		echo'</div></div>';
	}
	else
	{
	?>
<br />
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Chatlogs van <?php echo $user->username; ?></h2> 
</div> 
<div class="glipperflexcont">
	<table class="chatlogzz">
		<?php
		for($j=$begin+1; $info = mysql_fetch_object($bestaat); $j++) 
		{
			$dag = date("D", $info->timestamp);
			switch ($dag)
			{
				case 'Sun':
					$dag = "zondag";
				break;
				
				case 'Mon':
					$dag = "maandag";
				break;
				
				case 'Tue':
					$dag = "dinsdag";
				break;
				
				case 'Wed':
					$dag = "woensdag";
				break;
				
				case 'Thu':
					$dag = "donderdag";
				break;
				
				case 'Fri':
					$dag = "vrijdag";
				break;
				
				case 'Sat':
					$dag = "zaterdag";
				break;
			}
		?>
			<tr class="two chatlogzz" style="text-decoration:none;word-wrap:break-word;">
				<td>
					<?php echo $dag." "; echo date("d-m-Y H:i",$info->timestamp); ?>
				</td>
				<td style="width:55%;">
					<?php echo $info->message; ?>
				</td>
				<td class="small" style="width:10%;">
					<strong><a href="index.php?url=adminusers&ip=<?php echo $user->ip_last; ?>"><?php echo $user->username; ?></a></strong>
				</td>
			</tr>
		<?php
		}
		?>
	</table>
	
	<?php
		$begin = ($_GET['p'] >= 0) ? $_GET['p']*20 : 0;
		$getuser = clean($_GET['user']);
		$dbres = mysql_query("SELECT * FROM `chatlogs` WHERE `user_id`='$user->id' AND room_id <> 0");
		print "<table width=98%><tr><td align=\"center\">";
		
		if(mysql_num_rows($dbres) <= 20)
		{
			print "&#60; 1 &#62;</td></tr></table>\n";
		}
		else 
		{
			if($begin/20 == 0)
			{
				print "&#60; ";
			}
			else
			{
				print "<a href=\"index.php?url=adminchatlogs&user={$getuser}&p=". ($begin/20-1) ."\">&#60;</a>";
			}
			
			for($i=0; $i<mysql_num_rows($dbres)/20; $i++) 
			{
				print "<a href=\"index.php?url=adminchatlogs&user={$getuser}&p=$i\">". ($i+1) ."</a> ";
			}
		
			if($begin+20 >= mysql_num_rows($dbres))
			{
				print "&#62; ";
			}
			
			else
			{
				print "<a href=\"index.php?url=adminchatlogs&user={$getuser}&p=". ($begin/20+1) ."\">&#62;</a>";
			}
			print "</td></tr></table>\n";
		}

	}
echo"</div>";
echo"</div>";
}
?>