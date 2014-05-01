<?php
include 'system/site/testt/headersecure.php';
include 'inc/homenav.php';

$userid = $_SESSION['user']['id'];
$data = mysql_fetch_object(mysql_query("SELECT *,UNIX_TIMESTAMP(`lastlogin`) AS `login` FROM `users` WHERE `id`='$userid'"));
$datum = $data->login;

$dag = date('j',$datum);
$maand = date('n',$datum);
$jaar = date('Y',$datum);

$nudatum = time();

$nudag = date('j',$nudatum);
$numaand = date('n',$nudatum);
$nujaar = date('Y',$nudatum);

if($jaar < $nujaar)
{
  //je bent vorig jaar ingelogd
  $update = 1;
}
else if($maand < $numaand)
{
  //je bent vorige maand ingelogd
  $update = 1;
}
else if($dag < $nudag)
{
  //je bent deze maand nog ingelogd, maar niet vandaag
  $update = 1;
}
else
{
  //niks voor jou
  $update = 0;
}

if($update == 1)
{
  mysql_query("UPDATE `users` SET `lastlogin`=NOW() WHERE `id`='$data->id'");
}
$ip = $_SERVER['REMOTE_ADDR'];
mysql_query("UPDATE `users` SET `ip_last` = '$ip' WHERE `id` = '$data->id'");  
?>
</span>
</div>

<div id="marginy">
<div id="wide-personal-info2">
  <div id="habbo-plate">
    <img alt="Airblender" src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $userdata->look; ?>&direction=2&head_direction=3&action=crr=667&gesture=sml">
  </div>
  <div id="name-box" class="info-box">
    <div class="label">Naam:</div>
    <div class="content"><?php echo $userdata->username ?></div>
  </div>
    <div id="motto-box" class="info-box">
    <div class="label">Missie:</div>
    <div class="content">
      <?php echo filter($userdata->motto) ?></div>
    </div>
  <div id="last-logged-in-box" class="info-box">
    <div class="label">Laatste login:</div>
    <div class="content">{lastSignedIn}</div>
  </div>
  <div class="enter-hotel-btn">
    <div class="open enter-btn">
      <a href="index.php?url=client" target="ClientWndw" onclick="HabboClient.openOrFocus(this); return false;">Naar Glipper Hotel<i></i></a>
      <b></b>
    </div>
  </div>
</div>
<div id="main_right"> 
  <style>

#harsonnieuws {
  position: absolute;
  width: 300px;
  height: 167px;
}

#overlay2 {
  position: absolute;
  top: 0;
  height: 167px;
  width: 300px;
  background: transparent url(../imagess/nieuws.png) no-repeat scroll left top;
  opacity: 1;
  display: block;
  z-index: 9000;
}

