<?php 
$dbhost = 'db.glipper.be'; 
$dbuser = 'root'; 
$dbpass = 'FCDKfun1'; 
$dbname = 'newbut'; 

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql'); 
mysql_select_db($dbname); 
$sql = mysql_query("SELECT * FROM server_status") or die(mysql_error());
$listeners = file_get_contents('http://cp.freeshoutcast.com/scripts/listeners.php?port=17194&host=s3&color=FFFFFF');
$song = file_get_contents('http://cp.freeshoutcast.com/scripts/song.php?port=17194&host=s3&color=FFFFFF');
?>
<div id="ActualStats">
 <?php 
 while ($q = mysql_fetch_assoc($sql)) { echo $q['users_online']; }
  ?> Online &bull;<?php echo ($listeners); ?> luisteraars  &bull; Nu aan het spelen: <?php echo ($song); ?> &bull; <a href="#" onclick="popitup('reqplay.php')" style="text-decoration: none; color: lightgreen">Request a Song</a> </div>
