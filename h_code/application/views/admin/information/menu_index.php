<link href="<?php echo STATICS_PATH_CSS;?>/zh_permissions_gl.css" type="text/css" rel="stylesheet" />
<script>
$(function(){
	//$.jhh.tabs("lg_tabs_t","lg_tabs_c",{t_otherClass:"other",t_currentClass:"this",c_event:"click"}); 	
	$(".dx_list input").click(function(e){
		if($(e.target).prop("checked")){
			$(this).siblings("div.pad_l").find("input").attr('checked','checked');
		}else{
			$(this).siblings("div.pad_l").find("input").removeAttr('checked');
		}

		var val = $(this).attr('id');
		var val_array = val.split('_');
		if(val_array.length >2){
			if($(e.target).prop("checked")){
				var param  = val_array[0]+'_'+val_array[1];
				$('#'+param).attr('checked','checked');
				for(var i=1,len=val_array.length;i<len;i++){
					$('#'+param+'_'+val_array[i]).attr('checked','checked');
				}
			}
		}

		var ischeck=false,current_div=$(this).parents('.glqx_con'),parent_div=$(this).parents('.pad_l');
		$.each(current_div.find("input"),function(i,item){
			if($(this).prop("checked")){
				ischeck=true;
			}
		});
		if(ischeck){
			//不许换结构
			current_div.prev().attr("checked","checked");
		}else{
			current_div.prev().removeAttr("checked");
		}

		
	});


	
	$("span.tab_menu b").live('click',function(){
		if($(this).parent('span').hasClass('current')){
			$(this).parent('span').removeClass('current');
		}else{
			$(this).parent('span').addClass('current');
		}
		$(this).parent('span').next('div.pad_l').toggle();
	})
	
	$("div span").hover(
		function(){
			var html = '<a href="javascript:"  class="menu_up">&nbsp;&nbsp;修改</a><a href="javascript:"  class="menu_del">&nbsp;&nbsp;删除</a>';
			$(this).append(html);
		},
		function(){
			$(this).find('a').remove();
		}
	);
	$(".menu_up").live('click',function(){
		var menu_id = $(this).parent('span').attr('rel');
		//请求数据
		 params={type:"post",url:"/information_menu/getMenuOne",data:{id:menu_id}};
		 _util.ajax(params,function(d){//ajax返回结果
			 if(d.code == 45110){
				 $("input[name='id']").val(d.data.id);
				 $("input[name='name']").val(d.data.name);
				 $("input[name='module']").val(d.data.module);
				 $("input[name='menu_class']").val(d.data.menu_class);
				 $("input[name='function']").val(d.data.function);
				 $("select[name='parent_id']  option:selected").removeAttr('selected');
				 $("select[name='parent_id']").attr("value",d.data.parent_id);;
				 $("input[name='display']").removeAttr('checked');
				 $("input[name='display']").eq(parseInt(d.data.display)-1).attr('checked','checked');
			 }else{
				 $.jhh.cm.show_dialog({msg:d.msg,width:200,height:80});
				 return false;
			 }
			 
		 });
	});
	$(".menu_del").live('click',function(){
		var self = $(this);
		var menu_id = $(this).parent('span').attr('rel');
		var menu_next_list_id = []
		$(this).parent('span').next('div').find("input[type='checkbox']").each(function(){
			menu_next_list_id.push($(this).val());
		});
		var new_next_id = menu_next_list_id.join(',');
		//请求数据
		 params={type:"post",url:"/information_menu/menuDel",data:{id:menu_id,id_list:new_next_id}};
		 _util.ajax(params,function(d){//ajax返回结果
			 if(d.code == 45101){
				 self.parent('span').parent('div').remove();
			 }else{
				 $.jhh.cm.show_dialog({msg:d.msg,width:200,height:80});
				 return false;
			 }
			 
		 });
	});
	$("#qingkong").click(function(){
		$("input[name='id']").val('');
		 $("input[name='name']").val('');
		 $("input[name='module']").val('');
		 $("input[name='menu_class']").val('');
		 $("input[name='function']").val('');
		 $("input[name='display']").removeAttr('checked');
		 $("input[name='display']").eq(0).attr('checked','checked');
	})

});


</script>
<style>
	p{padding:5px;}