#top_stories {
  position: relative;
  z-index: auto;
}

  </style>
        <div id="harsonnieuws" class="floatLeft">
          <div id="top_stories"> 
              <div id="image1" style="background-image: url(ase/ts/{newsIMG-1}); height: 167px; width:300px; margin: 0px; padding: 0px;"></div>
              <div id="image2" style="background-image: url(ase/ts/{newsIMG-2}); height: 167px; width:300px; margin: 0px; padding: 0px;"></div>
              <div id="image3" style="background-image: url(ase/ts/{newsIMG-3}); height: 167px; width:300px; margin: 0px; padding: 0px;"></div>           
            <div id="overlay2">
              <div id="titel1" style="font-size: 20px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding: 10px; height: 44px;">
                <a href="index.php?url=news&id={newsID-1}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    {newsTitle-1}
                  </font>
                </a>
              </div>
              <div id="ondertitel1" style="font-size: 14px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding-left: 10px; padding-right: 10px; height: 66px;">
                <a href="index.php?url=news&id={newsID-1}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    <p>
                      {newsCaption-1}
                    </p>
                  </font>
                </a>
              </div>
              <div id="titel2" style="font-size: 20px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding: 10px; height: 44px;">
                <a href="index.php?url=news&id={newsID-2}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    Rupsenijsmachines!
                  </font>
                </a>
              </div>
              <div id="ondertitel2" style="font-size: 14px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding-left: 10px; padding-right: 10px; height: 66px;">
                <a href="index.php?url=news&id={newsID-2}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    <p>
                      {newsCaption-1}
                    </p>
                  </font>
                </a>
              </div>
              <div id="titel3" style="font-size: 20px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding: 10px; height: 44px;">
                <a href="index.php?url=news&id={newsID-3}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    {newsTitle-3}
                  </font>
                </a>
              </div>
              <div id="ondertitel3" style="font-size: 14px; text-decoration: none; font-weight: bold; color: #FFFFFF; text-shadow: 1px 1px 0px #000000; padding-left: 10px; padding-right: 10px; height: 66px;">
                <a href="index.php?url=news&id={newsID-3}" style="text-decoration: none;">
                  <font color="#FFFFFF">
                    <p>
                      {newsCaption-3}
                    </p>
                  </font>
                </a>
              </div>
              <div onMouseOver="this.style.cursor='pointer';" id="toleft" style="float: left;padding-bottom: 4px; padding-left: 4px; color: white;">&lt;&lt;&lt;</div>
              <div onMouseOver="this.style.cursor='pointer';" id="toright" style="float: right;padding-bottom: 4px; padding-right: 4px; color: white;">&gt;&gt;&gt;</div>
            </div>
<script>
var div1 = $(document.getElementById("image1"));
var div2 = $(document.getElementById("image2"));
var div3 = $(document.getElementById("image3"));
var titel1 = $(document.getElementById("titel1"));
var titel2 = $(document.getElementById("titel2"));
var titel3 = $(document.getElementById("titel3"));
var ondertitel1 = $(document.getElementById("ondertitel1"));
var ondertitel2 = $(document.getElementById("ondertitel2"));
var ondertitel3 = $(document.getElementById("ondertitel3"));

div1.hide();
div2.hide();
div3.hide();
titel1.hide();
titel2.hide();
titel3.hide();
ondertitel1.hide();
ondertitel2.hide();
ondertitel3.hide();


function runIt() {
  if(!div2.is(':hidden'))
  {
    titel2.hide("slow");
    ondertitel2.hide("slow");
    div2.hide("slow", runIt3);
  }
  else if(!div3.is(':hidden'))
  {
    titel3.hide("slow");
    ondertitel3.hide("slow");
    div3.hide("slow", runIt);
  }
  else
  {
    titel1.show("slow").delay(8000).hide("slow");
    ondertitel1.show("slow").delay(8000).hide("slow");
    div1.show("slow").delay(8000).hide("slow", runIt2);
  }
}

function runIt2() {
  if(!div1.is(':hidden'))
  {
    titel1.hide("slow");
    ondertitel1.hide("slow");
    div1.hide("slow", runIt2);
  }
  else if(!div3.is(':hidden'))
  {
    titel3.hide("slow");
    ondertitel3.hide("slow");
    div3.hide("slow", runIt);
  }
  else
  {
    titel2.show("slow").delay(8000).hide("slow");
    ondertitel2.show("slow").delay(8000).hide("slow");
    div2.show("slow").delay(8000).hide("slow", runIt3);
  }
}

function runIt3() {
  if(!div2.is(':hidden'))
  {
    titel2.hide("slow");
    ondertitel2.hide("slow");
    div2.hide("slow", runIt3);
  }
  else if(!div1.is(':hidden'))
  {
    titel1.hide("slow");
    ondertitel1.hide("slow");
    div1.hide("slow", runIt2);
  }
  else
  {
    titel3.show("slow").delay(8000).hide("slow");
    ondertitel3.show("slow").delay(8000).hide("slow");
    div3.show("slow").delay(8000).hide("slow", runIt);
  }
}

function showIt() {
  var n = div1.queue("fx");  
  setTimeout(showIt, 100);
}

runIt();
showIt();
</script>

