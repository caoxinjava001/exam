
if(!$.jhh){
	$.jhh={};
}
$(function($){
	$.jhh.cm={
			service:function(params,callback,complete,error){
				var self=this;
				$.ajax({
					type: params.type,
					url:  params.url,
					data: params.data||"",
					dataType:params.dataType||"json",
					async:typeof(params.isAsync)=="undefined"?true:params.isAsync,
					beforeSend: function(XMLHttpRequest){
						params.isload&&self.showLoading();
					},
					success: function(data, textStatus){
						params.isload&&self.removeLoading();
						callback(data);
					},
					complete: function(XMLHttpRequest, textStatus){
						params.isload&&self.removeLoading();
						complete&&complete(XMLHttpRequest, textStatus);
					},
					error: function(XMLHttpRequest, errormsg, errorlog){
						params.isload&&self.removeLoading();
						error&&error(XMLHttpRequest, errormsg, errorlog);
						//请求出错处理
						console&&console.log("--------错误类型："+errormsg);
						console&&console.log("--------错误日志："+errorlog);
					}
					});	
			},
			showLoading:function(){
				
			},
			removeLoading:function(){
				
			},
			/**
			 * @params
			 * scope 全选按钮Id 
			 * params 所有按钮的name
			 */
			checkAll:function(scope,params){
				if($("#"+scope).attr("checkedbox")=="check"){
					$("input[name='"+params+"']").each(function(){
						$(this).removeAttr("checked");
					});
					$("#"+scope).removeAttr("checkedbox");
				}else{
					$("input[name='"+params+"']").each(function(){
						$(this).attr("checked","checked");
					});
					$("#"+scope).attr("checkedbox","check");
				}
				
			},
			/**
			 * @params name
			 * @attr_name 获取哪个属性值 
			 */
			getCheckVal:function(params,attr_name){
				var all_ids=[]
				$("input[name='"+params+"']").each(function(){
					if($(this).attr("checked")=="checked"){
						$(this).attr(attr_name)&&all_ids.push($(this).attr(attr_name));
					}
				});
				if(all_ids.length>0){
					return all_ids.join(",");
				}else{
					return "";
				}
			},
			showBg:function(ct,content){
				var self=this;
				var bH=$(window).height();  
				var bW=$(window).width()+16;  
				var objWH=self.getObjWh(ct);  
				$("#fullbg").css({width:bW,height:bH,display:"block"});  
				var tbT=objWH.split("|")[0]+"px";  
				var tbL=objWH.split("|")[1]+"px";  
				$("#"+ct).css({top:tbT,left:tbL,display:"block"});
				$("#"+content).html("<div style='text-align:center'>正在加载，请稍后...</div>"); 
				$(window).scroll(function(){self.resetBg(ct)});  
				$(window).resize(function(){self.resetBg(ct)});  
			},
			getObjWh:function(obj){ 
				var st,sl,ch,cw,objH,objW;
					st=document.documentElement.scrollTop;//滚动条距顶部的距离  
					sl=document.documentElement.scrollLeft;//滚动条距左边的距离  
					ch=document.documentElement.clientHeight;//屏幕的高度  
					cw=document.documentElement.clientWidth;//屏幕的宽度  
					objH=$("#"+obj).height();//浮动对象的高度  
					objW=$("#"+obj).width();//浮动对象的宽度
					//document.body.style.overflow='hidden';//锁定屏幕滚动
					objT=Number(st)+(Number(ch)-Number(objH))/2;  
					objL=Number(sl)+(Number(cw)-Number(objW))/2; 
				return objT+"|"+objL;  
			},
			resetBg:function(obj){  
				var fullbg=$("#fullbg").css("display"),self=this;  
				if(fullbg=="block"){  
					var bH2=$(window).height();  
					var bW2=$(window).width()+16;  
					$("#fullbg").css({width:bW2,height:bH2});  
					var objV=self.getObjWh(obj);  
					var tbT=objV.split("|")[0]+"px";  
					var tbL=objV.split("|")[1]+"px";  
					$("#"+obj).css({top:tbT,left:tbL});  
				}  
			},
			closeBg:function(ct){
				$("#fullbg").css("display","none");
				$("#"+ct).css("display","none");  
			},
			placeHolder_input:function(id,msg){
				$("#"+id).focus(function(e){
					var oEvent;
					oEvent = e || window.event; 
					with(oEvent.target || oEvent.srcElement)
					{
						if(value ==msg || defaultValue){
							value = "" ;
						}
					}
				}).blur(function(e){
					var oEvent;
					oEvent = e || window.event; 
					with(oEvent.target || oEvent.srcElement)
					{
						if(value == ""){ 
							value = msg || defaultValue;
						}
					}
				}).click(function(e){
					var oEvent;
					oEvent = e || window.event; 
					with(oEvent.target || oEvent.srcElement)
					{
						if(value == msg || defaultValue){ 
							value = "" ;
						}
					}
				});
			},
            show_dialog:function(params){
                var randomId="_"+new Date().getTime(),
                    tmp="<div id='"+randomId+"' style='overflow:hidden;text-align:center;line-height:30px;height:30px;'>"+(params.msg?params.msg:"")+"</div>";
                $(params.msg?tmp:params.selector).dialog({
                    resizable:params.resizable||false,
                    draggable:params.draggable||false,
                    modal:params.modal||true,
                    title:params.title||"消息",
                    height:params.height||"auto",
                    width:params.width||"auto",
                    zIndex:params.zindex||1000,
                    buttons:params.btnNames||{},
                    open:params.openCall||{},
                    close:params.closeCall||function(){$(this).dialog( "destroy" );params.msg&&$("#"+randomId).remove();}
                });
                params.timeOut&&setTimeout(function(){
                    params.msg?$("#"+randomId).dialog("destroy"):$(params.selector).dialog("destroy");
                    params.msg&&$("#"+randomId).remove();
                },params.timeOut);

            },
			close_dialog:function(selector){
				$( selector ).dialog( "close" );
				$( selector ).dialog( "destroy" );
			},
			/**
			 * 上传
			 * @param 
			 * upload 上传控件容器
			 * params 上传的参数Object
			 * callback 上传成功回调
			 * upload_progress 上传进度回调
			 * upload_error 上传失败回调
			 */
			up_load:function(upload,params,callback,upload_progress,upload_error){
				var domNode='',swfu="_"+new Date().getTime();
				    domNode='<iframe id="'+swfu+'" name="upload_name" align=middle marginwidth=0 marginheight=0 src="'+params.url+"&swfu="+swfu+'" frameborder=no scrolling=no width="'+params.width+'" height="'+params.height+'"></iframe>'; 
			    	$(domNode).appendTo(upload);
					var currentw=window.top.document.getElementById(swfu).contentWindow;
					var getswfu=setInterval(function(){
						if(currentw.swfu_arr[swfu]){
							currentw.swfu_arr[swfu].settings.upload_success_handler=function(file, serverData){
								if(serverData=="fail"){
									callback(file,serverData);
								}else{
									var d=$.parseJSON(serverData);
									callback(file,d);
								}
							}
							currentw.swfu_arr[swfu].settings.upload_progress_handler=function(file, bytesLoaded, bytesTotal){
								var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);
								upload_progress&&upload_progress(file,percent);
							}
							currentw.swfu_arr[swfu].settings.upload_error_handler=function(file, errorCode, message){
									if(errorCode=="-290"||errorCode=="-280"){
										if(errorCode=="-290"){
											show_msg("取消上传成功！")
										}
									}else{
										upload_error(file, errorCode, message);	
									}
									
							}
							window.clearInterval(getswfu);
						}
					},3000);	
				    
							
			},
			to_html:function(str){
				 if(!str){
					 return false;
				 }
				 //str含有HTML标签的文本
				 str = str.replace(/&lt;/g,"<");
				 str = str.replace(/&gt;/g,">");
				 str = str.replace(/&nbsp;/g," ");
				 str = str.replace(/<br>/g,"\n");
				 str = str.replace(/&amp;/g,"&");
				 str = str.replace(/&quot;/g,"'");
				 return str;
				
			},
			move_up:function(current,params){
				var temp_next_id,c_chr_=[],curr_p="",self=this,_callbackstatus=3,prev;
				
					c_chr_=$("tr").siblings("[id^='"+current+"']");
					curr_p=$("#"+current).attr("parent");
					if(curr_p!="node-"){//
						prev = $("#"+current).prevAll("[parent='"+curr_p+"']:first");	 
					}else{
						prev = $("#"+current).prevAll("[parent='node-']:first");	 
					}
				
				if(prev.length>0){
					params.data.update_id=prev.attr("id");
					 if(c_chr_.length>1){//当前节点有子集
						 self.move_node_request(params,function(d){
							 if(d.status==_callbackstatus){
								 if(curr_p!="node-"){//
									 $("#"+current).prevAll("[parent='"+curr_p+"']:first").before(c_chr_);	 
								 }else{
									 $("#"+current).prevAll("[parent='node-']:first").before(c_chr_);	 
								 }
							 }
							 
						 });
					 }else{//当前节点没有子集
						 self.move_node_request(params,function(d){
							 if(d.status==_callbackstatus){
								 if(curr_p!="node-"){
									 var targetNode,currentNode,t_id,t_up_prev;
									 	 currentNode=$("#"+current);
									 	 targetNode=$("#"+current).prevAll("[parent='"+curr_p+"']:first");
									 	 targetNode.before(currentNode);	
								 }else{
									 var targetNode,currentNode,t_id,t_up_prev;
										 currentNode=$("#"+current);
									 	 targetNode= $("#"+current).prevAll("[parent='node-']:first");
									 	 targetNode.before(currentNode);	
								 }
								 
							 }
							 
						 });
					 }
						
				}else{
					//不让移动
				}
				
			},
			move_down:function(current,params){
				var temp_next_id,c_chr_=[],arr_=[],curr_p="",self=this,_callbackstatus=3,next;
				 c_chr_=$("tr").siblings("[id^='"+current+"']");//获取要移动的节点
				 curr_p=$("#"+current).attr("parent");//获取当前的parent属性
				 if(curr_p!="node-"){
					 next=$("#"+current).nextAll("[parent='"+curr_p+"']:first");
				 }else{
					 var t,sid;
					 //根目录向下移动 首先获取下一个根目录，然后在根据根目录的id去找它的最后一个tr,然后插入到其后面
					 t=$("#"+current).nextAll("[parent='node-']:first");
					 sid=t.attr("id");
					 if(t.next().attr("parent")==sid){
						 next=t.nextAll("[id^='"+sid+"']:last");
					 }else{
						 next=t;
					 }
				 }
				if(next.length>0){
					params.data.update_id=next.attr("id");
					 if(c_chr_.length>1){//当前节点有子集
						 self.move_node_request(params,function(d){
							 if(d.status==_callbackstatus){
								 if(curr_p!="node-"){//非根目录的情况下移动后去后面的第一个也就是最后一个的元素
									var curr_p_node= $("#"+current).nextAll("[parent='"+curr_p+"']:first");
										curr_p_id=curr_p_node.attr("id");
									 //判断target节点是否子节点
									 if(curr_p_node.next().attr("parent")==curr_p_id){
										 curr_p_node.nextAll("[id^='"+curr_p_id+"']:last").after(c_chr_);
									 }else{
										 $("#"+current).nextAll("[parent='"+curr_p+"']:first").after(c_chr_);	
									 }
								 }else{
									 var t,sid;
									 //根目录向下移动 首先获取下一个根目录，然后在根据根目录的id去找它的最后一个tr,然后插入到其后面
									 t=$("#"+current).nextAll("[parent='node-']:first");
									 sid=t.attr("id");
									
									 if(t.nextAll("[id^='"+sid+"']:last").length>0){
										 t.nextAll("[id^='"+sid+"']:last").after(c_chr_);
									 }else{
										 t.after(c_chr_);
									 }
								 }
								 	 
							 }
							 
						 });
					 }else{//当前节点没有子集
						 self.move_node_request(params,function(d){
							 if(d.status==_callbackstatus){
								 if(curr_p!="node-"){
									 $("#"+current).nextAll("[parent^='"+curr_p+"']:last").after($("#"+current));
								 }else{
									 var t,sid;
									 //根目录向下移动 首先获取下一个根目录，然后在根据根目录的id去找它的最后一个tr,然后插入到其后面
									 t=$("#"+current).nextAll("[parent='node-']:first");
									 sid=t.attr("id");
									 if(t.next().attr("parent")==sid){
										t.nextAll("[id^='"+sid+"']:last").after($("#"+current));
									 }else{
										 t.after($("#"+current));
									 }
									 
								 }
							 }
							 
						 });
					 }
						
				}else{
					//不让移动
				}
				
			},
			move_node_request:function(params,call){
				var self=this;
				self.service(params,function(d){
					call(d);
				});
			},
			_init_load_js:function(){
				//var self=this;
				//config&&self._lazyload("http://"+config.domain.statics+"/orgmange/js/placeholders.js", 1000);
			},
			//_lazyload:function(src,timer){
			//	var script_elem;
			//	setTimeout(function(){
			//		  script_elem = document.createElement('script');
			//		  script_elem.type = 'text/javascript';
			//		  script_elem.src = src;
			//		  script_elem.charset="utf-8";
			//		  document.getElementsByTagName('head')[0].appendChild(script_elem);
			//	},timer);
			//},
			paging:function(pagecount,pageNode,pageselectCallback){
				var opt = {callback:pageselectCallback};
				    opt.items_per_page=this.pagesize;
				    opt.prev_text ="上一页";
				    opt.next_text ="下一页";
			    $("#"+pageNode).pagination(pagecount,opt);
			    
			},
			SearchEvent:function()
			{
			    if(document.all) return  window.event;  

			    func = this.SearchEvent.caller;  

			    while(func!=null){
			        var  arg0=func.arguments[0];  

			        if(arg0 instanceof Event) {
			            return  arg0;
			        }
			       func=func.caller;
			    }
			    return   null;
			},
			pagesize:10
	}
	$.jhh.cm._init_load_js();
});

