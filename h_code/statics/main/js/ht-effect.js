/**
 * @author zhc
 * @param 
 * tid:tab id
 * cid:内容外层ID
 * params :{c}
 */
$(function(){
jQuery.jhh={
	tabs:function(tid,cid,params){	
		if(tid&&cid){
			var t=$("#"+tid).find("ul li.tabs_t").length>0?$("#"+tid).find("ul li.tabs_t"):$("#"+tid).find(".tabs_t"),c=$("#"+cid).children();
			if(t.length>0){
				$.each(t,function(i){
					$(this).attr("id",tid+"_t_"+i);
					if(params){
						//金衡网页面特殊处理
						if(params.c_event=="hover"){
							$(this).hover(function(){
								$(t).removeClass(params.t_currentClass);
								$.each(t,function(i){
									if(!$(this).hasClass(params.t_otherClass)){
										$(this).addClass(params.t_otherClass);
									}
								});
								
								$(this).removeClass(params.t_otherClass).addClass(params.t_currentClass);
								$(c).hide();
								$("#"+cid+"_c_"+i).show();
							},function(){
								$(this).removeClass(params.t_currentClass).addClass(params.t_otherClass);
								$("#"+cid+"_c_"+i).hide();
							});
						}else{
							$(this).bind(params.c_event||"mouseover",function(){
								$(t).removeClass(params.t_currentClass);
								$.each(t,function(i){
									if(!$(this).hasClass(params.t_otherClass)){
										$(this).addClass(params.t_otherClass);
									}
								});
								
								$(this).removeClass(params.t_otherClass).addClass(params.t_currentClass);
								$(c).hide();
								$("#"+cid+"_c_"+i).show();
							});
						}
					}else{
						return;
					}
				});
							
			}
			if(c.length>0){
				$.each(c,function(i){
					$(this).attr("id",cid+"_c_"+i);
					//金衡网页面特殊处理
					if(params.c_event=="hover"){
						$("#"+cid+"_c_"+i).hover(function(){
							$("#"+tid+"_t_"+i).removeClass(params.t_otherClass).addClass(params.t_currentClass);
							$(this).show();
						},function(){
							$("#"+tid+"_t_"+i).removeClass(params.t_currentClass).addClass(params.t_otherClass);
							$(this).hide();
						});
					}
				});
			}
			//默认选中
			if(params&&params.position>=0){
				$(t).removeClass(params.t_currentClass);
				$.each(t,function(i){
					if(!$(this).hasClass(params.t_otherClass)){
						$(this).addClass(params.t_otherClass);
					}
					if(params.position==i){
						$(this).addClass(params.t_currentClass);
						$(c).hide();
						$("#"+cid+"_c_"+i).show();
					}
				});
				
			}
		}
	},
	//滑过
	glide:function(gid,currentClass,event){
		if(gid){
			
			if(event=="hover"){
				$(gid+" a").hover(function(){	
					if(!$(this).hasClass("current")){
						if($.browser.msie&&$.browser.version=="6.0"){
							$(this).addClass(currentClass).css("background-position","left -620px");	
						}else{
							$(this).addClass(currentClass);	
						}
						
					}
										
				},function(){
					
						if($.browser.msie&&$.browser.version=="6.0"){
							if($(this).hasClass("current")){
							 $(this).removeClass(currentClass).css("background-position","left -575px");	
							}else{
							 $(this).removeClass(currentClass).css("background-position","left -664px");	
							}	
						}else{
							$(this).removeClass(currentClass);	
						}
							
						
				});
			}else{
				$(gid+" a").on(event,function(){					
					
					if($.browser.msie&&$.browser.version=="6.0"){
						$(gid+" a.current").removeClass(currentClass).css("background-position","left -664px");
					}else{
						$(gid+" a.current").removeClass(currentClass);
					}

					if($.browser.msie&&$.browser.version=="6.0"){
						$(this).addClass(currentClass).css("background-position","left -575px");
					}else{
						$(this).addClass(currentClass);	
					}
					
				});
			}
		}
	},
	/**
	 * list 类型为 Array （固定格式结构传入ul）
	 * [{aid:'aid',subid:'subid'}]
	 * type:nav|""
	 */
	showSub:function(list,type){
		if(list.length>0 && typeof(list)=="object"){
			 if(type=="nav"){
				 $.each(list,function(i,item){
					 $("#"+item.aid).hover(function(){
							$("#"+item.subid).show();        
					 },function(){
							$("#"+item.subid).hide();
					 });
				 });
			 }			 
		}else{
			$("#"+list+" li").hover(function(){
				if($(this).index()!=0){
				  $(this).find("a:first").addClass("current");
				  $(this).find("div.headnav_t").show();
				  if($.browser.msie&&$.browser.version=="6.0"){
							$(this).find("a:first").css("background","url("+$.jhh.static_url+"/orgmange/images/img/zhy_htbg_1.png) no-repeat left -126px");
				  }
				 
				}
				
			},function(){
				if($(this).index()!=0){
					if(!$(this).attr("event_click")){
						$(this).find("a:first").removeClass("current");
						if($.browser.msie&&$.browser.version=="6.0"){
							$(this).find("a:first").css("background","none");
						}
					}
					
					$(this).find("div.headnav_t").hide();
				}
			}).click(function(){
				$(this).siblings().removeAttr("event_click");
				$(this).siblings().find("a").removeClass("current");
				$(this).find("a:first").addClass("current");
				$(this).attr("event_click","true");
				if($.browser.msie&&$.browser.version=="6.0"){
					$(this).siblings().find("a").css("background","none");
				}				
				
			});
		}
	},
	/**
	 * 点击按钮换一组图片
	 * @params
	 * w,container,page,img_num,size,r_btn,l_btn
	 */
	scollPane:function(p){
		var $page_count=Math.ceil(p.img_num/p.size);
		//如果是第一页，点击向左，那么就跳转到最后一页
		$(p.l_btn).click(function(){
	        if(p.page==1){
	        		p.container.stop(true,false).animate({'margin-left':"-="+p.w*($page_count-1)+"px"},600);
	                p.page=$page_count;
	        }else{
	        		p.container.stop(true,true).animate({'margin-left':"+="+p.w+'px'},600);
	        		p.page--;
	        }
	    });
	    
		//如果是最后一页，点击向右，那么就跳转到第一页
	    $(p.r_btn).click(function(){
	    	if(p.page==$page_count){
		    		p.container.stop(true,true).animate({'margin-left':0+'px'},600);
		            p.page=1;
	        }else{
	                p.container.stop(true,true).animate({'margin-left':"-="+p.w+'px'},600);
	                p.page++;
	        }
	    });
	    
	}
};
}); 