<script>
$(document.getElementById("toleft")).click(function () {
  if(div2.is(':hidden') && (div3.is(':hidden')))
  {
    $(document.getElementById("image1")).hide();
    $(document.getElementById("titel1")).hide();
    $(document.getElementById("ondertitel1")).hide();
    titel3.show();
    ondertitel3.show();
    div3.show();
  }
  else if(div3.is(':hidden') && (div1.is(':hidden')))
  {
    $(document.getElementById("image2")).hide();
    $(document.getElementById("titel2")).hide();
    $(document.getElementById("ondertitel2")).hide();
    titel1.show();
    ondertitel1.show();
    div1.show();
  }
  else
  {
    $(document.getElementById("image3")).hide();
    $(document.getElementById("titel3")).hide();
    $(document.getElementById("ondertitel3")).hide();
    titel2.show();
    ondertitel2.show();
    div2.show();
  }
});
$(document.getElementById("toright")).click(function () {
  if(div2.is(':hidden') && (div3.is(':hidden')))
  {
    $(document.getElementById("image1")).hide();
    $(document.getElementById("titel1")).hide();
    $(document.getElementById("ondertitel1")).hide();
    titel2.show();
    ondertitel2.show();
    div2.show();
  }
  else if(div3.is(':hidden') && div1.is(':hidden'))
  {
    $(document.getElementById("image2")).hide();
    $(document.getElementById("titel2")).hide();
    $(document.getElementById("ondertitel2")).hide();
    titel3.show();
      ondertitel3.show();
      div3.show();
  }
  else
  {
    $(document.getElementById("image3")).hide();
    $(document.getElementById("titel3")).hide();
    $(document.getElementById("ondertitel3")).hide();
    titel1.show();
      ondertitel1.show();
      div1.show();
  }
});
</script></div></div><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="content-box" style="width:300px; margin-top: 13px; margin-bottom: 13px;background-color:#fff;"> 
    <div class="content-box-deep-blue2" style="width:290px"> 
      <h2 class="title" style="padding:0;line-height:30px;">Random online vrienden</h2> 
    </div> 
    <div class="content-box-content"> 
      <?php
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
?>      </div>

  </div><?php
if ($_SERVER['REMOTE_ADDR'] != '192.168.1.100')
{
?>
<div class="content-box" style="width:300px;  margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 
    <div class="content-box-deep-blue2" style="width:290px"> 
      <h2 class="title" style="padding:0;line-height:30px;">Glipperjournaal - interview</h2> 
    </div> 
    <div class="content-box-content">
<center><a href="https://www.youtube.com/watch?v=K8csDXsQgaM"><img src="app/tpl/skins/Paint/images/11.gif"></a></center>    
</div>
    </div>
    <br><br>
    <?php
    }
    else
    {
    ?>
    <div class="content-box" style="width:300px;  margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 
    <div class="content-box-deep-blue2" style="width:290px"> 
      <h2 class="title" style="padding:0;line-height:30px;">Niet-vergeten: coding</h2> 
    </div> 
    <div class="content-box-content">
       
    <div class="newDiv" style="display: none">
      <?php include'ajaxcode.php'; ?>
    </div>
    <div class="myDiv">Klik op de knop om de tekst te printen.<br/><br><button>Show it</button>
</div>
    <script>
    $("button").click(function () {
    $("div.newDiv").show("slow");
    $("div.myDiv").hide("slow");
    });
    </script>

    </div>
    </div>
    <?php
    }
    ?></div>

