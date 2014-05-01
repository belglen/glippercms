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
	<title>GlipperMobile: Top Glipper's!</title>
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
					                   

					<div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox">Meest actieve Glipper's</div></div>
                    <div class="g-cont">
                        <div class="inbox">
                        	<div class="links2">
                                <table cellpadding='4' cellspacing='0' width='100%'> 
                                <tr> 
                                <td class='tablesubheader' width='50%' align='center'><b>Naam</b></td> 
                                <td class='tablesubheader' width='50%' align='center'><b>Uren</b></td>   
                                </tr>
									<?php
										$sql = mysql_query("SELECT u.username, u.colorpick AS kleur,us.OnlineTime FROM user_stats us join users u on (us.id=u.id) ORDER BY us.OnlineTime DESC LIMIT 15");
										 
										while($a = mysql_fetch_array($sql)) 
										{
											$total = round($a['OnlineTime']/3600);
											$english_format_number = number_format($total);
											$english_format_number = str_replace(",", ".",$english_format_number);
									?>
                                <tr> 
								<td class='tablerow1' align='center'><hr />
								<span class="<?php echo $a['kleur']; ?>"><?php echo $a['username']; ?></span></td> 
								<td class='tablerow2' align='center'><hr />
								<?php echo $english_format_number; ?>
								</td>
								</tr>
								<?php } ?>
								</table>
                            </div>                   
						</div>
					</div>
					
					<div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox">Meeste koekjes</div></div>
                    <div class="g-cont">
                        <div class="inbox">
                        	<div class="links2">
                                <table cellpadding='4' cellspacing='0' width='100%'> 
                                <tr> 
                                <td class='tablesubheader' width='50%' align='center'><b>Naam</b></td> 
                                <td class='tablesubheader' width='50%' align='center'><b>Koekjes</b></td>   
                                </tr>
									<?php
										$sql = mysql_query("SELECT u.username, u.colorpick AS kleur,us.respect FROM user_stats us join users u on (us.id=u.id) ORDER BY us.respect DESC LIMIT 15");
										 
										while($a = mysql_fetch_array($sql)) 
										{
											$total = clean($a['respect']);
											$english_format_number = number_format($total);
											$english_format_number = str_replace(",", ".",$english_format_number);
									?>
                                <tr> 
								<td class='tablerow1' align='center'><hr />
								<span class="<?php echo $a['kleur']; ?>"><?php echo $a['username']; ?></span></td> 
								<td class='tablerow2' align='center'><hr />
								<?php echo $english_format_number; ?>
								</td>
								</tr>
								<?php } ?>
								</table>
                            </div>                   
						</div>
					</div>
					
					<div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox">Rijkste Glipper's</div></div>
                    <div class="g-cont">
                        <div class="inbox">
                        	<div class="links2">
                                <table cellpadding='4' cellspacing='0' width='100%'> 
                                <tr> 
                                <td class='tablesubheader' width='50%' align='center'><b>Naam</b></td> 
                                <td class='tablesubheader' width='50%' align='center'><b>Sterren</b></td>   
                                </tr>
									<?php
										$sql = mysql_query("SELECT id,username,vip_points,colorpick as kleur FROM users WHERE username <> 'Airblender' ORDER BY vip_points DESC LIMIT 15");
										 
										while($a = mysql_fetch_array($sql)) 
										{
											$total = clean($a['vip_points']);
											$english_format_number = number_format($total);
											$english_format_number = str_replace(",", ".",$english_format_number);
									?>
                                <tr> 
								<td class='tablerow1' align='center'><hr />
								<span class="<?php echo $a['kleur']; ?>"><?php echo $a['username']; ?></span></td> 
								<td class='tablerow2' align='center'><hr />
								<?php echo $english_format_number; ?>
								</td>
								</tr>
								<?php } ?>
								</table>
                            </div>                   
						</div>
					</div>

            </div>
            </li>
        </ul>
    </div>
</body>
</html>