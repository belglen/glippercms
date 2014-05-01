var zindex = 60;
  var nieuweitems = 0;
  var nieuw = new Array();
  var bgid = 329;
  var bg = 'images/home/bgsky.gif';
  $(document).ready(function(){
    $("#mids").css('zIndex', zindex + 1);
  });
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 1);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 1);
      });
    });
  function htmlentities(str) {
      return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  }
  function posthabsoinfo(id) {
    document.getElementById("container").innerHTML = '<div class="pan" id="wijzigenpaneel_'+id+'"><div class="item" id="item_'+id+'" style="z-index: '+zindex+';"><div id="top"></div><div id="midden"><img src="http://www.habbo.nl/habbo-imaging/avatarimage?hb=img&user=Testendeuser&gesture=sml" style="float: left;"/><br/><br/><b>Testendeuser</b><br/><b>Muntjes:</b><br/>0<br/><b>Lid sinds:</b><br/>18 May 2012<br clear="both"></div><div id="both"></div></div>' + document.getElementById("container").innerHTML;
    document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/>';
    document.getElementById("mijnitem_"+id).style.display = 'none';
    var nar = nieuweitems + 1;
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 1);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 1);
      });
    });
    closeitems();
    nieuweitems++;
  }  
  function opslaan(){
          if(document.getElementById("item_hidden_330_x").value != "deleted" && document.getElementById("item_hidden_330_y").value != "deleted"){
      document.getElementById("item_hidden_330_x").value = document.getElementById("item_330").style.left;
document.getElementById("item_hidden_330_y").value = document.getElementById("item_330").style.top;
document.getElementById("item_hidden_330_zindex").value = document.getElementById("item_330").style.zIndex;
      }
            if(document.getElementById("item_hidden_331_x").value != "deleted" && document.getElementById("item_hidden_331_y").value != "deleted"){
      document.getElementById("item_hidden_331_x").value = document.getElementById("item_331").style.left;
document.getElementById("item_hidden_331_y").value = document.getElementById("item_331").style.top;
document.getElementById("item_hidden_331_zindex").value = document.getElementById("item_331").style.zIndex;
      }
          for (i=1;i<=nieuweitems;i++){
      if(document.getElementById("item_hidden_"+nieuw[i]+"_x").value != "deleted" && document.getElementById("item_hidden_"+nieuw[i]+"_x").value != "deleted"){
        document.getElementById("item_hidden_"+nieuw[i]+"_x").value = document.getElementById("item_"+nieuw[i]).style.left;
        document.getElementById("item_hidden_"+nieuw[i]+"_y").value = document.getElementById("item_"+nieuw[i]).style.top;
        document.getElementById("item_hidden_"+nieuw[i]+"_zindex").value = document.getElementById("item_"+nieuw[i]).style.zIndex;
        if(document.getElementById("item_hidden_"+nieuw[i]+"_tekst")){
          var plakbrief = document.getElementById("item_hidden_"+nieuw[i]+"_tekst");
          plakbrief.value = document.getElementById("wijzigen_"+nieuw[i]).value;
        }
      }
    }
    document.itemdataform.submit();
  }
  function wijzigenopen(id){
    document.getElementById("wijzigenpaneel_" + id).style.display = 'inline';
    document.getElementById("wijzigenbg").style.display = 'inline';
    document.getElementById("wijzigenpaneel_" + id).style.zIndex = zindex + 3;
    document.getElementById("wijzigenbg").style.zIndex = zindex + 2;
    document.getElementById("mids").style.zIndex = zindex + 1;
  }
  function openshop(){
    document.getElementById("shop").style.display = 'inline';
    document.getElementById("wijzigenbg").style.display = 'inline';
    document.getElementById("shop").style.zIndex = zindex + 3;
    document.getElementById("wijzigenbg").style.zIndex = zindex + 2;
    document.getElementById("mids").style.zIndex = zindex + 1;
  }
  function closeshop(){
    document.getElementById("shop").style.display = 'none';
    document.getElementById("wijzigenbg").style.display = 'none';
  }
  function openitems(){
    document.getElementById("mijnitems").style.display = 'inline';
    document.getElementById("wijzigenbg").style.display = 'inline';
    document.getElementById("mijnitems").style.zIndex = zindex + 3;
    document.getElementById("wijzigenbg").style.zIndex = zindex + 2;
    document.getElementById("mids").style.zIndex = zindex + 1;
  }
  function closeitems(){
    document.getElementById("mijnitems").style.display = 'none';
    document.getElementById("wijzigenbg").style.display = 'none';
  }
  function wijzigensluiten(id){
    document.getElementById("wijzigenpaneel_" + id).style.display = 'none';
    document.getElementById("wijzigen_"+id).value = document.getElementById("item_tekst_"+id).innerHTML;
    document.getElementById("wijzigenbg").style.display = 'none';
  }
  function remove(parentDiv, childDiv){
       if (childDiv == parentDiv) {
            return false;
       }
       else if (document.getElementById(childDiv)) {     
            var child = document.getElementById(childDiv);
            var parent = document.getElementById(parentDiv);
            parent.removeChild(child);
       }
       else {
            return false;
       }
  }
  function verwijderen(id){
    document.getElementById("item_hidden_" + id + "_x").value = 'deleted';
    document.getElementById("item_hidden_" + id + "_y").value = 'deleted';
    var typ = document.getElementById("type_"+id).value;
    if(typ == 'sticker'){
      document.getElementById("stickersi").innerHTML = document.getElementById("stickersi").innerHTML + '<div class="mijnitem" id="mijnitem_'+id+'" onclick="poststicker('+id+');" style="background-color: #B4B4B4; background-repeat: no-repeat; background-position: 50% 50%; background-image: '+document.getElementById("item_"+id).style.backgroundImage+';"></div>';
    }else if(typ == 'plakbrief'){
      document.getElementById("widgetsi").innerHTML = document.getElementById("widgetsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+id+'" onclick="postplakbrief('+id+')" style="background-color: #B4B4B4; text-align: center; height: 44px; padding-top: 35px; font-weight: bold;">Plakbrief</div>';
    }else if(typ == 'badges'){
      document.getElementById("widgetsi").innerHTML = document.getElementById("widgetsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+id+'" onclick="postbadges('+id+')" style="background-color: #B4B4B4; text-align: center; height: 44px; padding-top: 35px; font-weight: bold;">Badges</div>';
    }else if(typ == 'stemmen'){
      document.getElementById("widgetsi").innerHTML = document.getElementById("widgetsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+id+'" onclick="poststemmen('+id+')" style="background-color: #B4B4B4; text-align: center; height: 44px; padding-top: 35px; font-weight: bold;">Stemmen</div>';
    }else if(typ == 'gastenboek'){
      document.getElementById("widgetsi").innerHTML = document.getElementById("widgetsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+id+'" onclick="postgastenboek('+id+')" style="background-color: #B4B4B4; text-align: center; height: 44px; padding-top: 35px; font-weight: bold;">Gastenboek</div>';
    }
    remove("container","item_" + id);
  }
  function wijzigen(id) {
    document.getElementById("tekst_" + id).innerHTML = htmlentities(document.getElementById("wijzigen_" + id).value); 
    var plakbrief = document.getElementById("item_hidden_"+id+"_tekst");
    plakbrief.value = htmlentities(document.getElementById("wijzigen_"+id).value);
    document.getElementById("wijzigenpaneel_" + id).style.display = 'none';
    document.getElementById("wijzigenbg").style.display = 'none';
  }
  function setshop(id, type, wtype){
    if(type == "widget"){
      document.getElementById("shopchoosen").style.backgroundImage = "";
      document.getElementById("shop_type").value = wtype;
      document.getElementById("shopchoosen").innerHTML = document.getElementById("shopitem_" + id).innerHTML;
    }else{
      document.getElementById("shopchoosen").style.backgroundImage = document.getElementById("shopitem_" + id).style.backgroundImage;
      document.getElementById("shop_type").value = "";
      document.getElementById("shopchoosen").innerHTML = "";
    }
    document.getElementById("prijs").innerHTML = document.getElementById("shopitem_" + id).style.zIndex + ' muntjes';
    document.getElementById("buy").setAttribute ("onclick", "buyitem(" + id + ", '"+type+"')");
    document.getElementById("shoptext").innerHTML = "";
  }
  function goto(div){
    if(div == 'stickers'){
       document.getElementById("stickers").style.display = 'inline';
       document.getElementById("backgrounds").style.display = 'none';
       document.getElementById("widgets").style.display = 'none';
    }else if(div == 'backgrounds'){
       document.getElementById("backgrounds").style.display = 'inline';
       document.getElementById("stickers").style.display = 'none';
       document.getElementById("widgets").style.display = 'none';
    }else if(div == 'widgets'){
       document.getElementById("widgets").style.display = 'inline';
       document.getElementById("backgrounds").style.display = 'none';
       document.getElementById("stickers").style.display = 'none';
    }
    document.getElementById("shoptext").innerHTML = "";
    document.getElementById("shopchoosen").style.backgroundImage = "";
    document.getElementById("prijs").innerHTML = "Kies eerst een item";
    document.getElementById("buy").setAttribute ("onclick", ""); 
    document.getElementById("shopchoosen").innerHTML = "";
  }
  function gotoitems(div){
    if(div == 'stickers'){
       document.getElementById("stickersi").style.display = 'inline';
       document.getElementById("backgroundsi").style.display = 'none';
       document.getElementById("widgetsi").style.display = 'none';
    }else if(div == 'backgrounds'){
       document.getElementById("backgroundsi").style.display = 'inline';
       document.getElementById("stickersi").style.display = 'none';
       document.getElementById("widgetsi").style.display = 'none';
    }else if(div == 'widgets'){
       document.getElementById("backgroundsi").style.display = 'none';
       document.getElementById("stickersi").style.display = 'none';
       document.getElementById("widgetsi").style.display = 'inline';
    }
  }
  function setbackground(url, id){                       // nog doen
    var urlrep = url.replace("url(","");
    var urls = urlrep.replace(")","");
    var urlsr = urls.replace("http://holoplanet.nl:85/","");
    document.getElementById("backgroundsi").innerHTML = document.getElementById("backgroundsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+bgid+'" onclick="setbackground(\''+bg+'\','+bgid+')" style="background-color: #B4B4B4; background-repeat: no-repeat; background-position: 50% 50%; background-image: url('+bg+');"></div>';
    remove("backgroundsi","mijnitem_"+id);
    bg = urlsr;
    bgid = id;
    document.getElementById("container").style.backgroundImage = "url("+bg+")";
    document.getElementById("background").value = urlsr;
    closeitems();
  }

  function buyitem(id, type)
  {
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
        if(xmlhttp.responseText == "succes=no"){
          document.getElementById("shoptext").innerHTML = "<b>Er ging iets fout</b>";
        }else if(xmlhttp.responseText == "succes=mu"){
          document.getElementById("shoptext").innerHTML = "<b>Je hebt niet genoeg muntjes!</b>";
        }else{
          document.getElementById("shoptext").innerHTML = "<b>Item succesvol gekocht. Je vindt het bij je spullen.</b>";
          var buyids = xmlhttp.responseText;
          if(type == 'stickers'){
            document.getElementById("stickersi").innerHTML = document.getElementById("stickersi").innerHTML + '<div class="mijnitem" id="mijnitem_'+buyids+'" onclick="poststicker('+buyids+');" style="background-color: #B4B4B4; background-repeat: no-repeat; background-position: 50% 50%; background-image: '+document.getElementById("shopchoosen").style.backgroundImage+';"></div>';
            document.getElementById("shop_type").value = "";
          }else if(type == 'bg'){
            document.getElementById("backgroundsi").innerHTML = document.getElementById("backgroundsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+xmlhttp.responseText+'" onclick="setbackground(\''+document.getElementById("shopchoosen").style.backgroundImage+'\','+xmlhttp.responseText+');" style="background-color: #B4B4B4; background-repeat: no-repeat; background-position: 50% 50%; background-image: '+document.getElementById("shopchoosen").style.backgroundImage+';"></div>';
            document.getElementById("shopitem_"+id).style.display = "none";
            document.getElementById("shopchoosen").style.backgroundImage = "";
            document.getElementById("shopchoosen").innerHTML = "";
            document.getElementById("shop_type").value = "";
            document.getElementById("prijs").innerHTML = "Kies eerst een item";
            document.getElementById("buy").setAttribute ("onclick", "");
          }else if(type == 'widget'){
            if(document.getElementById("shop_type").value != 'plakbrief'){
              document.getElementById("widgetsi").innerHTML = document.getElementById("widgetsi").innerHTML + '<div class="mijnitem" id="mijnitem_'+buyids+'" onclick="post'+document.getElementById("shop_type").value+'('+buyids+')" style="background-color: #B4B4B4; text-align: center; height: 44px; padding-top: 35px; font-weight: bold;">'+document.getElementById("shopchoosen").innerHTML+'</div>';
              document.getElementById("shopitem_"+id).style.display = "none";
              document.getElementById("shopchoosen").style.backgroundImage = "";
              document.getElementById("shopchoosen").innerHTML = "";
              document.getElementById("shop_type").value = "";
              document.getElementById("prijs").innerHTML = "Kies eerst een item";
              document.getElementById("buy").setAttribute("onclick", "");
            }
          }
         }
      }
    }
  xmlhttp.open("GET","shopkopen.php?id="+id,true);
  xmlhttp.send();
  }


  function postplakbrief(id) {
    document.getElementById("container").innerHTML = '<div class="pan" id="wijzigenpaneel_'+id+'"><div id="content_top"><div onclick="wijzigensluiten('+id+');" id="sluiten" style="margin-right: 10px;"></div></div><div id="content_mid">Wijzig hier je plakbriefje:<br/><textarea style="width: 300px; height: 110px;" id="wijzigen_'+id+'">Vul hier je tekst in.</textarea><br/><button class="button" onclick="wijzigen('+id+');">Wijzigen</button></div><div id="content_bot"></div></div><div class="item" id="item_'+id+'" style="z-index: '+zindex+';"><div id="top"></div><div id="midden"><div id="verwijderen" style="margin: 0;" onclick="verwijderen('+id+');"></div><div id="wijzigen" style="margin: 0;" onclick="wijzigenopen('+id+');"></div><div id="tekst_'+id+'">Vul hier je tekst in.</div></div><div id="both"></div></div>' + document.getElementById("container").innerHTML;
    if ($("#item_hidden_"+id+"_x").length == 0){
      document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/><input type="hidden" name="item_hidden_'+id+'_tekst" id="item_hidden_'+id+'_tekst" value="Vul hier je tekst in."/>';
    }else{
      document.getElementById("item_hidden_"+id+"_x").value = '0';
      document.getElementById("item_hidden_"+id+"_y").value = '0';
      document.getElementById("item_hidden_"+id+"_zindex").value = zindex;
      document.getElementById("item_hidden_"+id+"_tekst").value = 'Vul hier je tekst in.';
    }
    document.getElementById("mijnitem_"+id).style.display = 'none';
    var nar = nieuweitems + 1;
    document.getElementById("container").innerHTML = document.getElementById("container").innerHTML + '<input type="hidden" id="type_'+id+'" value="plakbrief"/>';
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
    });
    closeitems();
    nieuweitems++;
  }
  function postgastenboek(id) {
        document.getElementById("container").innerHTML = '<div class="item" id="item_'+id+'" style="z-index: '+zindex+';"><div id="top"></div><div id="midden"><div id="verwijderen" style="margin: 0;" onclick="verwijderen('+id+');"></div><div id="gastenboek"><input type="hidden" id="berichtencount" value="0"/><b>Gastenboek (<strong id="c">0</strong>)</b><div id="gastenboekdiv" style="max-height: 150px; overflow-x: hidden; overflow-y: auto;"><br/>Er zijn geen berichten gevonden. Wordt de eerste!</div></div></div><div id="both"></div></div>' + document.getElementById("container").innerHTML;
    document.getElementById("container").innerHTML = document.getElementById("container").innerHTML + '<input type="hidden" id="type_'+id+'" value="gastenboek"/>';
    if ($("#item_hidden_"+id+"_x").length == 0){
      document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/>';
    }else{
      document.getElementById("item_hidden_"+id+"_x").value = '0';
      document.getElementById("item_hidden_"+id+"_y").value = '0';
      document.getElementById("item_hidden_"+id+"_zindex").value = zindex;
    }
    document.getElementById("mijnitem_"+id).style.display = 'none';
    var nar = nieuweitems + 1;
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
    });
    closeitems();
    nieuweitems++;
  }
  function poststemmen(id) {
        document.getElementById("container").innerHTML = '<div class="item" id="item_'+id+'" style="z-index: '+zindex+';"><div id="top"></div><div id="midden"><div id="stemmen"><div id="verwijderen" style="margin: 0;" onclick="verwijderen('+id+');"></div><b>Stemmen: 0</b><img style="cursor: pointer; margin-right: 3px;" onclick="stem(\'Testendeuser\');" src="images/home/up.gif" align="right"/><div class="both"></div></div></div><div id="both"></div></div>' + document.getElementById("container").innerHTML;
    if ($("#item_hidden_"+id+"_x").length == 0){
      document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/>';
    }else{
      document.getElementById("item_hidden_"+id+"_x").value = '0';
      document.getElementById("item_hidden_"+id+"_y").value = '0';
      document.getElementById("item_hidden_"+id+"_zindex").value = zindex;
    }
    document.getElementById("mijnitem_"+id).style.display = 'none';
    var nar = nieuweitems + 1;
    document.getElementById("container").innerHTML = document.getElementById("container").innerHTML + '<input type="hidden" id="type_'+id+'" value="stemmen"/>';
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
    });

    closeitems();
    nieuweitems++;
  }
  function postbadges(id) {
        document.getElementById("container").innerHTML = '<div class="item" id="item_'+id+'" style="z-index: '+zindex+';"><div id="top"></div><div id="midden"><div id="verwijderen" style="margin: 0;" onclick="verwijderen('+id+');"></div><b>Badges:</b><br/>Deze gebruiker heeft geen badges.</div><div id="both"></div></div>' + document.getElementById("container").innerHTML;
    if ($("#item_hidden_"+id+"_x").length == 0){
      document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/>';
    }else{
      document.getElementById("item_hidden_"+id+"_x").value = '0';
      document.getElementById("item_hidden_"+id+"_y").value = '0';
      document.getElementById("item_hidden_"+id+"_zindex").value = zindex;
    }
    document.getElementById("mijnitem_"+id).style.display = 'none';
    document.getElementById("container").innerHTML = document.getElementById("container").innerHTML + '<input type="hidden" id="type_'+id+'" value="badges"/>';
    var nar = nieuweitems + 1;
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
    });
    closeitems();
    nieuweitems++;
  }
  function poststicker(id){
    var imagesi = document.getElementById("mijnitem_"+id).style.backgroundImage;
    var imagesiz = imagesi.replace("url(", "");
    var imagesize = imagesiz.replace(")", "");
    $("#imagesize").attr("src", imagesize);
    var widthi = document.getElementById("imagesize").width;
    var heighti = document.getElementById("imagesize").height;
    document.getElementById("container").innerHTML = '<div class="item" id="item_'+id+'" style="z-index: '+zindex+'; background-image: url('+imagesize+'); width: '+widthi+'px; height: '+heighti+'px;"><div id="verwijderen" style="margin-right: 0px; margin-top: 0px;" onclick="verwijderen('+id+');"></div></div>' + document.getElementById("container").innerHTML;
    if ($("#item_hidden_"+id+"_x").length == 0){
      document.getElementById("itemdataform").innerHTML = document.getElementById("itemdataform").innerHTML + '<input type="hidden" name="item_hidden_'+id+'_x" id="item_hidden_'+id+'_x" value="0"/><input type="hidden" name="item_hidden_'+id+'_y" id="item_hidden_'+id+'_y" value="0"/><input type="hidden" name="item_hidden_'+id+'_zindex" id="item_hidden_'+id+'_zindex" value="'+zindex+'"/>';
    }else{
      document.getElementById("item_hidden_"+id+"_x").value = '0';
      document.getElementById("item_hidden_"+id+"_y").value = '0';
      document.getElementById("item_hidden_"+id+"_zindex").value = zindex;
    }
    document.getElementById("mijnitem_"+id).style.display = 'none';
    var nar = nieuweitems + 1;
    document.getElementById("container").innerHTML = document.getElementById("container").innerHTML + '<input type="hidden" id="type_'+id+'" value="sticker"/>';
    nieuw[nar] = id;
    document.getElementById("nieuweitemsarsticker").value = document.getElementById("nieuweitemsarsticker").value + id + "|";
    $(function() {
      $( ".item" ).bind( "dragstart", function(event, ui) {
      zindex++;
      });
      $( ".item" ).draggable({ containment: "parent", zIndex: zindex });
      $( ".item" ).bind( "drag", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
      $( ".item" ).bind( "dragstop", function(event, ui) {
        $(this).css('zIndex', zindex);
        $("#mids").css('zIndex', zindex + 5);
      });
    });

    closeitems();
    nieuweitems++;
  }