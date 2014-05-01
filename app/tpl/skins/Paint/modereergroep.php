<?php
$userid = $_SESSION['user']['id'];
$sql = mysql_fetch_object(mysql_query("SELECT id,rank FROM users WHERE id = ".$userid));
if ($sql->rank != '11' && $sql->rank != '6') {header("Location: me");}
include 'system/header.php';
include 'inc/groepnav.php';
?>
</span>
</div>


<div id="marginy">
<div id="main_left"> 
 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Alle groepen</h2> 
</div> 
<div class="content-box-content">
<div class="habblet-container "><div class="cbb clearfix orange ">
                  <div id="hotcampaigns-habblet-list-container">
            
			
			
			<?php
	   $sql = mysql_query("SELECT * FROM groups");
	   
			while ($array1 = mysql_fetch_assoc($sql)) {	   
			echo '		<div class="campaign_images"> 

<img src="{url}/r63/c_images/album1584/'.$array1['badge'].'.gif"></img>

</div> <div class="campaign_content"> 
<strong><a href="index.php?url=modereergroep&isset=1&id='.$array1['id'].'" style="text-decoration: none;">';

echo filter($array1['name']);
echo '</a> ';
if ($_GET['id'] == $array1['id'])
{
echo ' <a href="index.php?url=modereergroep'; if ($_GET['isset'] == '1') {echo '&isset=1';}echo '&id='.clean($_GET['id']).'';echo '&del=1" style="text-decoration: none;">
<img src="app/tpl/skins/{skin}/images/icon_kruisje.png">
</a>
';			 echo' 
<a href="index.php?url=modereergroep'; if ($_GET['isset'] == '1') {echo '&isset=1';}echo '&id='.clean($_GET['id']).'';echo '&edit=1" style="text-decoration: none;">
  <img src="app/tpl/skins/{skin}/images/icon-edit.gif">
  </a>
  ';
  } echo'</strong><br />';
echo filter($array1['desc']);
					// echo '<div style="margin-left: 410px; margin-top: -12px; width: 100px;"><a href="index.php?url=joingroep&id='.$array1['id'].'">Modereer</a></div>';
echo '</div> <div style="clear:both;"></div> 

<hr/> 
';
			}
			
			?>
	





			
           

                            </div>
</div></div>
</div> 
</div>

    


<br />
				


<br>
<br>

 </div>




</div>
  



<div id="main_right"> 
<br>
<?php
	if (clean($_GET['edit']) == '1') {
		$sql = mysql_query("SELECT * FROM groups WHERE id = ".clean($_GET['id']));
		if (mysql_num_rows($sql) == '0') {header("Location: index.php?url=modereergroep");}
         echo "
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Pas een groep aan</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
	   $getINFO = mysql_fetch_object(mysql_query("SELECT * FROM groups WHERE id = ".clean($_GET['id']).""));
	?>

<img src="{url}/r63/c_images/album1584/<?php echo $getINFO->badge;?>.gif" align="left"><br>
<div style="margin-left: 20px;"><b>Groepsnaam:</b> <?php echo $getINFO->name;?></div><br><br>
<?php
if (!isset($_POST['editgroup'])) {
	if (clean($_GET['sur']) != '2') {
echo '<center><b>
<a href="index.php?url=modereergroep'; if ($_GET['isset'] == '1') {echo '&isset=1';}echo '&id='.clean($_GET['id']).'';echo '&edit=1&sur=2" style="text-decoration: underlined;">Pas aan</a></b></center>';
 }else{ 
 ?>
 <form method="post">
    <table width="320" border="0"> 
                    <tr> 
                        <td width="150"><strong>Naam</strong></td> 
                        <td width="606"><input name="groupname" type="text" id="groupname" value="<?php echo $getINFO->name; ?>"/></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Desc</strong></td> 
                        <td><label for="groupdesc"></label> 
                            <input name="groupdesc" type="text" id="groupdesc" value="<?php echo $getINFO->desc; ?>"/></td> 
                    </tr>                     <tr> 
                        <td><strong>Status</strong></td> 
                        <td><select name="status" class="groep">
								<option value="open"			
								<?php
								if ($getINFO->locked == 'open') {
								echo " selected=\"selected\"";
								}
								?>>De groep is open voor iedereen</option>
								<option value="locked"	<?php
								if ($getINFO->locked == 'locked') {
								echo " selected=\"selected\"";
								}
								?>>Er kan lidmaatschap worden aangevraagd</option>		
								<option value="closed"	<?php
								if ($getINFO->locked == 'closed') {
								echo " selected=\"selected\"";
								}
								?>>De groep is gesloten voor iedereen</option>		
								</select></td> 
                    </tr> 
                        <tr> 
                        <td>&nbsp;</td> 
                        <td><input type="submit" class="glipperflexbtn" name="editgroup" id="button" value="Verander"/></td> 
                    </tr> 
                </table> 
			</form>	
<?php } ?>
<?php } else { ?>
<script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
            $('#notice').hide();
            $('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
</script>
Bezig met aanpassen...<br> 
<div id="download" style="display: none"><?php 
mysql_query("UPDATE groups SET name = '".filter($_POST['groupname'])."' WHERE id = ".clean($_GET['id'])); 
mysql_query("UPDATE `groups` SET `desc`='".filter($_POST['groupdesc'])."' WHERE (`id`='".clean($_GET['id'])."')"); 
mysql_query("UPDATE groups SET locked = '".filter($_POST['status'])."' WHERE id = ".clean($_GET['id'])); 
mysql_query("INSERT INTO moderate_groups(user_id,actie) VALUES ('$userid','edit')");
?>
<font style="color: green;">Klaar, <a href="index.php?url=modereergroep">klik hier om terug te gaan</a>!</div></font>

<?php
}
 ?>
<?php 
// } 
?>


</div> </div><br>

<?php } ?>

 <?php
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	if (clean($_GET['del']) == '1') {
		$sql = mysql_query("SELECT * FROM groups WHERE id = ".clean($_GET['id']));
		if (mysql_num_rows($sql) == '0') {header("Location: index.php?url=modereergroep");}
         echo "
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Verwijderen</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
	   $getINFO = mysql_fetch_object(mysql_query("SELECT * FROM groups WHERE id = ".clean($_GET['id']).""));
	?>

<img src="{url}/r63/c_images/album1584/<?php echo $getINFO->badge;?>.gif" align="left"><br>
<div style="margin-left: 20px;"><b>Groepsnaam:</b> <?php echo $getINFO->name;?></div><br><br>
<?php
if (clean($_GET['sur']) == '1') {
?>
<script>
$(document).ready(function () {
    var counter = 3;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            $('#notice').text(msg);
       } else {
            $('#notice').hide();
            $('#download').show();
            clearInterval(id);
      }
    }, 1000);
});
</script>
Bezig met verwijderen..
<br> 
<div id="download" style="display: none"><?php mysql_query("DELETE FROM groups WHERE id = ".clean($_GET['id'])); mysql_query("INSERT INTO moderate_groups(user_id,actie) VALUES ('$userid','del')"); ?>
<font style="color: green;">Klaar, <a href="index.php?url=modereergroep">klik hier om terug te gaan</a>!</div></font>

