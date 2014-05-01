<div class="content-box">
<div class="content-box-black">

<h2 class="title">Exclusief op Glipper!</h2>
</div>
<div class="content-box-content"> 
<div class="habblet-container "><div class="cbb clearfix orange ">
                  <div id="hotcampaigns-habblet-list-container">
            
			
			<?php
			$campainSQL1 = mysql_query("SELECT campaign,campaignimg,id,title,shortstory FROM cms_news WHERE campaign = '1' ORDER BY id DESC");
			while ($campainSQL = mysql_fetch_object($campainSQL1)) 
			{
			?>
			<div class="campaign_images"> 

<img src="{url}/special/4-Housekeeping/<?php echo $campainSQL->campaignimg; ?>">

</div> 

<div class="campaign_content" style="margin-top: 15px;"> 
<strong>
<?php echo $campainSQL->title; ?></strong><br />
<?php echo $campainSQL->shortstory; ?></div> 

<p class="gothere" style="margin-top: 15px;"><a href="index.php?url=news&id=<?php echo $campainSQL->id; ?>">Meer informatie &raquo;</a></p> 


<div style="clear:both;"></div> 

<hr/> 
<?php
}
?>	
                            </div>
</div></div>
</div>
</div>