</style>
	<!--右侧-->
	<div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="#">圣康金融云平台</a><b>></b><a href="#">机构</a><b>></b><a href="#">信息管理</a><b>></b><span>网站功能权限管理</span></div>
                </li>
                <li id="widget_3">
                    <div class="pubinfor">
                      <form action="<?php echo base_url('/information_menu/saveMenu');?>" method='POST'>
                      		<input type="hidden" name="id" value=""/>
							<p>菜单名：<input type="text" name="name" style="border:1px solid #DDDDDD;height:24px;padding:0 5px;" /></p>
							<p>模块名：<input type="text" name="module" value="<?php if(isset($menu_cookie[0])){echo $menu_cookie[0];}?>" style="border:1px solid #DDDDDD;height:24px;padding:0 5px;" /></p>
							<p>类名：<input type="text" name="menu_class"  value="<?php if(isset($menu_cookie[1])){echo $menu_cookie[1];}?>" style="border:1px solid #DDDDDD;height:24px;padding:0 5px;" /></p>
							<p>方法名：<input type="text" name="function"  value=""  style="border:1px solid #DDDDDD;height:24px;padding:0 5px;" /></p>
							<p>父级：
								<select name="parent_id" >
									<option value='0'>顶级栏目</option>
									<?php echo isset($menu_cookie[2])?getNav($menu_list,0,$menu_cookie[2]):getNav($menu_list,0,0);?>
								</select>
							</p>
							<p>是否导航显示：<label>是<input type="radio" name="display" value='1' checked /></label><label>否<input type="radio" name="display" value='2' /></label></p>
							<p><input type="hidden" name="psubmit" value="submit" /><input type="submit" value="保存" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id='qingkong' value="清空" /></p>
						</form>
                    </div>
                </li>
                <form action="<?php echo base_url('/information_menu/save');?>" method='POST'>
                 <li id="widget_3">
                    <div class="pubinfor">
                        <div class="l_name">需要绑定的账号：</div>
                        <div class="c_tet"><input type="text" name="auth[email]" value="" class="txt1" /></div>
                        <input type="hidden" name="auth[privilege_id]" value="<?php if(isset($privilege_id)){echo $privilege_id;}?>" />
                        <input type="submit" value="绑定" class="blue60 floatL" />
                    </div>
                </li>
                <li id="widget_2" class="widget">
                	<div class="wid_head">
                    	<h4>网站功能权限</h4>
                    </div><!--wid_head-->
                    <div class="wid_con">
                    	<div class="con_l" id="lg_tabs_t">
                            <ul>
                            	<?php foreach($menu_list as $k=>$v):?>
                            		<li class="tabs_t <?php if($k==0){echo 'this';}else{echo 'other';}?>"><?php echo $v['name']?></li>
                            	<?php endforeach;?>
                            </ul>                        
                        </div><!--con_l-->
                        
                        <div class="con_r" id="lg_tabs_c">
                        
                        	<?php foreach($menu_list as $k=>$v):?>
                        	<div  class="choose_menu <?php if($k==0){echo 'nav1';}else{echo 'nav2';}?>">
                        	<input type="checkbox" value="<?php echo $v['id']?>" name="auth[menu][]" style="display:none" <?php if(isset($org_auth) && in_array($v['id'], $org_auth)){echo 'checked';}?>/>
                            	<div class="glqx_con">
                                	<div class="l_t">管理权限：</div>
                                    <div class="r_t">
                                    <?php if(isset($v['list'])){echo htmlMenu($v['list'], 1);}?>
                                    </div><!--r_t-->
                                </div><!--glqx_con-->
                            </div>
                            <?php endforeach;?>
                        </div><!--con_r-->
                    </div><!--wid_con-->
                </li>
                </form>
                <li id="widget_3"><div class="bupadd"></div></li>
            </ul>
        </div><!--#right_1-->
        
<?php 

function htmlMenu($data,$num,$org_auth=array(),$pstr='p'){
	$str = '';
	if($num > 1){
		$str .= '<div class="pad_l" style="display:block;">';
	}

	foreach($data as $k=>$v){
		$current = (isset($org_auth) && in_array($v['id'], $org_auth))?'checked':'';
		$vstr = $pstr.'_'.$v['id'];
		if($v['display'] == 1){$color='#377744';}else{$color='#bdbdbd';}
		$str .= '<div class="dx_list">';
		if(!empty($v['list'])){
			$str .= '<span rel='.$v['id'].' class="tab_menu current" style="color:'.$color.'">'.$v['name'].'<b></b></span>';
			$str .= htmlMenu($v['list'], 2,$org_auth,$vstr);
		}else{
			$str .= '<span  rel='.$v['id'].' style="color:'.$color.'">'.$v['name'].'</span>';
		}
		$str .= '</div>';

	}
	if($num > 1){
		$str .= '</div>';
	}
	return $str;
}
function getNav($data,$num,$current_id){
	$str = '';
	foreach($data as $k=>$v){
		if($v['id'] == $current_id){$check = 'selected="selected"';}else{$check = '';}
		$str .= '<option value="'.$v['id'].'" '.$check.' >'.str_pad('',$num,'-').$v['name'].'</option>';
		if(!empty($v['list'])){
			$str .= getNav($v['list'],$num+3,$current_id);
		}
	}
	return $str;
}

?>
