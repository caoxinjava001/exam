<link href="<?php echo STATICS_PATH_CSS;?>/account_access.css" type="text/css" rel="stylesheet" />
<script src="<?php echo STATICS_PATH_JS;?>/information_auth.js" type="text/javascript"></script>
<script>
$(function(){
	information_auth._auth_menu();
})
</script>
	<!--右侧-->
	<div id="right_1">
			<form  action="" method="POST">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="/">圣康金融云平台</a><b>></b><a href="javascript:">信息管理</a><b>></b><span>网站功能权限管理</span></div>
                </li>
               <li id="widget_1" class="widget">
                	<div class="wid_head">
                    	<h4>后台人员信息</h4>
                    </div><!--wid_head-->
                    <div class="wid_con">
                        <div class="headimg"><img src="<?php echo $member_pic;?>" width="180" height="180" alt="" /></div><!--headimg-->
                        <div class="jw_infor">
                        	<!--div class="pubinfor">
                            	<div class="l_name">用户名：</div>
                                <div class="c_tet"><?php echo $member_username;?></div>
                            </div-->
                            <div class="pubinfor">
                            	<div class="l_name">姓名：</div>
                                <div class="c_tet"><?php echo $member_name;?></div>
                            </div>
                            <!--div class="pubinfor">
                            	<div class="l_name">性别：</div>
                                <div class="c_tet"><?php echo $member_sex;?></div>
                            </div-->
                            <div class="pubinfor region">
                            	<div class="l_name">职位：</div>
                                <div class="c_tet"><?php echo $member_role_name?></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">手机号：</div>
                                <div class="c_tet"><?php echo $member_mobile;?></div>
                            </div>
                        </div><!--jw_infor-->
                    </div><!--wid_con-->
                </li>
                <li id="widget_2" class="widget">
              		 <div class="wid_head">
                    	<h4>后台人员权限<a href="/information_auth/binding?aid=<?php echo $privilege_id;?>" class="blue87 floatR">编辑权限</a></h4>
                    </div><!--wid_head-->
                    <div class="wid_con"  style="width:100%;">
                    	<div class="con_l" id="lg_tabs_t">
                            <ul>
                            	<?php $i=1;$list = $menu_info['top'];foreach($list as $k=>$v):?>
                            		<?php if(!in_array($v,$org_auth)){continue;}?>
                            		<li class="tabs_t <?php if($i==1){echo 'this';}else{echo 'other';}?>"><?php echo $menu_info[$v]['name']?></li>
                            	<?php $i++;endforeach;?>
                            </ul>                        
                        </div><!--con_l-->
                        
                        <div class="con_r" id="lg_tabs_c">
                        	<?php $j=1;$list = $menu_info['top'];foreach($list as $k=>$v):?>
                        	<?php if(!in_array($v,$org_auth)){continue;}?>
                        	<div  class="choose_menu <?php if($j==1){echo 'nav1';}else{echo 'nav2';}?>">
                            	<div class="glqx_con">
                                	<div class="l_t">管理权限：</div>
                                    <div class="r_t">
                                    <?php if(isset($menu_info[$v]['list'])){echo htmlMenu($menu_info[$v]['list'],$menu_info, 1,$org_auth);}?>
                                    </div><!--r_t-->
                                </div><!--glqx_con-->
                            </div>
                            <?php $j++;endforeach;?>
                        </div><!--con_r-->
                    </div><!--wid_con-->
                </li>
                <li id="widget_3"><div class="bupadd"></div></li>
            </ul>
            </form>
        </div><!--#right_1-->
        
<?php 
	function htmlMenu($list,$data,$num,$org_auth,$son){
		$str = '';
		if($num > 1){
			if($son){
				$str .= '<div class="pad_l" style="display:block;">';
			}else{
				$str .= '<div class="pad_l" style="display:none;">';
			}
		}
		
		foreach($list as $k=>$v){
			if(!in_array($v, $org_auth)){
				continue;
			}
			if($data[$v]['display']){
				$str .= '<div class="dx_list">';
			}else{
				$str .= '<div class="dx_list" style="display:none">';
			}
            if(!empty($data[$v]['list'])){
				if($data[$v]['son']){
					$str .= '<span class="tab_menu current">'.$data[$v]['name'].'<b></b></span>';
				}else{
					$str .= '<span>'.$data[$v]['name'].'</span>';
				}
            	$str .= htmlMenu($data[$v]['list'],$data, 2,$org_auth,$data[$v]['son']);
            }else{
            	$str .= '<span>'.$data[$v]['name'].'</span>';
            }
            $str .= '</div>';
            
		}
		if($num > 1){
			$str .= '</div>';
		}
		return $str;
	}
	
	

?>
