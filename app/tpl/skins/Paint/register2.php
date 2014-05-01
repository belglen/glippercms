<div id="container"> 
<a href="index.php"><img src="app/tpl/skins/Paint/images/large.gif" id="logo" border="0"/></a> 
<span id="stats">{online} {hotelName}'s Online!</span> 
<div id="clear"></div>
<hr/>  
<?php if(isset($template->form->error)) { echo '<div id="message">'.$template->form->error.'</div>'; } ?>
Welkom op {hotelName}! We zijn blij je te mogen ontmoeten op {hotelName}. Je ontvangt gratis 150000 credits! We zien je binnen!<form action="register" method="post"> 
<table width="100%" border="0"> 
<tr> 
<td width="25%">Gebruikersnaam:</td> 
<td width="75%"> 
<input type="text" name="reg_username" id="register" value="<?php echo $template->form->reg_username; ?>"/> 

</tr> 
<tr> 
<td>Wachtwoord:</td> 
<td><input type="password" name="reg_password" id="register"/></td> 
</tr> 
<tr> 
<td>Bevestig wachtwoord:</td> 
<td><input type="password" name="reg_rep_password" id="register"/></td> 
</tr> 
<tr> 
<td>Email:</td> 
<td><input type="text" name="reg_email" id="register" value="<?php echo $template->form->reg_email; ?>"/></td> 
</tr> 
<tr> 
<td><input type="submit" class="glipperflexbtn" name="register" id="button" value="Register"/></td> 
</tr> 
</table> 
</form> 
<hr/>
<center>© Glipper 2012 - 2013 <br>
</center>
</div> 