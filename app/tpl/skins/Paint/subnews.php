<script> 
var cimagesLocation = '<?php echo $_CONFIG['hotel']['url']; ?>/';
var news = new Array();
var cimagesLocation = '<?php echo $_CONFIG['hotel']['url']; ?>/';
var news = new Array();
news[1] = ["{newsID-1}","{newsIMG-1}","{newsCaption-1}","{newsTitle-1}"];
news[2] = ["{newsID-2}","{newsIMG-2}","{newsCaption-2}","{newsTitle-2}"];
news[3] = ["{newsID-3}","{newsIMG-3}","{newsCaption-3}","{newsTitle-3}"];
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
	mango.news.init();
});
</script>
		<div id="top-headlines-holder">
<div class="subnews_1">{newsTitle-1}
<div class="sub-news-date">{newsDate-1}</div> 
</div> 
<div class="subnews_0">{newsTitle-2}
<div class="sub-news-date">{newsDate-2}</div> 
</div> 
<div class="subnews_1">{newsTitle-3}
<div class="sub-news-date">{newsDate-3}</div> 
</div> 
						</div>