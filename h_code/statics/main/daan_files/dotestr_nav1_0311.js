//        function setTab(name, cursel, n) {
//            for (i = 1; i <= n; i++) {
//                var menu = document.getElementById(name + i);
//                var con = document.getElementById("con_" + name + "_" + i);
//                menu.className = i == cursel ? "hover" : "";
//                con.style.display = i == cursel ? "block" : "none";
//            }
//        }
        
        
        
        
        function setTabStyle(name, cursel, n) {
            for (i = 0; i < n; i++) {
                var menu = document.getElementById(name + i);
                menu.className = i == cursel ? "leftTabCurr" : "";
            }
        }
        
       function setTab(name, cursel, n) {
            for (i = 0; i < n; i++) {
                var menu = document.getElementById(name + i);
                var con = document.getElementById("con_" + name + "_" + i);
                var arr_a = menu.getElementsByTagName("a");
				for(var k=0;k<arr_a.length;k++)
				{
					if(i == cursel)
					{
						arr_a[k].className = "hover_a" + String(k);
					}
					else
					{
						arr_a[k].className = "a" + String(k);
						
					}
				}
                con.style.display = i == cursel ? "block" : "none";
            }
        }
        
       
               var curr_con_one_obj = null;
       
        //参数n表示当前试卷下的大题个数
        function setTabaja(name, cursel, n,did,pid,url,recid,readTag) {
       
            for (i = 0; i < n; i++) {
                var menu = document.getElementById(name + i);
                var menu2 = document.getElementById(name + i +"_2");
                var con = document.getElementById("con_" + name + "_" + i);
                var arr_a = menu.getElementsByTagName("a");
                var arr_a_2;
                if(menu2)
                {
                    arr_a_2 = menu2.getElementsByTagName("a");
                }
                
				for(var k=0;k<arr_a.length;k++)
				{
					if(i == cursel)
					{
						arr_a[k].className = "hover_a" + String(k);
						if(menu2)
						 arr_a_2[k].className = "hover_a" + String(k);
					}
					else
					{
						arr_a[k].className = "a" + String(k);

						if(menu2)
						 arr_a_2[k].className = "a" + String(k);

					}
				}
                con.style.display = i == cursel ? "block" : "none";
            }
            
            setTabStyle('leftTab_',cursel,n);
            curr_con_one_obj = document.getElementById("con_one_" + cursel);
            if(curr_con_one_obj.innerHTML.length < 200)
            {   
                checkPaperName(did,pid,url,recid,readTag);
            }
            
        }
        

        
function checkPaperName(did,pid,url,recid,readTag){
        if(did.length <1 || pid.length< 1)
        {
            return false;
        }
        
	    var ajax=new Ajax();
	    ajax.setServer("http://" + location.hostname + "/" + url + ".aspx");
	    ajax.setParam("did",did);
    	ajax.setParam("pid",pid);
    	ajax.setParam("recid",recid);
    	ajax.setParam("readtag",readTag);
	    ajax.setCallback(finishDelItem);
	    ajax.sendByPost(0,true);

}

function finishDelItem(str){
    curr_con_one_obj.innerHTML = str;
	return false;
}


var pattern = /^[\d.]{0,5}$/;
function checkMark(obj)
{
 	if(!pattern.test(obj.value))
	{
		obj.value = obj.value.substring(0,obj.value.length-1)
	}
}


function tarchClick(idstr) 
    { 
        if(document.all) 
        {  
            document.getElementById(idstr).click(); 
        } 
        else 
        { 
            var evt = document.createEvent("MouseEvents"); 
            evt.initEvent("click", true, true); 
            document.getElementById(idstr).dispatchEvent(evt); 
        } 
    } 


function textareaRowsAdd(thisId)
{
	var obj = document.getElementById(thisId);
	if(obj.rows <=90)
	{
		obj.rows = obj.rows + 10;
	}
}

function textareaRowsAdd_desc(thisId)
{
	var obj = document.getElementById(thisId);
	if(obj.rows >=15)
	{
		obj.rows = obj.rows - 10;
	}
}





/******** Begin Itempages **********/

function PagesClass(){
    this.thisId_obj= null;
}

