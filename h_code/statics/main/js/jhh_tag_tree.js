//自定义类目js
function getUrlParam(name)
{
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r!=null) return unescape(r[2]); return null; //返回参数值
}
//替换指定传入参数的值,paramName为参数,replaceWith为新值
function replaceParamVal(paramName,replaceWith) {
    var oUrl = this.location.href.toString();
    var re=eval('/('+ paramName+'=)([^&]*)/gi');
    var nUrl = oUrl.replace(re,paramName+'='+replaceWith);
        nUrl +='&ajax_flag=y';
    //alert('nUrl: '+nUrl);
    //this.location = nUrl;
    get_goods_list(paramName, replaceWith ,1,50,nUrl,0,0,0);
}
function sub_show_hide(tree_name, id) {
	//$("#video_cate_id").val(id);
	//var test=$("#video_cate_id").val();
	var is_class ="",isnode;

        if($("#"+tree_name+'-'+id+" span").length>0){
            isnode=$("#"+tree_name+'-'+id+" span")
            is_class= isnode.attr("class");
        }else{
            isnode= $("#"+tree_name+'-'+id+" b");
            is_class= isnode.attr("class");
        }
        if (window.event) {
            $.jhh.cm.SearchEvent().cancelBubble=true;
        } else {
            $.jhh.cm.SearchEvent().stopPropagation();
        }
        if(is_class == 'addico')
        {
            isnode.removeClass("addico").addClass("addico_2");
        }
        else if(is_class == 'addico_2')
        {
            isnode.removeClass("addico_2").addClass("addico");
        }
        $("#"+tree_name+'-'+id+"-sub").toggle();
}

//无刷新获取分页数据 shenys@yudedu.com date 14/08/11
function get_list(tree_name, id) {
	var url  = '';
	var cate_id = getUrlParam('cate_id');
    var type = '' ;

    $("#"+tree_name+"-0-sub li label").removeClass("this");
    $("#"+tree_name+'-show-'+id).addClass("this");
    if(tree_name == 'exam'){
        $("#"+tree_name+'-0').addClass("this");
    }else if(tree_name == 'microlecture'){
        $("#"+tree_name+'-0').addClass("this");
    }
    
    if(tree_name.indexOf('exam') != -1){ //试题
        type = 'exam'; 
    }else if(tree_name.indexOf('microlecture') != -1){ //微课程
        type = 'microlecture'; 
    }else if(tree_name.indexOf('video') != -1){ //video
        type = 'video'; 
    }

	if(parseInt(cate_id) > 0){
		replaceParamVal('cate_id',id);
//		url = window.location.href;//bu sunzheng
	}else{
		url += window.location.href+(window.location.search?'&':'?')+'cate_id='+id;
        //alert(url);
		//window.location.href = url ;
        url +='&ajax_flag=y';
        get_goods_list(tree_name,type, id ,1,50,url,0,0,0);
	}
	
	return false;
}

