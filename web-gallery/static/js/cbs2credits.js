window.creditsListInitialized=false;var CreditsList=Class.create({initialize:function(){if(window.creditsListInitialized){return}function c(){$$(".open[rel]").each(function(e){e.observe("click",function(j){var h=e.up(".method");var g=h.parentNode.select("."+e.getAttribute("rel"));if(!!g&&g.length>0){if(g.first().visible()){var i=g.first();
var f=i.up(".paymentmethods-client");f.scrollTop=Math.max(i.cumulativeOffset()[1]-f.cumulativeOffset()[1],0)}else{g.invoke("remove");h.insert({after:g.first()});var i=h.parentNode.select("."+e.getAttribute("rel")).first();Effect.Fade(h,{duration:0.5,afterFinish:function(){var l=/.*(idx[0-9]+).*/;var k=h.className.replace(l,"$1");
var m=i.className.replace(l,"$1");i.removeClassName(m).addClassName(k).show();h.removeClassName(k).addClassName(m).hide()}})}}})})}c();var b=function(){$$(".method-group.phone .method, .method-group.phone-single .method, .method-group.utilities .method,").each(function(e){e.select("h2").invoke("insert",{after:'<div class="top"><div></div></div>'});
e.insert('<div class="bottom"><div></div></div>')})};b();var d=function(g){var e=g.select(".method:visible");if(e.length>2){e=e.slice(0,2)}var h=[e[0].getHeight(),e[1].getHeight()];var j,i;var f="spacer";if(h[0]!=h[1]){if(h[0]>h[1]){i=h[0]-h[1];if(e[1].select(".smallprint").length>0){j=e[1].select(".smallprint:first")[0];
f+="-smallprint"}else{j=e[1].select(".summary:first")[0];f+="-summary"}}else{if(h[1]>h[0]){i=h[1]-h[0];if(e[0].select(".smallprint").length>0){j=e[0].select(".smallprint:first")[0];f+="-smallprint"}else{j=e[0].select(".summary:first")[0];f+="-summary"}}}j.insert({after:'<div class="'+f+'" style="height: '+i+'px"></div>'})
}};var a=function(f){var e=function(j){var g=j.element();if(!g.match("a")){g=g.up("a")}if(g.hasClassName("exclude")||g.hasAttribute("onclick")){j.stop();return}else{if(!g.getAttribute("target")){j.stop();if(g.hasClassName("country")){new Ajax.Updater($$(".paymentmethods-client").first(),habboReqPath+"/habblet/paymentmethods_cbs2",{method:"post",parameters:{viewName:"client",slug:g.getAttribute("rel")},evalScripts:true,onComplete:function(k){f.scrollTop=0;
b();c();$$(".selectPricePointFormForConfirmationPage").first().setAttribute("target","_blank")}})}else{if(g.hasClassName("target-utilities")){var i=$$(".utilities").first();if(!!i){var h=i.up(".paymentmethods-client");h.scrollTop=Math.max(i.cumulativeOffset()[1]-h.cumulativeOffset()[1],0)}}HabbletLoader.openLink(g)
}}}};f.observe("click",Event.delegate({a:e,"a.new-button *":e}))};if($$(".paymentmethods-client").length==0){$$(".method-group.phone, .method-group.phone-single").each(d)}else{$$(".paymentmethods-client").each(a)}window.creditsListInitialized=true}});var NewRedeemHabblet=Class.create({form:null,busy:false,initialize:function(a){this.form=$(a)||$("voucher-form");
if(!!this.form){this.form.observe("submit",this._redeemVoucher.bind(this));this.form.observe("click",this._clicked.bind(this))}},_clicked:function(b){if(this.busy){return}var a=b.findElement(".redeem-submit");if(!!a){this._redeemVoucher(b)}},_redeemVoucher:function(a){if(this.busy){return}a.stop();this.busy=true;
new Ajax.Updater(this.form,habboReqPath+"/habblet/new_redeemvoucher.php",{method:"post",parameters:{voucherCode:this.form.down("input[type=text]").value},onComplete:function(b){this.form.select(".rounded").each(function(d){Rounder.addCorners(d,8,8)});var c=b.getHeader("X-Habbo-Balance");if((!!c||c===0)){$$(".redeem-balance-amount").each(function(d){d.innerHTML=c
})}this.busy=false}.bind(this)})}});function submitCreditForm(b,g){var l=b.getInputs("radio","pricePointId");var h=l.length;for(var e=0;e<h;e++){if(l[e].checked==true){var f=l[e].up();var d=b.action;var a=l[e].value;var j=$(a+"-locale");var c=$(a+"-creditAmount");var k=$(a+"-priceInCents");b.action=b.action+"/"+g+"/"+j.innerHTML+"/"+c.innerHTML+"/"+k.innerHTML;
b.submit();b.action=d;return false}}return false}__credits__defined__=true;