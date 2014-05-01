<?php
class system
{
	public $maxtags = "10";
	
	public function __construct()
	{
		global $_CONFIG, $users, $db;
		self::updates($_CONFIG['mysql']['hostname'], $_CONFIG['mysql']['username'], $_CONFIG['mysql']['password'], $_CONFIG['mysql']['database']);
		self::user_stats();
		self::force();
		self::checkban();
		self::xml();
		//self::con_close();
	}
	
	protected function updates($host, $user, $pw, $db)
	{
		$db = new PDO("mysql:host=$host;dbname=$db", "$user", "$pw") or die("ERROR");
		$db->exec("UPDATE users_online SET online = (SELECT count(*) FROM users WHERE online = '1')");
	}
	
	public function user_stats()
	{
		$GetStats = mysql_num_rows(mysql_query("SELECT * FROM user_info WHERE user_id = '".$_SESSION['user']['id']."'"));
		if ($GetStats == '0')
		{
			mysql_query("INSERT INTO user_info VALUES ('".$userid."', '0', '0', '".time()."', '".time()."', '0', '0')");
		}
	}
	
	public function force()
	{
		$explode1 = explode("=",$_SERVER[REQUEST_URI]);
		if (!isset($explode1[1]))
		{
			$explode2 = explode("/",$explode1[0]);
			header("Location: index.php?url=".$explode2[1]."");
		}
	}
	
	public function checkban()
	{
		$sql = mysql_query("SELECT value FROM bans WHERE bantype = 'ip'");
		$deny = array();
		while (($row = mysql_fetch_assoc($sql))) { $deny[] = $row['value']; }
		if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) 
		{
			  header("location: special/5-Banned/");
			  exit();
		} 
	}
	
	public function xml()
	{
		$STH = mysql_query("SELECT * FROM users WHERE rank >= '5' ORDER BY rank DESC");

		$doc = new XMLWriter();
		
		$doc->openMemory();
		
		$doc->setIndent(true);
		$doc->setIndentString("    ");
		
		$doc->startDocument('1.0', 'UTF-8');
		$doc->startElement('staffs');
			while($row = mysql_fetch_object($STH)) 
			{  
				$doc->startElement('staff');
					$doc->writeElement('naam', $row->username);
					$doc->writeElement('rank', $row->rank);
				$doc->endElement();
			}  
		$doc->endElement();
		$fp = @fopen('staff.xml', 'w');
		if (!$fp)
		{
			exit;	
		}
		fwrite($fp, $doc->outputMemory(true));
		fclose($fp);
		
		$doc->flush();

		$STH = mysql_query("SELECT dj.*, u.id, u.username FROM dj dj JOIN users u ON (dj.user_id = u.id) ORDER BY rank ASC");
		
		$doc = new XMLWriter();
		
		$doc->openMemory();
		
		$doc->setIndent(true);
		$doc->setIndentString("    ");
		
		$doc->startDocument('1.0', 'UTF-8');
		$doc->startElement('staffs');
			while($row->DJ = mysql_fetch_object($STH)) 
			{  
				$doc->startElement('DJ');
					$doc->writeElement('naam', $row->DJ->username);
					$doc->writeElement('rank', $row->DJ->rank);
				$doc->endElement();
			}  
		$doc->endElement();
		$fp = @fopen('dj.xml', 'w');
		if (!$fp)
		{
			exit;	
		}
		fwrite($fp, $doc->outputMemory(true));
		fclose($fp);
		
		$doc->flush();
	}
	protected function con_close()
	{
		$db = NULL;	
	}
}
$system = new system(true);
$maxtagg = $system->maxtags;
/*echo '<pre>';
print_r(PDO::getAvailableDrivers());
echo '</pre>';*/

?>