<div id="main_left">
<div class="content-box">
<div class="content-box-deep-blue">
<h2 class="title">{hotelName}Radio<div style='float:right;'>
  <a href='http://cp.freeshoutcast.com/playlist.php?play=pls&host=s3&port=17194'><img align='absmiddle' src='http://cp.freeshoutcast.com/ico/iphone.png' border='0' alt='iPhone' title='iPhone'/></a>
  <a href='http://cp.freeshoutcast.com/playlist.php?play=m3u&host=s3&port=17194'><img align='absmiddle' src='http://cp.freeshoutcast.com/ico/pls.png' border='0' alt='Winamp' title='Winamp'/></a>
  <a href='http://cp.freeshoutcast.com/playlist.php?play=asx&host=s3&port=17194'><img align='absmiddle' src='http://cp.freeshoutcast.com/ico/asx.png' border='0' alt='Windows Media Player' title='Windows Media Player'/></a>
  <a href='http://cp.freeshoutcast.com/playlist.php?play=ram&host=s3&port=17194'><img align='absmiddle' src='http://cp.freeshoutcast.com/ico/ram.png' border='0' alt='Real Player' title='Real Player'/></a>
  <a href='http://cp.freeshoutcast.com/playlist.php?play=qtl&host=s3&port=17194'><img align='absmiddle' src='http://cp.freeshoutcast.com/ico/qtl.png' border='0' alt='QuickTime' title='QuickTime'/></a>
</div>
</h2>
</div>
<div class="content-box-content">

<style>
.succes
{
    padding:2px 4px;
    margin:0px;
    border:solid 1px #C0F0B9;
    background:#D5FFC6;
    color:#48A41C;
    font-family:Arial, Helvetica, sans-serif; font-size:14px;
    font-weight:bold;
    text-align:center; 
}
.error
{
    padding:2px 4px;
    margin:0px;
    border:solid 1px #FBD3C6;
    background:#FDE4E1;
    color:#CB4721;
    font-family:Arial, Helvetica, sans-serif;
    font-size:14px;
    font-weight:bold;
    text-align:center; 
}
.reqq
{
}
</style>
<?php
    if (isset($_POST['subreq'])) {
      $lied = clean($_POST['req']);
      if ($lied != 'Een leuk liedje..')
      {
        $getDJ = mysql_fetch_object(mysql_query("SELECT dj.user_id,dj.onair,dj.rank AS djrank,u.id AS uid,u.username AS uusername,u.look AS ulook FROM users u JOIN dj dj ON (dj.user_id = u.id) WHERE onair = '1'"));
        $lied = clean($_POST['req']);
        $DJ = filter($getDJ->uusername);
        $info->song = nl2br($lied);
        $info->song = str_replace("kut", "***",$lied);
        mysql_query("INSERT INTO dj_requests(user_id,song,dj) VALUES ('".$_SESSION['user']['id']."', '$info->song', '$DJ')");
      }
    
      if ($lied != 'Een leuk liedje..')
      {
        echo '<div class="succes">Request succesvol verzonden!</div><br>';
      }     
      else
      {
        echo '<div class="error">Request is niet succesvol verzonden!</div><br>';
      }
    }

