<div id="main" style="left-margin: 50px;">
    <div id="links"></div>
    <div class="header" id="login">
 </div>
    <div id="site_conten" class="login">
      <div id="content_container" class="login">

        <div id="content" class="login">
          <!-- insert the page content here -->
          <h1>{hotelName} Housekeeping</h1>
          <p>Welcome to the {hotelName} Hotel houskeeping. Your IP has been logged (<?php echo $_SERVER["REMOTE_ADDR"]; ?>)
			Please note any attempt to brute-force or exploit this system will be noticed by Amber administration so if you do not have clearance to this area, then <a href="{url}">Click here</a> <br /></p>
			
			 <?php echo $template->form->error; ?>
			
			<br />
				<form method="post" action="index.php?url=login">
				Admin Username: <br /> <input type="text" name="username" size="5" maxlength="8" class="login"/> <br /> <br />
				Admin Password: <br /> <input type="password" name="password" class="login"/> <br /> <br /><br />
						<input type="submit" value="Log into ASE" name="login" class="login"/>
				</form><br /><br />     <font color="black">   <center>Powered by ZapASE by Jontycat - Design by Grapefruit - Extra features by Grapefruit</center>
  	<center>Implemented into RevCMS by Kryptos</center><br /></center>
        </div>
      </div>
    </div>
  </div>