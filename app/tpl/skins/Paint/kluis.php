<?php
include'system/header.php';
include'inc/shopnav.php'; 
?>
</span>
</div>
<div id="marginy">
	<div id="main_left"> 
		<div class="glipperflexbox"> 
			<div class="glipperflexbar"> 
				<h2 class="title">Kraak de kluis</h2> 
			</div> 
			<div class="glipperflexcont"> 
				<?php
					if (isset($_POST['crack']))
					{
						$digit1 = clean($_POST['1']);
						$digit2 = clean($_POST['2']);
						$digit3 = clean($_POST['3']);
						$digit4 = clean($_POST['4']);
						$digit5 = clean($_POST['5']);
						$digit = array($digit1,$digit2,$digit3,$digit4,$digit5);
						$regexp = preg_match('/^[0-9]{1,}$/', $digit[0]);
						if (!empty($digit1) || !empty($digit3) || !empty($digit4) || !empty($digit5))
						{
							if (!empty($digit2))
							{
								if (ctype_digit($digit1) || ctype_digit($digit2) || ctype_digit($digit3) || ctype_digit($digit4) || ctype_digit($digit5))
								{
									if (!$regexp)
									{
										
									}
									else
									{
										echo"<div class=\"errorbox\">";
										echo"Je mag alleen maar de nummers 0-9 invullen.";
										echo"</div>";
									}
								}
								else
								{
									echo"<div class=\"errorbox\">";
									echo"Je mag alleen nummers invullen.";
									echo"</div>";
								}
						}
						else
						{
							echo"<div class=\"errorbox\">";
							echo"Je hebt niet alle nummers ingevuld.";
							echo"</div>";
						}
						}
						else
						{
							echo"<div class=\"errorbox\">";
							echo"Je hebt niet alle nummers ingevuld.";
							echo"</div>";
						}
					}
				?>
								<style type="text/css">
				#vaultcontainer{
					background: url('app/tpl/skins/Paint/images/Vault.png');
					height: 496px;
					width: 614px;
					float: left;
				}

				#thingcontainer{
					margin-top: 231px;
					margin-left: 120px;
				}

				input.inputdigit{
					background: url('app/tpl/skins/Paint/images/digitbg.png') no-repeat;
					width: 32px;
					height: 33px;
					border:none;
					color: white;
					font-size: 15px;
					padding-left: 12px;
				}

				input.vaultok{
					background: url('app/tpl/skins/Paint/images/vaultok.png') no-repeat;
					width: 32px;
					height: 33px;
					border:none;
				}
				input.vaultok:hover{
					cursor:pointer;
				}
				</style>			

				<div id="vaultcontainer">
					<div id="thingcontainer">
						<form method="post">
						<input type="text" class="inputdigit" maxlength="1" name="digit1" />
						<input type="text" class="inputdigit" maxlength="1" name="digit2" />
						<input type="text" class="inputdigit" maxlength="1" name="digit3" />
						<input type="text" class="inputdigit" maxlength="1" name="digit4" />
						<input type="text" class="inputdigit" maxlength="1" name="digit5" />
						<input type="submit" class="vaultok" name="crack" value=""/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>