?>
<?php
$sql = mysql_num_rows(mysql_query("SELECT user_id,onair FROM dj WHERE onair = '1'"));
switch($sql)
{
  case 0:
  if (!isset($_GET['modalbadge']))
  {
    echo '<embed src="http://www.shoutcast.com/media/popupPlayer_V19.swf?stationid=http://yp.shoutcast.com/sbin/tunein-station.pls?id=1283896&amp;play_status=1" quality="high" bgcolor="#ffffff" width="399" height="105" name="popupPlayer_V19" align="middle" allowscriptaccess="always" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer">';
  }
  echo '<h2><b>Er draait geen DJ op dit moment</b></h2>';
  ?>
  <?php
  break;

  case 1:
        $getDJ = mysql_fetch_object(mysql_query("SELECT dj.user_id,dj.onair,dj.rank AS djrank,u.id AS uid,u.username AS uusername,u.look AS ulook FROM users u JOIN dj dj ON (dj.user_id = u.id) WHERE onair = '1'"));
    ?><iframe src='http://fastcast4u.com/webplayer/player_premium/player.php?host=s3.freeshoutcast.com&port=17194' scrolling='no' frameborder='0' style='width:435px; height:92px;'></iframe>

    <h2>Aantal Luisteraars:</br>
<iframe src='http://cp.freeshoutcast.com/scripts/listeners.php?port=17194&host=s3&color=000000' width='588' height='25' frameborder='0' scrolling='no'>ERROR!</iframe></h2>

    <img src="http://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $getDJ->ulook; ?>&action=crr=667" alt="<?php echo $getDJ->uusername; ?>" style="margin-top: -20px;"/>
  <a href="index.php?url=profile&id=<?php echo ''.$getDJ->uusername.''; ?>">
    <p>     <b><div style="margin-top: -88px; margin-left: 100px;">DJ <?php echo ''.$getDJ->uusername.''; ?></a><br>
    <?php
    if ($getDJ->djrank == 'hdj')
    {
    ?>
    <img src="{url}/r63/c_images/album1584/HDJ.gif" style="margin-top: 10px;">
    <?php
    }
    ?>    <?php
    if ($getDJ->djrank == 'pdj')
    {
    ?>
    <img src="{url}/r63/c_images/album1584/PDJ.gif" style="margin-top: 10px;">
    <?php
    }
    ?>    <?php
    if ($getDJ->djrank == 'dj')
    {
    ?>
    <img src="{url}/r63/c_images/album1584/DDJ.gif" style="margin-top: 10px;">
    <?php
    }
    ?>
    </div><h2><br><br>Stuur een request</h2></b>
    <form method="post">
      <input type="hidden" name="dj_id" id="dj_id" value="<?php echo $getDJ->uid; ?>">
      <input type="text" name="req" id="req" placeholder="Een leuk liedje.." style="margin-top: -5px;" class="reqq"><br><br><br>
      <input type="submit" class="glipperflexbtn" name="subreq" id="subreq" value="Verzend" style="margin-top: -9px;">
    </form>
    <br>
    <br>
    
      <?php
          break;
        }
      ?>

</div>
</div>    
        <br>  
<div class="content-box">
<div class="content-box-black">

<h2 class="title">Exclusief op Glipper!</h2>
</div>
<div class="content-box-content"> 
<div class="habblet-container "><div class="cbb clearfix orange ">
                  <div id="hotcampaigns-habblet-list-container">
            
      
      <?php
      $campainSQL1 = mysql_query("SELECT campaign,campaignimg,id,title,shortstory FROM cms_news WHERE campaign = '1' ORDER BY id DESC");
      while ($campainSQL = mysql_fetch_object($campainSQL1)) 
      {
      ?>
      <div class="campaign_images"> 

<img src="{url}/special/4-Housekeeping/<?php echo $campainSQL->campaignimg; ?>">

</div> 

<div class="campaign_content" style="margin-top: 15px;"> 
<strong>
<?php echo $campainSQL->title; ?></strong><br />
<?php echo $campainSQL->shortstory; ?></div> 

<p class="gothere" style="margin-top: 15px;"><a href="index.php?url=news&id=<?php echo $campainSQL->id; ?>">Meer informatie &raquo;</a></p> 


<div style="clear:both;"></div> 

<hr/> 
<?php
}
?>  
                            </div>
