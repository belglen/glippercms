<?php
include 'system/header.php';
include 'inc/homenav.php';
?>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
<div class="content-box"> 
	<div class="content-box-deep-blue"> 
		<h2 class="title">Onbeantwoorde tickets (recent)</h2> 
	</div> 
	<div class="content-box-content"> 
    	<?php
		$begin = ($_GET['p'] >= 0) ? $_GET['p']*5 : 0;;
		
		$ticket['query'] = mysql_query("
		SELECT ht.*, u.id as userid, u.username
			FROM helptool_tickets ht
				JOIN users u
					ON (
							u.id = ht.user_id 
							AND 
							ht.status = 'orange'
						)
						ORDER BY status DESC
		");
		if (mysql_num_rows($ticket['query']) <= 0)
		{
			print
			('
			<i>
				Er zijn geen onbeantwoorde tickets, proficiat!
			</i>
			');
		}
		while ($ticket['fetch'] = mysql_fetch_assoc($ticket['query']))
		{
			$ticket['fetch']['subject'] = strlen($ticket['fetch']['subject'])>70?substr($ticket['fetch']['subject'], 0, 70)."...":substr($ticket['fetch']['subject'], 0, 70);
			
			switch($ticket['fetch']['type'])
			{
				case 1:
				$var = "Anders, overig";
				break;	
				
				case 2:
				$var = "Belangrijke vraag";
				break;
					
				case 3:
				$var = "Iemand overtreedt de regels";
				break;	
					
				case 4:
				$var = "Iemand pest mij";
				break;	
					
				case 5:
				$var = "Ik ben gehackt/zie een hacker";
				break;	
	
				case 6:
				$var = "Ik heb een ernstige bug gevonden";
				break;	
			}
		?>
        <a href="index.php?url=tickettool&amp;id=<?php echo $ticket['fetch']['id'];?>" class="mi" id="xdsf">
            <span id="ticket">
            
                <div class="menuitem">
                   <span id="wajoowdfs"><font color="#99CC66"><?php echo $var; ?></font> - <?php echo $ticket['fetch']['subject']; ?></span>
                </div>
            </span>
        </a>
        <div id="titel" style="display:none;"></div>
        <div id="hetbericht" style="display:none;">qsdfqsdf<?php echo $ticket['fetch']['message']; ?></div>
        <?php
		}
		?>
    </div>
</div>
</div>
<div id="main_right"> 


<div class="content-box" style="width:300px; margin-top: 0px; margin-bottom: 13px;background-color:#fff;"> 
	<div class="content-box-deep-blue2" style="width:290px"> 
		<h2 class="title" style="padding:0;line-height:30px;">Sidenav</h2> 
	</div> 
	<div class="content-box-content"> 
    	Bla?!
	</div>	
</div>	
</div>
</div>