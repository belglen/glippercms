<?php
global $_CONFIG;
/*class DatabaseConnect 
{
    public function __construct($db_host, $db_username, $db_password, $db_name)
    {
        if(!@$this->Connect($db_host, $db_username, $db_password, $db_name))
        {
            echo 'ERROR!';
        }
        else if($this->Connect($db_host, $db_username, $db_password, $db_name))
        {
        }
    }

    public function Connect ($db_host, $db_username, $db_password, $db_name)
    {
        if (!mysql_connect($db_host, $db_username, $db_password) || !mysql_select_db($db_name))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}*/
echo $_CONFIG['hotel']['url'];
//$connection = new DatabaseConnect($_CONFIG['mysql']['host'],'root','belCRXD','glipperz');

?>