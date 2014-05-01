<!doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php
	include 'inc/config.php';
	include 'inc/vars.php';
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/reveal.css" rel="stylesheet" type="text/css">
	<title>GlipperMobile: Staff's!</title>
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
                    <div class="menu" id="menu"><a href="#"><img src="images/menu.png" /></a></div>
                    <div class="home" id="home"><a href="index.php"><img src="images/home.png" /></a></div>
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
                        Er zijn <font color="#FF9100"><?php $getonline = mysql_num_rows(mysql_query("SELECT id FROM users WHERE online = '1'")); echo $getonline; ?></font> Glipper's online!
                    </div>
					                   
					<?php
					$getSTAFFIES = mysql_query("SELECT id,username,colorpick,motto,description,rank,rankname,look FROM users WHERE rank IN (4,5,6,11) ORDER BY rank DESC");
					while ($staff = mysql_fetch_object($getSTAFFIES))
					{
					?>
					<div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox"><?php echo $staff->rankname; ?></div></div>
                    <div class="g-cont">
                        <div class="inbox">
                        	<div class="links2">
								<div class="StaffBox2" style="margin-top:0px;">
									<div class="StaffBox2">
										<img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $staff->look; ?>&gesture=sml&action=crr=667" height="110" width="64" style="float:left"/>
										<div class="staff_online"></div>
										<div class="staff_username">
										<span class="<?php echo $staff->colorpick; ?>"><?php echo $staff->username; ?></span> - <?php echo $staff->rankname; ?></div>Motto: <?php echo $staff->motto; ?>
										</br><br /><?php echo $staff->description; ?><br /><br />
										</div>
									</div>
								</div>
							</div>                            
						</div>					
					<?php } ?>
											<div class="g-pad"></div>

                </div>                   
            </div>
            </li>
        </ul>
    </div>
</body>
</html>