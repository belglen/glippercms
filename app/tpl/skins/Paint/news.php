<?php
$setnews = "set";
include_once 'system/header.php';
include_once 'inc/communitynav.php';
$setnews = "set";
?>
</span>
</div>
<div id="marginy">
<div id="main_right_news">
        <br /><br /><br />
        <?php
		$query = mysql_query("SELECT * FROM cms_news WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
		if (mysql_num_rows($query) == '0') {$exists = 0;}else{$exists = 1;}
		if ($exists == '0')
		{
			?>
            <div class="content-box_news" style="margin-top: 4px;"> 
                <div class="content-box-content"> 
                <i><span style="color:gray;">Het aangevraagde artikel is niet gevonden!</span></i>
                </div> 
            </div> 
            <?php
		}
		else
		{
		?>
        <div class="content-box_news" style="margin-top: 4px;"> 
            <div class="content-box-content"> 
            <i><span style="color:gray;"><?php echo $short;?></span></i><br />
                <?php	$artikel = str_replace("http://cms2.glipper.be/hallo.png", "",$artikel); echo $artikel; ?>
            <br /><i><span style="color:gray;">Geplaatst op <?php echo $blank; ?></span></i>
            </div> 
        </div>
        <?php
		}
		?>
        <br/>
        <?php if ($exists == '1') { ?>
		<div id="news_comments">
        	<div style="position:relative;">
            	<?php
if(isset($_POST['delete']))
{
	$ida = clean($_POST['id']);
	$bestaat = mysql_query("SELECT * FROM `gb` WHERE `id`='$ida'");
	if(mysql_num_rows($bestaat) >= 1 || $data->rank >= 9)
	{
		mysql_query("DELETE FROM `gb` WHERE `id`='$ida'");
	}
}
	$begin = ($_GET['p'] >= 0) ? $_GET['p']*5 : 0;
	$id = clean($_GET['id']);
	$replies = mysql_query("SELECT * FROM `gb` WHERE `nieuwsid`='$id' LIMIT $begin,5");
	if(mysql_num_rows($replies) != 0)
	{
		for($j=$begin+1; $info = mysql_fetch_object($replies); $j++) 
		{
			$pers = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$info->userid'"));
			
            $info->comment = str_replace("[b]", "<b>",$info->comment);
            $info->comment = str_replace("www.", "***",$info->comment);
            $info->comment = str_replace(".nl", "***",$info->comment);
            $info->comment = str_replace(".com", "***",$info->comment);
            $info->comment = str_replace("http://", "***",$info->comment);
            $info->comment = str_replace("holoworld", "***",$info->comment);
			$info->comment = str_replace("holoday", "***",$info->comment);
            $info->comment = str_replace("sim-hotel", "***",$info->comment);
			$info->comment = str_replace("nubhotel", "***",$info->comment);
			$info->comment = str_replace("h0l0w0rld", "***",$info->comment);
            $info->comment = str_replace("fabbo", "***",$info->comment);
            $info->comment = str_replace("junglehotel", "***",$info->comment);
            $info->comment = str_replace("talpahotel", "***",$info->comment);
            $info->comment = str_replace("sunnieday", "***",$info->comment);
            $info->comment = str_replace("harson", "***",$info->comment);
            $info->comment = str_replace("townhotel", "***",$info->comment);
            $info->comment = str_replace("town-hotel", "***",$info->comment);
            $info->comment = str_replace("kut", "***",$info->comment);
            $info->comment = str_replace("shothotel", "***",$info->comment);
            $info->comment = str_replace("bukehotel", "***",$info->comment);
            $info->comment = str_replace("kanker", "***",$info->comment);
            $info->comment = str_replace("kk ", "***",$info->comment);
            $info->comment = str_replace("tyfus", "***",$info->comment);
            $info->comment = str_replace("tering", "***",$info->comment);
            $info->comment = str_replace("[/b]", "</b>",$info->comment);
            $info->comment = str_replace("[i]", "<i>",$info->comment);
            $info->comment = str_replace("[/i]", "</i>",$info->comment);
            $info->comment = str_replace("[u]", "<u>",$info->comment);
            $info->comment = str_replace("[/u]", "</u>",$info->comment);
			if ($pers->gender == 'M')
			{
				echo'<div style="position:relative;float:left;height:66px;width:64px;padding:5px;background: none repeat scroll 0% 0% rgba(102,153,255,0.7);border-radius: 6px 6px 6px 6px;border-color: gray;">';
			}
			else
			{
				echo'<div style="position:relative;float:left;height:66px;width:64px;padding:5px;background: none repeat scroll 0% 0% rgba(255,153,204,0.7);border-radius: 6px 6px 6px 6px;border-color: gray;">';
			}
			echo'<img alt="'.$pers->username.'" src="/cache/hoofd/head.php?figure='.$pers->look.'" />';
			echo'</div>';
			
			/*!*/
			
			echo'<div style="position:relative;background: none repeat scroll 0% 0% rgb(255, 255, 255);max-height:64px;min-height:64px;border:1px solid rgb(173,173,173);box-shadow: 0px 2px rgba(0,0,0,0.2);padding:4px;margin-bottom:6px;border-radius:5px 5px 5px 5px; color: rgb(0, 0, 0);float:right;min-height:64px;width:500px;margin-right:9px;">';
			if($pers->id == $_SESSION['user']['id'] || $_SESSION['user']['rank'] >= 9)
			{
				echo"<div style=\"float: right;\">
						<form method=\"post\">
							<input type=\"hidden\" name=\"id\" value=\"".$info->id."\"/>	
							<input type=\"submit\" class=\"glipperflexbtn\" value=\"Verwijderen\" name=\"delete\">
						</form></div>";
			}

				echo'<div style="padding:6px;"><a href="index.php?url=profile&amp;id='.$pers->username.'" style="color:rgb(108,136,168);cursor:pointer;text-decoration:none;font-weight:bold;">'.$pers->username.'</a><br />'.$info->comment.'
					</div>';
					/*!*/
			echo'
			</div> 
			<br /><br /><br /><br /><br /><br /><br />
';
		}
		$dbres = mysql_query("SELECT * FROM `gb` WHERE `nieuwsid`='$id'");
		print "<table width=98%><tr><td align=\"center\">";
		
		if(mysql_num_rows($dbres) <= 5)
		{
			print "&#60; 1 &#62;</td></tr></table>\n";
		}
		else 
		{
			if($begin/5 == 0)
			{
				print "&#60; ";
			}
			else
			{
				print "<a href=\"index.php?url=news&id={$_GET['id']}&p=". ($begin/5-1) ."\">&#60;</a> ";
			}
			
			for($i=0; $i<mysql_num_rows($dbres)/5; $i++) 
			{
				print "<a href=\"index.php?url=news&id={$_GET['id']}&p=$i\">". ($i+1) ."</a> ";
			}
		
			if($begin+5 >= mysql_num_rows($dbres))
			{
				print "&#62; ";
			}
			
			else
			{
				print "<a href=\"index.php?url=news&id={$_GET['id']}&p=". ($begin/10+1) ."\">&#62;</a>";
			}
			print "</td></tr></table>\n";
		}

	}
?>
                    	
    </div>
    </div>
    <?php } ?>
    </div>
    <div id="main_left_news">
    <div class="glipperflexnewsbar"><h2 class="title"><?php if ($exists == '0'){echo"Het aangevraagde artikel is niet gevonden!";}else{echo $titel;} ?></h2></div>
    <?php if ($exists == '1') { ?>
<div class="content-box_news" style="margin-top: 12px;width:300px;background-color:#fff;margin-bottom:13px;">
<div class="content-box-content">
<?php
$z = 0;
$authors = explode(",", $atteuur);
$output = "";
$output .= '<style type="text/css">#news {font-weight: bold;} #news a {text-decoration:none;}</style>';
$author1 = new User($authors[0]);
$count1 = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$author1->id), 0);
$online = $author1->online==0?"offline":"online";
if (!isset($authors[1]))
{
	$output .= "De schrijver van dit bericht is <span id=\"news\" class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span><br /><br />- ".$author1->username." heeft <i>$count1</i> bericht(en) geplaatst.<br />- ".$author1->username." is op dit moment <i>$online</i>.<br><br>- Klik <a href=\"index.php?url=profile&amp;id=".$author1->username."\">hier</a> om zijn profiel te bekijken!<br/>";
}
else
{
	$output .= "De schrijvers van dit bericht zijn ";
	if (isset($authors[1]) && (!isset($authors[2]) && !isset($authors[3]) && !isset($authors[4]) && !isset($authors[5])))
	{
		$author2 = new User($authors[1]);
		$count2 = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$author2->id), 0);
		$check = ($author1->online + $author2->online);
		switch ($check)
		{
			case '0':
				$x = "De twee auteurs zijn <i>offline</i>.";
			break;
			case '1':
				$x = '';
				if ($author1->online == '1')
				{
					$x .= "Alleen <strong><span class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span></strong> ";
				}
				else
				{
					$x .= "Alleen <strong><span class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span></strong> ";
				}
				$x .= "is <i>online</i>.";
			break;
			case '2':
				$x = "<strong><span id=\"news\" class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span></strong> en <strong><span id=\"news\" class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span></strong> zijn allebei <i>online</i>!";
			break;
		}
		$totalcount = ($count1 + $count2);
		$output .= "<span id=\"news\" class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span> en <span id=\"news\" class=\"".$author2->kleur."\"><a id=\"news\" href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span><br /><br />- Samen hebben ze <i>$totalcount</i> bericht(en) geplaatst. <br>- $x";
	}
	else if ((isset($authors[1]) && isset($authors[2])) && (!isset($authors[3]) && !isset($authors[4]) && !isset($authors[5])))
	{
		$author2 = new User($authors[1]);
		$author3 = new User($authors[2]);
		$count2 = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$author2->id), 0);
		$count3 = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$author3->id), 0);
		$totalcount = ($count1 + $count2 + $count3);
		$check = ($author1->online + $author2->online + $author3->online);
		switch ($check)
		{
			case '0':
				$x = "De drie auteurs zijn <i>offline</i>.";
			break;
			case '1':
				$x = '';
				if ($author1->online == '1')
				{
					$x .= "Alleen <strong><span class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span></strong> ";
				}
				else if ($author2->online == '1')
				{
					$x .= "Alleen <strong><span class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span></strong> ";
				}
				else if ($author3->online == '1')
				{
					$x .= "Alleen <strong><span class=\"".$author3->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author3->username."\">".$author3->username."</a></span></strong> ";
				}
				$x .= "is <i>online</i>.";
			break;
			case '2':
				if (($author1->online == '1' && $author2->online == '1'))
				{
					$x .= "<strong><span class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span></strong> en <strong><span class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span></strong> zijn allebei online.";
				}
				else if (($author1->online == '1' && $author3->online == '1'))
				{
					$x .= "<strong><span class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span></strong> en <strong><span class=\"".$author3->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author3->username."\">".$author3->username."</a></span></strong> zijn allebei online.";
				}
				else if (($author2->online == '1' && $author3->online == '1'))
				{
					$x .= "<strong><span class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span></strong> en <strong><span class=\"".$author3->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author3->username."\">".$author3->username."</a></span></strong> zijn allebei online.";
				}
			break;
			case '3':
				$x = "Alle auteurs van dit bericht zijn <i>online</i>!";
			break;
		}

		$output .= "<span id=\"news\" class=\"".$author1->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author1->username."\">".$author1->username."</a></span>, <span id=\"news\" class=\"".$author2->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author2->username."\">".$author2->username."</a></span> en <span id=\"news\" class=\"".$author3->kleur."\"><a href=\"index.php?url=profile&amp;id=".$author3->username."\">".$author3->username."</a></span>.<br /><br />- Samen hebben ze <i>$totalcount</i> bericht(en) geplaatst. <br>- $x";
	}
}
echo $output; ?>	
</div></div>
<?php } ?>
    <div class="content-box_news" style="margin-top: 12px;width:300px;background-color:#fff;margin-bottom:13px;">
        <div class="content-box-content">
    		{newsList}
        </div>
    </div>
    <?php if ($exists == '1') { ?>
    <div class="content-box_news" style="overflow: hidden;margin-top: 12px;width:300px;background-color:#fff;margin-bottom:13px;">
        <div class="content-box-content">
	<?php
    $userid = $_SESSION['user']['id'];
    $data = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$userid'"));
    
    $id = clean($_GET['id']);

	$info = "";
	if(isset($_POST['verzend']))
	{
		$info = htmlspecialchars(clean($_POST['info']));
		$checkinfo = mysql_query("SELECT * FROM `gb` WHERE `nieuwsid`='$id' AND `userid`='".$_SESSION['user']['id']."'");
		if(strlen($info) > 500)
		{
			echo"<div class=\"error\">Bericht kan niet meer dan 500 tekens bevatten</div>";
		}
		else if(strlen($info) < 3)
		{
			echo"<div class=\"error\">Bericht moet meer dan 3 tekens bevatten</div>";
		}
		else
		{
			if(mysql_num_rows($checkinfo) >= 3)
			{
				echo"<div class=\"error\">Je hebt al drie reacties geplaatst</div>";
			}
			else
			{
				echo"<div class=\"succes\">Jouw reactie is succesvol geplaatst</div>";
				mysql_query("INSERT INTO `gb`(`userid`,`comment`,`nieuwsid`,`date`) values ('".$_SESSION['user']['id']."','$info','$id','".time()."')");
			}
		}
	}
	
	
	echo"<form method=\"post\">";
	echo'
	<style type="text/css">
	textarea {width: 270px;}
	</style>
	';
	echo"<div class=\"invoerveld\"><label for=\"info\"></label><textarea name=\"info\" rows=\"6\" width=\"200px\" cols=\"10\"></textarea></div><div id=\"clear\"></div><br>";
	echo"<div class=\"invoerveld\"><label for=\"verzend\"> </label><input type=\"submit\" class=\"glipperflexbtn\" name=\"verzend\" value=\"Verstuur\" /></div>";
	echo"</form><br><br>";
?>
<br />
        </div>
    </div>
    <?php } ?>
</div>