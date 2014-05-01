<?php
include 'system/header.php';
include 'inc/groepnav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Maak een groep (maximum 3)</h2> 
</div> 
<div class="content-box-content">
   <form action="index.php?url=postgroep" method="post"> 
                <table width="766" border="0"> 
				     <tr> 
                        <td width="150"><strong>Groepsnaam</strong></td> 
                        <td width="606"><input name="groepnaam" type="text" id="groepnaam" value=""/></td> 
                    </tr> 
                    <tr> 
                        <td width="150"><strong>Beschrijving</strong></td> 
                        <td width="606"><input name="beschrijf" type="text" id="beschrijf" value=""/></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Status</strong></td> 
                        <td> <select name="status">
								<option value="open">De groep is open voor iedereen</option>
								<option value="locked">Er kan lidmaatschap worden aangevraagd</option>		
								<option value="closed">De groep is gesloten voor iedereen</option>		
								</select></td>
                    </tr>       
				<tr><td><b>Groepskamer</b></td>
<td>
<select name="room">

<option value="0">-- Selecteer kamer --</option>
<?php
$rooms = mysql_query("select r.* from rooms r, users u where r.owner=u.username and u.id=$userid order by r.caption");
if (mysql_num_rows($rooms) == 0) {
	echo '<option value="0">-- Je hebt nog geen kamer --</option>';
} else {
	while ($room = mysql_fetch_assoc($rooms)) {
		echo '<option value="'.$room['id'].'">'.filter($room['caption']).'</option>'."\n";
	}
}	
?>
</select>
</td>
</tr>
       <tr> 
                        <td>&nbsp;</td> 
                        <td>Kies rechts een badge uit!</td> 
                    </tr> 
                    <tr> 
                    </tr> 
                </table> 
</div> 
</div>

    


<br />
				


<br>
<br>

 </div><br />




</div>
  



<div id="main_right"> 


 <?php
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	// if ($isSTAFF >= 9) {
         echo "    <br>
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Badges</h2> 

	  </div> 

	  <div class=\"content-box-content\"> <table>";
	  	  $sql = mysql_query("SELECT * FROM cms_groepen_badges");
	  while ($galago = mysql_fetch_assoc($sql)) {
	 echo ' <div style="margin-top: -13px;"><tr><td><img src="{url}/r63/c_images/album1584/'.$galago['badgeid'].'.gif"></td><td> <b>'.$galago['badgeid'].'</b></td></tr></div><br>';

	 
 }
?></table> 

<select name="badge">

<?php
	  	  $sql = mysql_query("SELECT * FROM cms_groepen_badges");
	  while ($galago = mysql_fetch_assoc($sql)) {
	  echo '  <option value="'.$galago['badgeid'].'">'.$galago['badgeid'].'</option>
';
	  
 }
?>
</select> <table>

<?php

// $getUser = mysql_query("SELECT * FROM users WHERE id = '".$userid."'");
// $christ = mysql_fetch_assoc($getUser);

// if ($christ['svip'] == 1 || $christ['vip'] == 1){
  	  $sql = mysql_query("SELECT * FROM groups WHERE ownerid = '".$userid."'");
		  if (mysql_num_rows($sql) == '0' || mysql_num_rows($sql) == '1' || mysql_num_rows($sql) == '2' || mysql_num_rows($sql) == '3' || mysql_num_rows($sql) == '4') {
// } else{}
// }	  	  $sql = mysql_query("SELECT * FROM groups WHERE ownerid = '".$userid."'");
		  // if (mysql_num_rows($sql) == '0' || mysql_num_rows($sql) == '1' || mysql_num_rows($sql) == '2') {
		  
		  

?>
							<td><input type="submit" class="glipperflexbtn" name="submitgroep" id="button" value="Maak groep"/></td> 
<?php

} else {
                  echo '      <td>Je hebt al 3 groepen!</td>  ';
}
?>
						</table><br>
 </form>
</div>
      


</div> </div>
<div id="clear"></div><?php include 'system/footer.php'; ?></div> 
 </div> 
 </body></html>