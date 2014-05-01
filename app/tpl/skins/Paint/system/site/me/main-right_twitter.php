<?php
if ($_SERVER['REMOTE_ADDR'] != '192.168.1.100')
{
?>
<div class="content-box" style="width:300px;  margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Glipperjournaal - interview</h2> 
	  </div> 
	  <div class="content-box-content">
<center><a href="https://www.youtube.com/watch?v=K8csDXsQgaM"><img src="app/tpl/skins/Paint/images/11.gif"></a></center>	  
</div>
	  
	  </div>

	  
	  
	  
	  <br><br>
	  
	  <?php
	  }
	  else
	  {
	  ?>
	  <div class="content-box" style="width:300px;  margin-top: 11px; margin-bottom: -30px;background-color:#fff;"> 
	  <div class="content-box-deep-blue2" style="width:290px"> 
	    <h2 class="title" style="padding:0;line-height:30px;">Niet-vergeten: coding</h2> 
	  </div> 
	  <div class="content-box-content">
	  <div id="myDiv">Klik op de knop om de tekst te printen.<br/><br><input type="button" onclick="loadXMLDoc()" value="Show">
<br><br><br></div>
	  </div>
	  
	  </div>

	  <?php
	  }
	  ?>