<script src="https://www.targetpay.com/send/include.js"> </script>
<?php
include 'system/header.php';
include 'inc/shopnav.php'; 
?>
</span>
</div>

<?php
$userid = $_SESSION['user']['id'];
$user = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$userid'"));
?>


<div id="marginy">
<div id="main_left"> 
  
<div class="content-box"> 
<div class="content-box-deep-blue"> 
<h2 class="title">Transactie</h2> 
</div> 
<div class="content-box-content"> 


<?php   

if(!isset($_GET['accesscode']) || !isset($_GET['time']) || !isset($_GET['ip']))
{
	echo"HACKZORSSSS ";
	echo strtoupper($user->username);
}
else
{

function access()   
    {   
      $accesscode = $_GET["accesscode"]; // toegangscode berekend op targetpay.com  
      $time = (int)$_GET["time"];        // epoch time op targetpay.com  
      $ip = $_GET["ip"];                 // Cli nt ip adres op targetpay.com 
        
      // Tijd moet groter zijn dan de targetpay tijd  
      if( time() < $time )  
          {  
           		echo"Lokale tijd is ". (time()-$time) ."sec. vroeger dan op Targetpay.com";  
          }  

      // Remote address moet gelijk zijn als in het betaalscherm  
      // Note: Sommige Proxy servers veranderen het IP adres.  
      // Mocht u hier problemen mee ondervinden, schakel dan het die() statement uit.  
      if( $ip <> $_SERVER["REMOTE_ADDR"] )  
          {  
                   }  
         
      // Betalings URL is c*10 minuten geldig 
      for ($c=0;$c<=15;$c++)   
        {   
        $t = substr(strftime("%Y%m%d%H%M", time()-($c*600)),0,11);   
        $hash = md5($ip. "fe6f9b9e50". $t);   
        if( $hash == $accesscode ) return true;  
        }  
      
    return false;  
    }  

if (!access())      
    {   
      $accesscode = $_GET["accesscode"]; // toegangscode berekend op targetpay.com  
      $time = (int)$_GET["time"];        // epoch time op targetpay.com  
      $ip = $_GET["ip"];                 // Cli nt ip adres op targetpay.com       	
	echo"Onjuiste code."; 
      	mysql_query("INSERT INTO aankopen (id, accescode, ip, time, aantal, gelukt) VALUES ('$user->id', '$accesscode', '$ip', '$time', '30', '0')");
    }   
else
{
$accesscode = $_GET["accesscode"]; // toegangscode berekend op targetpay.com  
$time = (int)$_GET["time"];        // epoch time op targetpay.com  
$ip = $_GET["ip"];                 // Cli nt ip adres op targetpay.com 




mysql_query("INSERT INTO aankopen (id, accescode, ip, time, aantal, gelukt) VALUES ('$user->id', '$accesscode', '$ip', '$time', '30', '1')");

$used = mysql_fetch_object(mysql_query("SELECT * FROM `aankopen` WHERE `accescode`='$accesscode'")); 

mysql_query("UPDATE `aankopen` SET `used`=`used`+'1' WHERE `accescode`='$accesscode'");

if($used->used < 1) {

mysql_query("UPDATE `users` SET `vip_points`=`vip_points`+'30' WHERE `id`='$user->id'");
MUS("updatepoints", $userid);


echo"Gefeliciteerd! Je hebt zojuist succesvol <i>30</i> Sterren ontvangen!";

}else{
echo"De <i>accesscode</i> waarmee jij probeert sterren te krijgen is zojuist al gebruikt. Het is niet mogelijk om een code meerdere malen te gebruiken.";
}

}
}
?>  


</div>
  </div>

<br />

<div class="content-box"> 
<div class="content-box-content">
<strong>Melding:</strong> Problemen ondervonden met het ontvangen van de sterren? Contacteer ons!
</div></div>

<br />  




</div>

<div id="main_right"> 



<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Advertentie(s)</h2> 

	  </div> 

	  <div class="content-box-content"> 

 <div class="texty">


Bla?
</div>	
</div>	

	  </div>

	</div>

<br/>&nbsp;<br/> 
</script> 
<br/><br/> 
</div> 
<div id="clear"></div></div> 

</div> 