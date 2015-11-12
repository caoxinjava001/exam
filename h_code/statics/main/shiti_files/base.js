// JScript 文件

//电子邮件格式 0：不是，1：是
function isEmailFormat(inStr){
	if(inStr.length==0) return 1;
	var atSym=inStr.indexOf('@');
	var period=inStr.lastIndexOf('.');
	var space=inStr.indexOf(' ');
	var length=inStr.length - 1;   
	if ((atSym<1) || (Period<=AtSym+1) || (Period==Length) || (Space!=-1)){  
		return 0;
	}
    return 1;
}

//是否为英文字母 0:不是，1:是
function isWord(inStr){
	var validLetters = "abcdefghijkmlnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var temp;
	var strWord=Trim(inStr)	  
	for(var i=0;i<strWord.length;i++){
		temp=strWord.substring(i,i+1);
		if(validLetters.indexOf(temp)==-1){
			return 0;
		}
		if(i>20){
			return -1;
		}	
	}
	return 1;	
}

//去前后空格
function trim(inStr){
	if(isEmpty(inStr)==1)
		return "";
	var temp=inStr
	while(temp.indexOf(' ')==0)
		temp=temp.substring(1,temp.length);
	while(temp.lastIndexOf(' ')==temp.length-1)
		temp=temp.substring(0,temp.length-1);
	return temp;
}

//是否为空 1:为空，0：不为空
function isEmpty(inStr){
	for(var i=0;i<inStr.length;i++){
		if(inStr.substring(i,i+1)!=" ")
			return 0;
	}
	return 1;
}

//是否为数字 0：不是 1：是
function isDigit(inStr){
	var Digits = "0123456789";
	var temp;
	
	if(isEmpty(inStr)==1)
		return 1;

	for(var i=0;i<inStr.length;i++){
		temp=inStr.substring(i,i+1);
		if (Digits.indexOf(temp)==-1){
			return 0;
		}
	}
	return 1;	
}

//截取字符串，中文算2个字符
function subString(str,start,end){
	if(getLength(str)<end){
		return str;
	}else{
		var count=end-start;
		var reg=/[^\x00-\xff]/g;
		var i=0;
		var sub="";
		while(count>0){
			var temp=str.substring(i,i+1);
			if(reg.test(temp)){
				count=count-2;
			}else{
				count=count-1;
			}
			if(count>0){
				sub+=temp;
			}
			i++;
		}
		return sub+"...";
	}
}

//取字符串的长度，中文算2个字符
function getLength(str){
	var length = str.replace(/[^\x00-\xff]/g,"aa").length;
	return length;
}

//根据tag取页面对象，div，table之类
function getTagObj(str){
	var arr = document.getElementsByTagName(str);
	if(arr!=null && arr.length==0){
		return arr[0];
	}else{
		return arr;
	}
}

//根据name去页面对象
function getNameObj(str){
	var arr = document.getElementsByName(str);
	if(arr!=null && arr.length==0){
		return arr[0];
	}else{
		return arr;
	}
}


//取对象的页面top位置
function getOffsetTop(el){
	var retValue=0;
	while (el != null) {
        retValue += el["offsetTop"];
        el = el.offsetParent;
    }
    return retValue;
}

Function.prototype.bind = function() {
  var __method = this, args = $A(arguments), object = args.shift();
  return function() {
    return __method.apply(object, args.concat($A(arguments)));
  }
}

var $A = Array.from = function(iterable) {
  if (!iterable) return [];
  if (iterable.toArray) {
    return iterable.toArray();
  } else {
    var results = [];
    for (var i = 0; i < iterable.length; i++)
      results.push(iterable[i]);
    return results;
  }
}


//取对象的页面left位置
function getOffsetLeft(el){
	var retValue=0;
	//el = el.offsetParent;
	while (el != null) {
        retValue += el["offsetLeft"];
        el = el.offsetParent;
    }
    return retValue;
}

////根据id取页面对象
//function $(element) {
//  if (arguments.length > 1) {
//    for (var i = 0, elements = [], length = arguments.length; i < length; i++)
//      elements.push($(arguments[i]));
//    return elements;
//  }
//  element = document.getElementById(element);
//  return element;
//}

