<?php
$dir = "r63/c_images/Top_Story_Images/";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
?>
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/styles/index.css">
    <script>Cufon.replace("strong");Cufon.replace("center");Cufon.replace("ubuntu");</script>
    <div class="header_n_1">
	<div class="header_n_2">
	
			    	<div class="header_n_3">
    		<form action="" method="post"> 

        	<div class="header_n_l_1">
        		<div class="header_n_inl"><b>Gebruikersnaam</b></div>            
        		<div class="header_n_inl"><input class="hp_inloggen_g" type="text" name="log_username" size="20" maxlength="30" value=""></div>            
            </div>
        	<div class="header_n_l_2">
        		<div class="header_n_inl"><b>Wachtwoord</b></div>            
        		<div class="header_n_inl"><input class="hp_inloggen_g" type="password" name="log_password" size="20" maxlength="30" value=""></div>            
            </div>
        	<div class="header_n_l_4">           
        		<div class="header_n_inl"><input class="header_n_but" type="submit" name="login" value="Inloggen"></div>   
            </div>

        	<div class="header_n_l_5">           
        		<div class="header_n_inl"><a href="#"><div id="register" class="header_n_inl registreerr" onmouseover="this.className='header_n_inlu'" onmouseout="this.className='header_n_inl'">Registreer een account</div></a></div>  
            </div>
</form>
</div>
		
		
		
		
		
        <div class="header_n_4">
            <div class="header_n_img">
            	<div class="header_n_img_1">
								</div>
    		</div>
            <div class="header_n_img1">
            	<div class="header_n_img_2"></div>
    		</div>
    	</div>
        <div class="header_n_4">
			           	<div class="header_n_menu">
			<a href="index.php?url=index" id="menulink">Homepage</a>
			<a href="#" class="registreerr" id="menulink">Registreer Gratis</a>
			<a href="" id="menulink" style="margin-left: 720px; text-align: right;" >{online} {hotelName}'s Online</a>
		    </div>

					
		
    	</div>
    </div>

</div>
<div style="width: 1081px; margin: 0 auto; overflow: hidden;">
<div id="midbar">
				<div class="g_top_gelle"><strong>Homepagina</strong></div>
				<div class="g_mid_home">
                <span id="firstssssss">
                <img src="app/tpl/skins/Paint/images/homepage.gif" align="right">
                <ubuntu>Welkom op {hotelName}.be!<br>
                {hotelName} is een virtueel hotel waar je vanalles kan doen. 
                Of het nou een kamer bouwen met onze nieuwste meubels 
                is of een {hotelName} race organiseren. Bouw een hotel, 
                skatepark, casino of meer, alles is mogelijk! En dat niet 
                alleen, in {hotelName} kun je ook vrienden ontmoeten en 
                maken.  <p>{hotelName} is al zeer lang het gezelligste hotel
                 dat er maar is. Leuke staffleden die events en 
                 competities organiseren en de nieuwste 
                 meubels worden zo snel mogelijk online 
                 gezet<p>Dus, waar wacht je nog op? 
                 Registreer nu een account en start 
                 het avontuur!<br /><br />
                 </ubuntu>
                 </span>
                 
                 <span id="dsqfqdsf" style="display: none;">:p</span>
                 </div>	
				<div class="g_bottom"></div>

				
<div class="g_top"></div>
    <div class="g_mid_home">
		<center>
		<b>&copy; 2012 - 2013 {hotelName}CMS v1.8 Alle rechten voorbehouden!</b><br>{hotelName}.be is niet verbonden aan, aanbevolen of gesponsord door of specifiek goedgekeurd door Sulake Corporation Oy of aan haar Gelieerde Ondernemingen.</center>
	</div>    
    <div class="g_bottom"></div>       
</div>
      
<div id="rightbar">

			<div class="m_top_p"><strong>Nieuwsberichten</strong></div>
			<div class="m_mid" style="height:214px;">
			<div style="border-bottom: 1px #000 dotted; width:299px; float:left; height:auto;">
<div style="background-image:url(r63/c_images/Top_Story_Images/<?php echo $images[$i]; ?>); background-position:right -65px; width:50px; margin:8px; margin-left:13px; border:1px solid #FCFCFC; height:50px; float:left;"></div>
<div style="width:197px; margin:8px; margin-left:10px; margin-right:15px; float:left; color:#999;"><div style="width:100%; height:auto; min-height:20px;"><b><a href="#">{newsTitle-1}</a></b><br><i>{newsCaption-1}</i></div></div>
</div>
<div style="border-bottom: 1px #000 dotted; width:299px; float:left; height:auto;">
<div style="background-image:url(r63/c_images/Top_Story_Images/<?php echo $images[$i+5]; ?>); background-position:right -65px; width:50px; margin:8px; margin-left:13px; border:1px solid #FCFCFC; height:50px; float:left;"></div>
<div style="width:197px; margin:8px; margin-left:10px; margin-right:15px; float:left; color:#999;"><div style="width:100%; height:auto; min-height:20px;"><b><a href="#">{newsTitle-2}</a></b><br><i>{newsCaption-2}</i></div></div>
</div>

<div style="width:299px; float:left; height:auto;">
<div style="background-image:url(r63/c_images/Top_Story_Images/<?php echo $images[$i+7]; ?>); background-position:right -65px; width:50px; margin:8px; margin-left:13px; border:1px solid #FCFCFC; height:50px; float:left;"></div>
<div style="width:197px; margin:8px; margin-left:10px; margin-right:15px; float:left; color:#999;"><div style="width:100%; height:auto; min-height:20px;"><b><a href="#">{newsTitle-3}</a></b><br><i>{newsCaption-3}</i></div></div>
</div>
</div>
			<div class="m_bottom"></div>
       </div>
      </div>
      
<script>
$('.registreerr').click(function() {
	$('span#firstssssss').fadeOut(500, function() {
		$('span#dsqfqdsf').delay(250).fadeIn();
	});
});
</script>