<?php
include 'system/header.php';
include 'inc/shopnav.php';

$cost = 10; // 10 by default; ze kosten dus 10 sterren/cadeaupunten (alleen op Glipper)
$betaaldienst = "cadeaupunten"; // sterren of cadeaupunten (alleen op Glipper)

$payments = $betaaldienst=='sterren'?'vip_points':'sorry_points'; // blijf hier af!!!! do not touch

if (isset($_POST['kooppaardie']))
{
	$error = '';
	if ($_POST['paardje'] < 14 || $_POST['paardje'] > 77)
	{
		if ($_POST['naampje'] == "")
		{
			$error .= 'paardje,';
		}
		else
		{
			$error .= 'paardje';	
		}
	}
	if ($_POST['naampje'] == "")
	{
		if ($error == "paardje,")
		{
			$error .= 'naampje';
		}
		else
		{
			$error .= 'naampje';	
		}
	}
	if (empty($error))
	{
		// let's proceed
		$paardje = (int)mysql_real_escape_string($_POST['paardje']);
		$naampje = mysql_real_escape_string($_POST['naampje']);
		
		global $users;
		$data = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id = '".$_SESSION['user']['id']."'"));
		switch ($payments)
		{
			case 'vip_points':
				if ($data->vip_points >= $cost)
				{
					$proceed_cost = 1;
				}
				else
				{
					$proceed_cost = 0;
				}
			break;
			case 'sorry_points':
				if ($data->sorry_points >= $cost)
				{
					$proceed_cost = 1;
				}
				else
				{
					$proceed_cost = 0;
				}
			break;
			default:
				if ($data->vip_points >= $cost)
				{
					$proceed_cost = 1;
				}
				else
				{
					$proceed_cost = 0;
				}
			break;
		}
		if ($proceed_cost == 1)
		{
			// diegene heeft genoeg sterren/cadeaupunten (alleen in Glipper)
			if ($data->online == '1')
			{
				$error .= 'online';
			}
			else
			{
				// diegene is NIET online
				mysql_query("UPDATE users SET $payments = $payments - $cost WHERE id = '".$data->id."'"); // trek sterren/cadeaupunten af
				$sel = mysql_query("SHOW TABLES LIKE 'user_activity'");
				if (mysql_num_rows($sel) == 1)
				{
					mysql_query("INSERT INTO user_activity(user_id,activity,buy,tijd) VALUES ('".$data->id."', 'paard $paardje', '1', NOW());"); // alleen beschiktbaar op Glipper
				}
				mysql_query("INSERT INTO user_pets(user_id,room_id,name,race,color,type,energy,nutrition,createstamp) VALUES ('".$data->id."', '0', '".$naampje."', '$paardje', 'FFFFFF', '13', '100','100', NOW())");
			}
		}
		else
		{
			$error .= 'cost';
		}
	}
}
?>
</span>
</div>

<style type="text/css">
.error_horse {
	border-color: #F00;
	border-width: 1px 1px 1px;	
}
</style>

