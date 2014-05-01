<?php
include 'system/header.php';
include 'inc/djnav.php'; 

$userid = $_SESSION['user']['id']; 
$checkdj = mysql_query("SELECT * FROM `dj` WHERE `user_id` = '$userid' AND rank = 'hdj'");
if(mysql_num_rows($checkdj) == 0) 
{ 
	header("Location: index.php?url=me");
	exit;
}
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box">
	<div class="content-box-deep-blue">
		<h2 class="title">Overzicht DJ's</h2>
	</div>

	<div class="content-box-content"><?php
$sql = mysql_query("SELECT u.*, dj.onair as onair, dj.*
FROM users u 
JOIN dj ON dj.user_id=u.id ORDER BY dj.rank;");
	while ($djs = mysql_fetch_assoc($sql)) {
	echo '
	<div id="StaffBox8" style="font-size: small;">
		
			<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$djs['look'].'&action=crr=33"style="float:left; margin-top: -50px;"/>
			
	<a href="index.php?url=profile&id='.$djs['username'].'">
		<p>	  	<b><div style="margin-top: 40px; margin-left: 100px;">'.$djs['username'].'</div></b></a><div style="margin-top: -15px; margin-left: 270px;">';
if ($djs['onair'] == '0') {
  echo 'Niet draaiende';
	   $data = mysql_fetch_object(mysql_query("SELECT * FROM dj WHERE user_id = '".$djs['user_id']."'"));
		if ($data->user_id != $userid) { 
 echo '<font style="margin-left: 80px;"><a href="index.php?url=djontslaan&user_id='.$djs['user_id'].'"><b>Ontslaan</b></a></font>';
				}
}
else
{
  echo '<font style="color: blue;"><b>Draaiend</b></font>';
	   $data = mysql_fetch_object(mysql_query("SELECT * FROM dj WHERE user_id = '".$djs['user_id']."'"));
		if ($data->user_id != $userid) { 
 			echo '<font style="margin-left: 80px;"><a href="index.php?url=djontslaan&user_id='.$djs['user_id'].'"><b>Ontslaan</b></a></font>';
}
}
 echo '</div>
			</div>
	';
	}
?>
	</div>
</div><br>
<div class="content-box">
	<div class="content-box-deep-blue">
		<h2 class="title">DJ aannemen</h2>
	</div>

	<div class="content-box-content">
  <form action="" method="post"> 
               
  		
                    <strong>Je kan hier een DJ aannemen!</strong><br>
                    <table width="650" border="0"> 
                    <tr> 
                        <td width="100">Gebruiker</td> 
                        <td width="556"><input name="dj_user" type="text"/></td> 
                    </tr>
                    

                    <tr> 
                        <td>&nbsp;</td> 
                        <td><input type="submit" class="glipperflexbtn" name="take" id="button" value="Aannemen"/></td> 
                    </tr> 
                </table> 
            </form> 
	</div>
</div></div> 
<?php

// echo $user;
?>
<div id="main_right"> 


<?php
if (isset($_POST['take']) && isset($_POST['dj_user'])) {
?>
<div class="content-box" style="width:300px; background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Instellingen</h2> 
	  </div> 
	  <div class="content-box-content"> 
 <?php		
 
 $user = clean($_POST['dj_user']);
 $data = mysql_fetch_object(mysql_query("SELECT * dj WHERE user_id = '$userid'"));
	// if ($data->hdj == '1') {
		// echo 'hdj';
		$userData = mysql_query("SELECT * FROM users WHERE username = '$user'");

			$DJcheckLID = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '$user'"));
			$DJJ = mysql_query("SELECT * FROM dj WHERE user_id = '".$DJcheckLID['id']."'");
		if (mysql_num_rows($DJJ) == '1') {
			header("Location: index.php?url=dj&error=exists");
				}
			if (mysql_num_rows($userData) <= '0') {
			header("Location: index.php?url=radio");
				} else {
				echo "<span style=\"font-size: small;\">
				<b>".$user."</b> zal worden toegevoegd zodra je op de knop hieronder duwt.<br><br>
		
		<form method='post'>"; ?>
		
		                    <table width='450' border='0'> 
  <tr> 
                        <td width="100"><strong>Hoofd DJ</strong></td> 
                        <td width="556"><input type='radio' name='dj' value='hdj' /></td> 
                    </tr>
                    <tr> 
                        <td width="100"><strong>DJ</strong></td> 
                        <td width="556"><input type='radio' name='dj' value='dj' /></td> 
                    </tr>
                    <tr> 
                        <td width="100"><strong>Proef DJ</strong></td> 
                        <td width="556"><input type='radio' name='dj' value='pdj' checked/></td> 
                    </tr>
										<input type='hidden' name='userr' value='<?php echo $user; ?>'/>
                    <tr> 
                        <td>&nbsp;</td> 
                        <td>		<input type='submit' class='glipperflexbtn' name='takesure' id='button' value='Aannemen'/>
</td> 
                    </tr> 

		</span></table></form>
</div>

</div>
<br>
		<?php
		
// echo '<br><br><br>';
				}
	 }
 ?>
<?php
if (clean($_GET['error']) == 'exists') {
?>
<div class="content-box" style="width:300px; background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Error</h2> 
	  </div> 
	  <div class="content-box-content"> 
De <b>DJ</b> die je wou aannemen is al een DJ!
	  </div>

</div>
<br>
		<?php
				}
		?>


<?php
if (isset($_POST['takesure']) && isset($_POST['userr']) && isset($_POST['dj'])) {
?>
<div class="content-box" style="width:300px; background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Toevoegen: <?php echo $_POST['userr']; ?></h2> 
	  </div> 
	  <div class="content-box-content"> 
	<?php
		if (clean($_POST['userr']) != "") {
			$user = clean($_POST['userr']);
			$dj = clean($_POST['dj']);
				$DJid = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE username = '$user'"));
			$sql = "INSERT INTO dj(user_id,onair,rank) VALUES ('".$DJid['id']."', '0', '$dj')";
				if (mysql_query($sql)) {
				echo '<font style="font-size: small;"><b>'.$user.'</b> is succesvol aangenomen in het DJ-team!<br><br>Over <b><i>5</i></b> seconden zal je pagina worden gerefresht.</font>';
				header("Refresh:5;url=index.php?url=dj&check=check");
				}
		}
	?>

</div>

</div>
<?php
}else{
?>


<div class="content-box" style="width:300px; background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Uitleg DJ</h2> 
	  </div> 
	  <div class="content-box-content"> 
Wanneer het jouw beurt is om te gaan draaien klik je op "Draai!". Wanneer je moet stoppen met draaien, dus als je tijd voorbij is, dan klik je op "Stop draaien". Dit is verplicht en moet altijd gedaan worden, anders kan jij, of de DJ na jou, niet de requests en/of shoutouts zien.
</div>

</div>

<?php
}
?>



<br/><br/> 

</div> 
<div id="clear">
<?php 
include 'system/footer.php';
?></div></div> 
</div> 
</body></html>
