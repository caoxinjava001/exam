/** 创建人：李信；创建时间：2011-09-05 **/
/******** Begin t_testError_analyse **********/
/** 添加到题库收藏夹  **/
function testOnline_all_cart_a(divid, cWidth, cHeight, curObj, topMove, leftMove, paperid, itemdesid, ItemIndex, itemid, Error_analyse, images_type, crexamid) {//我的错题库
    var ajax = new Ajax();
    ajax.setServer("/AjaxControls/SubjectsCorrection.ashx");
    ajax.setParam("paperid", paperid);
    ajax.setParam("itemid", itemid);
    ajax.setParam("ItemIndex", ItemIndex);
    ajax.setParam("itemdesid", itemdesid);
    ajax.setParam("type", Error_analyse);
    ajax.setParam("crexamid", crexamid);
    ajax.setCallback(function (str) { GetCallBack_testOnline_all_cart(divid, cWidth, cHeight, str, curObj, topMove, leftMove, Error_analyse, paperid, images_type); });
    ajax.sendByGet(0, true);
}

function testOnline_all_cart_b(divid,cWidth,cHeight,curObj,topMove,leftMove,paperid,itemdesid,ItemIndex,itemid,Error_analyse,b,images_type){//我的重点题库
        var ajax=new Ajax();
        ajax.setServer("/AjaxControls/SubjectsCorrection.ashx");
	    ajax.setParam("paperid",paperid);
    	ajax.setParam("itemid",itemid);
    	ajax.setParam("ItemIndex",ItemIndex);
    	ajax.setParam("itemdesid",itemdesid);
    	ajax.setParam("type",Error_analyse);
    	ajax.setParam("b",b);
	    ajax.setCallback(function(str){ GetCallBack_testOnline_all_cart(divid,cWidth,cHeight,str,curObj,topMove,leftMove,Error_analyse,paperid,images_type);});
	    ajax.sendByGet(0,true);
}


/** 回调函数 **/
function GetCallBack_testOnline_all_cart(divid,cWidth,cHeight,str,curObj,topMove,leftMove,Error_analyse,paperid,images_type){
    
    //以下是加载到div里面的内容
    var str1='<div style="background:url(/images/paperks/Video_cart_add_bj.gif) no-repeat;margin:0 auto;" id="div_test_ErrorPaper1">';
    str1+='<table border="0" align="center" cellpadding="0" cellspacing="0" style="width:300px; height:112px;">';
    str1+='<tr>';
    str1+='<td width="25%" height="15">&nbsp;</td>';
    str1 += '<td width="75%" align="right" valign="top"><img src="/images/paperks/but_close.gif" style="cursor:pointer;" alt="关闭" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);"  /></td>';
    str1+='</tr>';
    str1+='<tr>';
    str1+='<td height="46">&nbsp;</td>';
    
    if(Error_analyse==0)
    {
        if(str == -1)
        {
            str1+='<td align="left" class="fB f14px">在错题库已经存在的此题！</td>';
        }
        else
        {
            str1+='<td align="left" class="fB f14px">已成功收藏到我的错题集！</td>';
        }
        str1+='</tr>';
        str1+='<tr>';
        str1+='<td>&nbsp;</td>';
        //        str1+='<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang.gif" width="64" height="21" />&nbsp;&nbsp;<a target="_blank" href="/user/mypaper_items_page.aspx?type=0&papereid='+paperid+'" ><img src="/images/paperks/but_shoucang2_1.gif" width="74" height="21" /></a></td>';
        if(images_type==0)
        {
            str1 += '<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang.gif"  />&nbsp;&nbsp;<a target="_blank" href="http://www.mokaoba.com/usercenter/?iurl=/usercenter/paper/MySubjects.aspx" ><img src="/images/paperks/but_shoucang2_1.gif"  /></a></td>';
        }
        else
        {
            str1 += '<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang_jixu.gif"  />&nbsp;&nbsp;<a target="_blank" href="http://www.mokaoba.com/usercenter/?iurl=/usercenter/paper/MySubjects.aspx" ><img src="/images/paperks/but_shoucang2_1.gif"  /></a></td>';
        }
    }
    else
    {
        if(str == -1)
        {
            str1+='<td align="left" class="fB f14px">在重点题库已经存在的此题！</td>';
        }
        else
        {
            str1+='<td align="left" class="fB f14px">已成功收藏到我的重点题库！</td>';
        }
        
        str1+='</tr>';
        str1+='<tr>';
        str1+='<td>&nbsp;</td>';
        //        str1+='<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang.gif" width="64" height="21" />&nbsp;&nbsp;<a target="_blank" href="/user/mypaper_items_page.aspx?type=1&papereid='+paperid+'" ><img src="/images/paperks/but_shoucang2_2.gif" width="74" height="21" /></a></td>';
        
        if(images_type==0)
        {
            str1 += '<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang.gif"  />&nbsp;&nbsp;<a target="_blank" href="http://www.mokaoba.com/usercenter/?iurl=/usercenter/paper/MySubjects.aspx" ><img src="/images/paperks/but_shoucang2_2.gif"  /></a></td>';
        }
        else
        {
            str1 += '<td height="30" align="left" valign="top"><img  style="cursor:pointer;" onclick="closeShopCart(&quot;div_test_ErrorPaper&quot;);" src="/images/paperks/but_guang_jixu.gif"  />&nbsp;&nbsp;<a target="_blank" href="http://www.mokaoba.com/usercenter/?iurl=/usercenter/paper/MySubjects.aspx" ><img src="/images/paperks/but_shoucang2_2.gif"  /></a></td>';
        }
    }

    str1+='</tr>';
    str1+='</table>';
    str1+='</div>';

    creatTestOnlineCartDiv_view(divid,cWidth,cHeight,curObj,topMove,leftMove);
    document.getElementById(divid).innerHTML=str1;
}

/** 创建div **/
function creatTestOnlineCartDiv_view(divid,cWidth,cHeight,curObj,topMove,leftMove) {
    var thisTestCart;
    if(document.getElementById(divid))
    {
        thisTestCart = document.getElementById(divid);
    }
    else
    {
        creatTestOnlineCartDiv(divid,cWidth,cHeight,curObj);
        thisTestCart = document.getElementById(divid);
    }
    
    var thistop = getOffsetTop(curObj);
    var thisleft = getOffsetLeft(curObj);
    thisTestCart.style.top = (thistop + topMove) + "px";
    thisTestCart.style.left = (thisleft + leftMove) + "px";
    thisTestCart.style.display = "";
}


function creatTestOnlineCartDiv(divid,cWidth,cHeight,curObj)
{
    var myCart = document.createElement("div");
    myCart.id = divid;
    myCart.style.position = "absolute";
    myCart.style.zIndex = 99000;
    myCart.style.display = "block";
    myCart.style.width = cWidth + "px";
    //myCart.style.height = cHeight + "px";
    myCart.style.height = "115px";
    document.body.appendChild(myCart);
}
/** 获取浏览器的Top **/
function getOffsetTop(el){
	var retValue=0;
	while (el != null) {
        retValue += el["offsetTop"];
        el = el.offsetParent;
    }
    return retValue;
}
/** 获取浏览器的Left **/
function getOffsetLeft(el){
	var retValue=0;
	while (el != null) {
        retValue += el["offsetLeft"];
        el = el.offsetParent;
    }
    return retValue;
}

function closeShopCart(divid)
{
    document.getElementById(divid).style.display = "none";
}
/******** End t_testError_analyse **********/