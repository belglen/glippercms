<?php
include 'system/header.php';
include 'inc/shopnav.php';

$user = new User($userid);

if ($user->id == '232' && !$_SESSION['make_shop'])
{
	echo"<script>alert('MAAK DIT AF!!! -> targetpay enz.');</script>";
	$_SESSION['make_shop'] = true;
}
?>
<script src="https://www.targetpay.com/send/include.js"></script>
</span>
</div>

<div id="marginy">
<div id="main_left"> 
 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Winkel 
<a href="#" style="margin-left: -1px; margin-right: 10px;" id="doneren" class="new-button1">
    <strong>Doneren</strong>
    <i></i>
</a>
<a href="#" id="kopen" class="new-button1 selected">
	<strong>Kopen</strong>
    <i></i>
</a>
</h2>
</div> 
<div class="glipperflexcont" style="padding: 10px 0px; margin: 10px;"> 
	<div class="method-group online clearfix bestvalue cbs2">
    	<div id="group-content-810">
			<div id="price-container">
            	<div id="pricepoints">
                    <table id="purchase-table" style="margin:16px; margin-top:16px;" border="0" cellpadding="8" cellspacing="2" width="500px;">
                        <tbody>
                            <tr>
								<td bgcolor="#EFEFEF"><strong style="color:orange;">Oranje Bundel</strong> - 10 Sterren  </td>
								<td bgcolor="#EFEFEF">&euro;1,10</td>
								<td bgcolor="#FFBB00"><a href="javascript: targetpay(46214, 82545, 'auto', 'auto', '');">Koop</a></td>
                            </tr>
                            <tr>
								<td bgcolor="#EFEFEF"><strong>Zwarte Bundel</strong> - 25 Cadeaupunten <i></i></td>
								<td bgcolor="#EFEFEF">&euro;2,50</td>
								<td bgcolor="#FFBB00"><a href="javascript: targetpay(46950, 82545, 'auto', 'auto', '');">Koop</a></td>
                            </tr>
                            <tr>
								<td bgcolor="#EFEFEF"><strong style="color:purple;">Paarse Bundel</strong> - 30 Sterren <i></i></td>
								<td bgcolor="#EFEFEF">&euro;2,60</td>
								<td bgcolor="#FFBB00"><a href="javascript: targetpay(46218, 82545, 'auto', 'auto', '');">Koop</a></td>
                            </tr>
                            <tr>
								<td bgcolor="#EFEFEF"><strong style="color:red">Rode Bundel</strong> - 50 Cadeaupunten + Badge <i></i></td>
								<td bgcolor="#EFEFEF">&euro;4,50</td>
								<td bgcolor="#FFBB00"><a href="#">Koop</a></td>
                            </tr>
                            <tr>
								<td bgcolor="#EFEFEF"><strong style="color:blue;">Blauwe Bundel</strong> - 60 Sterren + 10 Cadeaupunten + Badge<i></i></td>
								<td bgcolor="#EFEFEF">&euro;7,00</td>
								<td bgcolor="#FFBB00"><a href="#">Koop</a></td>
                            </tr>
                            <tr>
								<td bgcolor="#EFEFEF"><strong style="color:#996A0B;">Gouden Bundel</strong> - 150 Sterren + 20 Cadeaupunten + Badge <i></i></td>
								<td bgcolor="#EFEFEF">&euro;14,00</td>
								<td bgcolor="#FFBB00"><a oncl href="#">Koop</a></td>
                            </tr>
                    	</tbody>
                	</table>
           		</div>
            </div>
        </div>
    </div>
</div> 
</div>