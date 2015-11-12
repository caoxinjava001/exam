/*var request2;*/
function creatShopCartDiv_view(divid,cWidth,cHeight,curObj,topMove,leftMove) {
    var thisShopCart;
    if(document.getElementById(divid))
    {
        thisShopCart = document.getElementById(divid);
    }
    else
    {
        creatShopCartDiv(divid,cWidth,cHeight,curObj);
        thisShopCart = document.getElementById(divid);
    }
    
    var thistop = getOffsetTop(curObj);
    var thisleft = getOffsetLeft(curObj);
    thisShopCart.style.top = (thistop + topMove) + "px";
    thisShopCart.style.left = (thisleft + leftMove) + "px";
    thisShopCart.style.display = "";
}


function creatShopCartDiv(divid,cWidth,cHeight,curObj)
{
    var myCart = document.createElement("div");
    myCart.id = divid;
    myCart.style.position = "absolute";
    myCart.style.zIndex = 9900;
    myCart.style.display = "block";
    myCart.style.width = cWidth + "px";
    myCart.style.height = cHeight + "px";
    //myCart.style.backgroundColor = "#ccc";//背静色  
    document.body.appendChild(myCart);
}

 
function getOffsetTop(el){
	var retValue=0;
	while (el != null) {
        retValue += el["offsetTop"];
        el = el.offsetParent;
    }
    return retValue;
}

function getOffsetLeft(el){
	var retValue=0;
	//el = el.offsetParent;
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


/** 添加到收藏夹 **/
function com_all_favoriteadd(divid, cWidth, cHeight, curObj, topMove, leftMove, shopid, shopname, shoptype, everytime, crexamid) {
    if (everytime == 1) {
        if (document.getElementById(divid)) {
            document.getElementById(divid).style.display = "";
        }
    }
    var ajax = new Ajax();
    ajax.setServer("/AjaxControls/all_favoriteadd.ashx");
    ajax.setParam("shopid", escape(shopid));
    ajax.setParam("shopname", escape(shopname));
    ajax.setParam("shoptype", shoptype);
    ajax.setParam("crexamid", crexamid);

    ajax.sendByGet(0, true);
}
