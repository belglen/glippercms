<?php
switch($_GET['action'])
{
	case "step-1":
		session_start();
	if (isset($_POST['submit11']))
	{
		if(isset($_POST['day']))
		{
			if(!empty($_POST['day']))
			{
				if(filter_var($_POST['day'], FILTER_VALIDATE_INT))
				{
					if($_POST['day'] <= 31 && $_POST['day'] >= 1)
					{
						$day = addslashes($_POST['day']);
					}
					else
					{
						header("location: index.php?url=register&action=step-1&err");
						exit;						
					}
				}
			 	else
				{
					header("location: index.php?url=register&action=step-1&err");
					exit();
				}
			}
			else
			{
				header("location: index.php?url=register&action=step-1&err");
				exit();
			}
		}
		
		//We kijken of het maand correct is
		if(isset($_POST['month']))
		{
			if(!empty($_POST['month']))
			{
				if((int)$_POST['month'])
				{
					if($_POST['month'] <= 12 && $_POST['month'] >= 1)
					{
						$month = addslashes(mysql_real_escape_string($_POST['month']));
					}
					else
					{
						header("location: index.php?url=register&action=step-1&err");
						exit();						
					}
				}
				else
				{
					header("location: index.php?url=register&action=step-1&err");
					exit();
				}
			}
			else
			{
				header("location: index.php?url=register&action=step-1&err");
				exit();
			}
		}
		
		//We kijken of het jaar correct is
		if(isset($_POST['year']))
		{
			if(!empty($_POST['year']))
			{
				if((int)$_POST['year'])
				{
					if($_POST['year'] <= date("Y") && $_POST['year'] >= (date("Y") - 100))
					{
						$year = addslashes(mysql_real_escape_string($_POST['year']));
					}
					else
					{
						header("location: index.php?url=register&action=step-1&err");
						exit();						
					}
				}
				else
				{
					header("location: index.php?url=register&action=step-1&err");
					exit();
				}
			}
			else
			{
				header("location: index.php?url=register&action=step-1&err");
				exit();
			}
		}
		//We gaan kijken of de geboortedatum correct is.
		if(!checkdate($month, $day, $year))
		{
			header("location: index.php?url=register&action=step-1&err");
			exit();
		}
		
		if(isset($_POST['gender']))
		{
			if($_POST['gender'] == "m")
			{
				$gender = "m";
			}
			elseif($_POST['gender'] == "f")
			{
				$gender = "f";
			}
			else
			{
				$gender = "m";
			}
		}
		else
		{
			$gender = "m";
		}
		//Save variables
		$_SESSION['day'] = $day;
		$_SESSION['month'] = $month;
		$_SESSION['year'] = $year;
		$_SESSION['gender'] = $gender;
		header("location: index.php?url=register&action=step-2");
		exit();
	}
?>
<html>
<head>
	<title><?php echo $_CONFIG['hotel']['name']; ?> :: Registeren</title>
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/css/register.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/volter/index.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/bebas/index.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/helvetica/index.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
	<script src="app/tpl/skins/Paint/system/site/index/js/register.js" type="text/javascript"></script>
</head>
<body>
	<div id="general">		
		<div id="contenedor">
			<div id="header">
				<div id="pasos">
					<div class="paso activo">
						<h1 class="activo">1</h1>
						Geboortedatum & geslacht
					</div>
					<div class="paso dos">
						<h1>2</h1>
						Gegevens
					</div>
					<div class="paso tres">
						<h1>3</h1>
						Veiligheidscheck 
					</div>
				</div>
			</div>
		
			<div id="contenido">
				<h2>Geboortedatum</h2>
				<div class="selec">- Voer je geboortedatum in </div>
				<form method="post">
				<input type="text" class="area" placeholder="Dag" name="day"> 
                <input type="text" class="area" placeholder="Maand" name="month">
                <input type="text" class="area" placeholder="Jaar" name="year">
				<h2>Geslacht</h2>
				<div class="selec">- Kies jou geslacht</div>
				<input type="hidden" id="avatarGender" name="gender" value=""/>
				<ul id="gender-choices">
					<li class="boton masc">
						<img align="left" alt="m" src="/img/invisible.png">
						Jongen
					</li>
					<li class="boton fem">
						<img align="left" alt="f" src="/img/invisible.png">
						Meisje
					</li>
				</ul>
				<div class="fondoreg"></div>
			
				<div id="fin">
U heeft deze stap voltooid controleer je gegevens nogmaals.
Klopt alles? Klik dan op Verder <strong> </strong>
				</div>
				
				<p class="seg"><input type="submit" class="seguir" value="Verder" name="submit11" id="submit11"></p>
				</form>
			</div>
			
			<a href="index.php?url=index"><div class="ant">« Annuleren</div></a>
			
		</div>
        <script type="text/javascript">
			document.observe("dom:loaded", function() {
				Register.initGenderChooser("m");
			});
			function showAlt(){$(this).replaceWith(this.alt)};
			function addShowAlt(selector){$("img").error(showAlt).attr("src", $("img").src)};
		</script>
	<?php				
		break;
	case "step-2":
		if(!isset($_SESSION['day']) || !isset($_SESSION['month']) || !isset($_SESSION['year']) || !isset($_SESSION['gender']))
		{
			header("location: index.php?url=register&action=step-1");
			exit();
		}
		elseif(empty($_SESSION['day']) || empty($_SESSION['month']) || empty($_SESSION['year']) || empty($_SESSION['gender']))
		{
			header("location: index.php?url=register&action=step-1");
			exit();
		}
	if (isset($_POST['submit22']))
	{
		//header("location: index.php?url=register&action=step-1&err");
		if(isset($_POST['username']))
		{
			if(!empty($_POST['username']))
			{
				if(strlen($_POST['username']) < 30 && strlen($_POST['username']) > 4)
				{
					$nick_check = mysql_query("SELECT id FROM users WHERE username = '".stripslashes(mysql_real_escape_string($_POST['username']))."'");
					if(mysql_num_rows($nick_check) == 0)
					{
						$username = stripslashes(mysql_real_escape_string($_POST['username']));
					}
					else
					{
						?>
                        <script type="text/javascript">
							$("#first").show();
						</script>
                        <?php
					}
				}
				else
				{
						?>
                        <script type="text/javascript">
							$("#first").show();
						</script>
                        <?php
				}
			}
			else
			{
						?>
                        <script type="text/javascript">
							$("#first").show();
						</script>
                        <?php
			}
		}
		if(isset($_POST['email']))
		{
			if(!empty($_POST['email']))
            {
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
					$email_check = mysql_query("SELECT id FROM users WHERE mail = '".$_POST['email']."'");
					if(mysql_num_rows($email_check) == 0)
					{
						$email = stripslashes(mysql_real_escape_string($_POST['email']));
					}
					else
					{
						header("location: index.php?url=register&action=step-2&errortwo");
						exit();						
					}
				}
				else
				{
					header("location: index.php?url=register&action=step-2&errortwo");
					exit();
				}
			}
		}


		/*
		// We gaan nu kijken of email goed ingevuld is...
		if(isset($_POST['email']))
		{
			if(!empty($_POST['email']))
			{
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
					$email_check = mysql_query("SELECT id FROM users WHERE mail = '".$_POST['email']."'");
					if(mysql_num_rows($email_check) == 0)
					{
						$email = $_POST['email'];
					}
					else
					{
						header("location: ".$configuration['url']."/register/step-2/e/02");
						exit();						
					}
				}
				else
				{
					header("location: ".$configuration['url']."/register/step-2/e/02");
					exit();
				}
			}
			else
			{
				header("location: ".$configuration['url']."/register/step-2/e/02");
				exit();
			}
		}
		else
		{
			header("location: ".$configuration['url']."/register/step-2/e/02");
			exit();
		}		
		
		//We gaan nu kijken of wachtwoord goed ingevuld is...
		if(isset($_POST['password']))
		{
			if(!empty($_POST['password']))
			{
				if(preg_match('`[0-9]`',$_POST['password']) && preg_match('`[a-zA-Z]`',$_POST['password']))
				{
					$password = $_POST['password'];
				}
				else
				{
					header("location: ".$configuration['url']."/register/step-2/e/03");
					exit();
				}
			}
			else
			{
				header("location: ".$configuration['url']."/register/step-2/e/03");
				exit();
			}
		}
		else
		{
			header("location: ".$configuration['url']."/register/step-2/e/03");
			exit();
		}		
		
		//We gaan nu kijken of wachtwoord goed herhaald is ...
		if(isset($_POST['repeat-password']))
		{
			if(!empty($_POST['repeat-password']))
			{
				if($password != $_POST['repeat-password'])
				{
					header("location: ".$configuration['url']."/register/step-2/e/04");
					exit();
				}
			}
			else
			{
				header("location: ".$configuration['url']."/register/step-2/e/04");
				exit();
			}
		}
		else
		{
			header("location: ".$configuration['url']."/register/step-2/e/04");
			exit();
		}
		
		//We gaan kijken of de gebruiker het eens is met de Algemne voorwaarden!
		if(isset($_POST['terms']))
		{
			if($_POST['terms'] != true)
			{
				header("location: ".$configuration['url']."/register/step-2/e/05");
				exit();
			}
		}
		else
		{
			header("location: ".$configuration['url']."/register/step-2/e/05");
			exit();
		}
		
		//Nu gaan we de variables opslaan voor de volgende stap.
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		header("location: ".$configuration['url']."/register/step-3");
		exit();
		*/
	}