<div id="marginy">
    <div id="main_left"> 
        <div class="content-box"> 
            <div class="content-box-deep-blue"> 
                <h2 class="title">Koop een paard</h2> 
            </div> 
            <div class="content-box-content"> 
                <table width="100%">
                    <tr>
                        <td>
                            <div id="ts-preview" style="margin-left:10px; padding: 10px; float: left; text-align: center; vertical-align: middle;">								
                                <div style="margin-top:-10px; float: right; text-align: center; vertical-align: middle;">								
                                    <b>Voorbeeld:</b><br><br>								
                                    <img src="app/tpl/skins/Paint/images/paard/14.png" />								
                                </div>									
                            </div>
                        </td>
                        <td>
                            <form method="post" action="index.php?url=horsestyling">
                                <input type="text" <?php if ($error == 'naampje' || $error == 'paardje,naampje') {echo"class=\"error_horse\"";} ?> placeholder="Naam.." name="naampje"/><br />
                                <select name="paardje" <?php if ($error == 'paardje' || $error == 'paardje,naampje') {echo"class=\"error_horse\"";} ?> onchange="previewHORSE(this.value);">
                                    <option value="14">Grijs</option>
                                    <option value="15">Grijze stippjes</option>
                                    <option value="16">Grijze vlekken</option>
                                    <option value="17">Grijze stippen</option>
                                    <option value="18">Licht oranje</option>
                                    <option value="19">Oranje stippjes</option>
                                    <option value="20">Oranje vlekken</option>
                                    <option value="21">Oranje stippen</option>
                                    <option value="22">Roze</option>
                                    <option value="23">Roze stippjes</option>
                                    <option value="24">Roze vlekken</option>
                                    <option value="25">Roze stippen</option>
                                    <option value="26">Licht blauw</option>
                                    <option value="27">Blauwe stippjes</option>
                                    <option value="28">Blauwe vlekken</option>
                                    <option value="29">Blauwe stippen</option>
                                    <option value="30">Wit</option>
                                    <option value="31">Witte stippjes</option>
                                    <option value="32">Witte vlekken</option>
                                    <option value="33">Witte stippen</option>
                                    <option value="34">Zwart</option>
                                    <option value="35">Zwarte stippjes</option>
                                    <option value="36">Zwarte vlekken</option>
                                    <option value="37">Zwarte stippen</option>
                                    <option value="38">Licht wit</option>
                                    <option value="39">Witte stippjes</option>
                                    <option value="40">Witte vlekken</option>
                                    <option value="41">Witte stippen</option>
                                    <option value="42">Groen</option>
                                    <option value="43">Groene stipppjes</option>
                                    <option value="44">Groene vlekken</option>
                                    <option value="45">Groene stippen</option>
                                    <option value="46">Oranje</option>
                                    <option value="47">Oranje stippjes</option>
                                    <option value="48">Oranje vlekken</option>
                                    <option value="49">Oranje stippen</option>
                                    <option value="50">Zwart & Oranje</option>
                                    <option value="51">Zwart & Bruin</option>
                                    <option value="52">Zwart & Grijs</option>
                                    <option value="53">Zwart & Geel</option>
                                    <option value="54">Zwart & Roze</option>
                                    <option value="55">Zwart & Blauw</option>
                                    <option value="56">Zwart & Geel</option>
                                    <option value="57">Zwart & Blauw</option>
                                    <option value="58">Zwart & Grijs</option>
                                    <option value="59">Zwart & Rood</option>
                                    <option value="60">Zwart & Groen</option>
                                    <option value="61">Blauw</option>
                                    <option value="62">Blauwe stippjes</option>
                                    <option value="63">Blauwe vlekken</option>
                                    <option value="64">Blauwe stippen</option>
                                    <option value="65">Licht Roze</option>
                                    <option value="66">Roze stippjes</option>
                                    <option value="67">Roze vlekken</option>
                                    <option value="68">Roze stippen</option>
                                    <option value="69">Geel</option>
                                    <option value="70">Gele stippjes</option>
                                    <option value="71">Gele vlekken</option>
                                    <option value="72">Gele stippen</option>
                                    <option value="73">Rood</option>
                                    <option value="74">Rode stippjes</option>
                                    <option value="75">Rode vlekken</option>
                                    <option value="76">Rode stippen</option>
                                    <option value="77">Zeldzaam</option>
                                </select>
                                <br />
                                <input type="submit" name="kooppaardie" class="glipperflexbtn" value="Koop nu" />
                            </form>
                        </td>
                    </tr>
                </table>
                <br clear="all" />
            </div>
        </div>
    </div>
    <div id="main_right"> 
        <div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
            <div class="content-box-deep-blue2" style="width:290px">
                <h2 class="title" style="padding:0;line-height:30px;">Lees dit voordat je een paard koopt!</h2> 
            </div> 
            <div class="content-box-content"> 
                 Hiernaast kan jij je paard kopen voor <strong><?php echo $cost; ?></strong> <?php echo $betaaldienst; ?>. Dit zijn paarden die je nooit in de catalogus zult vinden en erg zeldzaam zijn, ze kosten <?php echo $betaaldienst; ?> omdat iedereen zeldzame paarden gratis zou kunnen kopen, is er geen lol meer aan! Natuurlijk worden er af en toe <?php echo $betaaldienst; ?> gratis wegegeven bij events! <?php if ($error == 'online') {echo'<span style="color:red;font-weight:bold;">';} ?>Om een paard te kopen moet je offline zijn.<?php if ($error == 'online') {echo"</span>";} ?> <?php if ($error == 'cost') {echo'<span style="color:red;font-weight:bold;">';} ?>De prijs is: <strong><?php echo $cost; ?></strong> <?php echo $betaaldienst; ?>.<?php if ($error == 'cost') {echo"</span>";} ?>
            </div>	
        </div>	
    </div>	
</div>
<script type="text/javascript">								
function previewHORSE(el)								
{									
	document.getElementById('ts-preview').innerHTML = '<div style="margin-top:-10px; float: right; text-align: center; vertical-align: middle;"><b>Voorbeeld:</b><br><br><img src="app/tpl/skins/Paint/images/paard/' + el + '.png" /></div>';								
}							
</script>