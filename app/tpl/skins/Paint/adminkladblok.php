<?php
include 'system/header.php';
include 'inc/adminnav.php';
$userid = $_SESSION['user']['id'];
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Eigen Kladblok</h2> 
</div> 
<div class="glipperflexcont" style="font-size:small;">
Kladblok
<br><br>
<form method="post" action="index.php?url=adminkladblok"><textarea style="width:865px;height:159px;" name="textareas"></textarea><br><input type="submit" class="glipperflexbtn" value="Verzenden" name="submit"></form>
<?php
if (isset($_POST['submit']))
{
	function spacefriendly($string)
	{
		return mysql_real_escape_string(addslashes(stripslashes(nl2br($string))));
	}
	$tekst = spacefriendly($_POST['textareas']);
	mysql_query("INSERT INTO admin_kladblok(user_id,tekst,datum) VALUES ('$userid','".$tekst."', NOW())");
}
?>
</div> 
</div>
<br>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Kladblokjes</h2> 
</div> 
<div class="glipperflexcont" style="font-size:small;">
	<table class="klad">
		<tr>
			<th style="width: 10%;">
				Gebruikersnaam
			</th>
			<th style="width: 100%;">
				Tekst
			</th>
		</tr>
		<?php
		$select = mysql_query("SELECT ak.*,u.id,u.username FROM admin_kladblok ak JOIN users u ON (ak.user_id = u.id) ORDER BY ak.id DESC");
		$i = 0;
		while ($klad = mysql_fetch_object($select))
		{
			$i++;
		?>
		<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;} ?> klad" style="text-decoration: none;">
			<td>
				<a href="index.php?url=profile&id=<?php echo $klad->username; ?>"><?php echo $klad->username; ?></a>
			</td>
			<td>
				<?php echo $klad->tekst; ?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</div> 
</div>