<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 

	  <div class="content-box-deep-blue2" style="width:290px"> 

	    <h2 class="title" style="padding:0;line-height:30px;">Random online vrienden</h2> 

	  </div> 

	  <div class="content-box-content"> 
	          <script langauge="javascript">  
            var counter = 0;  
            window.setInterval("refreshDiv()", 5000);  
            function refreshDiv(){  
                counter = counter + 1;  
                document.getElementById("test").innerHTML = "Testing " + counter;  
            }  
        </script>  
        <div id="staticBlock">  <?php
            $query = mysql_query("SELECT * FROM messenger_friendships WHERE user_one_id = '$userid' AND exists (SELECT 1 FROM users WHERE id = user_two_id AND online = '1') ORDER BY RAND() LIMIT 7");
            $i = 0;
            while($friends = mysql_fetch_array($query))
            {
                $getfriend = mysql_query("SELECT * FROM users WHERE id ='".$friends['user_two_id']."' LIMIT 1");
                if(mysql_num_rows($getfriend) > 0)
                {
                    $i++;
                    if($i == 1)
                    {
                     
                        echo '';
                    }
                    $friend = mysql_fetch_array($getfriend);
					$friendname = $friend['username'];
					$friendlook = $friend['look'];
echo "<span class=\"hotspot\" onmouseover=\"tooltip.show('$friendname');\" onmouseout=\"tooltip.hide();\">
<a href=\"index.php?url=profile&id=$friendname\"><img src=\"http://www.habbo.nl/habbo-imaging/avatarimage?figure=$friendlook&size=s\"/></a>
</span>";
                }
            }
            if($i > 0)
echo '</br>'
?>	



	  </div>
	  </div>

	</div>