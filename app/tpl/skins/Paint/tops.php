<?php
include 'system/header.php';
include 'inc/communitynav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
	<div class="content-box-deep-blue"> 
		<h2 class="title">Top 10 Credits</h2>
	</div> 
	<div class="content-box-content">
    	<?php
		$credits = mysql_query("SELECT * FROM `users` ORDER BY credits DESC LIMIT 10");
		
		for ($i = 0; $tops = mysql_fetch_assoc($credits); $i++)
		{
			$tops['motto'] = str_replace('`', '', $tops['motto']);
			$tops['motto'] = str_replace("'", '', $tops['motto']);
			$tops['motto'] = str_replace('"', '', $tops['motto']);
		?>
        <div class="box <?php switch($i %2){case 0: echo"dark"; break; case 1: echo"light"; break;} ?>">
			<div style="width: 80px; float: left;">
				<div style="background-image: url(http://habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $tops['look']; ?>);" class="avatar"></div>
			</div>
			<div style="float: left; margin-top: 10px;">
				<div class="title green" style="cursor: pointer;"><a href="index.php?url=profile&id=<?php echo $tops['username']; ?>"><ubuntu><?php echo $tops['username']; ?></ubuntu></a></div><br>
				<div class="motto"><ubuntu><?php echo ($tops['motto']); ?></ubuntu></div><br>
				</div>
                <div style="float: right; font-size: 21px; padding-top: 30px; padding-right: 10px;"><ubuntu><b><?php echo $tops['credits']; ?></b> Credits</ubuntu>
            </div>
		</div>    
        <?php
		}
		?>
		</div>
    </div>
<br clear="all" />
</div>
<div id="main_right"> 

<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">Categorie&euml;n</h2> 
	</div> 
	<div class="content-box-content"> 
		<div class="overlideside onclickOpenTop10Credits selected" id="cr" style="width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Credits</span></span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlideside onclickOpenTop10Credits" id="pi" style="margin-top: 3px; width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Pixels</span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlideside onclickOpenTop10Credits" id="st" style="margin-top: 3px; width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Sterren</span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlideside onclickOpenTop10Credits" id="ca" style="margin-top: 3px; width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Cadeaupunten</span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlideside onclickOpenTop10Credits" id="ko" style="margin-top: 3px; width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Koekjes</span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlideside onclickOpenTop10Credits" id="ur" style="margin-top: 3px; width: 274px; margin-right: -2px;">
			<div class="vipBuyBox">
				<div class="insideVipBuy">
					<div class="textVipBuy">
						<div class="howLongVipBuy" style="margin-top: -7px;"><ubuntu id="sdf">Top 10 <span>Uren</span></ubuntu></div>
					</div>
				</div>
			</div>
		</div>
        <br clear="all" />
    </div>	
</div>
</div>