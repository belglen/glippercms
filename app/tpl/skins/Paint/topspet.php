<?php
include 'system/header.php';
include'inc/communitynav.php'; 
?>
</span>
</div>
<style type="text/css">
A:link{
  text-decoration:none;
}

A:visited{
  text-decoration:none;
}

A:active{
  text-decoration:none;
}

A:hover{
  text-decoration:none;
}
</style>

<div id="marginy">
<div style="width: 302px; float: left; margin-top: 0px; margin-right: 0px; margin-left: -5px;">
<div class="content-box" style="width:300px; padding: left; background-color:#fff;">
<div class="content-box-deep-blue2" style="width:290px">
<h2 class="title" style="padding:0;line-height:30px;">Meest ervaring dieren</h2>
</div>
<div class="content-box-content">
<table cellpadding='4' cellspacing='0' width='100%'>
<tr>
<td class='tablesubheader' width='50%' align='center'><b>Dierennaam<br>(Gebruikersnaam)</b></td>
<td class='tablesubheader' width='50%' align='center'><b>Ervaring</b></td>
</tr>
<?PHP
 $sql = mysql_query("SELECT u.id AS uid, u.username, u.colorpick, up.* FROM user_pets up join users u on (up.user_id=u.id) ORDER BY up.expirience DESC LIMIT 15");
 
 while($a = mysql_fetch_array($sql)) {
   $total = $a['expirience']-0;
   $english_format_number = number_format($total);
   $english_format_number = str_replace(",", ".",$english_format_number);

	echo "<tr> 
 <td class='tablerow1' align='center'><hr />".$a['name']."<br>
 <a href=\"index.php?url=profile&id=".filter($a['username'])."\"><span class=\"".$a['colorpick']."\">(".filter($a['username']).")</span></a>
 </td>
 <td class='tablerow2' align='center'><hr /><br>".$english_format_number."</td>

</tr>";
	} ?>

</table>
</div></div></div>
<div style="width: 302px; float: left; margin-top: 0px; margin-right: 0px; margin-left: 7px;">
<div class="content-box" style="width:300px;background-color:#fff;">
<div class="content-box-deep-blue2" style="width:290px">
<h2 class="title" style="padding:0;line-height:30px;">Meest geaaide dieren</h2>
</div>
<div class="content-box-content">
<table cellpadding='4' cellspacing='0' width='100%'>
<tr>
<td class='tablesubheader' width='50%' align='center'><b>Dierennaam<br>(Gebruikersnaam)</b></td>
<td class='tablesubheader' width='50%' align='center'><b>Aantal keer geaaid</b></td>

<?PHP
 $sql = mysql_query("SELECT u.id AS uid, u.username, u.colorpick, up.* FROM user_pets up join users u on (up.user_id=u.id) ORDER BY up.respect DESC LIMIT 15");
 
 while($a = mysql_fetch_array($sql)) {
    $total = $a['respect']-0;
   $english_format_number = number_format($total);
   $english_format_number = str_replace(",", ".",$english_format_number);

	echo "<tr> 
 <td class='tablerow1' align='center'><hr />".$a['name']."<br> <span class=\"".$a['colorpick']."\">(".filter($a['username']).")</span></a></td>
  <td class='tablerow2' align='center'><hr /><br>".$english_format_number."</td>

</tr>";
	}?>
</tr>
</table>
</div></div></div>
<div style="width: 302px; float: right; margin-top: 0px; margin-right: -5px;  ">
<div class="content-box" style="width:300px;background-color:#fff;">
<div class="content-box-deep-blue2" style="width:290px">
<h2 class="title" style="padding:0;line-height:30px;">Meeste gerespecteerde dier</h2>
</div>
<div class="content-box-content">
<table cellpadding='4' cellspacing='0' width='100%'>
<tr>
<td class='tablesubheader' width='50%' align='center'><b>Dierennaam<br>(Gebruikersnaam)</b></td>
<td class='tablesubheader' width='50%' align='center'><b>Respect</b></td>
<?PHP
 $sql = mysql_query("SELECT u.*, up.*, (up.expirience-(up.respect*10)) AS `experience` FROM `user_pets` up join users u ON (up.user_id = u.id) ORDER BY experience DESC LIMIT 15");
 
 while($a = mysql_fetch_array($sql)) {
   $total = number_format($a['experience'],0,',','.'); 

	echo "<tr> 
 <td class='tablerow1' align='center'><hr />".$a['name']."<br> <span class=\"".$a['colorpick']."\">(".filter($a['username']).")</span></a></td>
  <td class='tablerow2' align='center'><hr /><br>".$total."</td>

</tr>";
	} ?>


</tr>
	</table>
</div></div></div>
<div id="clear"></div></div>
</div> </body></html><br><center>
 