<?php }else{ ?>
<center><b>
<a href="index.php?url=modereergroep<?php if ($_GET['isset'] == '1') {echo '&isset=1';}echo '&id='.clean($_GET['id']).'';echo '&del=1&sur=1" style="text-decoration: underlined;">Verwijder</a>'; ?>
</b></center>

<?php } ?></div> </div><br>

<?php } ?> 
 <?php
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	if (clean($_GET['isset']) == '1') {
         echo "  
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Informatie</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
?>
			<?php
	   $getINFO = mysql_fetch_object(mysql_query("SELECT * FROM groups WHERE id = ".clean($_GET['id']).""));
	   
			// echo '		<div class="campaign_images"> 

// <img src="{url}/r63/c_images/album1584/'.$getINFO->badge.'.gif" align="right">

// </div> <div class="campaign_content"> 
// <strong><a href="index.php?url=modereergroep&isset=1&id='.$array1['id'].'" style="text-decoration: none;">';

// echo '</a>  <img src="app/tpl/skins/{skin}/images/icon_kruisje.png">   <img src="app/tpl/skins/{skin}/images/icon-edit.gif"></strong><br />';
// echo '</div> <div style="clear:both;"></div> <hr/> ';
	?>

<img src="{url}/r63/c_images/album1584/<?php echo $getINFO->badge;?>.gif" align="right">
<b>Groepsnaam:</b> <?php echo $getINFO->name;?><br><br>
<b>Eigenaar:</b> <?php $sql = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = ".$getINFO->ownerid));?><a href="index.php?url=profile&id=<?php echo $sql->username;?>"> <?php echo $sql->username;?></a><br><br>

<b>Groepsbeschrijving:</b> <?php echo $getINFO->desc;?>
 </div> </div><br>
<?php } ?>
      


<?php
         echo "   
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Guide</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";

?><b>Groep verwijderen</b><br>
Een groep verwijderen?! Klik op de groep, en dan verschijnt er een kruisje en een potloodje. Klik op het kruisje, en dan verschijnt er een vensterje rechts. Klik op verwijder als je <i>100%</i> zeker bent dat je het wilt verwijderen, dan zal hij bezig zijn met verwijderen.. Na 3 seconden zegt hij "Klaar, klik hier om terug te gaan!". Dan is de groep succesvol verwijderd, klik dan vervolgens op "klik hier om terug te gaan".
<br><br><b>Groep aanpassen</b><br>
Een groep aanpassen?! Klik op de groep, en dan verschijnt er een kruisje en een potloodje. Klik op het potloodje, en dan verschijnt er een vensterje rechts. Klik vervolgens op "Pas aan", en dan zie je dat het scherm veranderd. Daar kun je bijvoorbeeld de naam, de beschrijving, of misschien ook de status veranderen. Klik dan op de knop "Verander" als je <i>100%</i> zeker bent dat je het wilt aanpassen.

<!--<br><br><b>Groep verwijderen</b><br>
Een groep verwijderen?! Klik op de groep, en dan verschijnt er een kruisje en een potloodje. Klik op het kruisje, en dan verschijnt er een vensterje rechts. Klik op verwijder als je <i>100%</i> zeker bent dat je het wilt verwijderen, dan zal hij bezig zijn met verwijderen.. Na 3 seconden zegt hij "Klaar, klik hier om terug te gaan!". Dan is de groep succesvol verwijderd, klik dan vervolgens op "klik hier om terug te gaan".
-->
</div> <?php include 'system/footer.php'; ?>
<div id="clear"></div></div> 
</div>
  </body></html>