//ajax方式获取数据
function get_goods_list(tree_name, type,cate_id, curr_page,page_size,url,key,flag,goods_id,goods_name,status,video_id){
            
            $('#cate_id').val(cate_id);
            var list_html = '', temp = 0;
            //var url = "<?php echo ORG_WEB_ROOT;?>exam/index/"+curr_page+"/" + cate_id + "/y/";
            var all_url = url+'&curr_page='+curr_page;
            var params='';
            if(flag == 1){ //search
                params = {type:"post",url:all_url, data:{'key':key,'micro_goods_id':goods_id,'goods_name':goods_name,'status':status,'video_id':video_id}, dataType:"json",isAsync:"false"};
            }else{ //tag_tree
                params = {type:"post",url:all_url, data:{}, dataType:"json",isAsync:"false"};
            }
            _Util.showAutoBg(true);
            $.jhh.cm.service(params,function(data)
            {
                _Util.hideAutoBg(true);
                if(data.status == 4)
                {
                    list_html = list_html + '<table width="75%" border="0" cellspacing="0" cellpadding="0">\n';
                    list_html = list_html + '<tbody>\n';
                    list_html = list_html + '<tr>\n';
                    if(tree_name.indexOf('exam') != -1){ //试题
                            list_html = list_html + '<td width="3%" align="center" height="35"><input type="button" onclick="javascript:check_all(1);" class="gray80 floatL" value="全选" id="check_all_id" style="margin:0 20px;"></td>\n';
                            list_html = list_html + '<td width="6%" align="center" height="35">试题ID</td>\n';
                            list_html = list_html + '<td width="20%" align="center" ><b>试题名称</b></td>\n';
                            list_html = list_html + '<td width="10%" align="center"><b>题型</b></td>\n';
                            list_html = list_html + '<td width="10%" align="center"><b>答案</b></td>\n';
                            list_html = list_html + '<td width="20%" align="center"><b>知识点绑定</b></td>\n';
                            list_html = list_html + '<td width="10%" align="center"><b>操作</b></td>\n';
                    }else if(tree_name.indexOf('microlecture') != -1){ //微课程
                            list_html = list_html + '<tr>\n';
                            list_html = list_html + '<td height="40" colspan="7">';
                            list_html = list_html + '<input type="button" onclick="javascript:check_all(1);" class="gray80 floatL" value="全选" id="check_all_id" style="margin:0 20px;">';
                            list_html = list_html + '<input type="button" onclick="javascript:move_goods();" class="gray80 floatL" value="移动商品">';
                            list_html = list_html + '</td>';
                            list_html = list_html + '</tr>\n';
						  	list_html = list_html + '<td width="6%" align="center"><b>排序</b></td>';
							list_html = list_html + '<td width="6%" align="center" height="35"><b>ID</b></td>';
							list_html = list_html + '<td width="26%" align="center"><b>商品名称</b></td>';
							list_html = list_html + '<td width="18%" align="center"><b>价格</b></td>';
							list_html = list_html + '<td width="18%" align="center"><b>有效期</b></td>';
							list_html = list_html + '<td width="10%" align="center"><b>状态设置</b></td>';
                    
                    }else if(tree_name.indexOf('video') != -1){ //视频
                            list_html = list_html + '<td width="5%" align="center"><b>视频id</b></td>';
                            list_html = list_html + '<td height="35" colspan="2" align="center"><b>视频名</b></td>';
                            list_html = list_html + '<td width="15%" align="center"><b>上传时间</b></td>';
                            list_html = list_html + '<td width="8%" align="center"><b>讲义</b></td>';
                            list_html = list_html + '<td width="13%" align="center"><b>大小</b></td>';
                            list_html = list_html + '<td width="11%" align="center"><b>查看</b></td>';
                            list_html = list_html + '<td width="11%" align="center"><b>操作</b></td>';
                            list_html = list_html + '<td width="11%" align="center"><b>状态</b></td>';
                            list_html = list_html + '<td width="11%" align="center"><b>微课程状态</b></td>';
                            list_html = list_html + '<td width="11%" align="center"><b>知识点</b></td>';
                    }
                    list_html = list_html + '</tr>\n';
                    //alert(data.questionList.data.length);
                    if(data.questionList.data)
                    {
                            if(tree_name.indexOf('exam') != -1){ //试题
                                for(var i = 0; i < data.questionList.data.length; i ++){

                                        list_html = list_html + '<tr>\n';
                                        list_html = list_html + '<td align="center" height="32"><input type="checkbox" name="goods_id" id="goods_id"';
                                        list_html = list_html + ' value="' + data.questionList.data[i].id+'" /></td>';
                                        list_html = list_html + '<td align="center" height="32"><span>'+data.questionList.data[i].id+'</span></td>\n';
                                        list_html = list_html + '<td align="center" height="32"><span>'+data.questionList.data[i].title+'</span></td>\n';
                                        list_html = list_html + '<td align="center" height="32"><span>'+data.questionList.data[i].cate_name +'</span></td>\n';
                                        list_html = list_html + '<td align="center" height="32"><span>'+data.questionList.data[i].correct_answer +'</span></td>\n';
                                        list_html = list_html + '<td align="center" height="32"><span>'+data.questionList.data[i].title_info +'</span></td>\n';

                                        list_html = list_html + '<td align="center"><span>';
                                        list_html = list_html + '<a href="/question/edit?id=' + data.questionList.data[i].id +'" class="corblue marr5" target="_blank">编辑</a>';
                                        list_html = list_html + '<a href="javascript:void(0)" onclick="javascript:showQuestion(this);" rel="' + data.questionList.data[i].id +'" target="" class="corblue marr5">查看</a>&nbsp;';
                                        list_html = list_html + '<a href="javascript:void(0)" onclick="javascript:ajaxDel(this);" rel="' + data.questionList.data[i].id + '" class="corblue">删除</a>&nbsp;';
                                        list_html = list_html+'</span></td>';

                                        list_html = list_html + '</tr>\n';
                                }
                            }else if(tree_name.indexOf('microlecture') != -1){ //微课程
                                for(var i = 0; i < data.questionList.data.length; i ++){
                                        list_html = list_html + '<tr>\n';
                                         
                                        list_html = list_html + '<td align="center"><span rel="'+data.questionList.data[i].goods_sort+'"><input type="text" name="sort" size="5"  class="com_id" value="'+data.questionList.data[i].goods_sort+'" onblur="save_goods_sort(this)"/></span></td>';
                                        list_html = list_html + '<td align="center" height="31"><span>'+data.questionList.data[i].id+'</span></td>';
                                        list_html = list_html + '<td align="center"><span class="couse_name" style="width:auto;padding:0 5px;display:block;" title="'+data.questionList.data[i].goods_name+'"><label><input name="goods_id" type="checkbox" style="float:left;margin:5px 5px 0 0;" value="'+data.questionList.data[i].id+'" />'+data.questionList.data[i].goods_name+'</label></span></td>';
                                        list_html = list_html + '<td align="center"><span>'+data.questionList.data[i].real_price+'</span>元<a href="javascript:void(0)" rel="'+data.questionList.data[i].id+'" onclick="up_price(this)" class="edit_jg">修改</a></td>';
                                        list_html = list_html + '<td align="center"><span class="yxq">'+data.questionList.data[i].valid_date_num+'</span>天 <a href="javascript:void(0)" rel="'+data.questionList.data[i].id+'" onclick="up_validity(this)" class="edit_jg">修改</a></td>';
                                        list_html = list_html + '<td align="center"><span><a href="javascript:change_status(' + data.questionList.data[i].id + ',' + data.questionList.data[i].status + ');" id="change_status_' + data.questionList.data[i].id + '">';
                                        if(data.questionList.data[i].status == 4){
                                            list_html = list_html +'已开启';
                                        }else{
                                            list_html = list_html +'已关闭';
                                        }
                                        list_html = list_html + '</a></span></td>';
                                        list_html = list_html + '</tr>\n';
							  
                                    }
                            }else if(tree_name.indexOf('video') != -1){ //视频
                                for(var i = 0; i < data.questionList.data.length; i ++){      
                                    list_html = list_html + '<tr>\n';
                                    list_html = list_html + '<td align="center" width="10%"><span">'+data.questionList.data[i].id+'</span></td>';
                                    list_html = list_html + '<td align="center" height="32"  width="4%"><span><input type="checkbox" name="video_name" value="'+data.questionList.data[i].id+'" /></span></td>';
                                    list_html = list_html + '<td align="center" width="16%"><span style="width:90px;"   >'+data.questionList.data[i].title+'</span></td>';
                                    list_html = list_html + '<td align="center" width="15%"><span style="width:120px;">'+data.questionList.data[i].created_time+'</span></td>';
                                    list_html = list_html + '<td align="center" width="8%"><span style="width:43px;">'+data.questionList.data[i].ppt_val+'</span></td>';
                                    list_html = list_html + '<td align="center" width="8%"><span style="width:70px;">'+data.questionList.data[i].video_size+'</span></td>';
                                    list_html = list_html + '<!--<td align="center"><span><a class="corblue" href="javascript:vido(0);" onclick="show_video_info('+data.questionList.data[i].id+'); return false;">预览</a></span></td>-->';
                                    list_html = list_html + '<td align="center" width="11%"><span style="width:60px;"><a class="corblue" href="/video_bind_knowledge/showList?id='+data.questionList.data[i].id+'" target="_blank">视频预览/绑定知识点</a></span></td>';


                                    list_html = list_html + '<td align="center" width="11%"><span style="width:60px;">';
                                    list_html = list_html + '<a class="corblue" href="/video/exchange_vid?id='+data.questionList.data[i].id+'">改视频id</a></span>';
                                    if(data.questionList.data[i].ppt_pic_val){
                                           list_html = list_html +' <a class="corblue" href="/video/ppt_show?id='+data.questionList.data[i].id+'" target="_blank">查看讲义</a></span><span style="width:60px;">';
                                    
                                    }else{
                                            list_html = list_html + '<span class="corgray">查看讲义</span>';
                                    }
                                    list_html = list_html + '<a class="corblue" href="/video/add?id='+data.questionList.data[i].id+'">修改</a></span></td>';
                                    list_html = list_html + '<td align="center" width="11%"><span class="corfo" style="width:60px;">'+data.questionList.data[i].video_status+'</span></td>';
                                    list_html = list_html + '<td align="center" width="11%"><span style="width:60px;">';
                                    if(data.questionList.data[i].micro_goods_id != 0){
                                            list_html = list_html + '已发布<br>ID:<a class="corblue" href="/microlecture/index?micro_goods_id='+data.questionList.data[i].micro_goods_id+'" >'+data.questionList.data[i].micro_goods_id+'</a>';
                                    }else{
                                            list_html = list_html + '未发布';
                                    }
                                    list_html = list_html + '</span></td>';
                                    list_html = list_html + '<td align="center" width="11%"><span style="width:60px;" ';
                                    //alert(data.questionList.data[i].video_tag_show);
                                    if(data.questionList.data[i].video_tag_show == "未添加"){
                                            list_html = list_html + 'class="corfo"';
                                    }
                                    list_html = list_html + '>'+data.questionList.data[i].video_tag_show+'</span></td>';
                                    list_html = list_html + '</tr>\n';
                                }
                                    
                                list_html = list_html + '<tr>';
                                list_html = list_html + '<td align="left" colspan="9"  height="32">';
                                list_html = list_html + '<span>';
                                list_html = list_html + '<input id="chk_all" class="chebox_1" type="checkbox" onclick="$.jhh.cm.checkAll(\'chk_all\',\'video_name\');" />全选 &nbsp;&nbsp;&nbsp;';
                                list_html = list_html + '<a class="corblue marr5" href="javascript:void(0)" onclick="del_all();">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                list_html = list_html + '<a class="corblue marr5" href="javascript:void(0)" onclick="get_video_all();">计算视频总时长</a>&nbsp;&nbsp;&nbsp;&nbsp;<label id="show_video_play_time" ></label>';
                                list_html = list_html + '<a class="corblue marr5" href="javascript:void(0)" onclick="one_button_publish_all();">一键发布为微课程</a>&nbsp;&nbsp;&nbsp;&nbsp;';
                                list_html = list_html + '</span>';
                                list_html = list_html + '</td>';
                                list_html = list_html + '</tr>';
                            }
                    }
                    list_html = list_html + '</tbody>\n';
                    list_html = list_html + '</table>\n';

                    //alert(data.page_size);
                    if(flag == 1){ //search
                        get_js_page(tree_name,type, cate_id,curr_page,data.page_size, data.questionList.all_rows,url,key,flag,goods_id,goods_name,status,video_id);
                    }else{ //tag_tree
                        $('#key').val('');
                        get_js_page(tree_name,type, cate_id,curr_page,data.page_size, data.questionList.all_rows,url,key,flag);
                    }
                    //alert(data.page_size);
                    if(tree_name == 'exam'){ //试题
                        tree_name = 'exam_tag_model';
                    }else if(tree_name == 'microlecture'){ //微课程
                        tree_name = 'microlecture_cate_model'; 
                    }else if(tree_name == 'video'){ //视频
                        tree_name = 'video_tag_model'; 
                    }
                    //alert(list_html);
                    $("#"+tree_name).html(list_html);
                }
                else
                {
                    show_msg(data.questionList.msg);
                }
            });
}