</div></div>
</div>
</div>
<style type="text/css">
table,td {
  font-size: 11px;
}
</style>
<div class="glipperflexbox-normaal">
<div class="content-box-black">
<h2 class="title">Idee&euml;n</h2>
</div>
<div class="content-box-content">
  <?php
    if (isset($_GET['respect']) && isset($_GET['id']))
    {
      $id = clean($_GET['id']);
      $userid = $_SESSION['user']['id'];
      $check = mysql_num_rows(mysql_query("SELECT * FROM user_ideas_votes WHERE idee = '$id' AND user_id = '$userid' AND vote = '1'"));
      $check3 = mysql_num_rows(mysql_query("SELECT * FROM user_ideas_votes WHERE idee = '$id' AND user_id = '$userid' AND vote = '0'"));
      if ($check3 == '0')
      {
        if ($check == '0')
        {
          $check2 = mysql_num_rows(mysql_query("SELECT id FROM user_ideas WHERE id = '$id'"));
          if ($check2 == '1')
          {
            mysql_query("INSERT INTO user_ideas_votes(idee,user_id,vote) VALUES ('$id','$userid','1')");
            mysql_query("UPDATE user_ideas SET plus = plus + 1 WHERE id = '$id'");
            echo"<div class=\"succes\">Je hebt succesvol gestemd!</div><br>";
          }
          else
          {
            echo"<div class=\"error\">Het gevraagde ID bestaat niet.</div><br>";
          }
        }
        else
        {
          echo"<div class=\"error\">Je hebt al eens gestemd!</div><br>";
        }
      }
      else
      {
        echo"<div class=\"succes\">Je hebt succesvol gestemd!</div><br>";
        mysql_query("UPDATE user_ideas_votes SET vote = '1' WHERE idee = '$id' AND vote = '0' AND user_id = '$userid'");
            mysql_query("UPDATE user_ideas SET plus = plus + 1, min = min - 1 WHERE id = '$id'");
      }
    }
    if (isset($_GET['disrespect']) && isset($_GET['id']))
    {
      $id = clean($_GET['id']);
      $userid = $_SESSION['user']['id'];
      $check = mysql_num_rows(mysql_query("SELECT * FROM user_ideas_votes WHERE idee = '$id' AND user_id = '$userid' AND vote = '0'"));
      $check3 = mysql_num_rows(mysql_query("SELECT * FROM user_ideas_votes WHERE idee = '$id' AND user_id = '$userid' AND vote = '1'"));
      if ($check3 == '0')
      {
        if ($check == '0')
        {
          $check2 = mysql_num_rows(mysql_query("SELECT id FROM user_ideas WHERE id = '$id'"));
          if ($check2 == '1')
          {
            mysql_query("INSERT INTO user_ideas_votes(idee,user_id,vote) VALUES ('$id','$userid','0')");
            mysql_query("UPDATE user_ideas SET min = min + 1 WHERE id = '$id'");
            echo"<div class=\"succes\">Je hebt succesvol gestemd!</div><br>";
          }
          else
          {
            echo"<div class=\"error\">Het gevraagde ID bestaat niet.</div><br>";
          }
        }
        else
        {
          echo"<div class=\"error\">Je hebt al eens gestemd!</div><br>";
        }
      }
      else
      {
        echo"<div class=\"succes\">Je hebt succesvol gestemd!</div><br>";
        mysql_query("UPDATE user_ideas_votes SET vote = '0' WHERE idee = '$id' AND vote = '1' AND user_id = '$userid'");
            mysql_query("UPDATE user_ideas SET plus = plus - 1, min = min + 1 WHERE id = '$id'");
      }
    }
  ?>
