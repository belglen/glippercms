<?php
include 'system/header.php';
include 'inc/groepnav.php';
?>
<div id="marginy">
<div id="main_left"> 
 
<div class="content-box"> 
<div class="content-box-black"> 
<h2 class="title">Groepen <?php
// $sql = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");
	// $array = mysql_fetch_assoc($sql);
// $sql1 = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . htmlspecialchars($_GET["id"]) . "'");
	// $array1 = mysql_num_rows($sql);
	// echo $array['name'];
	// $sql = mysql_query("SELECT * FROM users WHERE id = '" . $array['ownerid'] . "'");
	// $array2 = mysql_fetch_assoc($sql);
	// $sql = mysql_query("SELECT * FROM rooms WHERE id = '" . $array['roomid'] . "'");
	// $array3 = mysql_fetch_assoc($sql);
	// $qu = mysql_query("SELECT * FROM groups WHERE id = '" . htmlspecialchars($_GET["id"]) . "'");

// if (mysql_num_rows($qu) <= 0) {
// header("Location: index.php?url=notfound");
// }
	
?></h2> 
</div> 
<div class="content-box-content">
Groep niet gevonden.
</div> 
</div>

    


<br />
				


<br>
<br>

 </div><br />




  



<div id="main_right"> 


 <?php
	// global $users;
	// $userid = $_SESSION['user']['id'];
	// $isSTAFF = $users->getInfo($userid, 'rank');
	// if ($isSTAFF >= 9) {
         echo "    <br>
<div class=\"content-box\" style=\"width:300px; margin-top: -13px; margin-bottom: 13px;background-color:#fff;\"> 

	  <div class=\"content-box-deep-blue2\" style=\"width:290px\"> 

	    <h2 class=\"title\" style=\"padding:0;line-height:30px;\">Leden</h2> 

	  </div> 

	  <div class=\"content-box-content\"> ";
?>
<?php
// $query = mysql_query("SELECT * FROM group_memberships WHERE groupid = '" . htmlspecialchars($_GET["id"]) . "'");
            // $i = 0;
            // while($friends = mysql_fetch_array($query))
            // {
                // $getfriend = mysql_query("SELECT * FROM users WHERE id ='".$friends['userid']."' LIMIT 1");
                // if(mysql_num_rows($getfriend) > 0)
                // {
                    // $i++;
                    // if($i == 1)
                    // {
                     
                        // echo '';
                    // }
                    // $friend = mysql_fetch_array($getfriend);
					// $friendname = $friend['username'];
					// $friendlook = $friend['look'];
echo "Geen leden gevonden.";
                // }
            // }
            // if($i > 0)
?>
</div>
      


</div> </div>
<div id="clear"></div></div> 
 </div>  </body></html>