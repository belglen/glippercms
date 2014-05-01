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
	<title>GlipperMobile: nieuws!</title>
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
						Het laatste nieuws
                    </div>
					                   

					<?php
						$getnews = mysql_query("SELECT id,title,longstory FROM cms_news ORDER BY id DESC LIMIT 5");
						while ($news = mysql_fetch_object($getnews))
						{
					?>
 <div class="g-pad"></div>
                    <div class="g-flex"><div class="inbox"><?php echo $news->title; ?></div></div>
                    <div class="g-cont">
                        <div class="inbox">
							<?php echo $news->longstory; ?>
                    </div>
                    <div class="g-pad"></div>               
					</div>

					<?php
					}
					?>
            </div>
            </li>
        </ul>
    </div>
</body>
</html>