?>
<html>
<head>
	<title><?php echo $_CONFIG['hotel']['name']; ?> :: Registeren</title>
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/css/register.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/volter/index.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/bebas/index.css" />
	<link rel="stylesheet" type="text/css" href="app/tpl/skins/Paint/system/site/index/fonts/helvetica/index.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
	<script src="app/tpl/skins/Paint/system/site/index/js/register.js" type="text/javascript"></script>
</head>
<body>
	<div id="general">
	
		<div id="contenedor">
			<div id="header">
				<div id="pasos">
					<div class="paso">
						<h1>1</h1>
						 Geboortedatum & geslacht
					</div>
					<div class="paso dos activo">
						<h1 class="activo">2</h1>
						Gegevens
					</div>
					<div class="paso tres">
						<h1>3</h1>
						Veiligheidscheck
					</div>
				</div>
			</div>
		
			<div id="contenido">
				<h2>Gegevens</h2>
				<form method="POST" action="index.php?url=register&action=step-2">
				<p><input type="text" name="username" class="area areau" placeholder="Naam"></p>
				<span id="first" style="display:none;"><div class="error">Uw naam is al bezet of is niet geldig!</div></span>
				<p><input type="email" name="email" class="area areau" placeholder="Email"></p>
				<span id="two" style="display:none;"><div class="error">Er klopt iets niet met uw email-adres!</div></span>
				<p><input type="password" name="password" class="area areau" placeholder="Wachtwoord"></p>
				<span id="three" style="display:none;"><div class="error">Gelieve uw wachtwoord in te vullen.</div></span>
				<p><input type="password" name="repeat-password" class="area areau" placeholder="Herhaal wachtwoord"></p>
				<span id="four" style="display:none;"><div class="error">Het ingevulde wachtwoord klopt niet of is niet ingevuld.</div></span>
				
				<div class="fondoreg2"></div>
			
				<div class="acepto">
					<p><input type="checkbox" name="terms">  Ik begrijp en ga akkoord met de algemene voorwaarden</p>
				</div>
				
				<div class="reg2">
				</div>
				
				<p class="seg"><input type="submit" class="seguir" name="submit22" value="Verder"></p>
			</div>
			</form>
			
			<a href="index.php?url=index"><div class="ant">« Annuleren</div></a>
			
		</div>
