<!DOCTYPE html>
<html>
<head>
<title>{hotelName}: {hotelDesc}</title>
<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/styles/me.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="app/tpl/skins/Paint/styles/me.js"></script>
<script src="app/tpl/skins/Paint/js/cufon-yui.js" type="text/javascript"></script>
<script>Cufon.replace('h2.title');</script>
</head>
<body>
<?php
include 'system/header.php';
include 'inc/homenav.php';

$user = new User($_SESSION['user']['id']);

$xml=simplexml_load_file("app/tpl/skins/Paint/system/pvdw.xml");
$pvdw = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username = '".$xml->name."'"));

$dir = "app/tpl/skins/Paint/images/nieuws";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
?>
</span>
</div>
<div class="inner-container">
<div class="content-600">
        <div class="mefoi">
            <div class="metwo">
                <!-- me -->
                <div class="methree">
                    <div class="me_plaat"></div>
                    <div class="avatarimage">
                        <div class="user_box" style="margin: 0px; margin-left: -9px; margin-top: 14px;">
                            <div class="avatarrself">
                                <img style="position: absolute; left: 50%; margin-left: -67%; bottom: 0px;" src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $user->look; ?>&head_direction=3&action=wav">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- me -->
                <div class="mission_bubble" onmouseover="showTooltip()">
                    <img class="motto_mee" src="/cache/volterme/volter.php?t=<?php echo $user->motto; ?>"/>
                </div>
                <a style="cursor: pointer;" onclick="window.open('index.php?url=client')" target="_blank">
                    <div class="go_to_hotel_button">
                        Ga naar {hotelName}
                    </div>
                </a>
                <div class="user_stats">
                    <div class="user_stat_item cr">
                        <?php echo $user->credits; ?> Credits
                    </div>
                    <div class="user_stat_item pixels">
                        <?php echo $user->pixels; ?> Pixels
                    </div>
                    <div class="user_stat_item sterren">
                        <?php echo $user->sterren; ?> Sterren
                    </div>
                </div>
            </div>
        </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			 <div class="slider" style="border: 1px solid gray; border-radius: 6px;">
             
			 <div class="slides" style="
             background-image: url('app/tpl/skins/Paint/images/nieuws/<?php echo $images[$i]; ?>');
             "><div class="slider-box">
             <p class="title"><a href="index.php?url=news&id={newsID-1}">{newsTitle-1}</a>
             </p><p>{newsCaption-1}</p><p></p>
             </div><a href="index.php?url=news&id={newsID-1}" class="slider_overlay"></a></div>
             
             <div class="slides" style="
             background-image: url('app/tpl/skins/Paint/images/nieuws/<?php echo $images[$i+5]; ?>');
             ">
             <div class="slider-box">
             <p class="title"><a href="index.php?url=news&id={newsID-2}">{newsTitle-2}</a></p><p>{newsCaption-2}</p><p></p></div>
             <a href="index.php?url=news&id={newsID-2}" class="slider_overlay"></a></div>
             <div class="slides" style="
             background-image: url('app/tpl/skins/Paint/images/nieuws/<?php echo $images[$i+10]; ?>');
             "><div class="slider-box"><p class="title">
             <a href="index.php?url=news&id={newsID-3}">{newsTitle-3}</a></p>
             <p>{newsCaption-3}</p><p></p></div>
             <a href="index.php?url=news&id={newsID-3}" class="slider_overlay"></a></div>
			 </div>
             
             
