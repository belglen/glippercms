<?php

global $_CONFIG;
define('IN_INDEX', TRUE);
require_once('app/management/config.php');
global $_CONFIG;

class DatabaseConnect 
{
    public function __construct()
    {
		global $_CONFIG;
        if(!@$this->Connect($_CONFIG['mysql']['hostname'], $_CONFIG['mysql']['username'], $_CONFIG['mysql']['password'], $_CONFIG['mysql']['database']))
        {
            die('ERROR!');
        }
        else if($this->Connect($_CONFIG['mysql']['hostname'], $_CONFIG['mysql']['username'], $_CONFIG['mysql']['password'], $_CONFIG['mysql']['database']))
        {
        }
    }

    public function Connect ($db_host, $db_username, $db_password, $db_name)
    {
		global $_CONFIG;
        if (!mysql_connect($db_host, $db_username, $db_password) || !mysql_select_db($db_name))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

$connection = new DatabaseConnect();

class jQuery
{
	protected $naam = "";
	
	public function __construct ($naam = "", $type = "")
	{
		$this->naam = $naam;
		$this->type = $type;
	}
	public function cadeau()
	{
		$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM catalog_items WHERE item_ids = '".addslashes(mysql_real_escape_string($this->naam))."'"));
		return $sql['page_id'];
	}
	public function tops($t)
	{
		global $_CONFIG;
		$ts = ($t!='OnlineTime'&&$t!='Respect')?"u.$t":"us.$t";
		$credits = mysql_query("SELECT u.*, us.* FROM users u JOIN user_stats us ON (u.id = us.id) ORDER BY $ts DESC LIMIT 10");
		$result = '';
		
		switch($t)
		{
			case 'credits':
				$z = ucfirst($t);
			break;	
			case 'activity_points':
				$z = ucfirst('pixels');
			break;	
			case 'vip_points':
				$z = ucfirst('sterren');
			break;	
			case 'sorry_points':
				$z = ucfirst('cadeaupunten');
			break;
			case 'OnlineTime':
				$z = ucfirst('uren');
			break;
			case 'Respect':
				$z = ucfirst('koekjes');
			break;
		}
		
		for ($i = 0; $tops = mysql_fetch_assoc($credits); $i++)
		{
			$tops['motto'] = str_replace('`', '', $tops['motto']);
			$tops['motto'] = str_replace("'", '', $tops['motto']);
			$tops['motto'] = str_replace('"', '', $tops['motto']);
			switch($i %2){case 0: $s="dark"; break; case 1: $s="light"; break;}
			$tops['OnlineTime'] = round($tops['OnlineTime']/3600);
			$tops['OnlineTime'] = number_format($tops['OnlineTime']);
			$tops['OnlineTime'] = str_replace(',', '.', $tops['OnlineTime']);
			$tops['Respect'] = number_format($tops['Respect']);
			$tops['Respect'] = str_replace(',', '.', $tops['Respect']);
			
       		$result .= '<div class="box '.$s.'"><div style="width: 80px; float: left;"><div style="background-image: url(http://habbo.nl/habbo-imaging/avatarimage?figure='.$tops['look'].');" class="avatar"></div></div><div style="float: left; margin-top: 10px;"><div class="title green" style="cursor: pointer;"><a href="index.php?url=profile&id='.$tops['username'].'"><ubuntu>'.$tops['username'].'</ubuntu></a></div><br><div class="motto"><ubuntu>'.($tops['motto']).'</ubuntu></div><br></div><div style="float: right; font-size: 21px; padding-top: 30px; padding-right: 10px;"><ubuntu><b>'.$tops[$t].'</b> '.$z.'</ubuntu></div></div>';
		}

		//$pers = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE id NOT LIKE 232 ORDER BY $t DESC LIMIT 0,10"));
		return "$result";
	}
}
if (isset($_POST['tweet_length'])){ $admincadeau = new jQuery($_POST['tweet_length']); echo $admincadeau->cadeau(); }
if (isset($_POST['type'])){ $top = new jQuery(); echo $top->tops($_POST['type']); }

?>