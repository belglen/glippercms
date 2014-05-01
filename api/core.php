<?php
class api {
	public function __construct($userid)
	{
		self::$userid = $userid;
	}
	
	public function figure_only()
	{
		$this->userid = $id;
		header("Content-Type: image/png");
		
		require_once("../app/managemant/config.php");
		
		global $_CONFIG;
		$mysqli = new mysqli($_CONFIG['mysql']['hostname'], $_CONFIG['mysql']['username'], $_CONFIG['mysql']['password'], $_CONFIG['mysql']['database']);
		
		if (mysqli_connect_errno())
		{
			printf("Er kan geen verbinding worden gemaakt met de dtabase. Foutmelding: %s\n", mysqli_connect_error());
		}
		
		if (!is_dir("./fansite_cached")) 
		{
			if (!mkdir("./fansite_cached", 0, true)) 
			{
				die('FATALE FOUT: Onmogelijk om folder aan te maken!');
			}
		}
		
		if(isset($_GET['size']))
		{
			$size = addslashes($_GET['size']);
		} 
		else 
		{ 
			$size= 'b';
		}
		
		if(isset($_GET['direction']))
		{
			$direction = addslashes($_GET['direction']);
		} 
		else 
		{ 
			$direction = '2';
		}
		
		if(isset($_GET['head_direction']))
		{
			$head = addslashes($_GET['head_direction']);
		} 
		else 
		{ 
			$head = '2'; 
		}
		
		if(isset($_GET['gesture']))
		{
			$gesture = addslashes($_GET['gesture']);
		} 
		else 
		{ 
			$gesture = '';
		}
	}
}
?>