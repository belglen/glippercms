<?php 

namespace Revolution;
if(!defined('IN_INDEX')) { die('Sorry, you cannot access this file.'); }
class css implements iCSS
{
	
	private $css;
	

	final public function get()
	{
		global $_CONFIG;
		//if ($_GET['url'] != 'index' && $_GET['url'] != 'register')
		if ($_GET['url'] != 'index' && $_GET['url'] != 'index3' && $_GET['url'] != 'test' && $_GET['url'] != 'jquerygroep' && $_GET['url'] != 'disconnected')
		{
			foreach (glob("app/tpl/skins/".$_CONFIG['template']['style']."/style/*.css") as $filename)
			{
				$this->css = '<link rel="stylesheet" type="text/css" href="'.$filename.'"/>';
	   
				$this->setCSS();
			}
		}
	}
	
	final public function getHK()
	{
		global $_CONFIG;
		foreach (glob("../app/tpl/skins/".$_CONFIG['template']['style']."/hk/styles/*.css") as $filename)
		{
 			$this->css = '<link rel="stylesheet" type="text/css" href="'.$filename.'"/>';
   
    		$this->setCSS();
		}
	}
	
	final public function setCSS()
	{
		global $template;
		$template->tpl .= $this->css;
		unset($this->css);
	}


}
?>