PagesClass.prototype.setTabaja_ItemPages = function (thisObj,pageIndex,did,pid,url,recid,readTag,loadTag){
        if(pageIndex < 1)
        {
            return false;
        }
        
        this.thisId_obj  = document.getElementById(did + "_itemPageIndex_" +pageIndex );
       
        if(this.thisId_obj.innerHTML.length < 300)
        {
            this.setTabaja_ItemPages_ToDo(pageIndex,did,pid,url,recid,readTag,loadTag);
            
        }
    }
        
PagesClass.prototype.setTabaja_ItemPages_ToDo = function (pageIndex,did,pid,url,recid,readTag,loadTag)
    {
        if(did.length <1 || pid.length< 1)
        {
            return false;
        }
        
        var ajax=new Ajax();

	    ajax.setServer("http://"+location.hostname+"/" +url + ".aspx");
        
	    ajax.setParam("page",pageIndex);
	    ajax.setParam("did",did);
    	ajax.setParam("pid",pid);
    	ajax.setParam("recid",recid);
    	ajax.setParam("readtag",readTag);
    	ajax.setParam("loadtag",loadTag);
    	
    	var cur_obj =this;
    	var cur_obj_id =this.thisId_obj;
    	
	    ajax.setCallback(function(str){
	        cur_obj.setTabaja_ItemPages_Finished(str,cur_obj_id,url,recid,readTag);
	       }
	    );
	    ajax.sendByPost(0,true);
    }

PagesClass.prototype.setTabaja_ItemPages_Finished = function (str,objid,url,recid,readTag){
            if(objid.innerHTML.length < 300)
             {
                objid.innerHTML = str;
                
                if(dtCur < dtArr.length)
                {
                    if(dtCur == 0){
                        myItemsPages.setTabaja_ItemPages(null,'2',dtArr[dtCur],pid,url,recid,readTag,2);
                    }
                    else{
                        myItemsPages.setTabaja_ItemPages(null,'1',dtArr[dtCur],pid,url,recid,readTag,3);
                    }
                    //alert(dtCur);
                    dtCur ++;
                }
                
             }
	        return false;
	    }
    
   var myItemsPages = new PagesClass(); 

    
function Itemdes_Papes_div_li_click(did,obj_ib)
    {
        var obj_div1= document.getElementById(did + "_Itemdes_Papes_div_id1");
        var obj_div2= document.getElementById(did + "_Itemdes_Papes_div_id2");
        
        var arr_obj_div1 = obj_div1.getElementsByTagName("li");
        var arr_obj_div2 = obj_div2.getElementsByTagName("li");
        
        for(var i=1;i<arr_obj_div1.length;i++)
        {
            if(arr_obj_div1[i].id == obj_ib || arr_obj_div2[i].id == obj_ib)
            {
                arr_obj_div1[i].className = "li_active";
                arr_obj_div2[i].className = "li_active";
            }
            else
            {
                arr_obj_div1[i].className = "";
                arr_obj_div2[i].className = "";
            }
        }
        
    }
    
function setTabaja_ItemPages_all(did)
    {
         var obj_div1= document.getElementById(did + "_Itemdes_Papes_div_id1");
         var arr_obj_div1 = obj_div1.getElementsByTagName("li");
         for(var i=1;i<arr_obj_div1.length;i++)
            {
                if(i!=arr_obj_div1.length-1)
                {
                  tarchClick(arr_obj_div1[i].getElementsByTagName("a")[0].id);
                }
            }
    }
/******** End Itempages **********/
    
    var thisPage=false;
    function SaveRemind(focusID,msg,e)
        {
             document.getElementById(focusID).focus();
		     var evt = e ? e : (window.event ? window.event : null);//此方法为了在firefox中的兼容
            if(!thisPage)evt.returnValue=msg;
             
        }  
    
 function mytester(focusID,msg)
    {
	    if(confirm(msg))
	    {
		    
	    }
	    else
	    {
		    document.getElementById(focusID).click();
	    }
    }
    

function doTotalItems(obj)
{
	
    //itemMyAns_1_101476_1
    
    var arrName = obj.name.split("_");
    var xt_Type = arrName[1];
    
    doTotalItems_check(arrName[0] + "_" + arrName[1] + "_"+arrName[2],1);
   
}


