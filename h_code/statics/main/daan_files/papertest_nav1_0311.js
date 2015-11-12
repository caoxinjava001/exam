
var isIE=!+'\v1';	//IE浏览器
var IE6 = isIE && /MSIE (\d)\./.test(navigator.userAgent) && parseInt(RegExp.$1) < 7;
if(IE6)
{
    var obj = document.getElementById("bottomNav");
    obj.className = "bottomNavIE6";
}

var adleft_display = false;
function set_adleft_display()
    {
        var obj0 = document.getElementById("adleft_display_id0");
        var obj1 = document.getElementById("adleft_display_id1");
        var obj_Nav = document.getElementById("bottomNav");
        if(adleft_display)
        {
            obj0.style.display = "block";
            obj1.style.display = "none";
            adleft_display = false;
            //alert("a:" + obj_Nav.style.top);
            //obj_Nav.style.top = "10px";
        }
        else
        {
            obj0.style.display = "none";
            obj1.style.display = "block";
            adleft_display = true;
            //alert("b:" + obj_Nav.style.top);
            //obj_Nav.style.top = "300px";
        }
    }

var lastScrollY = 0;
function heartBeat() {
    var diffY;
    if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
    else if (document.body)
    diffY = document.body.scrollTop
    else
    {
        /*Netscape stuff*/
    }
    percent = 0.9 * (diffY - lastScrollY);
    if (percent > 0) percent = Math.ceil(percent);
    else percent = Math.floor(percent);
    //document.getElementById("adright").style.top = parseInt(document.getElementById("adright").style.top) + percent + "px";
	//document.getElementById("adleft").style.top = parseInt(document.getElementById("adleft").style.top) + percent + "px";
	
	
    if(IE6)
    {
        var obj = document.getElementById("bottomNav");
	    obj.style.top = parseInt(obj.style.top) + percent + "px";
	}
    lastScrollY = lastScrollY + percent;
}

function adhide(names) {
    document.getElementById(names).style.display = "none";
}
function screencl(names) {
    if (screen.width <= 800) {
        adhide(names);
    }
}
//screencl("adright");
//screencl("adleft");
screencl("bottomNav");
if(IE6)
{
window.setInterval("heartBeat()", 1);  
}


  window.onresize = function(){
      reSizeHeight();
      
  }
  
  var nav_height_real = 0;
  function reSizeHeight(){
    var win_height = (window.innerHeight || document.documentElement && document.documentElement.clientHeight || document.body.offsetHeight);
    
    /*win_height = win_height - 265;*/
    win_height = win_height - 265;
    var obj = document.getElementById("bottomNav_con");
    obj.style.height = "auto";
    if(nav_height_real == 0)
    {
        nav_height_real = obj.offsetHeight;
    }
    
    if(nav_height_real > win_height)
    {
        document.getElementById("bottomNav_con").style.height = win_height + "px";
   }
    
  }
  
  reSizeHeight();
  
 
   