<?php
		break;
	case "step-3":
		if(!isset($_SESSION['day']) || !isset($_SESSION['month']) || !isset($_SESSION['year']) || !isset($_SESSION['gender']) || !isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['password']))
		{
			header("location: ".$configuration['url']."/register/step-1/e/01");
			exit();
		}
		elseif(empty($_SESSION['day']) || empty($_SESSION['month']) || empty($_SESSION['year']) || empty($_SESSION['gender']) || empty($_SESSION['username']) || empty($_SESSION['email']) || empty($_SESSION['password']))
		{
			header("location: ".$configuration['url']."/register/step-1/e/01");
			exit();
		}
?>
<html>
<head>
	<title><?php echo $configuration['name']; ?>: Veiligheidscheck</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $configuration['url']; ?>/css/register.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $configuration['url']; ?>/fonts/volter/index.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $configuration['url']; ?>/fonts/bebas/index.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $configuration['url']; ?>/fonts/helvetica/index.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js"></script>
	<script src="<?php echo $configuration['url']; ?>/js/register.js" type="text/javascript"></script>
</head>
<body>
	<div id="general">
	
		<div class="logo"></div>
		
		<div id="contenedor">
			<div id="header">
				<div id="pasos">
					<div class="paso">
						<h1>1</h1>
						Geboortedatum & geslacht
					</div>
					<div class="paso dos">
						<h1>2</h1>
						Gegevens
					</div>
					<div class="paso tres activo">
						<h1>3</h1>
						Veiligheidscheck
					</div>
				</div>
			</div>
		
			<div id="contenido">
				<h2>Veiligheidscheck</h2>
				<form action="<?php echo $configuration['url']; ?>/register/step-3-submit" method="POST">
				<div id="captcha">
					<img src="<?php echo $configuration['url']; ?>/captcha/captcha.php">
					<p><input type="text" name="captcha" class="captcha<?php if(isset($_GET['error'])){if($_GET['error'] == "01"){ echo " malc"; }} ?>"></p>
				</div>
				<div class="error errorc">Schrijf de letters in de afbeelding zonder spaties</div>
				<div class="error errorc">Als u de afbeelding niet zien, klik <a href="" class="term">hier</a> om een andere te hebben.</div>
				
				<div class="fondoreg3"></div>
				
				<div id="fin">
					Kies hieronder een random look uit!<br> Letop, u kunt deze altijd veranderen !
				</div>
				<div id="estilos">
					<ul id="avatars">
						
						<?php
						$looks_query = mysql_query("SELECT look FROM users WHERE gender = '".$_SESSION['gender']."' ORDER BY RAND() LIMIT 6");
						while($looks_result = mysql_fetch_array($looks_query))
						{
							if(!isset($first))
							{
								$first = $looks_result['look'];
							}
						?>
						<li class="usuario" style="cursor: pointer">
							<img alt="<?php echo $looks_result['look']; ?>"  style="width: 58px; height: 100px;" src="http://www.habbo.es/habbo-imaging/avatarimage?figure=<?php echo $looks_result['look']; ?>&size=b&direction=2&head_direction=2&crr=1">
						</li>
						<?php
						}
						?>
					</ul>
				</div>
			
				<div class="acepto masest">
					<p>Andere look? <a href="" class="term">Klik hier voor een random look</a></p>
				</div>
				
				<div id="fin" class="reg2">
