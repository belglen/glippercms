<!doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<?php
	include 'inc/config.php';
	if (isset($_COOKIE['user_id']))
	{
		header("Location: me.php");
	}
	?>
	<title>GlipperMobile</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/reveal.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.9.0.js"></script>
    <script src="js/sudoslider.js"></script>
    <script src="js/jquery.reveal.js"></script>
    <script type="text/javascript" src="js/iScroll.js"></script>
    <script type="text/javascript">
	var slide = 1;
		$(document).ready(function(){	
			var sudoSlider = $("#slider").sudoSlider({ customLink:'a.eventclass', auto: false, responsive: true, continuous: false, slideCount: 1, prevNext: false, numeric: false });
			$("#menu").click(function() {
				 sudoSlider.goToSlide(slide);
				 if(slide == 1) { slide = 2; } else { slide = 1; }
			});
			$("#home").click(function() {
				  javascript:document.getElementById('ajax_loader').style.display='block';
				  window.location='index.php';
			});
			sudoSlider.goToSlide(2, 0);
		});	
	</script>
    <script type="text/javascript">
	
	var myScroll;
	var myScroll2;
	function loaded() {
		myScroll = new iScroll('wrapper', { hScrollbar: false, vScrollbar: true, shrinkScrollbar: true });
		myScroll2 = new iScroll('wrapper2', { hScrollbar: false, vScrollbar: true, shrinkScrollbar: true  });
	}
	
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	
	/* * * * * * * *
	 *
	 * Use this for high compatibility (iDevice + Android)
	 *
	 */
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
	/*
	 * * * * * * * */
	
	
	/* * * * * * * *
	 *
	 * Use this for iDevice only
	 *
	 */
	//document.addEventListener('DOMContentLoaded', loaded, false);
	/*
	 * * * * * * * */
	
	
	/* * * * * * * *
	 *
	 * Use this if nothing else works
	 *
	 */
	//window.addEventListener('load', setTimeout(function () { loaded(); }, 200), false);
	/*
	 * * * * * * * */
	
 	</script>

</head>
<body>
    <div class="header">
        <center>
                    <img src="images/large.gif" />
                </center>
        <div class="ajax_loader" id="ajax_loader">
            <img src="images/ajax-loader.gif" />
        </div>
    </div>
    <div id="slider" >
        <ul>
            <li>
                				<div class="content2" id="scroller2">
                </div>            </li>
            <li>
                <div class="content">
                    <div class="basis">
                        Er zijn <font color="#FF9100"><?php $getonline = mysql_num_rows(mysql_query("SELECT id FROM users WHERE online = '1'")); echo $getonline; ?></font> Glipper's online!
                    </div>
                    <div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox">Inloggen</div></div>
                    <div class="g-cont">
                        <div class="inbox">
						<?php
						if (clean($_GET['error']) == 'empty')
						{
							echo'<font color="#FF0000">Geen gebruikersnaam ingevuld</font>';
						}
						elseif (clean($_GET['error']) == 'password')
						{
							echo'<font color="#FF0000">Geen wachtwoord ingevuld</font>';
						}
						elseif (clean($_GET['error']) == 'noexist')
						{
								echo'<font color="#FF0000">Gebruikersnaam bestaat niet</font>';
						}
						elseif (clean($_GET['error']) == 'pwd')
						{
								echo'<font color="#FF0000">Het wachtwoord is onjuist</font>';
						}
						?>
                                                    <form method="POST" action="login.php">
                                Gebruikersnaam<br /><br />
                                <input type="text" name="username" class="invoerveld" value="" /><br /><br />
                                Wachtwoord<br /><br />
                                <input type="password" name="password" class="invoerveld" value="" /><br /><br />
                                <input type="submit" name="inloggen" value="Inloggen" class="submitknop" />
                            </form>
                        </div>
                    </div>
                    <div class="g-pad"></div>
                </div>
            </li>
        </ul>
    </div>
</body>
</html>
<?php
mysql_close($con);
?>