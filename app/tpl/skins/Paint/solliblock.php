<?php
include 'system/header.php';
include 'inc/sollinav.php'
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 			
<?php
	$userid = $_SESSION['user']['id'];
	$userr = $_SESSION['user']['username'];
		$query = mysql_query("SELECT * FROM cms_sollicitatie_blocked WHERE user_id = '".$userid."'");
	$ego = mysql_num_rows($query);
	
	if ($ego == 1) {
	// header ("Location: solliblock");
	echo '      <div id="onCommandePlus">
U bent geblokkeerd van de vacature-pagina! Contacteer ons op admin@glipper.be!</div>';
	}
if (isset($_POST['verzend']) && isset($_POST['useridfdg']) && isset($_POST['edfgfdsgrvaring']) && isset($_POST['whysdsfggfdtaff']) && isset($_POST['watssdfgfdtaff'])) {
		if ($_POST['username'] != $userr) {
	echo '<script>window.alert(\'Fout bij het invoeren van de vacature.\');</script>';
	    $sql = "INSERT INTO cms_sollicitatie_blocked(user_id, query) 
	VALUES
	('".filter($_POST['userid'])."','foefelare');";
   $result = mysql_query($sql);

		} else {

		}
}
    $sql = mysql_query('SELECT userid FROM cms_sollicitatie WHERE userid = ' .$userid.'');
	$eenkeer = mysql_num_rows($sql);
if ($eenkeer == 0) {
        echo '<div class="content-box">
<div class="content-box-black">
<h2 class="title">Solliciteer nu!</h2>
</div>
<div class="content-box-content"> 
<table width="100%"><tr><td><b>Wil jij graag solliciteren? Dat kan!</b></td></tr>
    <form method="post">
	<table width="100%">	
	<input type="hidden" name="userid" value="' .$userid. '">
	<tr><td><b>Gebruikersnaam</b></td><td>
	<input type="text" readonly="readonly" name="username" value="'.$username.'">
	</td></tr>
	<tr><td><b>Emailadres</b></td><td>
	<input type="text" readonly="readonly" name="email" value="{email}">
	</td></tr>
		<tr><td><b>Ervaringen</b></td><td>
	<input type="text" name="ervaring">
	</td></tr>
		<tr><td><b>Waarom jou aannemen?</b></td><td>
	<input type="text" name="whystaff">
	</td></tr><tr><td><b>Wat wil je in Glipper verbeteren?</b></td><td>
	<input type="text" name="watstaff">
	</td></tr>

            </td></tr>

	<tr><td><b>Verzend</b></td><td><input type="submit" class="glipperflexbtn" value="Verzend" name="verzend"></td></tr>
	</table>
	</form>
	</table>
</div>
</div>
';
    }else{    echo '<div class="content-box">
<div class="content-box-black">
<h2 class="title">Solliciteer nu!</h2>
</div>
<div class="content-box-content"> 
<table width="100%"><tr><td><b>Wil jij graag solliciteren? Dat kan!</b></td></tr>
    <form method="post">
	<table width="100%">	
	<input type="hidden" name="userid" value="' .$userid. '">
	<tr><td><b>Gebruikersnaam</b></td><td>
	<input type="text" readonly="readonly" name="username" value="'.$username.'">
	</td></tr>
	<tr><td><b>Emailadres</b></td><td>
	<input type="text" readonly="readonly" name="email" value="{email}">
	</td></tr>
		<tr><td><b>Ervaringen</b></td><td>
	<input type="text" name="ervaring">
	</td></tr>
		<tr><td><b>Waarom jou aannemen?</b></td><td>
	<input type="text" name="whystaff">
	</td></tr><tr><td><b>Wat wil je in Glipper verbeteren?</b></td><td>
	<input type="text" name="watstaff">
	</td></tr>

            </td></tr>

	<tr><td><b>Verzend</b></td><td>Je hebt al een keer gesolliciteerd!</td></tr>
	</table>
	</form>
	</table>
</div>
</div>
';
}

?>
<br>


<br />
	
<br>
<br>

 </div><br />




</div>
  



<div id="main_right"> 


<br>
<div class="content-box" style="width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Voorbeeld antwoord</h2> 

	  </div> 

	  <div class="content-box-content"> 
<b>Gebruikersnaam</b>: Jet<br><br>
<b>Emailadres</b>: Jet@glipper.be<br><br>
<b>Ervaringen</b>: Ik ben al 2 keer staff geweest op Glipper en op Glipper.<br>
<br><b>Waarom jouw aannemen?</b>: Omdat ik heel erg gemotiveerd ben. En ik blijf altijd trouw aan Glipper.<br>
<br><b>Wat wil je in Glipper verbeteren?</b>: Ik zou graag willen dat niemand meer zou schelden, dat alles eerlijk verloopt etc.

</div>
	</div>

</div>

<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> </div>
<div id="clear"></div></div> 
 </div>  </body></html>