/**
 * 数组删除
 */
Array.prototype.remove=function(dx)
{
　if(isNaN(dx)||dx>this.length){return false;}
　for(var i=0,n=0;i<this.length;i++)
　{
　　　if(this[i]!=this[dx])
　　　{
　　　　　this[n++]=this[i]
　　　}
　}
　this.length-=1
}
/**
 * 数组去重
 */
Array.prototype.unique = function() {
	    var res = [], hash = {};
	    for(var i=0, elem; (elem = this[i]) != null; i++)  {
	        if (!hash[elem])
	        {
	            res.push(elem);
	            hash[elem] = true;
	        }
	    }
	    return res;
}

/**
 * 公共显示信息方法
 * @param msg
 */
function show_msg(msg)
{
	$.jhh.cm.show_dialog({title:"来自网页的消息提示",width:"200",height:"140",btnNames:{"确定":function(){$(this).dialog( "destroy" );}},msg:msg});
}

/* 浏览器检测 \x24 */ 
var _Util = _Util || {}; 

_Util.browser =  _Util.browser || function (w, d, n){ 

    /* userAgent */ 

    var u = n.userAgent.toLowerCase(), browser = {}; 

    browser.u = u; 

    /* 渲染模式 (标准CSS1Compat)*/

    browser.render = d.compatMode; 

    /* gecko */ 

    if(n.product === 'Gecko') browser.gecko = true; 

    /* webkit */ 

    if(/ applewebkit\/(\d+\.\d+)/i.test(u)) browser.webkit = RegExp['\x241']; 

    /* ie */ 

    if(!!w.ActiveXObject){ 

        browser.ie = /msie (\d+\.\d+)/i.test(u) ? RegExp['\x241'] : d.documentMode; 

        /* 引擎 */ 

        if(/\s+trident\/?(\d+\.\d+)?/i.test(u)) browser.trident = RegExp['\x241']; 

        /* 向后兼容模式 */ 

        browser.quirks = (d.compatMode == 'BackCompat'); 

        /* 标准模式 */ 

        browser.norm = d.documentMode; 

        return browser; 

    } 

    /* firefox */ 

    if(browser.gecko && /firefox\/(\d+\.\d+)/i.test(u)){ 

        browser.firefox = RegExp['\x241']; 

        return browser; 

    } 

    /* chrome */ 

    if(/chrome\/(\d+\.\d)/i.test(u)){ 

        browser.chrome = RegExp['\x241']; 

        return browser; 

    } 

    /* safari(chrome 相同) */ 

    if(browser.gecko && /\s+safari\/?(\d+\.\d+)?/i.test(u)){ 

        browser.safari = RegExp['\x241']; 

        return browser; 

    } 

    /* opera */ 

    if(!!w.opera && /opera(?:\/| )(\d+(?:\.\d+)?)/i.test(u)){ 

        browser.opera = RegExp['\x241']; 

        /* 引擎 */ 

        if(/\s+presto\/?(\d+\.\d+)?/i.test(u)) browser.presto = RegExp['\x241']; 

        return browser; 

    } 

    return browser 

}(window, document, navigator); 