<table width="550">
  <center>
    <tr>
      <td>
        <b>Idee</b>
      </td>
      <td>
        <b>Gebruiker</b>
      </td>
      <td>
        <b>Respect</b>
      </td>
    </tr>
    <?php
    $begin = ($_GET['p'] >= 0) ? $_GET['p']*10 : 0;
    $ideetjes = mysql_query("SELECT u.id AS userid,u.username,ui.*,ui.id AS idd FROM users u JOIN user_ideas ui ON (ui.user_id = u.id) ORDER BY ui.id ASC LIMIT $begin,10");
    if (mysql_num_rows($ideetjes) == '0')
    {
      echo"<div class=\"hoofdcat\"><b>Er zijn geen idee"; ?>&euml;<?php echo"n!</b></div>";
    }
    else
    {
      for($j=$begin+1; $idee = mysql_fetch_object($ideetjes); $j++)
      {
    ?>
    <tr>
      <td><hr style="margin-top: 10px;"></td><td><hr style="margin-top: 10px;"></td><td><hr style="margin-top: 10px;"></td>
    </tr>
    <tr>
      <td style="font-size: 11px;">
        <?php echo $idee->idee; ?>
      </td>
      <td style="font-size: 11px;">
        <?php echo $idee->username; ?>
      </td>
      <td style="font-size: 11px;">
        <?php
        if ($idee->min > $idee->plus)
        {
          ?>
        <font style="color:rgb(244, 60, 58);">
          
        </font>
        <font style="color:rgb(244, 60, 58);">
          <?php echo $idee->plus."+"; ?>
          <?php echo $idee->min."-"; ?>
        </font>
          <?php
        }
        elseif ($idee->plus == $idee->min)
        {
        ?>
        <font style="color:rgb(255, 106, 0);">
        <?php echo $idee->plus."+"; ?>
        <?php echo $idee->min."-"; ?>
        </font>
        <?php
        }
        elseif ($idee->plus > $idee->min)
        {
        ?>
        <font style="color:rgb(47, 205, 50);">
        +<?php echo $idee->plus; ?>
        -<?php echo $idee->min; ?>
        </font>
        <?php
        }
        ?>
        <?php
        $pageurl = clean($_GET['url']);
        ?>
        <a href="index.php?url=<?php echo $pageurl; ?>&respect&id=<?php echo $idee->idd; ?>" /><img src="app/tpl/skins/{skin}/images/respect.png"></a>  <a href="index.php?url=<?php echo $pageurl; ?>&disrespect&id=<?php echo $idee->idd; ?>" /><img src="app/tpl/skins/{skin}/images/disrespect.png"></a>
      </td>
    </tr>
    <?php 
      }
      $dbres = mysql_query("SELECT * FROM user_ideas");
      print "<table width=98%><tr><td align=\"center\">";
      
      if(mysql_num_rows($dbres) <= 10)
      {
        print "&#60; 1 &#62;</td></tr></table>\n";
      }
      else 
      {
        if($begin/10 == 0)
        {
          print "&#60; ";
        }
        else
        {
          print "<a href=\"index.php?url=$pageurl&p=". ($begin/10-1) ."\">&#60;</a> ";
        }
        
        for($i=0; $i<mysql_num_rows($dbres)/10; $i++) 
        {
          print "<a href=\"index.php?url=$pageurl&p=$i\">". ($i+1) ."</a> ";
        }
      
        if($begin+10 >= mysql_num_rows($dbres))
        {
          print "&#62; ";
        }
        
        else
        {
          print "<a href=\"index.php?url=$pageurl&p=". ($begin/10+1) ."\">&#62;</a>";
        }
        print "</td></tr></table>\n";
      }
    }
    ?>
  </center>
</table>
</div>
</div>

<div class="content-box" style="margin-top: 13px;">
<div class="content-box-black">
<h2 class="title">Idee&euml;n verzenden</h2>
</div>
<div class="content-box-content">
  <?php
  $ideacost = 5;
  $userid = $_SESSION['user']['id'];
  if (isset($_POST['setidee']))
  {
    if (strlen($_POST['idee']) <= '120' && !empty($_POST['idee']))
    {
      if ($userdata->vip_points >= $ideacost)
      {
        mysql_query("UPDATE users SET vip_points = vip_points - $ideacost WHERE id = '$userid'");
        MUS("updatepoints", $userid);
        mysql_query("INSERT INTO user_ideas_second(user_id,idee) VALUES ('$userid','".clean($_POST['idee'])."')");
      }
      else
      {
        echo"<div class=\"error\">Er is iets foutgelopen.. Je hebt niet genoeg sterren voor bewijs!</div><br>";
      }
    }
    else
    {
      echo"<div class=\"error\">Er is iets foutgelopen in je idee!</div><br>";
    }
  }
  ?>
  <span style="font-size: small; font-weight: bold;">
    Het verzenden van een idee kost <?php echo $ideacost; ?> sterren, als je idee goedgekeurd wordt (dus als er geen scheldwoorden of advertenties in zitten), krijg je je <?php echo $ideacost; ?> sterren terug.
  </span><br><br>
<form method="post" action="index.php?url=me">
  <table>
    <tr>
      <td>
        <strong>
          Idee (max 120 tekens)
        </strong>
      </td>
      <td>
        <input type="text" name="idee">
      </td>
    </tr>
    <tr>
      <td>
        <strong>
          Verzend idee
        </strong>
      </td>
      <td>
        <strong>
          <input type="submit" name="setidee" value="Verzend" class="glipperflexbtn">
        </strong>
      </td>
    </tr>
  </table>
</form>
</div>
</div>
<br>