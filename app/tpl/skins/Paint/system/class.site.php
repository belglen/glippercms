<?php
	class User
	{
		public $ip_last,$id,$username,$rank,$look,$motto,$mail,$credits,$pixels,$online,$isStaff,$isMod,$IsVip,$sterren,$kleur;

		public function __construct($userID)
		{
			$userQuery = mysql_query("SELECT * FROM `users` WHERE `id` = '" . $userID . "' LIMIT 1");
			if (mysql_num_rows($userQuery) == '0')
			{
				$this->error();
			}
			else
			{
				$userFetch = mysql_fetch_assoc($userQuery);
				$this->ip_last = $userFetch['ip_last'];
				$this->id = (int)$userFetch['id'];
				$this->username = htmlspecialchars($userFetch['username']);
				$this->rank = $userFetch['rank'];
				$this->look = $userFetch['look'];
				$this->motto = htmlspecialchars($userFetch['motto']);
				$this->mail = htmlspecialchars($userFetch['mail']);
				$this->pixels = $userFetch['activity_points'];
				$this->online = $userFetch['online'];
				$this->credits = $userFetch['credits'];
				$this->sterren = $userFetch['vip_points'];
				$this->kleur = $userFetch['colorpick'];
				$this->isStaff = $userFetch['rank'] > 6 ? "1" : "0";
				$this->isMod = $userFetch['rank'] > 4 ? "1" : "0";
				$this->isVip = $userFetch['vip'] == 1 ? "1" : "0";
				$this->isAdmin = $userFetch['rank'] == 11 ? "1" : "0";
			}
		}
		public function error()
		{
			print("undefined");	
		}
	}
?>