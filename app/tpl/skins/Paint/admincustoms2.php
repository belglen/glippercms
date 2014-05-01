<?php
include 'system/header.php';
include 'inc/adminnav.php';
?>
</span>
</div>
<style type="text/css">
 #nav, #nav ul {
padding: 3px 0 0 0;
margin: 0;
list-style: none;
}

#nav li {
float: left;
width: 120px;
}

#nav ul {
position: absolute;
width: 120px;
left: -1000px;
}

#nav li:hover ul, #nav li.ie_does_hover ul {
left: auto;
background-position: 0 0;
}

#nav a {
display: block;
margin: 2px 5px 3px 5px;
text-decoration: none;
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 1em;
}

ul a{
font-weight: bold;
color: #F60;
cursor: default;
}

ul ul a:link, ul ul a:visited{
font-weight: normal;
color: #CCC;
cursor: pointer;
}

ul ul a:hover, ul ul a:active{
font-weight: normal;
color: #FFF;
cursor: pointer;
}

ul li{
background-color: #CCC;
border-left: 3px solid #FFF;
}

ul ul li{
background-color: #666;
border-top: 3px solid #FFF;
border-left: 0;
}

/* IE only hack \*/
* html ul li, * html ul ul li{
border-bottom: 3px solid #FFF;
}

* html ul ul li{
border-top: 0;
}
/* Einde IE only hack */
</style>
<div id="marginy">
<div id="main_left"> 
<div class="glipperflexbox">
<div class="glipperflexbar"> 
<h2 class="title">Menu</h2> 
</div> 
<div class="glipperflexcont"> 
  <ul id="nav">

<li><a href="#">Trollpictures</a>

<ul>
<li name="first"><span class="trollonee"><a href="#">Plaatje 1</a></span></li>
<li name="two"><span class="trolltwoo"><a href="#">Plaatje 2</a></span></li>
<li name="tree"><span class="trolltreee"><a href="#">Plaatje 3</a></span></li>
<li><a href="#">Sub item 1.2</a></li>
<li><a href="#">Sub item 1.3</a></li>
<li><a href="#">Sub item 1.4</a></li>
</ul>

</li>

<li><a href="#">Main item 2</a>

<ul>
<li><a href="#">Sub item 2.1</a></li>
<li><a href="#">Sub item 2.2</a></li>
<li><a href="#">Sub item 2.3</a></li>
<li><a href="#">Sub item 2.4</a></li>
<li><a href="#">Sub item 2.5</a></li>
</ul>

</li>

<li><a href="#">Main item 3</a>

<ul>
<li><a href="#">Sub item 3.1</a></li>
<li><a href="#">Sub item 3.2</a></li>
</ul>
</li>
</ul> 

<span class="trollfirst" style="display:none;"><br /><br /><br /><img style="margin-top 10px;" src="app/tpl/skins/{skin}/images/admin11.png"></span>
<span class="trolltwo" style="display:none;"><br /><br /><br /><img style="margin-top 10px;" src="app/tpl/skins/{skin}/images/admin22.png"></span>
<span class="trolltree" style="display:none;"><br /><br /><br /><img style="margin-top 10px;" src="app/tpl/skins/{skin}/images/admin33.png"></span>

</div> 
</div>
<script>
$("span.trollonee").click(function () {
	$("span.trolltwo").hide("fast");
	$("span.trolltree").hide("fast");
	$("span.trollfirst").show("slow");
});		
$("span.trolltwoo").click(function () {
	$("span.trollfirst").hide("fast");
	$("span.trolltree").hide("fast");
	$("span.trolltwo").show("slow");
});		
$("span.trolltreee").click(function () {
	$("span.trollfirst").hide("fast");
	$("span.trolltwo").hide("fast");
	$("span.trolltree").show("slow");
});		
</script>
