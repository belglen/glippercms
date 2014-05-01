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
<h2 class="title">Aankopen</h2> 
</div> 
<div class="glipperflexcont"> 

		<?php
  		echo"<span class='box1'><table>";
		$aankopen = mysql_query("SELECT a.*,u.id,u.username FROM aankopen a JOIN users u ON (u.id = a.id AND a.gelukt = '1') ORDER BY time DESC LIMIT 20");
		if (mysql_num_rows($aankopen) == '0')
		{
			echo"<div class=\"hoofdcat\"><b>Er zijn geen aankopen!</b></div>";
		}
		else
		{
			?>
			  <tr style="margin-left: 3px;">
			    <td class="aankopen username" style="margin-left: 3px;">Gebruikersnaam</th>
			    <td class="aankopen datum" style="margin-left: 3px;">Datum</th>
			    <td class="aankopen aantal" style="margin-left: 3px;">Aantal</th>
			  </tr>
			<?php
			$i = 0;
			while($koop = mysql_fetch_object($aankopen))
			{
				$i++;
			?>
			  <tr style="margin-left: 3px;" class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"two"; break;} ?> aankopen">
			    <td style="margin-left: 3px;"><strong><a href="index.php?url=profile&id=<?php echo $koop->username; ?>"><?php echo $koop->username; ?></a></strong></td>
			    <td style="margin-left: 3px;"><?php echo $koop->time; ?></td>
			    <td style="margin-left: 3px;"><?php echo $koop->aantal; ?></td>
			  </tr>
   	    <?php 
			}
		}
		echo"";
		?>
		</table>
		</span>
<span class="box2" style="display:none;">
	<table>
  	<?php
		$aankopen = mysql_query("SELECT a.*,u.id,u.username FROM aankopen a JOIN users u ON (u.id = a.id AND a.gelukt = '1') ORDER BY time DESC");
		if (mysql_num_rows($aankopen) == '0')
		{
			echo"<div class=\"hoofdcat\"><b>Er zijn geen aankopen!</b></div>";
		}
		else
		{
			?>
			  <tr style="margin-left: 3px;">
			    <td class="aankopen username" style="margin-left: 3px;">Gebruikersnaam</th>
			    <td class="aankopen datum" style="margin-left: 3px;">Datum</th>
			    <td class="aankopen aantal" style="margin-left: 3px;">Aantal</th>
			  </tr>
			<?php
			$i = 0;
			while($koop = mysql_fetch_object($aankopen))
			{
				$i++;
			?>
			  <tr style="margin-left: 3px;" class="<?php switch($i %2){case 1: echo"first"; break; case 0: echo"two"; break;} ?> aankopen">
			    <td style="margin-left: 3px;"><strong><a href="index.php?url=profile&id=<?php echo $koop->username; ?>"><?php echo $koop->username; ?></a></strong></td>
			    <td style="margin-left: 3px;"><?php echo $koop->time; ?></td>
			    <td style="margin-left: 3px;"><?php echo $koop->aantal; ?></td>
			  </tr>
			  <?php
			}
		}
		echo"";
		?>
		</table>
	</span>
<strong class="adminDivOne" style="cursor:pointer;"><a class="show">Laat alle aankopen zien</strong>
<strong class="adminDivTwo" style="display:none;cursor:pointer;"><a class="hide">Sluit alle aankopen</strong>
		<script>
		$("a.show").click(function () {
		$("strong.adminDivOne").hide("slow");
		$("strong.adminDivTwo").show("slow");
		$("span.box1").hide("slow");
		$("span.box2").show("slow");
		});		
		$("a.hide").click(function () {
		$("strong.adminDivOne").show("slow");
		$("strong.adminDivTwo").hide("slow");
		$("span.box1").show("slow");
		$("span.box2").hide("slow");
		});
		</script>

</div> 
</div>