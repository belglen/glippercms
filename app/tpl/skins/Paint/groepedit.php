<?php
include 'system/header.php';
include 'inc/groepnav.php';
?>
</span>
</div>

<?php
$query = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
$ikkeee = mysql_fetch_assoc($query);
if ($ikkeee['ownerid'] == $userid) {
}else{
header("Location: index.php?url=groep&id=" . htmlspecialchars($_GET["id"]) . "");
}

?>
<div id="marginy">
<div id="main_left"> 
 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Adminpaneel: <?php
$sql = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
	$array = mysql_fetch_assoc($sql);
	
	$sql1 = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . htmlspecialchars($_GET["id"]) . "'");
	$array1 = mysql_num_rows($sql1) +1;
	
// echo mb_check_encoding($array['name'], 'UTF-8')?$array['name']:utf8_encode($array['name']);	$sql = mysql_query("SELECT * FROM users WHERE id = '" . $array['ownerid'] . "'");
	echo $array['name'];
	$array2 = mysql_fetch_assoc($sql);
	$sql = mysql_query("SELECT * FROM rooms WHERE id = '" . $array['roomid'] . "'");
	$array3 = mysql_fetch_assoc($sql);
	$qu = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");

if (mysql_num_rows($qu) <= 0) {
header("Location: index.php?url=notfound");
}
	
?></h2> 
</div> 
<div class="content-box-content">


   <form action="index.php?url=editgroep" method="post">

<input type="hidden" name="groupid" value="<?php echo "" . htmlspecialchars($_GET["id"]) . ""; ?>">   
                <table width="766" border="0"> 
				     <tr> 
                        <td width="150"><strong>Groepsnaam</strong></td> 
                        <td width="606"><input name="groepnaam" type="text" id="groepnaam" value="<?php echo $array['name'];?>"/> 
                   		<img src="{url}/r63/c_images/album1584/<?php echo $array['badge']; ?>.gif" style="margin-left: 160px; margin-top: -10px;"></td>
				   </tr>                    
				   <tr> 
                        <td width="150"><strong>Beschrijving</strong></td> 
                        <td width="606"><input name="beschrijf" type="text" id="beschrijf" value="<?php echo $array['desc'];?>"/></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Status</strong></td> 
                        <td> <select name="status" value="df">
								<option value="open"
								<?php
								if ($array['locked'] == 'open') {
								echo " selected=\"selected\"";
								}
								?>
								>De groep is open voor iedereen</option>
								<option value="locked"
									<?php
								if ($array['locked'] == 'locked') {
								echo " selected=\"selected\"";
								}
								?>
								>Er kan lidmaatschap worden aangevraagd</option>		
								<option value="closed"
									<?php
								if ($array['locked'] == 'closed') {
								echo " selected=\"selected\"";
								}
								?>
								>De groep is gesloten voor iedereen</option>		
								</select></td>
                    </tr>        <tr>                       <td><input type="submit" class="glipperflexbtn" name="submitgroep" id="button" value="Pas aan"/></td> 
</tr>
</table></form>


</div> 
</div>
<?php
$ip = htmlspecialchars($_GET["id"]);

$sql = mysql_query("SELECT * FROM groups WHERE id = '".$ip."'");
$sql5 = mysql_query("SELECT * FROM group_requests WHERE groupid = '".$ip."'");
	$sddqs = mysql_fetch_assoc($sql);
	
	if ($sddqs['locked'] == 'locked' && mysql_num_rows($sql5) != '0') {
?>
 <br>
 
 <div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Aanvragen</h2> 
</div> 
 <div class="content-box-content">
                 <table width="766" border="0"> 

<?php
$ip = htmlspecialchars($_GET["id"]);
$sql = mysql_query("SELECT * FROM group_requests WHERE groupid = '".$ip."'");

	while ($sql1 = mysql_fetch_array($sql)) {
	$sql8 = mysql_query("SELECT * FROM users WHERE id = '".$sql1['userid']."'");
		$sql11 = mysql_fetch_assoc($sql8);
	 echo '   
  <tr> 
                        <td width="150"><a style="text-decoration:none;" href="index.php?url=profile&id='.$sql11['username'].'"><span class="'.$sql11['colorpick'].'" style="text-decoration:none;">'.$sql11['username'].'</span></td> 
				                         <td width="606">
										 <form action="index.php?url=lidgroep2&id='.$ip.'&user='.$sql11['id'].'" method="post">
<input type="submit" class="glipperflexbtn" name="allow" id="button" value="Toelaten"/>
</form>
<form action="index.php?url=lidgroep&id='.$ip.'&user='.$sql11['id'].'" method="post">
<input type="submit" class="glipperflexbtn" name="deny" id="button" value="Weigeren" style="margin-left: 100px;"/>
										</td>

				 </tr>   ';
	}
?>


</table>


</div> 
</div><?php } ?><br>
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Verwijder de groep <?php
	$qu9 = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
		$wlpra = mysql_fetch_assoc($qu9);
		echo $wlpra['name'];
?>
</h2> 
</div> 
<div class="content-box-content">



 <!--  <form action="index.php?url=delgroup" method="post">-->
 
 	   <?php
