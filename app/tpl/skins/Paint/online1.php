<?php
include 'system/header.php';
include'inc/communitynav.php'; 
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 

<div class="glipperflexbox"> 
<div class="glipperflexbar"> 
<h2 class="title">Online Glipper's (Totaal: <?php getTotalOnline(); ?>)
</h2> 
</div>
<div class="glipperflexcont"> 
<?php
	$begin = ($_GET['p'] >= 0) ? $_GET['p']*10 : 0;
	$online = mysql_query("SELECT * FROM `users` WHERE `online` = '1' LIMIT $begin,10");
	if (mysql_num_rows($online) == '0')
	{
		echo"<div class=\"hoofdcat\"><b>Er zijn geen online Glipper's</div>";
	}
	else
	{
		for($j=$begin+1; $info = mysql_fetch_object($online); $j++) 
		{
			$info->motto = nl2br($info->motto);
			$info->motto = str_replace("|", "&hearts;",$info->motto);
			$info->motto = str_replace("kut", "***",$info->motto);
			$info->motto = str_replace("Street", "Glipper",$info->motto);
			echo'<div id="StaffBox">';
			echo'<div id="StaffBox">';
			echo'<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure='.$info->look.'"style="float:left"/>';
			echo'<div id="staff_username">';
			echo'<div class="'.$info->colorpick.'">';
			echo'<a href="index.php?url=profile&id='.$info->username.'">'.$info->username.'</a>';
			echo'</div>';
			echo'</div>'.$info->motto.'</br></div></div><br/><hr>';
		}		
		$dbres = mysql_query("SELECT id FROM `users` WHERE `online`='1'");
		print "<table width=98%><tr><td align=\"center\">";
		
		if(mysql_num_rows($dbres) <= 10)
		{
			print "&#60; 1 &#62;</td></tr></table>\n";
		}
		else 
		{
			if($begin/10 == 0)
			{
				print "&#60; ";
			}
			else
			{
				print "<a href=\"index.php?url=online&p=". ($begin/10-1) ."\">&#60;</a> ";
			}
			
			for($i=0; $i<mysql_num_rows($dbres)/10; $i++) 
			{
				print "<a href=\"index.php?url=online&p=$i\">". ($i+1) ."</a> ";
			}
		
			if($begin+10 >= mysql_num_rows($dbres))
			{
				print "&#62; ";
			}
			
			else
			{
				print "<a href=\"index.php?url=online&p=". ($begin/10+1) ."\">&#62;</a>";
			}
			print "</td></tr></table>\n";
		}

	}
?>
</div>
</div>


</div> 
</div> 





</div> 
<div id="clear"></div></div> 
</div> 
</body></html>

<?php 
include 'system/footer.php';
?>