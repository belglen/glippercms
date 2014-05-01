<div id="disconnectedbox"> <a href="index.php"><img src="app/tpl/skins/Paint/images/logo.png" border="0" id="logo"/></a>
<span id="stats"><?php $users = mysql_query("SELECT * FROM users "); $teller = mysql_num_rows($users); ?>
<?php echo $teller; ?> {hotelName}'s geregistreerd!</span>
<div id="clear"></div>
<hr />
<p><br />
<center>
  {hotelName} is momenteel gesloten wegens nader onderzoek.</p><br />
  </center>
  <hr />
</div><br />