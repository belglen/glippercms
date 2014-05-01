<!DOCTYPE html>
<html>
    <head>
    	<?php
		if (!isset($_SESSION['user']['id'])){header("Location: index.php?url=index");exit();}
		?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="app/tpl/skins/Paint/styles/disconnected.css" rel="stylesheet" type="text/css" media="screen">
        <title>Disconnect</title>
    </head>
    <body>
        <div id="box"><center><font size="18"><b>Disconnected</b></font></center>
            <img src="app/tpl/skins/Paint/images/frank_off.gif" align="left"/><br /><br />Oei.. Het lijkt dat je uit het hotel gevallen bent! Hopelijk geraak je er zonder problemen weer in! Frank zal je wel weer naar binnen brengen, als je braaf bent geweest!<br />
            <br /><br /><b>&nbsp;&nbsp;&nbsp;De mogelijke oorzaken:</b>
            <ul>
                <li>Een staff heeft je uit de client gekickt</li>
                <li>Het hotel is offline</li>
                <li>Er is een error opgetreden</li>
                <li>Je bent verbannen</li>
            </ul><br />
            Klik op de onderstaande knop om naar de site te gaan. Indien het hotel offline is, zal u verdere informatie op de site vinden. Als het blijkt dat u verbannen bent, kan u meer info vragen via onze helptool!
            <br /> <br /><br /><br /><br /><center><img src="app/tpl/skins/Paint/images/glipperlogo.gif" /></center><br /><br />
            <center><a href="index.php?url=me"><img src="app/tpl/skins/Paint/images/go.png" /></a></center>
        </div>
        <div id="footer"><center>Deze pagina is gemaakt door Len. Bestemd voor GlipperCMS &COPY;</center></div>
    </body>
</html>
