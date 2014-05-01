<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>
           <style>
#xdd { display:none;}
</style>          
<script>
 $(document).ready(function () {
$("#xdd").first().show("fast", function showNext() {
$(this).next("#xdd").show("fast", showNext);
});
});
$("#hidr").click(function () {
$("#xdd").hide(1000);
});
</script>                    
<div id="marginy">
<div id="main_left"> 

<?php
if (!isset($_POST['step2']) && !isset($_POST['step3']) && !isset($_POST['step4']))
{
?>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Stap 1 - voor wie?</h2> 
</div> 
<div class="glipperflexcont"> 
<form method="post">
    <table width='450' border='0'> 
        <tr> 
            <td width="100"><strong>Iedereen die online is</strong></td> 
            <td width="556"><input type='radio' name='choise' value='iedereen' checked/></td> 
        </tr>
        <tr> 
            <td width="500"><strong>Bepaalde kamer</strong></td> 
            <td width="556"><input type='radio' name='choise' value='kamer' /></td> 
        </tr>
        <tr> 
            <td>&nbsp;</td> 
            <td><input type='submit' class='glipperflexbtn' name='step2' id='button' value='Ga voort' style="margin-top: 10px;"/></td> 
        </tr> 
    </table>
</form>
</div> 
</div>
<?php
} 
elseif (isset($_POST['step2']) && !empty($_POST['choise'])) 
{
    $radio = clean($_POST['choise']);
?>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Stap 2 - wat?</h2> 
</div> 
<div class="glipperflexcont"> 
<form method="post">
    <table width='450' border='0'> 
        <tr> 
            <td width="1000000000"><strong>Iedereen die online is</strong></td> 
            <td width="556"><input type='radio' name='online' value='iedereen' <?php if ($radio == 'iedereen') { echo"checked"; } ?> disabled="disabled"/></td> 
        </tr>
        <tr> 
            <td width="500"><strong>Bepaalde kamer</strong></td> 
            <td width="556"><input type='radio' name='online' value='kamer' <?php if ($radio == 'kamer') { echo"checked"; } ?> disabled="disabled"/></td> 
        </tr>
        <tr>
            <td><hr width="300%"></td>
        </tr>
        <?php
            if ($radio == 'kamer')
            {
                ?>
                    <tr> 
                        <td width="100"><strong>Kamer</strong></td> 
                        <td width="556">
                            <select name="room"><?php $getroom = mysql_query("SELECT id,caption,users_now FROM rooms WHERE users_now <> '0' ORDER BY users_now DESC"); if (mysql_num_rows($getroom) == '0') {header("Location: index.php?url=admincadeau");} while ($room = mysql_fetch_object($getroom)) {echo"<option value=\"$room->id\">".$room->caption.": $room->users_now actief</option>";} ?></select>
                        </td> 
                    </tr>
                <?php
            }
        ?>
        <tr> 
            <td width="100"><strong>Item ID</strong></td> 

            <td width="556">
            	<input type='text' name='giftid' id="tweet_box" />	            
            </td> 
        </tr>
        <tr> 
            <td width="100"><strong>Page ID</strong></td> 
            <td width="556"><div id="tweet_feedback"><input type='text' name='pageid' /></div></td> 
        </tr>
        <tr> 
            <td>&nbsp;</td> 
            <input type="hidden" name="choise" value="<?php echo $radio; ?>">
            <td><input type='submit' class='glipperflexbtn' name='step3' id='button' value='Ga voort' style="margin-top: 10px;"/></td> 
        </tr> 
    </table>
</form>
</div> 
</div>

<?php
}
elseif (isset($_POST['step3']) && !empty($_POST['giftid']) && !empty($_POST['pageid']))
{
    $radio = clean($_POST['choise']);
    $item = clean($_POST['giftid']);
    $page = clean($_POST['pageid']);
    if (isset($_POST['room']))
    {
        $kamer = clean($_POST['room']);
    }
    ?>
    <div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Stap 3 - extra</h2> 
</div> 
<div class="glipperflexcont"> 
<script>
    $(document).ready(function () {
        var counter = 3;
        var id = setInterval(function() {
           counter--;
           if(counter > 0) {
                $('#notice').text(msg);
           } else {
                $('#notice').hide();
                $('#download').show();
                clearInterval(id);
          }
        }, 1000);
    });
</script>
<form method="post">
    <table width='450' border='0'> 
        <tr> 
            <td width="100"><strong>Iedereen die online is</strong></td> 
            <td width="556"><input type='radio' name='online' value='iedereen' <?php if ($radio == 'iedereen') { echo"checked"; } ?> disabled="disabled"/></td> 
        </tr>
        <tr> 
            <td width="500"><strong>Bepaalde kamer</strong></td> 
            <td width="556"><input type='radio' name='online' value='kamer' <?php if ($radio == 'kamer') { echo"checked"; } ?> disabled="disabled"/></td> 
        </tr>
        <tr>
            <td><hr width="300%"></td>
        </tr>
         <?php
            if (isset($_POST['room']))
            {
                ?>
                    <tr> 
                        <td width="100"><strong>Kamer</strong></td> 
                        <td width="556">
                            <select name="room" disabled="disabled"><?php $getroom = mysql_query("SELECT id,caption,users_now FROM rooms WHERE users_now <> '0' AND  ORDER BY users_now DESC"); while ($room = mysql_fetch_object($getroom)) {echo"<option value=\"$room->id\">".clean($room->caption).": $room->users_now actief</option>";} ?></select>
                        </td> 
                    </tr>
                <?php
            }
        ?>

        <tr> 
            <td width="100"><strong>Item ID</strong></td> 
            <td width="556"><input type='text' name='giftid' <?php echo"value='$item'"; ?> disabled="disabled"/></td> 
        </tr>
        <tr> 
            <td width="100"><strong>Page ID</strong></td> 
            <td width="556"><input type='text' name='pageid'<?php echo"value='$page'"; ?> disabled="disabled"/></td> 
        </tr>
        <tr>
            <td><hr width="300%"></td>
        </tr>
        <tr> 
            <td width="100"><strong>Bericht</strong></td> 
            <td width="556"><input type='text' name='message'/></td> 
        </tr>
        <tr> 
            <td>&nbsp;</td> 
            <input type="hidden" name="choise" value="<?php echo $radio; ?>">
            <input type="hidden" name="giftid" value="<?php echo $item; ?>">
            <input type="hidden" name="pageid" value="<?php echo $page; ?>">
            <?php
            if (isset($_POST['room']))
            {
                ?>
                <input type="hidden" name="room" value="<?php echo $kamer; ?>">
                <?php
            }
            ?>
            <td><input type='submit' class='glipperflexbtn' name='step4' id='button' value='Ga voort' style="margin-top: 10px;"/></td> 
        </tr> 
    </table>
</form>
</div> 
</div>

<?php
}
elseif (isset($_POST['step4']))
{
    $radio = clean($_POST['choise']);
    $item = clean($_POST['giftid']);
    $page = clean($_POST['pageid']);
    $bericht = clean($_POST['message']);
    if (isset($_POST['room']))
    {
        $kamer = clean($_POST['room']);
    }

?>
    <div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Stap 4 - procedure</h2> 
</div> 
<div class="glipperflexcont"> 
    <table class="users">
        <tr>
            <th>
                Gebruikersid
            </th>
            <th>
                Gebruikersnaam
            </th>
            <th>
                Status
            </th>
        </tr>
<?php
    if (isset($_POST['room']))
    {
        $sql = mysql_query("SELECT ur.*,u.id,u.username FROM user_roomvisits ur JOIN users u ON (ur.user_id = u.id AND room_id = '$kamer')");
        if (mysql_num_rows($sql) != '0')
        {
            $i = 0;
            while ($visit = mysql_fetch_object($sql))
            {
                $i++;
                if ($visit->exit_timestamp == '0')
                {
                    ?>
                    <tr class="first users" style="text-decoration: none;">

                <td>
                    <a href="index.php?url=profile&id=<?php echo $visit->username; ?>" target="_blank"><?php echo $visit->id; ?></a>
                </td>
                <td>
                   <a href="index.php?url=profile&id=<?php echo $visit->username; ?>" target="_blank"><?php echo $visit->username; ?></a>
                </td>
                <td>
                    <script>
                    $(document).ready(function () {
                        var counter = 1;
                        var id = setInterval(function() {
                           counter--;
                           if(counter > 0) {
                                $('#notice').text(msg);
                           } else {
                                $('#check').show();
                                clearInterval(id);
                          }
                        }, 1000);
                    });
                    </script>
                    <span style="display:none;" id="check">Check!</span>
                </td>
            </tr>

                    <?php
                }
            }
        }
    }
	else
	{
		$sql = mysql_query("SELECT * FROM users WHERE online = '1'");
        if (mysql_num_rows($sql) != '0')
        {
            $i = 0;
            while ($visit = mysql_fetch_object($sql))
            {
                $i++;
				MUS("giveitem", "$visit->id", "$item", "$page", "$bericht");
				//echo "giveitem", " $visit->id $item $page $bericht";
                    ?>
			<tr class="first users" id="xdd" style="text-decoration: none;">
                <td>
                    <a href="index.php?url=adminusers&ip=<?php echo $visit->ip_last; ?>" target="_blank"><?php echo $visit->id; ?></a>
                </td>
                <td>
                   <a href="index.php?url=adminusers&ip=<?php echo $visit->ip_last; ?>" target="_blank"><?php echo $visit->username; ?></a>
                </td>
                <td>
                    Check!
                </td>
            </tr>

                    <?php
            }
        }
	
	}
?>
</div> 
</div>

<?php
    }
?>
<script>
// callback
/*
$('#tweet_box').keyup(function() {
	var tweet_length = $('#tweet_box').val();
	$('#tweet_feedback').html("<input readonly='readonly' type='text' name='pageid' value='" + tweet_length + "' />");
});*/

//jquery.php
$('#tweet_box').keyup(function() {
	var tweet_length = $('#tweet_box').val();
		$.post('jquery.php',{tweet_length: tweet_length}, function(data) {
			$("#tweet_feedback").html("<input readonly='readonly' type='text' name='pageid' value='" + data + "' />");
		});
});
</script>
