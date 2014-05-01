<title>{hotelName}</title>
	<script type="text/javascript"> 
		var habboName = "<?php echo $username ?>";
		var habboReqPath = "{url}";
		var habboStaticFilePath = "http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery";
		var habboImagerUrl = "http://www.habbo.com/habbo-imaging/";
		var habboPartner = "";
		var habboDefaultClientPopupUrl = "{url}/client";
		window.name = "ClientWndw";
		if (typeof HabboClient != "undefined") { HabboClient.windowName = "ClientWndw"; }
	</script> 

<link rel="alternate" type="application/rss+xml" title="Habbo Hotel - RSS" href="http://www.habbo.com/articles/rss.xml" /> 
<script src="app/tpl/skins/{skin}/client/libs2.js" type="text/javascript"></script> 
<script src="app/tpl/skins/{skin}/client/visual.js" type="text/javascript"></script> 
<script src="app/tpl/skins/{skin}/client/libs.js" type="text/javascript"></script> 
<script src="app/tpl/skins/{skin}/client/common.js" type="text/javascript"></script> 
 
<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery/static/styles/common.css" type="text/css" /> 
 
<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery/static/styles/habboflashclient.css" type="text/css" /> 
<?php
require_once("inc/conf.php")

$query = mysql_query("UPDATE users SET home_room = '".$startroom."'");

?>
<noscript> 
    <meta http-equiv="refresh" content="0;url=/client/nojs" />
</noscript> 
 
<link rel="stylesheet" href="app/tpl/skins/{skin}/client/client.css" type="text/css" /> 
<script src="app/tpl/skins/{skin}/client/habboflashclient.js" type="text/javascript"></script>

<script type="text/javascript"> 
    FlashExternalInterface.loginLogEnabled = false;
    FlashExternalInterface.logLoginStep("web.view.start");
    
    if (top == self) {
        FlashHabboClient.cacheCheck();
    }
    var flashvars = {
            "client.allow.cross.domain" : "0", 
            "client.notify.cross.domain" : "1", 
            "connection.info.host" : "{server_ip}", 
            "connection.info.port" : "1232", 
            "site.url" : "{url}/", 
            "url.prefix" : "{url}/", 
            "client.reload.url" : "{url}/client", 
            "client.fatal.error.url" : "{url}/disconnected", 
            "client.connection.failed.url" : "{url}/disconnected", 
            "external.variables.txt" : "{external_vars}", 
            "external.texts.txt" : "{external_texts}", 
            "productdata.load.url" : "{product_data}", 
            "furnidata.load.url" : "{furni_data}", 
            "use.sso.ticket" : "1",
            "sso.ticket" : "{sso}", 
            "processlog.enabled" : "0", 
            "account_id" : "1", 
            "client.starting" : "{hotelName} is aan het opstarten :-D", 
            "flash.client.url" : "{swf_folder}/", 
            "user.hash" : "31385693ae558a03d28fc720be6b41cb1ccfec02", 
            "has.identity" : "0", 
            "flash.client.origin" : "popup",
            "token" : "{sso}"
    };
    var params = {
        "base" : "{swf_folder}/",
        "allowScriptAccess" : "always",
        "menu" : "false"                
    };
    
    if (!(HabbletLoader.needsFlashKbWorkaround())) {
    	params["wmode"] = "opaque";
    }
    swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.0.0", "http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery/flash/expressInstall.swf", flashvars, params);
 
    window.onbeforeunload = unloading;
    function unloading() {
        var clientObject;
        if (navigator.appName.indexOf("Microsoft") != -1) {
            clientObject = window["flash-container"];
        } else {
            clientObject = document["flash-container"];
        }
        try {
            clientObject.unloading();
        } catch (e) {}
    }
</script>

<body id="client" class="flashclient">
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<script>
	var refreshId = setInterval(function()
	{
	     $('#TheStats').fadeOut("slow").load('./banner/count.php').fadeIn("slow");
	}, 10000);
	</script>


			<div style="margin-top: -35px; float:right; margin-right: 15px">
			<object data="player2.swf?bgcolor=0xeaeaea&amp;iconcolor=0x000000&amp;textcolor=0x666666&amp;barcolor=0x666666&amp;pathcolor=0xFFFFFF&amp;buttoncolor=0xD2D2D2&amp;buttonhovercolor=0x0099cc&amp;soundFile=http://fm.dotxen.com:8000/live.ogg" type="application/x-shockwave-flash" width="181" height="41" hspace="0" vspace="0" align="top" class="texto_ouca"> 
				<param name="movie" value="player2.swf?bgcolor=0xeaeaea&amp;iconcolor=0x000000&amp;textcolor=0x666666&amp;barcolor=0x666666&amp;pathcolor=0xFFFFFF&amp;buttoncolor=0xD2D2D2&amp;buttonhovercolor=0x0099cc&amp;soundFile=http://fm.dotxen.com:8000/live.ogg">
				<param name="quality" value="high"> 
				<param name="menu" value="false">
				<param name="wmode" value="transparent"> 
			</object> 
					</div>
<div id="overlay"></div>
<img src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery/v2/images/page_loader.gif" style="position:absolute; margin: -1500px;" />

<div id="client-ui" >
    <div id="flash-wrapper">
    <div id="flash-container">
        <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">

<div class="cbb clearfix">
    <h2 class="title">Please update your Flash Player to the latest version.</h2>
    <div class="box-content">
            <p>You can install and download Adobe Flash Player here: <a href="http://get.adobe.com/flashplayer/">Install flash player</a>. More instructions for installation can be found here: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">More information</a></p>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1586/web-gallery/v2/images/client/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
    </div>
</div>

        </div>
        <script type="text/javascript">
            $('content').show();
        </script>
        <noscript>
            <div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
                <p>If you are not automatically redirected, please <a href="/client/nojs">click here</a></p>
            </div>
        </noscript>
    </div>
    </div>
         
</div>