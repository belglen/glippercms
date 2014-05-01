<div class="content-box">
<div class="content-box-deep-blue">
<h2 class="title">{hotelName}Radio</h2>
</div>
<div class="content-box-content">

<style>
.succes
{
    padding:2px 4px;
    margin:0px;
    border:solid 1px #C0F0B9;
    background:#D5FFC6;
    color:#48A41C;
    font-family:Arial, Helvetica, sans-serif; font-size:14px;
    font-weight:bold;
    text-align:center; 
}
.error
{
    padding:2px 4px;
    margin:0px;
    border:solid 1px #FBD3C6;
    background:#FDE4E1;
    color:#CB4721;
    font-family:Arial, Helvetica, sans-serif;
    font-size:14px;
    font-weight:bold;
    text-align:center; 
}
.reqq
{
}
</style>
<?php
		if (isset($_POST['subreq'])) {
			$lied = clean($_POST['req']);
			if ($lied != 'Een leuk liedje..')
			{
				$getDJ = mysql_fetch_object(mysql_query("SELECT dj.user_id,dj.onair,dj.rank AS djrank,u.id AS uid,u.username AS uusername,u.look AS ulook FROM users u JOIN dj dj ON (dj.user_id = u.id) WHERE onair = '1'"));
				$lied = clean($_POST['req']);
				$DJ = filter($getDJ->uusername);
				$info->song = nl2br($lied);
				$info->song = str_replace("kut", "***",$lied);
				mysql_query("INSERT INTO dj_requests(user_id,song,dj) VALUES ('".$_SESSION['user']['id']."', '$info->song', '$DJ')");
			}
		
			if ($lied != 'Een leuk liedje..')
			{
				echo '<div class="succes">Request succesvol verzonden!</div><br>';
			}			
			else
			{
				echo '<div class="error">Request is niet succesvol verzonden!</div><br>';
			}
		}

?>
<?php
$sql = mysql_num_rows(mysql_query("SELECT user_id,onair FROM dj WHERE onair = '1'"));
switch($sql)
{
	case 0:
	echo '<embed src="http://www.shoutcast.com/media/popupPlayer_V19.swf?stationid=http://yp.shoutcast.com/sbin/tunein-station.pls?id=1283896&amp;play_status=1" quality="high" bgcolor="#ffffff" width="399" height="105" name="popupPlayer_V19" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer">';
		echo '<h2><b>Er draait geen DJ op dit moment</b></h2>';
	?>
	<?php
	break;

	case 1:
				$getDJ = mysql_fetch_object(mysql_query("SELECT dj.user_id,dj.onair,dj.rank AS djrank,u.id AS uid,u.username AS uusername,u.look AS ulook FROM users u JOIN dj dj ON (dj.user_id = u.id) WHERE onair = '1'"));
		?><iframe src='http://fastcast4u.com/webplayer/player_premium/player.php?host=s3.freeshoutcast.com&port=17194' scrolling='no' frameborder='0' style='width:435px; height:92px;'></iframe>

		<h2>Aantal Luisteraars:</br>
<iframe src='http://cp.freeshoutcast.com/scripts/listeners.php?port=17194&host=s3&color=000000' width='588' height='25' frameborder='0' scrolling='no'>ERROR!</iframe></h2>

		<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $getDJ->ulook; ?>&action=crr=667" alt="<?php echo $getDJ->uusername; ?>" style="margin-top: -20px;"/>
	<a href="index.php?url=profile&id=<?php echo ''.$getDJ->uusername.''; ?>">
		<p>	  	<b><div style="margin-top: -88px; margin-left: 100px;">DJ <?php echo ''.$getDJ->uusername.''; ?></a><br>
		<?php
		if ($getDJ->djrank == 'hdj')
		{
		?>
		<img src="{url}/r63/c_images/album1584/HDJ.gif" style="margin-top: 10px;">
		<?php
		}
		?>		<?php
		if ($getDJ->djrank == 'pdj')
		{
		?>
		<img src="{url}/r63/c_images/album1584/PDJ.gif" style="margin-top: 10px;">
		<?php
		}
		?>		<?php
		if ($getDJ->djrank == 'dj')
		{
		?>
		<img src="{url}/r63/c_images/album1584/DDJ.gif" style="margin-top: 10px;">
		<?php
		}
		?>
		</div><h2><br><br>Stuur een request</h2></b>
		<form method="post">
			<input type="hidden" name="dj_id" id="dj_id" value="<?php echo $getDJ->uid; ?>">
			<input type="text" name="req" id="req" placeholder="Een leuk liedje.." style="margin-top: -5px;" class="reqq"><br><br><br>
			<input type="submit" class="glipperflexbtn" name="subreq" id="subreq" value="Verzend" style="margin-top: -9px;">
		</form>
		<br>
		<br>
		
			<?php
					break;
				}
			?>

</div>
</div>		
				<br>	