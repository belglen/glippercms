<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
mysql_query("UPDATE users_online SET online = (SELECT count(*) FROM users WHERE online = '1')");
 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
if (strpos($hostname,"sulake.com")) {
	header("Location: http://google.be");
}
include 'app/tpl/skins/Paint/system/mobilecheck.php';
$test = explode("=",$_SERVER[REQUEST_URI]);
if (!isset($test[1]))
{
	$test2 = explode("/",$test[0]);
	header("Location: index.php?url=".$test2[1]."");
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script> 
var cimagesLocation = '<?php echo $_CONFIG['hotel']['url']; ?>/';
var news = new Array();
news[1] = ["{newsID-1}","{newsIMG-1}","{newsCaption-1}","{newsTitle-1}"];
news[2] = ["{newsID-2}","{newsIMG-2}","{newsCaption-2}","{newsTitle-2}"];
news[3] = ["{newsID-3}","{newsIMG-3}","{newsCaption-3}","{newsTitle-3}"];
news[4] = ["{newsID-4}","{newsIMG-4}","{newsCaption-4}","{newsTitle-4}"];
news[5] = ["{newsID-5}","{newsIMG-5}","{newsCaption-5}","{newsTitle-5}"];
</script> 
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
mango.news.init();
});
</script> 
<script src="app/tpl/skins/Paint/js/mango.js" type="text/javascript"></script>
<link href="app/tpl/skins/Paint/styles/index-page.css" rel="stylesheet" />
</head>
<body>
<div id="topbalky">
	<div id="mainy">
		<a href="index.php?url=register">
		<img id="img1" alt="registreren" height="48"src="app/tpl/skins/Paint/images/login/registreren1.png" style="border: 0" width="174" />
		</a></div>
</div>
<div id="contain">
	<div id="mainy">
		<div id="leaugeau1" class="floatLeft">
		</div>

		<div id="eaunline" class="floatRight">
			<h1>Er zijn {online} Glipper's online!</h1>
			<h2>En er zijn <?php echo mysql_num_rows(mysql_query("SELECT id FROM users")); ?> <span style="position:relative;">Glipper's geregistreerd!</span></h2>
		</div>
		<div id="contentbg" class="floatLeft">
			<div id="nieuws" class="floatLeft">
				<div id="main_right">
					<div id="top_stories">

						<div id="top-story">
							<div id="top-snippet">
							</div>
						</div>
						<?php include 'subnews.php'; ?>
				
					</div>
				</div>
			</div>
			<div id="inloggen" class="floatRight">
				<div>

					<h3>Inloggen op Glipper</h3>
				</div>
				<div class="hr floatLeft">
				</div>
				<div class="content-login-mid2 floatLeft">
										<form action="index.php?url=index" method="post">
						<table style="margin-top: 7px; width: 100%;">
							<tr>

								<td style="text-align: right; padding-bottom: 10px; padding-right: 10px; font-size: 16px; text-shadow: 1px 1px 0px #FFFFFF;">Gebruikersnaam</td>
								<td>
								<input id="username" name="log_username" style="width: 190px;" type="text"/></td>
							</tr>
							<tr>
								<td>
								<div style="margin-top: 6px;">
								</div>

								</td>
							</tr>
							<tr>
								<td style="text-align: right; padding-bottom: 10px; padding-right: 10px; font-size: 16px; text-shadow: 1px 1px 0px #FFFFFF;">Wachtwoord</td>
								<td>
								<input id="password" name="log_password" style="width: 190px;" type="password" /></td>
							</tr>
							<tr>

								<td>
								<div style="margin-top: 6px;">
								</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
						<b>		<input id="button" name="login" style="font-size: 18px; color: #000; font-weight: normal; background-color: white; width: 194px; height: 42px; padding: 8px; border: 1px #939393 solid;" type="submit" class="glipperflexbtn" value="Inloggen" />
</b>
								</td>
							</tr>
						</table>
					</form>
					<div class="hr floatLeft" id="registers"><br><a href="index.php?url=register"><h3><!--<span style="margin-left:98px;">--><center>Registreer Gratis!</center></h3><!--</span>--></a>			
					</div>
	</div>
			</div>
		</div>

		

		<div id="descrip">
		
						<div id="noticias">	
			<div class="evento furnis">
				<div class="titulo">Nieuwe meubels!</div>
				<div class="texto">
					<h3>NIEUWSTE VAN HET NIEUWSTE!</h3>
					We updaten onze catalogus met nieuwste meubels!
					
				</div>
			</div>
			
			<div class="evento concursos">
				<div class="titulo">Compititie's en events.</div>
				<div class="texto">
					<h3>Event</h3>
					We organiseren elke keer weer nieuwe toffe event's!
					
				</div>
			</div>
			
			<div class="evento actual">
				<div class="titulo">Voel je je niet op je gemak?</div>
				<div class="texto">
					<h3>Help!</h3>
					Als je je eens niet goed voelt bij sommigen in Glipper, geef diegene dan direct aan!
					
				</div>
			</div>			<div id="footert"><img src="app/tpl/skins/Paint/images/footer.gif">
				<p>GlipperLayout alleen te gebruiken op <a href="http://www.glipper.be" target="_blank">http://www.glipper.be</a>.</p>

				<p>&copy; 2012-2013 <a href="#">Airblender</a>.</p>
			</div>
			</div>
		</div>
</div>

</body>

</html>