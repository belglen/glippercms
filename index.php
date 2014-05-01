<?php 
define('IN_INDEX', 1);

require_once 'global.php';


$core->handleCall($engine->secure($_GET['url']));

if ($_GET['url'] != 'jquerygroep' && $_GET['url'] != 'index3' && $_GET['url'] != 'testtt' && $_GET['url'] != 'me')
{
	$template->write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
	
	$template->write('<html xmlns="http://www.w3.org/1999/xhtml">');
	
		$template->write('<head>');
		if (isset($_SESSION['user']['id']))
		{
			$userid = $_SESSION['user']['id'];
		}
			$template->write('<title>');
			
				$template->write('{hotelName}: {hotelDesc}');
			
			$template->write('</title>');
			
				$template->css->get();
			
				$template->js->get();
				
		$template->write('</head>');
		
		$template->write('<body>');
}	
			$template->html->get($engine->secure(htmlentities($_GET['url'])));
if ($_GET['url'] != 'jquerygroep')
{
		$template->write('</body>');
		
	$template->write('</html>');
}
$template->outputTPL();
?>