<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Overzicht ranks</h2> 
</div> 
<div class="glipperflexcont"> 
<?php
// function table_exists($table, $db) 
// {
	// $tables = mysql_list_tables($db);
	// while (list ($temp) = mysql_fetch_array ($tables)) 
	// {
		// if ($temp == $table) 
		// {
			// return TRUE;
		// }
	// }
	// return FALSE;
// }
// if (!table_exists(sterren_doneren, $_CONFIG['mysql']['database'])) 
// {
	// if (table_exists(cms_doneren, $_CONFIG['mysql']['database'])) 
	// {
		// mysql_query("ALTER TABLE `cms_doneren`
// CHANGE COLUMN `user_id` `zender_id`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `id`,
// CHANGE COLUMN `user_id2` `ontvanger_id`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `zender_id`,
// ADD COLUMN `aantal`  int(11) NOT NULL AFTER `sterren`,
// ADD COLUMN `datum`  timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP AFTER `aantal`;");
		// mysql_query("RENAME TABLE cms_doneren TO sterren_doneren");
		// mysql_query("UPDATE sterren_doneren SET aantal = ceil(sterren * 1.10)");
	// }
// }
?>
	<table class="klad" width="100%">
		<tr>
			<th style="width:237px;">
				Gebruikersnaam
			</th>
			<th style="width:84px;" width="84">
				IP Registratie
			</th>
			<th>
				IP laatst
			</th>
			<th>
				Rank
			</th>
		</tr>
		<?php
		$select = mysql_query("SELECT * FROM users WHERE rank > 4 ORDER BY rank DESC");
		$i = 0;
		$q = 0;
		while ($klad = mysql_fetch_object($select))
		{
			$i++;
			foreach ($hidden as $value) 
			{
				if ($value == $klad->username)
				{
					$klad->ip_last = 'Hidden';
					$klad->ip_reg = 'Hidden';
					$q++;
				}
			}
			?>
		<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;} ?> klad" style="text-decoration: none;">
			<td>
				<a href="index.php?url=profile&id=<?php echo $klad->username; ?>"><?php echo $klad->username; ?></a>
			</td>
			<td>
				<?php if ($klad->ip_reg != 'Hidden') { ?>
				<a href="index.php?url=adminusers&ip=<?php echo $klad->ip_reg; ?>"><?php echo $klad->ip_reg; ?></a>
				<?php } else { ?>
				<a href="#"><?php echo $klad->ip_reg; ?></a>
				<?php } ?>
			</td>
			<td>
				<?php if ($klad->ip_last != 'Hidden') { ?>
				<a href="index.php?url=adminusers&ip=<?php echo $klad->ip_last; ?>"><?php echo $klad->ip_last; ?></a>
				<?php } else { ?>
				<a href="#"><?php echo $klad->ip_last; ?></a>
				<?php } ?>
			</td>
			<td>
				<?php echo $klad->rank; ?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</div> 
</div>
<br>
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Jouw bans</h2> 
</div> 
<div class="glipperflexcont"> 
	<table class="klad" width="100%">
		<tr>
			<th style="width:237px;">
				Gebruikersnaam/IP
			</th>
			<th style="width:84px;" width="84">
				Reden
			</th>
			<th>
				Verloop datum
			</th>
		</tr>
		<?php
		$select = mysql_query("SELECT * FROM bans WHERE added_by = '".$_SESSION['user']['username']."' ORDER BY id DESC");
		$i = 0;
		$q = 0;
		while ($klad = mysql_fetch_object($select))
		{
			$i++;
			foreach ($hidden as $value) 
			{
				if ($value == $klad->username)
				{
					$klad->ip_last = 'Hidden';
					$klad->ip_reg = 'Hidden';
					$q++;
				}
			}
			?>
		<tr class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"third"; break;} ?> klad" style="text-decoration: none;">
			<td>
				<?php echo $klad->value; ?>
			</td>
			<td>
				<?php echo $klad->reason; ?>
			</td>
			<td>
				<?php $datetime = date("d-m-Y H:i:s", $klad->expire);  echo $datetime; ?>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</div> 
</div>
<br>