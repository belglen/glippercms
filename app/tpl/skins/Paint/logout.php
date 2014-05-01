<?php
if(isset($_SESSION['user']['id']))
{
	session_destroy();
}
else
{
	header("Location: index.php?url=index");	
}
?>
<link rel="stylesheet" href="app/tpl/skins/Paint/styles/logout.css" type="text/css">
<script class="noDelete" type="text/rocketscript">Cufon.replace("ubuntu"); function onKeyDown() { var pressedKey = String.fromCharCode(event.keyCode).toLowerCase(); if (event.ctrlKey && (pressedKey == "u" || pressedKey == "s")) { event.returnValue = false; } } $(document).bind("contextmenu",function(e){ return false; }); </script>
</head>
<body class="logoutBackground">
<div class="logoutInside">
<img src="app/tpl/skins/Paint/images/logo.png" style="margin-top: 50px;">
<div class="containerMessage green" style="margin-top: 20px;">
<ubuntu>Je bent succesvol uitgelogt!</ubuntu>
</div>
<a href="index.php?url=index"><input type="submit" id="submitBlack" style="float: left; margin-top: 20px; margin-left: 170px;" value="Ok&eacute;, bedankt!"></a>
</div>
</body>
</html>