U heeft deze stap voltooid! Controleer uw gegevens
 en klik op verder. <strong> </strong>We wachten al 
 op jou in het hotel!
				</div>
				
				<p class="seg"><input type="submit" class="seguir" value="Verder"></p>
			</div>
			</form>
			
			<a href="<?php echo $configuration['url']; ?>/register/step-2"><div class="ant">« Annuleren</div></a>
			
		</div>
		<script type="text/javascript">
			document.observe("dom:loaded", function() {
				Register.initAvatarChooser("<?php echo $first; ?>");
			});
		</script>
<?php
		break;
	case "step-3-submit":
		//Validate captcha
		if(isset($_POST['captcha']))
		{
			if(!empty($_POST['captcha']))
			{
				if(isset($_SESSION['captcha']) && isset($_POST['captcha']))
				{
					if($_SESSION['captcha'] != $_POST['captcha'])
					{
						header("location: ".$configuration['url']."/register/step-3/e/01");
						exit();
					}
				}
				else
				{
					header("location: ".$configuration['url']."/register/step-3/e/01");
					exit();
				}
			}
			else
			{
				header("location: ".$configuration['url']."/register/step-3/e/01");
				exit();
			}
		}
		else
		{
			header("location: ".$configuration['url']."/register/step-3/e/01");
			exit();
		}
		
		//Validate exists
		$email_check = mysql_query("SELECT id FROM users WHERE mail = '".$_SESSION['email']."'");
		if(mysql_num_rows($email_check) != 0)
		{
			header("location: ".$configuration['url']."/register/step-2/e/02");
			exit();						
		}
		
		$nick_check = mysql_query("SELECT id FROM users WHERE username = '".$_SESSION['username']."'");
		if(mysql_num_rows($nick_check) != 0)
		{
			header("location: ".$configuration['url']."/register/step-2/e/01");
			exit();						
		}
		
		//Create user
		user::create($_SESSION['username'], sha1($_SESSION['password']), $_SESSION['email'], "100000", "100000", "hr-115-42.hd-190-1.ch-215-62.lg-285-91.sh-290-62", $_SESSION['gender']);
		$find_id = mysql_query("SELECT id FROM users WHERE username = '".$_SESSION['username']."'");
		$found_id = mysql_fetch_assoc($find_id);
		session_unset();
		$_SESSION['id'] = $found_id['id'];
		mysql_free_result($found_id);
		header("location: ".$configuration['url']."/home");
		exit();
		break;
}

?>