function doTotalItems_check(obj_name,wich)
{
	
    //itemMyAns_1_101476_1
    var arrName = obj_name.split("_");
    var xt_Type = arrName[1];
    
    var doAns = false;
    if(xt_Type == 3)
    {
        if(!isEmpty(document.getElementsByName(obj_name)[0].value))
        {
            doAns = true;
        }
    }
    else if(xt_Type == 2)
    {
        if(!isEmpty(document.getElementById(obj_name).value))
        {
            doAns = true;
        }
    }
    else if(getRadioValue_Arr(obj_name))
     {
            doAns = true;
     }
    
    var thisName = "," + obj_name + ",";
    var curClass = document.getElementById("li_xt_" +arrName[2]).className;
    if(doAns)
    {
	    if(totalNames.replace(thisName,"") == totalNames)
	    {
		    totalNames += thisName;
		    hasDoTotal++;
		    leavTotal--;
	    }
	    
	    
	    if(wich == 1)
	    {
	        if(curClass == "mark_ans_do_0")
	        {
	            document.getElementById("li_xt_" +arrName[2]).className = "mark_ans_do_1";
	        }
	    }
	    else
	    {
	        document.getElementById("li_xt_" +arrName[2]).className = "mark_ans_do_1";
	    }
    }
    else
    {
        if(totalNames.replace(thisName,"") != totalNames)
	    {
		    totalNames = totalNames.replace(thisName,"");
		    hasDoTotal--;
		    leavTotal++;
	    }
	    if(wich == 1)
	    {
	        if(curClass == "mark_ans_do_1")
	        {
	            document.getElementById("li_xt_" +arrName[2]).className = "mark_ans_do_0";
	        }
	    }
	    else
	    {
	        document.getElementById("li_xt_" +arrName[2]).className = "mark_ans_do_0";
	    }
	    
    }
    //document.getElementById("totalItemsView").innerHTML = "已做 <span class=\"red\">" + hasDoTotal + "</span> 题 / 共 <span class=\"red\">" + totalItems + "</span> 题    &nbsp;&nbsp;剩余 <span class=\"red\">" + leavTotal + "</span> 题未作答";
    //document.getElementById("totalItemsView1").innerHTML = document.getElementById("totalItemsView").innerHTML;
    
    //lixin
    document.getElementById("totalItemsView1").innerHTML = "已做 <span class=\"green\">" + hasDoTotal + "</span> 题 / 共 <span class=\"green\">" + totalItems + "</span> 题    &nbsp;&nbsp;剩余 <span class=\"green\">" + leavTotal + "</span> 题未作答";
    document.getElementById("totalItemsView").innerHTML = "<li>" + hasDoTotal + "</li><li>" + totalItems + "</li><li>" + leavTotal + "</li>";
}



function SXBmakemark_mark(obj,xt_type_id)
{
    var obj_tr = obj.parentNode.parentNode.parentNode.parentNode;
    var arrTr_id = obj_tr.id.split("_");//0_12346
    
    if(obj_tr.className!="mark_ans_1" )
      {
    	 obj_tr.className="mark_ans_1";
    	 obj.src="/images/paperks/mark_wh2.gif"; 
    	 document.getElementById("li_xt_" +arrTr_id[1]).className = "mark_ans_1_nav";
       }else {
    	obj_tr.className="mark_ans_0";
    	obj.src = "/images/paperks/mark_wh.gif";
    	doTotalItems_check("itemMyAns_" + obj_tr.id,2);
       }
	return;   
}

function SXBmakemark_zd(obj)
{
     var obj_tr = obj.parentNode.parentNode.parentNode.parentNode;
    var arrTr_id = obj_tr.id.split("_");
    
    if(obj_tr.className!="mark_ans_2" )
      {
    	 obj_tr.className="mark_ans_2";
    	 document.getElementById("li_xt_" +arrTr_id[1]).className = "mark_ans_2_nav";
    	 obj.src = "/images/paperks/mark_zd.gif";
       }else {
    	obj_tr.className="mark_ans_0";
    	obj.src = "/images/paperks/mark_zdno.gif";
    	doTotalItems_check("itemMyAns_" + obj_tr.id,2);
       }
	return;   
}

