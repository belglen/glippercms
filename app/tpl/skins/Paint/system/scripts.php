<?php
	/* SECURITY FOR SCRIPTS.PHP (securescript($_GET['test'])) */
	function securescript($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string(addslashes($str));
	}
	function beveiliging($string)
	{
		return mysql_real_escape_string(stripslashes($string));
	}

	/* AUTO-BAN SYSTEM */
	$sql = mysql_query("SELECT value FROM bans WHERE bantype = 'ip';");
	$deny = array();
	while (($row = mysql_fetch_assoc($sql))) { $deny[] = $row['value']; }
	if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) 
	{
		  header("location: special/5-Banned/");
		  exit();
	} 

	/* VARIABLES */
	global $users;
	$userid = $_SESSION['user']['id'];
	$isSTAFF = $users->getInfo($userid, 'rank');
	$username = $_SESSION['user']['username'];
	$figure = $_SESSION['user']['look'];
	$motto = $_SESSION['user']['motto'];
	$cr = $_SESSION['user']['credits'];
	$ster = $_SESSION['user']['vip_points'];
	$pxl = $_SESSION['user']['activity_points'];
	$userdata = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = ".$userid));
	$url = securescript($_GET['url']);

	/* OOP coding -> users tabel */
	if ($_GET['url'] != 'home') 
	{
		$getUser = mysql_query("SELECT * FROM users WHERE id = ".$userid."");
		$user = mysql_fetch_object($getUser);
	}
	
	/* ROBOTS */
	if ($_GET['url'] == 'bot')
	{
		$rank = $userdata->rank;
		if ($rank >= 3) 
		{
			$bot_cost = 7;
		} 
		elseif ($isVIP == 1 || $rank == '2') 
		{
			$bot_cost = 9;
		} 
		else 
		{
			$bot_cost = 14;	
		}
	}

	/* GIVE BADGE TO DJ */
	$checkDJ = mysql_query("SELECT user_id,rank FROM dj WHERE user_id = '".$userid."'");
	if (mysql_num_rows($checkDJ) == '1') 
	{
		$getsomeinfo = mysql_fetch_object(mysql_query("SELECT user_id,rank FROM dj WHERE user_id = '".$userid."'"));
		if ($getsomeinfo->rank == 'pdj')
		{
			$DJbadge = 'PDJ';
		}
		elseif ($getsomeinfo->rank == 'dj')
		{
			$DJbadge = 'DDJ';
		}
		elseif ($getsomeinfo->rank == 'hdj')
		{
			$DJbadge = 'HDJ';
		}
		$checkBADGE = mysql_query("SELECT user_id,badge_id FROM user_badges WHERE user_id = '$userid' AND badge_id = '$DJbadge'");
		if (mysql_num_rows($checkBADGE) == '0')
		{
			$insertBADGE = "INSERT INTO user_badges(user_id,badge_id,badge_slot) VALUES ('$userid', '$DJbadge', '0')";
			if (mysql_query($insertBADGE))
			{
				$updateBADGE = mysql_query("UPDATE dj SET badge = '1' WHERE user_id = '$userid'");
			}
		}
	}

	/* REMOVE BADGE FROM DJ */
	$checkifbadge = mysql_query("SELECT user_id,badge_id FROM user_badges WHERE badge_id = 'HDJ' OR badge_id = 'DDJ' OR badge_id = 'PDJ' AND user_id = '$userid'");
	if (mysql_num_rows($checkifbadge) == '1') 
	{
		$checkifdj = mysql_query("SELECT user_id,rank FROM dj WHERE user_id = '$userid'");
		if (mysql_num_rows($checkifdj) == '0')
		{
			$removebadge = "DELETE FROM user_badges WHERE user_id = '$userid' AND badge_id = 'HDJ'";
			$removebadge1 = "DELETE FROM user_badges WHERE user_id = '$userid' AND badge_id = 'DDJ'";
			$removebadge2 = "DELETE FROM user_badges WHERE user_id = '$userid' AND badge_id = 'PDJ'";
			if (mysql_query($removebadge) && mysql_query($removebadge1) && mysql_query($removebadge2))
			{

			}
		}
	}

	/* getPageNews */
	if ($setnews = 'set')
	{
		$newsid = (int)mysql_real_escape_string($_GET['id']);
		$newsinfo = mysql_fetch_object(mysql_query("SELECT * FROM `cms_news` WHERE `id` = '$newsid'"));
		$artikel = $newsinfo->longstory;
		$short = $newsinfo->shortstory;
		$atteuur = $newsinfo->author;
		$titel = $newsinfo->title;
		$auteur = $newsinfo->username;
		$kleur = $newsinfo->kleur;
		$datum = date("D d-m-y", $newsinfo->published);
		$day_of_week = date("D", $newsinfo->published);
		$maandje = date("F", $newsinfo->published);
		$blank = '';
		switch($day_of_week)
		{ 
			 case "Sun": $blank .= "Zondag"; break; 
			 case "Mon": $blank .= "Maandag"; break; 
			 case "Tue": $blank .= "Dinsdag"; break; 
			 case "Wed": $blank .= "Woensdag"; break; 
			 case "Thu": $blank .= "Donderdag"; break; 
			 case "Fri": $blank .= "Vrijdag"; break; 
			 case "Sat": $blank .= "Zaterdag"; break; 
		}
		$blank .= " ".number_format(date("d",$newsinfo->published))." ";
		switch($maandje)
		{ 
			 case "February": $blank .= "Februari"; break; 
			 case "January": $blank .= "January"; break; 
			 case "March": $blank .= "Maart"; break; 
			 case "April": $blank .= "April"; break; 
			 case "May": $blank .= "Mei"; break; 
			 case "June": $blank .= "Juni"; break; 
			 case "July": $blank .= "Juli"; break; 
			 case "August": $blank .= "Augustus"; break; 
			 case "July": $blank .= "September"; break; 
			 case "October": $blank .= "Oktober"; break; 
			 case "November": $blank .= "November"; break; 
			 case "July": $blank .= "December"; break; 
		}
		$blank .= " ".date("Y", $newsinfo->published)." om ".date("H:i", $newsinfo->published);
		$blank = strtolower($blank);
		$look = $newsinfo->look;
		$count = mysql_result(mysql_query("SELECT COUNT(author) AS total FROM cms_news WHERE author=".$newsinfo->author), 0);
		$online = $newsinfo->online==0?"offline":"online";
	}
	
	/* HOUSEKEEPING */
	function housekeeping()
	{
		$userid = $_SESSION['user']['id'];
		$getSTAFF = mysql_query("SELECT * FROM permissions_users WHERE userid = '$userid' AND hk_login = '1'");
		$askS = mysql_num_rows($getSTAFF);
		if ($askS == '1') 
		{
			echo "<div class=\"hk_menuitems menuitems\"><a href=\"/special/4-Housekeeping/\">Housekeeping</a></div>";
		}
	}
	
	/* ANTI-SULAKE */
	$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	if (strpos($hostname,"sulake.com")) 
	{
		header("Location: http://google.be");
	}  
	
	/* INSTALLPAGE */
	function getINSTALL()
	{
		$checkifinstall = mysql_fetch_object(mysql_query("SELECT done,alert FROM install LIMIT 1"));

		if ($checkifinstall->done == '0')
		{
			if (!file_exists('install/step1.php'))
			{
				mkdir(install);
				if (file_exists(install))
				{
					header("Location: install/step1.php");
					$file = fopen("install/copyright.txt","w") or die("Problemen met install #1");
					$stringData = 'Copyright Airblender (c) 2012 - 2013. Please do not copy us - you are warned. Please do not sell or give this CMS to anyone.';
					fwrite($file, $stringData);
					fclose($file);
					rename('special/2-Install/step1.php', 'install/step1.php');
				}
			}
		}
		else
		{
			if (file_exists(install))
			{
				rename('install/step1.php', 'special/2-Install/step1.php');
				unlink('install/copyright.txt');
				if (!file_exists(install/step1.php))
				{
					rmdir("install/");
				}
			}

		}
		if ($checkifinstall->alert == '0')
		{
			echo '<script>window.alert("Welkom bij GlipperCMS! Veel plezier!")</script>';
			mysql_query("UPDATE install SET alert = '1'");
		}
	}
	/* COMMUNITY */
	if ($_GET['url'] == 'community')
	{
		$sql = mysql_query("SELECT * FROM users");
		$count = mysql_num_rows($sql);
		$sql1 = mysql_fetch_object(mysql_query("SELECT SUM(OnlineTime) AS total FROM user_stats"));
		$total = filter($count);
		$english_format_number = number_format($total);
		$english_format_number = str_replace(",", ".",$english_format_number);
		$dagen = round($sql1->total/(3600*24), 0); 
		$jaren = round($sql1->total/(3600*24*365.0), 0); 
	}
	
	/* VIP+ BADGE -> SVIP badge! */
	$checkvipplbadge = mysql_num_rows(mysql_query("SELECT user_id,badge_id FROM user_badges WHERE user_id = '$userdata->id' AND badge_id = 'VIPpl'"));
	if ($checkvipplbadge == '1')
	{
		mysql_query("UPDATE user_badges SET badge_id = 'svip' WHERE user_id = '$userdata->id' AND badge_id = 'VIPpl'");
	}
	$checktomuchsvip = mysql_num_rows(mysql_query("SELECT user_id,badge_id FROM user_badges WHERE user_id = '$userdata->id' AND badge_id = 'svip'"));
	if ($checktomuchsvip > '1')
	{
		mysql_query("DELETE FROM user_badges WHERE user_id = '$userdata->id' AND badge_id = 'svip'");
		mysql_query("INSERT INTO user_badges(user_id,badge_id) VALUES ('$userdata->id','svip')");
	}
	
	/* TOTAL ONLINE */
	function getTotalOnline()
	{
		$rows = mysql_num_rows(mysql_query("SELECT id FROM users WHERE online = '1'"));
		$total = $rows-0;
		echo "$total";
	}
	
	/* CHECKMOBILE */
	include'app/tpl/skins/Paint/system/mobilecheck.php';
	
	function allgroups()
	{
        echo"<br>";
		echo"<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\">";
	    echo"<div class=\"content-box-deep-blue2\" style=\"width:290px\">";
	    echo"<h2 class=\"title\" style=\"padding:0;line-height:30px;\">Al mijn groepen</h2>";
	    echo"</div>";
	    echo"<div class=\"content-box-content\">";
		
		$getall = mysql_query("SELECT * FROM groups WHERE ownerid = '$userid'");
	    while($groepen = mysql_fetch_object($getall)) 
		{
			echo"<span class=\"hotspot\" onmouseover=\"tooltip.show('$groepen->name');\" onmouseout=\"tooltip.hide();\">";
			echo"<a href=\"index.php?url=groep&id=$groepen->id\">";
			echo"<img src=\"r63/c_images/album1584/$groepen->badge.gif\"></span></a>";
		}
	}
	
	/* CADEAUPUNTEN-BADGES */
	$getsite_req_done = mysql_query("SELECT id,user_id,badge_id FROM site_requests_done WHERE user_id = '$userid'");
	if (mysql_num_rows($getsite_req_done) >= '1')
	{
		$request = mysql_fetch_object($getsite_req_done);
		$badge = $request->badge_id;
		$cost = 4;
		if ($userdata->sorry_points >= $cost)
		{
			mysql_query("INSERT INTO user_badges(user_id,badge_id) VALUES ('$userid','$badge')");
			mysql_query("UPDATE users SET sorry_points = sorry_points - $cost WHERE id = '$userid'");
			mysql_query("UPDATE users SET vip_points = vip_points + 1 WHERE id = '$userid'");
			
			if (isset($_GET['modalbadge']))
			{
				echo'<div id="openModal" class="modalDialog">';
				echo'<div>';
				echo'<a href="index.php?url='.$url.'#close" title="Close" class="closeModal">X</a>';
				echo'<h2>Bericht van de {hotelName} staff</h2>';
				echo'<p>Je hebt je badge succesvol gekregen. Herlaad het hotel om je badge te verkrijgen. Heb je het niet? Contacteer ons!</p>';
				echo'<p>De totale prijs van jouw badge was '.$cost.'. Bedankt!</p>';
				echo'</div>';
				echo'</div>';
				mysql_query("DELETE FROM site_requests_done WHERE user_id = '$userid' AND badge_id = '$badge'");
			}
			else
			{
				header("Location: index.php?url=$url&modalbadge=1#openModal");
			}
		}
		else
		{
			if (isset($_GET['modalbadge']))
			{
				if ($userdata->vip_points >= '1')
				{
					mysql_query("UPDATE users SET vip_points = vip_points - 1 WHERE id = '$userid'");
				}
				echo'<div id="openModal" class="modalDialog">';
				echo'<div>';
				echo'<a href="index.php?url='.$url.'#close" title="Close" class="closeModal">X</a>';
				echo'<h2>Bericht van de {hotelName} staff</h2>';
				echo'<p>Je badge is zonet aangekomen in onze servers. Maar helaas heb jij niet genoeg cadeaupunten! Er wordt nu 1 ster afgetrokken wegens misbruik.</p>';
				echo'<p>Vraag de badge nog eens aan.. Vragen? Contacteer admin@glipper.be</p>';
				echo'</div>';
				echo'</div>';				
				mysql_query("DELETE FROM site_requests_done WHERE user_id = '$userid' AND badge_id = '$badge'");
			}
			else
			{
				header("Location: index.php?url=$url&modalbadge=1#openModal");
			}
		}
	}
	if (isset($_GET['modalbadge']) && mysql_num_rows($getsite_req_done) == '0')
	{
		header("Location: index.php?url=$url");
	}

	/* MUS */
	function MUS($command, $data = '')
	{
		$MUSdata = $command . chr(1) . $data;
		$socket = @socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
		@socket_connect($socket, "127.0.0.1", "30001");
		@socket_send($socket, $MUSdata, strlen($MUSdata), MSG_DONTROUTE);    
		@socket_close($socket);
	}
	//MUS("ha","lol");
	
	 /* ANTI MIO-name etc. */
	 $select = mysql_query("SELECT * FROM users WHERE username LIKE 'MIO-' AND rank NOT LIKE '5'");

	 if (mysql_num_rows($select) == '1')
	 {
	 	$badguy = mysql_fetch_object($select);
	 	$get = mysql_query("SELECT id,username FROM users WHERE username = '$badguy->id'");

	 	
	 }

	/* HEADER */
	class newdata
	{
	    private $gebruikersid = "";  

	    public function __construct($gebruikersid)
	    { 
	        $this->userid = $gebruikersid; 
	        return; 
	    } 	    
	    public function DJ()
	    {
			$checkdj = mysql_query("SELECT user_id FROM `dj` WHERE `user_id` = '".$this->userid."'"); 
			if(mysql_num_rows($checkdj) > 0) 
			{ 
				echo"<a href=\"index.php?url=radio\" class=\"dj\">DJ Panel</a>"; 
			}
	    }

	    public function Admin()
	    {
	    	$adminrank = '11';
			$checkstaff = mysql_query("SELECT id,rank FROM `users` WHERE `id` = '".$this->userid."' AND rank = '$adminrank'");
			if(mysql_num_rows($checkstaff) > 0) 
			{ 
				echo"<a href=\"index.php?url=admin\" class=\"admin\">  Admin Panel</a>"; 
			}
	    }
	}
	
	require_once(A . T . S . "Paint/system/class.site.php"); //!importent
	require_once(A . T . S . "Paint/system/class.bootstrap.php"); //!importent
?>