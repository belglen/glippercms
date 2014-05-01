var mango={"news":{totalStories:0,currentStory:2,"init":function(){
	var tsim=cimagesLocation+"ase/"+news[1][1];
	$("#top-story").css("background-image",'url('+tsim+')');
	$("#top-story").html("<a href=\"index.php?url=news&id="+news[1][0]+"\"><font size='4pt'><strong>"+news[1][3]+"</strong></font></a><div style=\"height:10px;\"></div><p class=\"snippet\">"+news[1][2]+"<br><br><a href=\"index.php?url=news&id="+news[1][0]+"\"></span>");
	
	mango.news.totalStories=news.length;setTimeout('mango.news.cycleNews()',10000);
	},
	"cycleNews":function(){
	if(mango.news.currentStory==mango.news.totalStories)
	{
		mango.news.currentStory=1;
	}
	var tsim=cimagesLocation+"ase/"+news[mango.news.currentStory][1];
	$("#top-story").css("background-image",'url('+tsim+')');
	$("#top-story").html("<a href=\"index.php?url=news&id="+news[mango.news.currentStory][0]+"\"><font size='3pt'><strong>"+news[mango.news.currentStory][3]+"</strong></font></a><div style=\"height:10px;\"></div><p class=\"snippet\">"+news[mango.news.currentStory][2]+"<br><br><a href=\"index.php?url=news&id="+news[mango.news.currentStory][0]+"\"></span>");
	
	mango.news.currentStory++;setTimeout('mango.news.cycleNews()',10000);},},}