function SXBmakemark_mark_0311(obj,dtId,xtId,xt_attribute)
{
    /*if(obj.className == "mark_ans_img")*/
    if(obj.className == "mark_ans_img_ing")
    {
        obj.className ="mark_ans_img1_ing";
        document.getElementById("xt_" + dtId + "_" + xtId).className = "question bj_11";
        document.getElementById("li_xt_" +xtId).className = "mark_ans_1_nav";
    }
    else
    {
         /*obj.className ="mark_ans_img";*/
         obj.className ="mark_ans_img_ing";
         document.getElementById("xt_" + dtId + "_" + xtId).className = "question";
         doTotalItems_check("itemMyAns_" + xt_attribute + "_" + xtId,2);
    }
    
    
}



function getRadioValue_Arr(nameStr){
    var name = "";
    var doAns = true;
    
   
    for(var k=1;k<30;k++)
    {
        name = nameStr + "_" + k;
        var liObj = document.getElementById(name.replace("itemMyAns","li"));
        if(!liObj)
        {
            break;
        }
        var radioes = document.getElementById(name);
       
        if(!radioes || radioes.value.length < 1)
        {
            doAns = false;
            break;
            return doAns
        }
        
    }
    return doAns;
}

function getRadioValue(name){
    var radioes = document.getElementsByName(name); 
    for(var i=0;i<radioes.length;i++)
    {
         if(radioes[i].checked){
          return radioes[i].value;
         }
    }
    return false;
}
    

//是否为空 true:为空，false：不为空
function isEmpty(inStr){
	for(var i=0;i<inStr.length;i++){
		if(inStr.substring(i,i+1)!=" ")
			return false;
	}
	return true;
}


var curDtOpen = 0;
var dtBoolOpen = true;
function dtControl(dtWitch,boolScroll){

    var dtBoolOpen1 = dtBoolOpen;
     for(var i=0;i<dtArr.length;i++)
     {
        if(i != dtWitch)
        {
            document.getElementById("con_one_" + i).className = "con_one_Itemdes dtBorder";
            document.getElementById("dt_xt_content_" + i).style.display = "none";
            document.getElementById("dt_xt_title_" + i).className = "part2";
            
            document.getElementById("dt_xt_more_0_" + i).style.display = "";
            document.getElementById("dt_xt_nav_1_" + i).style.display = "none";
            document.getElementById("xtNavA_dt_" + i).className = "xtNavA_bg_dt dt_bg0";
            document.getElementById("dt_input_" + i).className = "input22";
            
            
            document.getElementById("dt_input_1_" + i).className = "input22";//lixin
        }
        else
        {
            if(curDtOpen == dtWitch && dtBoolOpen)
            {
                document.getElementById("con_one_" + i).className = "con_one_Itemdes dtBorder";
                document.getElementById("dt_xt_content_" + i).style.display = "none";
                document.getElementById("dt_xt_title_" + i).className = "part2";
                document.getElementById("dt_xt_more_0_" + i).style.display = "";
                document.getElementById("dt_xt_nav_1_" + i).style.display = "none";
                document.getElementById("xtNavA_dt_" + i).className = "xtNavA_bg_dt dt_bg0";
                document.getElementById("dt_input_" + i).className = "input22";
                
                document.getElementById("dt_input_1_" + i).className = "input22";//lixin
                dtBoolOpen = false;
            }
            else
            {
                document.getElementById("con_one_" + i).className = "con_one_Itemdes";;
                document.getElementById("dt_xt_content_" + i).style.display = "";;
                document.getElementById("dt_xt_title_" + i).className = "part2 part2_1";
                document.getElementById("dt_xt_more_0_" + i).style.display = "none";
                document.getElementById("dt_xt_nav_1_" + i).style.display = "";
                document.getElementById("xtNavA_dt_" + i).className = "xtNavA_bg_dt";
                document.getElementById("dt_input_" + i).className = "input11";
                
                document.getElementById("dt_input_1_" + i).className = "input11";//lixin
                dtBoolOpen = true;
            }
             
        }
     }
     
     if(curDtOpen != dtWitch)
     {
        ctrolScroll("con_one_" + dtWitch);
     }
     else
     {
         if(boolScroll == 1)
         {
           
            ctrolScroll("con_one_" + dtWitch);
         }
         else if(curDtOpen != dtWitch && boolScroll ==2)
         {
            
            ctrolScroll("con_one_" + dtWitch);
         }
         else if(boolScroll == 0 && dtWitch != 0)
         {
            var isIE=!+'\v1';	//IE浏览器
            var IE6 = isIE && /MSIE (\d)\./.test(navigator.userAgent) && parseInt(RegExp.$1) < 7;
            if(IE6)
            {
	            ctrolScroll("con_one_" + dtWitch);
            }

         }
     }
     
     
     curDtOpen = dtWitch;
     
     
     
    
}

