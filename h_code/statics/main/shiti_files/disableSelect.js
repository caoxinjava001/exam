
function disableSelection(target){
if (typeof target.onselectstart!="undefined") //IE route
	target.onselectstart=function(){if(typeof(event.srcElement.value) != "string"){return false;};}
else if (typeof target.style.MozUserSelect!="undefined") //Firefox route
	{target.style.MozUserSelect="none";}
else // All other route (ie: Opera)
	target.onmousedown=function(){return false}
target.style.cursor = "default"
}

document.oncontextmenu=function(e){return false;}
disableSelection(document.body) //