/**
 * 弹窗
 * @param
 * 
 */
_Util.showAutoBg=function(params){
	var loadNode='<div style="z-index: 10008; display: none;" id="loading"><img width="100" height="100" alt="" src="http://statics.yduedu.com/orgmange/images/img/loading2.gif"></div>',
		loadDom;
	if(typeof params=='boolean'){
		$(document.body).append(loadNode);
		loadDom=$("#loading");
	}
	
	$("#fullbg").show();
	$('#fullbg').css({
		"position": "absolute",
		"margin-left": "0px",
		"margin-top": "0px",
		"background-image": "url('http://statics.yduedu.com/orgmange/images/img/pngbg1.png')",
		"background-repeat":"repeat",
		"height": function () { return $(document).height(); },
		"filter": "alpha(opacity=30)",
		"opacity": "0.3",
		"overflow": "hidden",
		"width": function () { return $(document).width(); },
		"z-index": "10007",
		"text-indent":"-10000px"
	});	
	
	$(loadDom||params).css({
		"z-index":"10008"
	});
	
	$(loadDom||params).show();
	
	window.resize=function(){
		$(loadDom||params).css({
		"z-index":"10008"
		});
	};
};
_Util.hideAutoBg=function(params){
	if(typeof params=='boolean'){		
		$("#loading").remove();
	}else{
		
	}
		$(params).hide();
		$("#fullbg").hide();
};