function getOffsetTop(el){
	var retValue=0;
	while (el != null) {
        retValue += el["offsetTop"];
        el = el.offsetParent;
    }
    return retValue;
}


function ctrolScroll(objId)
{
   
    var bojTop = getOffsetTop(document.getElementById(objId));
    var scrollTop = $(window).scrollTop();
    var paceHeight = document.getElementById("Header").offsetHeight;

    if(document.getElementById("Header").className.indexOf("sticky") < 0)
    {
        paceHeight = paceHeight*2;
    }
    window.scrollTo(0,bojTop -paceHeight);

}

function doTotalItemsSelect0(objClick)
{
    var arrA = objClick.parentNode.getElementsByTagName("a");
    for(var i=0;i<arrA.length;i++)
    {
        arrA[i].className = "";
    }
    objClick.getElementsByTagName("a")[0].className = "select";

    var inputName = objClick.getAttribute("input_name");
    var inputValue = objClick.getAttribute("input_value");
    
    if(document.getElementById(inputName))
    {
        document.getElementById(inputName).value = inputValue;
    }
    else
    {
        var input = document.createElement("input");
        input.type="text";
        input.name = inputName;
        input.id = inputName;
        input.value=inputValue;
        input.className = "inputHid";
        
        document.forms[0].appendChild(input);
    }
    
    var arrName = inputName.split("_");
    var xt_Type = arrName[1];
    
    doTotalItems_check(arrName[0] + "_" + arrName[1] + "_"+arrName[2],1);
}

function doTotalItemsSelect1(objClick)
{
    if(objClick.getAttribute("input_Checked"))
    {
        objClick.removeAttribute("input_Checked");
        objClick.getElementsByTagName("a")[0].className = "";
    }
    else
    {
        objClick.setAttribute("input_Checked","1");
        objClick.getElementsByTagName("a")[0].className = "select";
    }
   
    var thisValue = "";
    var arrLi = objClick.parentNode.getElementsByTagName("li");
    for(var i=0;i<arrLi.length;i++)
    {
        if(arrLi[i].getAttribute("input_Checked"))
        {
            thisValue += arrLi[i].getAttribute("input_value") + ",";
        }
    }
    
    if(thisValue.length > 0)
    {
        thisValue = thisValue.substr(0,thisValue.length - 1);
    }
    var inputName = objClick.getAttribute("input_name");
    if(document.getElementById(inputName))
    {
        document.getElementById(inputName).value = thisValue;
    }
    else
    {
        var input = document.createElement("input");
        input.type="text";
        input.name = inputName;
        input.id = inputName;
        input.value=thisValue;
        input.className = "inputHid";
        
        document.forms[0].appendChild(input);
    }
    
    var arrName = inputName.split("_");
    var xt_Type = arrName[1];
    
    doTotalItems_check(arrName[0] + "_" + arrName[1] + "_"+arrName[2],1);
    
 
}


function doTotalItemsSelect3(objClick)
{

    var inputName = objClick.getAttribute("name");
    var arrName = inputName.split("_");
    var xt_Type = arrName[1];
    doTotalItems_check(arrName[0] + "_" + arrName[1] + "_"+arrName[2],1);
    
 
}

function ctrolScroll_new(objId)
{
    var bojTop = getOffsetTop(document.getElementById(objId));
    var scrollTop = $(window).scrollTop();
    var paceHeight = document.getElementById(objId).offsetHeight;
    window.scrollTo(0,bojTop -paceHeight);
}

function ctrolScroll_new_read(objId,vstr)
{
    var bojTop = getOffsetTop(document.getElementById(objId));
    var scrollTop = $(window).scrollTop();
    var paceHeight = document.getElementById(objId).offsetHeight;
    var search_pareid =paceHeight-document.getElementById("search_pareid_"+vstr).offsetHeight;
    
    window.scrollTo(0,bojTop-search_pareid);
}
