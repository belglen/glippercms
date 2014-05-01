<?php
include 'system/header.php';
$geschikt = '5';
include'inc/modnav.php'; 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 <div class="glipperflexbox"> 
<div class="glipperflexbar"> 
<h2 class="title">Open tickets</h2> 
</div> 
<div class="glipperflexcont"> 

<?php
$gettickets = mysql_query("SELECT * FROM moderation_tickets WHERE status = 'open'");

while ($ticket = mysql_fetch_object($gettickets))
{
?>
	<table width="780">
		<tr>
			<td>
				<a href="index.php?url=tickets&ticketid=<?php echo $ticket->id; ?>"><img src="http://whd-srv-01.gbiomed.kuleuven.be:8081/helpdesk/info_icon_small.gif"></a>
			<td>
				<?php echo $ticket->message; ?>
			</td>
	</tr>
	</table>
<?php
}
?>
 
</div>

</div>
<?php
if (isset($_GET['ticketid']))
{
$getinformatie = mysql_fetch_object(mysql_query("SELECT * FROM moderation_tickets WHERE id = '".clean($_GET['ticketid'])."'"));
$getuserinfo = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = '".$getinformatie->sender_id."'"));
$getuserinfo_bad2 = mysql_query("SELECT * FROM users WHERE id = '".$getinformatie->reported_id."'");
$getuserinfo_bad = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = '".$getinformatie->reported_id."'"));
$getsomeroominfo = mysql_fetch_object(mysql_query("SELECT * FROM rooms WHERE id = '".$getinformatie->room_id."'"));
?>
 <div class="glipperflexbox"> 
<div class="glipperflexbar"> 
<h2 class="title">Ticketinformatie: #<?php echo $getinformatie->id; ?></h2> 
</div> 
<div class="glipperflexcont"> <img src="/r63/c_images/album1584/ADM.gif" align="right">
	<table width="500">
		<tr>
			<td>
				<strong>Zender</strong>
			</td>
			<td>		
				<?php echo $getuserinfo->username; ?>
			</td>
		</tr>		
		<tr>
			<td>
				<strong>Verdachte</strong>
			</td>
			<td>		
				<?php if (mysql_num_rows($getuserinfo_bad2) == '1') {echo $getuserinfo_bad->username;} else {echo '<i>Dit ticket is een geraporteerde kamer!</i>';} ?>
			</td>
		</tr>		
		<tr>
			<td>
				<strong>Kamernaam</strong>
			</td>
			<td>		
				<?php echo $getsomeroominfo->caption; ?>
			</td>
		</tr>		
		<tr>
			<td>
				<strong>Tijd</strong>
			</td>
			<td>		
				<?php echo strftime('%#d-%m-%Y om %Hu%M', $getinformatie->timestamp); ?>
			</td>
		</tr>
	</table>

</div>
</div>
<?php } ?>
</div>


<div id="clear"></div></div> 

 </div>  </body></html>