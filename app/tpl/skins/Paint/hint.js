function getstar(str2)
{
var xmlhttp;
if (str2.length=='')
  { 
  document.getElementById("ster").innerHTML=" Om 0 sterren te doneren, raak je 0 sterren kwijt.";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("ster").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=gethint&ster="+str2,true);
xmlhttp.send();
}

function getprice(str2)
{
var xmlhttp;
if (str2.length=='')
  { 
  document.getElementById("prijs").innerHTML="0";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("prijs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=gethint&num="+str2,true);
xmlhttp.send();
}

function showHint(str)
{
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="<br><div class='content-box'><div class='content-box-deep-blue'><h2 class='title'>Gebruikersinformatie</h2></div><div class='content-box-content' style='overflow:hidden'> Nog geen geldige gebruiker gekozen.</div></div>";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=gethint&user="+str,true);
xmlhttp.send();
}

function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=ajaxcode",true);
xmlhttp.send();
}

function showHint7(str2, str3, str4, str5)
{
var xmlhttp;
if (str2.length==0)
  { 
  document.getElementById("poppetje").innerHTML="Laden...";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("poppetje").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=gethint&username="+str2+"&look="+str3+"&action="+str5+"&rotation="+str4,true);
xmlhttp.send();
}

function getbadge(str2)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showbadge").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","index.php?url=gethint&badge="+str2,true);
xmlhttp.send();
}
var eRot = document.getElementById("ddlViewRot");
var strRot = eRot.options[eRot.selectedIndex].text;