/* 添加资源弹窗分页函数 type参数取值范围：{'video(优化)', 'exam(优化)','microlecture(优化)', 'course', 'live'}  */
//js 分页
function get_js_page(tree_name,type, cate_id,curr_page,page_size, rows_count,url,key,flag,goods_id,goods_name,status,video_id)
{
	var view_num = 7;
	var page_str = ''; 
    var param_str = '';
	var page_cnt = 0;
    if(!cate_id){
        cate_id = 0; 
    }
    //alert(cate_id);
	//var gift = $("#is_gift").val();
	if(rows_count > page_size)
	{
		page_cnt = Math.ceil(rows_count/page_size); //取整 +1
        var tmp = curr_page*page_size - page_size;
        if(tmp <= 0){
            curr_page = 1;
            tmp = 0;
        }
        tmp = tmp+1;     
		
		page_str = page_str + '<span>第'+tmp+'-'+curr_page*page_size+'项/共'+rows_count+'项</span>'+'<a href="javascript:';
        if(curr_page < 1){
            curr_page =1;
        }
		if(curr_page > page_cnt){
            curr_page = page_cnt; 
        }
		//if(curr_page > 1)
		//{
            param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ (curr_page-1) +','+ page_size+",'"+url+"','"+key+"',"+flag;
            if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                    param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
            }else if(tree_name.indexOf('video') != -1){ //search 视频 
                    param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
            }
			page_str = page_str + 'get_goods_list(' + param_str +');';
		//}
		page_str = page_str + '" class="pre">上一页</a>';
		if(page_cnt < view_num+1)
		{
			for(var i = 1; i < page_cnt+1; i++)
			{
				page_str = page_str + '<a href="javascript:';
				if(curr_page == i)
				{
					page_str = page_str + '" class="currend"';
				}
				else
				{
                    param_str ="'"+tree_name+"',"+ '\'' + type + '\',' + cate_id + ','+ i +','+ page_size+",'"+url+"','"+key+"',"+flag;
                    if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                            param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                    }else if(tree_name.indexOf('video') != -1){ //search 视频 
                            param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                    }

					page_str = page_str + 'get_goods_list(' + param_str +');"';
				}
				page_str = page_str + '>'+ i +'</a>';
			}
		}
		else
		{
			if((curr_page + 2) < (view_num))
			{
				for(var i = 1; i < view_num; i++)
				{
					page_str = page_str + '<a href="javascript:';
					if(curr_page == i)
					{
						page_str = page_str + '" class="currend"';
					}
					else
					{
                        param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ i +','+ page_size+",'"+url+"','"+key+"',"+flag;
                        if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                                param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                        }else if(tree_name.indexOf('video') != -1){ //search 视频 
                                param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                        }

						page_str = page_str + 'get_goods_list(' + param_str +');"';
					}
					page_str = page_str + '>'+ i +'</a>';
				}
				page_str = page_str + '<span>...</span>';
				page_str = page_str + '<a href="javascript:';
                param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ page_cnt +','+ page_size+",'"+url+"','"+key+"',"+flag;
                if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                        param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                }else if(tree_name.indexOf('video') != -1){ //search 视频 
                        param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                }
    
				page_str = page_str + 'get_goods_list(' + param_str +');"';
				page_str = page_str + '">'+ page_cnt +'</a>';
			}
			else if((curr_page + 2) < (page_cnt-1))
			{
				page_str = page_str + '<a href="javascript:';
                param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ',1,'+ page_size+",'"+url+"','"+key+"',"+flag;
                if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                        param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                }else if(tree_name.indexOf('video') != -1){ //search 视频 
                        param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                }

				page_str = page_str + 'get_goods_list(' + param_str +');"';
				page_str = page_str + '">1</a>';
				page_str = page_str + '<span>...</span>';
				
				for(var i = (curr_page -2); i <= (curr_page + 2); i++)
				{
					page_str = page_str + '<a href="javascript:';
					if(curr_page == i)
					{
						page_str = page_str + '" class="currend"';
					}
					else
					{
                        param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ i +','+ page_size+",'"+url+"','"+key+"',"+flag;
                        if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                                param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                        }else if(tree_name.indexOf('video') != -1){ //search 视频 
                                param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                        }

						page_str = page_str + 'get_goods_list(' + param_str +');"';
					}
					page_str = page_str + '>'+ i +'</a>';
				}
				
				page_str = page_str + '<span>...</span>';
				page_str = page_str + '<a href="javascript:';
                param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ page_cnt +','+ page_size+",'"+url+"','"+key+"',"+flag;
                if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                        param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                }else if(tree_name.indexOf('video') != -1){ //search 视频 
                        param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                }

				page_str = page_str + 'get_goods_list(' + param_str +');"';
				page_str = page_str + '">'+ page_cnt +'</a>';
			}
			else
			{
				page_str = page_str + '<a href="javascript:';
                param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ',1,'+ page_size+",'"+url+"','"+key+"',"+flag;
               
                if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                        param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                }else if(tree_name.indexOf('video') != -1){ //search 视频 
                        param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                }

				page_str = page_str + 'get_goods_list(' + param_str +');"';
				page_str = page_str + '">1</a>';
				page_str = page_str + '<span>...</span>';
				for(var i = (page_cnt - (view_num - 2)); i <= page_cnt; i++)
				{
					page_str = page_str + '<a href="javascript:';
					if(curr_page == i)
					{
						page_str = page_str + '" class="currend"';
					}
					else
					{
                        param_str = "'"+tree_name+"',"+'\'' + type + '\',' + cate_id + ','+ i +','+ page_size+",'"+url+"','"+key+"',"+flag;
                        if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                                param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                        }else if(tree_name.indexOf('video') != -1){ //search 视频 
                                param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                        }

						page_str = page_str + 'get_goods_list(' + param_str +');"';
					}
					page_str = page_str + '>'+ i +'</a>';
				}
			}
		}
		page_str = page_str + '<a href="javascript:';
		if(curr_page < page_cnt)
		{
                param_str = "'"+tree_name+"',"+'\''+type + '\',' + cate_id + ','+ (curr_page+1) +','+ page_size+",'"+url+"','"+key+"',"+flag;
                if(tree_name.indexOf('microlecture') != -1){ //search 微课程
                        param_str = param_str + ','+goods_id+",'"+goods_name+"',"+status;
                }else if(tree_name.indexOf('video') != -1){ //search 视频 
                        param_str = param_str + ','+0+",'"+0+"',"+0+','+video_id;
                }

                page_str = page_str + 'get_goods_list(' + param_str +');';
		}
		page_str = page_str + '" class="next">下一页</a>\n';
        page_str = page_str + '<input id="pages_num" type="text" value="" class="page_ys" />\n';
        page_str = page_str + '<input id="go_page_num" type="button" class="page_qd" value="确认" />\n';
	}
        //alert(page_str);
        $("#js_page").html(page_str);
        //确认跳转 到哪一页
        $("#go_page_num").click(function()
        {
                        var pages_num = $("#pages_num").val();
                        if(pages_num == ""){
                                alert("请输入页码！");
                                $("#pages_num").focus();
                        }else{
                                if(/^([0-9]+)$/.test(pages_num)){
                                        var h=$(this).siblings("a:first").attr("href");
                                        var s=h.split(",");
                                        if(s.length>3){
                                                s[3]=pages_num;
                                                window.location.href=s.join(",");
                                        } 
                                }else{
                                        alert("请输入正确的页码！");
                                        $("#pages_num").focus();
                                }
                        }
        });
}

function check_all(flag)
{
	if(flag == 1)
	{
		$("table input").attr('checked', 'checked');
		$("#check_all_id").attr('onclick', 'javascript:check_all(0);');
		$("#check_all_id").val('全不选');
	}
	else
	{
		$("table input").removeAttr('checked');
		$("#check_all_id").attr('onclick', 'javascript:check_all(1);');
		$("#check_all_id").val('全选');
	}
}

function show_cate()
{
	var cate_id = getUrlParam('cate_id');
	if(cate_id > 0)
	{
		var tab_ls = $(".list_tag_tree").attr('id');
		if(!tab_ls){
			return false;
		}
		var tag_model = tab_ls.split('-');
		$("#"+tag_model[0]+"-"+cate_id).parents("ul").css("display","block");
		$("#"+tag_model[0]+"-"+cate_id).find('label').addClass("this");
		var all_li = $("b.addico");
		if(all_li)
		{
			$.each(all_li,function(n,value) {
				if($(this).parent().next().is(":visible"))
				{
					$(this).removeClass("addico");
					$(this).addClass("addico_2");
				}
			});
		}
	}
} 
$(function(){
	show_cate();	
	
});