if (filter($_GET['del']) != '1') {
?>	
<form action="index.php?url=groepedit&id=<?php echo "" . htmlspecialchars($_GET["id"]) . ""; ?>&del=1" method="post">
<?php
} else {
?>
<form action="index.php?url=delgroup&id=<?php echo "" . htmlspecialchars($_GET["id"]) . ""; ?>&tnt=56" method="post">
<?php
}
?>
<input type="hidden" name="groupid" value="<?php echo "" . htmlspecialchars($_GET["id"]) . ""; ?>">   
                <table width="766" border="0"> 
  	
	   <?php
if (filter($_GET['del']) != '1') {
?>	   <tr>        
			<td style="margin-left: 10px;">
<font style="color: red;">Pas op: </font> Je groep zal pernament verwijderd worden! Je kan het niet ongedaan maken!		</td> 
	</tr>  
<?php
} else {
?>
<tr>        
			<td style="margin-left: 10px;">
<font style="color: green;">Pas op: </font> Ben je 100% zeker dat je je groep wil verwijderen!? Je kan niet meer terug!	</td> 
	</tr>
<?php
}
?>	<tr>        
			<td>
   <?php
if (filter($_GET['del']) != '1') {
?>	 
	 <input type="submit" class="glipperflexbtn" name="delgroup" id="button" value="Verwijder" style="margin-left: 240px;"/>		
	<?php
} else {
?>
	 <input type="submit" class="glipperflexbtn" name="delgroup" id="button" value="Ja, 100%" style="margin-left: 240px;"/>		
<?php
}
?>
	</td> 
	</tr>

</table>
</form>


</div> 
</div>



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

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Leden verwijderen "; echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('Klik op de gebruiker om de gebruiker te kicken van je groep!');\" onmouseout=\"tooltip.hide();\">
";echo"(?)</span></h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
?>
<?php
$query = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
$galag = mysql_fetch_assoc($query);
$ip = htmlspecialchars($_GET["id"]);
$i2p = htmlspecialchars($_GET["user"]);
$lol = mysql_query("SELECT * FROM users WHERE id = '".$galag['ownerid']."'");
$vie = mysql_fetch_assoc($lol);
echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('".$vie['username']."');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=profile&id=".$vie['username']."\"><img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=".$vie['look']."&size=s\"/></a>
</span>";

$query = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . htmlspecialchars($_GET["id"]) . "'");
            $i = 0;
            while($friends = mysql_fetch_array($query))
            {
                $getfriend = mysql_query("SELECT * FROM users WHERE id ='".$friends['userid']."' LIMIT 1");
                if(mysql_num_rows($getfriend) > 0)
                {
                    $i++;
                    if($i == 1)
                    {
                     
                        echo '';
                    }
                    $friend = mysql_fetch_array($getfriend);
					$friendname = $friend['username'];
					$friendid = $friend['id'];
					$friendlook = $friend['look'];
echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('Kick $friendname');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=groepedit&id=$ip&user=$friendid\"><img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$friendlook&size=s\"/></a>
</span>";
			// if (i2p == $friendid) {
			// }
                }
            }
            if($i > 0)
            if($i2p != "") {
			// "
		echo "	<br><br><br><br>";
						// echo $i2p;
$query = mysql_query("SELECT * FROM users WHERE id = '$i2p'");
	$dde = mysql_fetch_assoc($query);
?> 
   <form action="index.php?url=kickgroep&id=<?php echo $ip; ?>&user=<?php echo $i2p; ?>" method="post">

	 <input type="submit" class="glipperflexbtn" name="delgroup" id="button" value="Kick <?php echo $dde['username']; ?>" style="margin-top: -35px;"/ >		
	</form>
 <?php }
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	// if ($isSTAFF >= 9) {
         echo " </div> </div>
   <br>
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Al mijn groepen</h2> 


	  </div> 

	  <div class=\"content-box-content\"> ";
?>
<?php
$query = mysql_query("SELECT * FROM groups WHERE ownerid = '" . $userid . "'");
	while($groepen = mysql_fetch_assoc($query)) {
	echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('"; echo $array['name'];	$sql = mysql_query("SELECT * FROM users WHERE id = '" . $array['ownerid'] . "'");
 echo "');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=groep&id=".$groepen['id']."\">";
	echo '<img src="{url}/r63/c_images/album1584/'.$groepen['badge'].'.gif"></span></a>';
	}
	
?>
</div>
      


</div>  <?php
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	// if ($isSTAFF >= 9) {
         echo "    <br>
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Andere groepen waar ik lid van ben</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
?>
<?php
$query = mysql_query("SELECT gms.*, g.*  FROM group_memberships gms JOIN groups g ON (gms.groupid = g.id) WHERE gms.userid = '" . $userid . "'");    
while($groepen = mysql_fetch_assoc($query)) {

// $query = mysql_query("SELECT * FROM group_memberships WHERE userid = '" . $userid . "'");	
// if (mysql_num_rows($query) == 0) {
	// echo "Er zijn nog geen groepen gevonden!";
	// } else {
		echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('".$groepen['name']."');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=groep&id=".$groepen['id']."\">";
	echo '<img src="{url}/r63/c_images/album1584/'.$groepen['badge'].'.gif"></span></a>';

	// }
}
?>
</div>
      


</div></div>
<div id="clear"></div> <?php include 'system/footer.php'; ?></div> 
 </div> 
</body></html>