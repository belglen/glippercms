<?php
include 'system/header.php';
include 'inc/homenav.php';

$user = new User($_SESSION['user']['id']);
?>
</span>
</div>

<div id="main_left"> 
<div class="glipperflexbox"> 
	<div class="glipperflexbar"> 
        <h2 class="title">Account instellingen</h2> 
    </div> 
    <div class="glipperflexcont" style="background: #FFFFFF url(app/tpl/skins/Paint/images/office.png) no-repeat scroll right bottom;"> 
        <?php 
		if (isset($template->form->error)) 
		{
            echo '<div id="message">' . $template->form->error . '</div>';
        } 
		?>
            <form action="" method="post"> 
                <table width="766" border="0"> 
					Vanaf hier kun je je account wijzigen, zoals je e-mail, missie en     wachtwoord!        <br/> 
                    <tr> 
                        <td width="150"><strong>Emailadres</strong></td> 
                        <td width="606"><input disabled type="text" id="email" value="{email}"/></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Motto</strong></td> 
                        <td><label for="motto"></label> 
                            <input name="acc_motto" type="text" id="motto" value="<?php echo $motto ?>"/></td> 
                    </tr> 
                    <tr> 
                        <td width="150">&nbsp;</td> 
                        <td width="500"><i>Vul alleen je wachtwoord in als je 
								dit wilt wijzigen.</i></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Huidig wachtwoord:</strong></td> 
                        <td><input type="password" name="acc_old_password" id="password"/></td> 
                    </tr> 
                    <tr> 
                        <td><strong>Nieuw wachtwoord:</strong></td> 
                        <td><input type="password" name="acc_new_password" id="confirm_password"/></td> 
                    </tr> 
 
                    <tr> 
                        <td>&nbsp;</td> 
                        <td><input type="submit" class="glipperflexbtn" name="account" id="button" value="Verander"/></td> 
                    </tr> 
                </table> 
            </form> 
        </div> 
    </div> 
    <br>
<div class="glipperflexbox"> 
<div class="glipperflexbar"> 
            <h2 class="title">Tags</h2> 
        </div> 
        <div class="glipperflexcont" style="background: #FFFFFF url(app/tpl/skins/Paint/images/potlood.png) no-repeat scroll right bottom;"> 

            <table width="50%">
            <?php
			if (isset($_POST['addtag']))
			{
				$tag = stripslashes(strip_tags($_POST['tag']));
				if($tag != "")
				{
					mysql_query("INSERT INTO `user_tags` (`user_id`, `tag`) VALUES ('" . $userid . "', '$tag');");
				}
			}
			else if (isset($_POST['deltag']))
			{
				$ip = (int)htmlspecialchars($_POST['tagdel']);
				$checklist = mysql_query("SELECT id,user_id,tag FROM user_tags WHERE id = '$ip' AND user_id = '".$user->id."'");
				if (mysql_num_rows($checklist) == 1)
				{
					mysql_query("DELETE FROM `user_tags` WHERE id = '$ip' AND user_id = '".$user->id."'");
				}
	
			}
            $userid = $_SESSION['user']['id'];
            $sql = mysql_query("SELECT id,user_id,tag FROM user_tags WHERE user_id = " . $userid . " ");
				if (mysql_num_rows($sql) != '0') 
				{			
				while ($tagie = mysql_fetch_assoc($sql)) 
				{
                    echo "    
                   <tr><td>" . $tagie['tag'] . "</td>
                    <td>
                        <form method=\"post\" action=\"index.php?url=account\">
                            <input type=\"hidden\" name=\"tagdel\" value=\"" . $tagie['id'] . "\"/>
                            <input type=\"submit\" class=\"glipperflexbtn\" name=\"deltag\" value=\"Verwijder\"/>
                        </form>
                    </td>
                   </tr>";
            }
		} else {
	echo "<tr><td>	Je hebt nog geen tags, voeg er snel één toe!<br></tr></td>";
		}
            echo "
          <tr> 
                 <form method=\"post\" action=\"index.php?url=account\">
		        <td>

                        <input type=\"text\" name=\"tag\" id=\"tag\"/>
              </td>
              <td>  
			<input type=\"submit\" class=\"glipperflexbtn\" name=\"addtag\" value=\"Voeg toe\"/> </form>
              </td>
          </tr>
              ";
           ?>

               
            </table>
        </div> 
    </div>
<br>