<?php
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
#Please fill this all out.

#NOTE: To set up TheHabbos.ORG's API go to wwwroot/mysite/thehabbos_api for IIS, OR, htdocs/thehabbos_api for XAMPP and others.

/*
*
*	MySQL management
*
*/
 //Force UnCached SWF. true to force, false to used cached swf.
define('FORCENEWSWF',true);  
$_CONFIG['mysql']['connection_type'] = 'pconnect'; //Type of connection: It must be connect, or pconnect: if you want a persistent connection.

$_CONFIG['mysql']['hostname'] = 'localhost'; //MySQL host

$_CONFIG['mysql']['username'] = 'root'; //MySQL username

$_CONFIG['mysql']['password'] = ''; //MySQL password

$_CONFIG['mysql']['database'] = 'tree'; //MySQL database

$_CONFIG['mysql']['port'] = '3306'; //MySQL's port

/*
*
*	Hotel management  - All URLs do not end with an "/"
*
*/

//$_CONFIG['hotel']['server_ip'] = ''; //IP of VPS/DEDI/etc
if ($_SERVER['REMOTE_ADDR'] == '94.226.227.201' || $_SERVER['REMOTE_ADDR'] == '78.20.108.101' || $_SERVER['REMOTE_ADDR'] == '94.224.33.196' || $_SERVER['REMOTE_ADDR'] == '84.80.35.15' || $_SERVER['REMOTE_ADDR'] == '74.63.88.158')
{
	$_CONFIG['hotel']['url'] = 'localhost'; //Does not end with a "/"
}
else
{
	if ($_SERVER['REMOTE_ADDR'] == '192.168.1.100' || $_SERVER['REMOTE_ADDR'] == '192.168.1.105')
	{
	}
	else
	{
		$file = 'app/management/ips.txt';
		$current = file_get_contents($file);
		$current .= $_SERVER['REMOTE_ADDR'].", ";
		file_put_contents($file, $current);
	}
	$_CONFIG['hotel']['url'] = ''; //Does not end with a "/"
}
$_CONFIG['hotel']['server_ip'] = '81.164.199.181';  //IP of VPS/DEDI/etc

$_CONFIG['hotel']['server_mus'] = '81.164.199.181';  //IP of VPS/DEDI/etc

$_CONFIG['hotel']['name'] = 'Pixar'; // Hotel's name

$_CONFIG['hotel']['desc'] = 'Het hotel voor jong en oud!'; //Hotel's description 

$_CONFIG['hotel']['email'] = 'admin@glipper.be'; //Where the help queries from users are emailed to.@Priv skin

$_CONFIG['hotel']['in_maint'] = false; //False if hotel is NOT in maintenance. True if hotel IS in maintenance

$_CONFIG['hotel']['motto'] = 'I <3 ' . $_CONFIG['hotel']['name']; //Default motto users will register with.

$_CONFIG['hotel']['credits'] = 150000; //Default number of credits users will register with.

$_CONFIG['hotel']['pixels'] = 10000; //Default number of pixels users will register with.

$_CONFIG['hotel']['figure'] = 'hd-180-1.ch-210-66.lg-270-82.sh-290-91.hr-100'; //Default figure users will register with.

$_CONFIG['hotel']['web_build'] = '63_1dc60c6d6ea6e089c6893ab4e0541ee0/1150'; //Web_Build

$_CONFIG['hotel']['external_vars'] = 'http://harson.nl/r63/external_variables11.txt'; //URL to your external vars

$_CONFIG['hotel']['external_texts'] = 'http://harson.nl/r63/external_flash_texts23.txt'; //URL to your external texts

$_CONFIG['hotel']['product_data'] = 'http://harson.nl/r63/productdata22032013.txt'; //URL to your productdata

$_CONFIG['hotel']['furni_data'] = 'http://harson.nl/r63/furnidata22032013.txt'; //URL to your furnidata

$_CONFIG['hotel']['swf_folder'] = 'http://harson.nl/r63'; //URL to your SWF folder(does not end with a '/')

/*
*
*	Templating management - Pick one of our default styles or make yours by following our examples!
*
*/

#RevCMS has 2 default styles, 'Mango' by dannyy94 and 'Priv' by joopie - Others styles are to come, such as RastaLulz's ProCMS style and Nominal's PhoenixCMS 4.0 style.

$_CONFIG['template']['style'] = 'Paint'; 
// $_CONFIG['template']['style'] = 'Mango'; 

/*
*
*	Other topsites.. thing
*
*/

$_CONFIG['thehabbos']['username'] = 'Kryptos';
$_CONFIG['retro_top']['user'] = 'Kryptos'; 

/*
*
*	Recaptcha management - Fill the information below if you have one, else leave it like that and don't worry, be happy.
*
*/

$_CONFIG['recaptcha']['priv_key'] = '6LcZ58USAAAAABSV5px9XZlzvIPaBOGA6rQP2G43';
$_CONFIG['recaptcha']['pub_key'] = '6LcZ58USAAAAAAQ6kquItHl4JuTBWs-5cSKzh6DD';


/*
*
*	Social Networking stuff
*
*/

$_CONFIG['social']['twitter'] = 'Glipper_Tim'; //Hotel's Twitter account

$_CONFIG['social']['facebook'] = 'FacebookAccount'; //Hotel's Facebook account

?>