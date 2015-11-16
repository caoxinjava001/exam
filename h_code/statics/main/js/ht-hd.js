// JavaScript Document
var left_min=0,right_min=0;
//左侧导航折叠脚本
$(function(){
	if($("#left_1").height()>$("#right_1").height()){
		$("#right_1").css({"min-height":$("#left_1").height()});
	}
	$("#right_1").css("height","auto");
	$("#right_1").css({"min-height":$("#right_1").height()});
	$("#left_1").css("height","100%");
	$("#left_1").css({"min-height":$("#left_1").height()});
	$("#resizer_1").css("height","100%");
	$("#resizer_1").css({"min-height":$("#resizer_1").height()});
	left_min=$("#left_1").height();
	right_min=$("#right_1").height();
	
	resizePane();
	
	$(window).resize(function(){
		resizePane();
	}); 
	$(document).die().live("click",function(){
		resizePane();
	});
});

function resizePane(shrink){
	var leftH,rightH,menuH,resizerH;
			
		leftH=$("#left_1").height();
		rightH=$("#right_1").height();
		if(leftH>rightH){
			if(left_min<rightH){
				$("#right_1").css({"min-height":rightH});
				$("#resizer_1").css({"min-height":rightH});
				$("#left_1").css({"min-height":rightH});
			}else{
				$("#right_1").css({"min-height":leftH});
				$("#resizer_1").css({"min-height":leftH});
			}
			
		}else if(leftH==rightH){
			if(rightH>right_min){
				$("#right_1").css({"min-height":rightH});
				$("#resizer_1").css({"min-height":rightH});
                $("#left_1").css({"min-height":rightH})
				/*$("#left_1").css({"min-height":left_min});//TODO 解决没有菜单的情况下左侧高度问题。*/
			}
		}else{
			$("#left_1").css({"min-height":rightH});
			$("#resizer_1").css({"min-height":rightH});
		}
}

//折叠、收缩
$(function(){
	$("#right_1").width(($(window.document.body).width()-$("#left_1").width()-10));
    if(location.pathname!="/"){
        $("#left_1").animate({"margin-left":"-180px"},400);
        $("#resizer_1").animate({"margin-left":"0px"},400);
        $("#right_1").animate({"margin-right":"0px",width:($(window.document.body).width()-10)},400);
        $("#resizer_1").attr("close_left","true");
    }
	//折叠、收缩
	$("#resizer_1").on("click",function(){	
		if($(this).attr("close_left")=="true"){
			$("#left_1").animate({"margin-left":"0px"},400);
			$(this).animate({"margin-left":"0px"},400);
			$("#right_1").animate({"margin-right":"0px",width:($(window.document.body).width()-$("#left_1").width()-10)},400);
			$(this).attr("close_left","");
		}else{
			$("#left_1").animate({"margin-left":"-180px"},400);
			$(this).animate({"margin-left":"0px"},400);
			$("#right_1").animate({"margin-right":"0px",width:($(window.document.body).width()-10)},400);
			$(this).attr("close_left","true");
			
		}
		
	});
	$(window).resize(function() {
		if($("#resizer_1").attr("close_left")=="true"){
			$("#right_1").width(($(window.document.body).width()-10));
		}else{			
			$("#right_1").width(($(window.document.body).width()-$("#left_1").width()-10));
		}
		
	});
	
});

//首页列表切换
 function index6(a,b,c) {
 for(i=1; i<7; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 //账号权限页列表切换
 function tab7(a,b,c) {
 for(i=1; i<8; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }

function tab4(a,b,c) {
 for(i=1; i<5; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 
  function jg_mb_set(a,b,c) {
 for(i=1; i<5; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="current";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="";document.getElementById(b+i).className="nav2";}
 } 
 }

  function custom2(a,b,c) {
 for(i=1; i<3; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="current";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 function custom2i(a,b,c) {
 for(i=1; i<3; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="current";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 //充值页滑动
  function cz_3(a,b,c) {
 for(i=1; i<4; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }


function pj_jg(a,b,c) {
 for(i=1; i<6; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="current";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 function tab5(a,b,c) {
 for(i=1; i<6; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }
 
 function tab2(a,b,c) {
 for(i=1; i<3; i++) {
 if (i==c) { 
 document.getElementById(a+i).className="this";document.getElementById(b+i).className="nav1";}
 else {
 document.getElementById(a+i).className="other";document.getElementById(b+i).className="nav2";}
 } 
 }

 
