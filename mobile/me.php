<!doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php
	include 'inc/config.php';
	session_start();
	if (!isset($_SESSION['username'])) { header("Location: index.php");	 exit; }
	
	$pers = mysqli_fetch_object(mysqli_query($connectie, "SELECT * FROM `users` WHERE `id` = '".(int)$_SESSION['id']."'"));
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/reveal.css" rel="stylesheet" type="text/css">
	<title>GlipperMobile :: <?php echo $pers->username; ?></title>
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
	document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
 	</script>

</head>
<body>
    <div class="header">
        <center>
                    <div class="menu" id="menu"><a href="#"><img src="images/menu.png"  style="margin-top: 5px;" /></a></div>
                    <div class="home" id="home"><a href="index.php"><img src="images/home.png" style="margin-top: 5px;" /></a></div>

                </center>
        <div class="ajax_loader" id="ajax_loader">
            <img src="images/ajax-loader.gif" />
        </div>
    </div>

    <div id="slider" >
        <ul>
            <li>
				<?php include'inc/menu.php'; ?>
            </li>
            <li>
            <div id="wrapper">
            	<div class="content" id="scroller">


                    <div class="basis">
                    </div>
                    <div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox1">GlipperMobile!</div></div>
                    <div class="g-cont">
                        <div class="inbox">
							<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $pers->look; ?>&head_direction=3&direction=3&gesture=sml&action=crr=5" align="right" />
							<?php echo $getinfo->username; ?>
                            <br />Je hebt op dit moment<br /><br />
                            <table width="2%">
                            <tr>
                            <td>
                            <font color="#6CC"><?php echo $pers->vip_points; ?></font>
                            </td><td>Sterren</td></tr>
                            <tr>
                            <td>
                            <font color="#6CC"><?php echo $pers->credits; ?></font>
                            </td><td>Credits</td></tr><tr><td><font color="#6CC"><?php echo $pers->activity_points; ?></font></td><td>Pixels</td></tr></table><br /><br />
							Er zijn op dit moment <font color="#FF9100"><?php print(mysqli_num_rows(mysqli_query($connectie, "SELECT mf.*,u.id,u.online FROM messenger_friendships mf JOIN users u ON (mf.user_one_id = $pers->id AND u.id = mf.user_two_id AND u.online = '1')"))); ?></font> vrienden van je online!<br /><br />Het record aantal Glipper's online staat momenteel op <font color="#FF9100">39</font>.                        </div>
                    </div>
                    <div class="g-pad"></div>
                </div>
            </div>
            </li>
        </ul>
    </div>
</body>
</html>