</div></div>     <div style=""> <div class="content-box" style="float: right;width:300px; margin: -0x 0px 13px; background-color:#fff;"> 
			<div class="content-box-deep-blue2" style="margin-left: -1px;width:290px"> 
				<h2 class="title" style="padding:0;line-height:30px;">Tags</h2> 
			</div> 
		    <div class="content-box-content"> 
            <?php
			if (isset($_POST['submittagg']))
			{
				$tag = clean($_POST['tag']);
				$tags = mysql_query("SELECT * FROM `user_tags` WHERE `user_id`='$user->id'");
				if(mysql_num_rows($tags) < 15 && !empty($_POST['tag']))
				{
					mysql_query("INSERT INTO `user_tags` (`user_id`,`tag`) values('$user->id','$tag')");
					$mysql_id = mysql_insert_id();
					mysql_query("INSERT INTO user_activity(user_id,activity,buy,tijd) VALUES ('$user->id','addtag $tag (ID $mysql_id)', '0', NOW())");
					$user = mysql_fetch_object(mysql_query("SELECT * FROM `users` WHERE `id`='$userid'"));
				}
			}
			if(isset($_POST['deltag']))
			{
				$tagid = clean($_POST['tag']);
				$checktag = mysql_query("SELECT * FROM `user_tags` WHERE `user_id`='$user->id' AND `id`='$tagid'");
				if(mysql_num_rows($checktag) == 1)
				{
					mysql_query("DELETE FROM `user_tags` WHERE `user_id`='$user->id' AND `id`='$tagid'");
					mysql_query("INSERT INTO user_activity(user_id,activity,buy,tijd) VALUES ('$user->id','deltag (ID $tagid)', '0', NOW())");
				}
			}

			?>
            <form method="post" action="index.php?url=me">
                <input name="tag" type="text" style="border-radius: 4px 4px 4px 4px; width: 150px; height:25px; margin-top: 0px;" />
                <input type="submit" style="margin: 1px 0px 0px 6px; width: 111px;" class="button_new_blue" value="Toevoegen" name="submittagg" />
                </form>
                <br />
                <br />
                <br />
                <hr />
                <?php
				$select = mysql_query("SELECT * FROM user_tags WHERE user_id = '".$user->id."'");
				
				if (mysql_num_rows($select) != 0)
				{
					for ($q = 0; $tagg = mysql_fetch_object($select); $q++)
					{
					?>
					<div class="tags_new_nice">
						<!-- taggie tag -->
						<form method="post">
							<input type="hidden" value="<?php echo $tagg->id; ?>" name="tag" />
							<?php echo $tagg->tag; ?>
							<input type="submit" class="tag_close" name="deltag" />
						</form>
						<!-- !tag closeing -->
					</div>
					<?php
					}
				}
				else
				{
					?>
                    <div class="content-header grey no-tags">Je hebt nog geen tags!</div>
                    <?php
				}
				?>
            	    <br clear="all" />
                
            </div>
        </div><br clear="right"><br>
            <div class="content-box" style="float: right;width:300px; margin: -0x 0px 13px; background-color:#fff;"> 
			<div class="content-box-deep-blue2" style="margin-left: -1px;width:290px"> 
				<h2 class="title" style="padding:0;line-height:30px;">{hotelName}radio</h2> 
			</div> 
		    <div class="content-box-content"> 
            <?php
			?>
                <div id="radio_content_border">
                    <div id="radio_content">
                        <div id="radio_info">
                            <div id="radio_name">
                                <p>
                                    <strong>
                                        DJ:
                                    </strong>
                                    <br >
                                    Auto DJ
                                </p>
                            </div>
                            <div id="radio_listeners">
                                <p>
                                    <strong>
                                        Luisteraars:
                                    </strong>
                                    <br >
                                    0
                                </p>
                            </div>
                            <div id="radio_requestline">
                                <p>
                                    Requests
                                </p>
                            </div>
                        </div>
                            <br clear="all" />
                        <div id="radio_dj">
                            <img src="http://habbo.nl/habbo-imaging/avatarimage?figure=lg-3202-72-62.hr-3162-39.ca-3187-62.hd-180-3.cc-887-62.ea-1401-62&amp;direction=4&amp;head_direction=3&amp;gesture=sml">
                        </div>
                    </div>
                </div>
                <br>
</div></div> <br clear="right"><br><div class="content-box" style="float: right;width:300px; margin: -0x 0px 13px; background-color:#fff;"> 
			<div class="content-box-deep-blue2" style="margin-left: -1px;width:290px"> 
				<h2 class="title" style="padding:0;line-height:30px;">{hotelName} Van De Week</h2> 
			</div> 
		    <div class="content-box-content">
				<?php
				if ((isset($_POST['subgvdw']) && $_POST['inputgvdw'] != "") && ($user->rank > 8 && $pvdw->username != $_POST['inputgvdw'])) {
					$pvdw96 = mysql_query("SELECT * FROM users WHERE username = '".($_POST['inputgvdw'])."'");
					$pvdw97 = mysql_num_rows($pvdw96);
					$pvdw98 = mysql_fetch_object($pvdw96);
					
					if ($pvdw97 == 1)
					{
						$xml->name = ($_POST['inputgvdw']);
						$xml->asXML('app/tpl/skins/Paint/system/pvdw.xml');

						header("refresh: 0");
					}
				}
				?>
				<div style="margin-left: 80px; margin-top: 10px;">
					<img src="app/tpl/skins/Paint/images/spotlight.jpg" />
					<img src="http://habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $pvdw->look; ?>&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;action=wav">
				</div>
				<br/>
				<center style="font-weight: bold; font-family: Verdana,Tahoma,Helvettica,sans-serif; font-size:12px;text-align:center;color: #6E6E6E;"><?php echo $pvdw->username; ?></center>
				<?php if ($user->rank > 8) { ?>
				<br />
				<hr />
				<br />
				<form method="post">
					<input class="pvdwinp" style="border: 1px solid gray; border-radius: 5px; margin-right: 50px; width: 170px;" type="text" name="inputgvdw" value="<?php echo $pvdw->username; ?>">
					<input style="cursor: pointer; border: 1px solid gray; border-radius: 5px; margin-left: 190px; margin-top: -28px; height: 28px; width: 90px;" type="submit" name="subgvdw" value="Zet PVDW">
				</form>
				<br/>
				<?php } ?>
			</div>
						<br clear="all" />
						
						
					</div>
            </div>
        </div><br clear="right">
<br clear="all">
</body>
</html>