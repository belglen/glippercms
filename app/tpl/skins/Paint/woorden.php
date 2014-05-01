<?php
include 'system/header.php';
include'inc/communitynav.php'; 
?>
		</span>
</div>
<div id="marginy">
    <div id="main_left"> 
        <div class="content-box"> 
            <div class="content-box-black"> 
                <h2 class="title">Woordenboek</h2> 
            </div> 
            <div class="content-box-content"> 
                <img src="http://images.habbo.com/c_images/album1584/NO061.gif"; align="right"></img>

                <?php
                $sql = mysql_query("SELECT id,wat,betekenis FROM cms_woordenboek ORDER by wat");
                while ($spaghetti = mysql_fetch_assoc($sql)) {
                    echo "<p><b>" . $spaghetti['wat'] . "</b>: " . $spaghetti['betekenis'] . "<hr></p>";
                }
                ?>
            </div> 
        </div>




        <br />



        <br>

    </div><br />




</div>



<div id="main_right"> 
    <link href="app/tpl/skins/Paint/attack.css" rel="stylesheet" type="text/css"/>
    <?php
    global $users;
    $userid = $_SESSION['user']['id'];
    $isSTAFF = $users->getInfo($userid, 'rank');
    if ($isSTAFF == '11') {
            echo "<div class=\"content-box\" style=\"width:300px; background-color:#fff;\"> 
	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 
	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Voeg een woord toe</h2> 
	  </div> 
	  <div class=\"content-box-content\"> 

    <form method=\"post\" action=\"index.php?url=post5&id=" . htmlentities($_GET['id']) . "\">
		<tr><td><b> Afkorting:</b><br><div class=\"invoerveld\"><label for=\"domus\"></label>
			<input name=\"domus\" id=\"domus\" type=\"text\"></td></tr>
                    <br><br><br>    <tr><td><b> Betekenis:</b><br><center><center><div class=\"invoerveld\"><label for=\"domus\"></label>
			<input name=\"retro\" id=\"retro\" type=\"text\"></td></tr>

		</div>
		<div id=\"clear\"></div><br>
		<div class=\"invoerveld\"><label for=\"verzend\"> </label>
			<input type=\"submit\" class=\"glipperflexbtn\" class=\"sub_button\" value=\"Voeg toe\" name=\"post\">
		</div></center>
	</form></div>
<br><br><br>
</div>
</div><br>
";
        }
    ?>
    <div class="content-box" style="width:300px; background-color:#fff;"> 
        <div class="content-box-deep-blue2" style="width:290px"> 
            <h2 class="title" style="padding:0;line-height:30px;">Campagne</h2> 
        </div> 
        <div class="content-box-content"> 

            <img src="{url}/app/tpl/skins/Paint/images/bobklein.jpg" alt="KVJT" align="right"></img>
            <strong>Veiligheid met Bob!</strong><br /><br />

            Een Bob drinkt helemaal geen alcohol. Want als je eenmaal begint, wordt het steeds lastiger om 'nee' te zeggen.
            Dat komt niet alleen door de gezellige sfeer op dat moment, maar ook door het ontremmende effect dat alcohol heeft.
            Uit onderzoek blijkt dat een drankje genoeg is om je trek te geven in het volgende. En dat gebeurt razendsnel,
            omdat alcohol al in ongeveer 10 minuten je hersenen bereikt.
            <hr>
            <a href="http://www.nederlandveilig.nl/bob/">Meer informatie over deze campagne?</a>
        </div>

    </div>


</script> 
<div id="clear"></div>
</div>  </body></html>