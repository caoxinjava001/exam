<link href="<?php echo STATICS_PATH_CSS;?>/account_access.css" type="text/css" rel="stylesheet" />
<script src="<?php echo STATICS_PATH_JS;?>/information_auth.js" type="text/javascript"></script>
<script>
	$(function(){
		information_auth._auth_binding();
		information_auth._auth_menu();
	})
</script>
	<!--右侧-->
	<div id="right_1">
			<form  id="form_auth">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="/">圣康金融云平台</a><b>></b><a href="javascript:">信息管理</a><b>></b><span>账号权限绑定</span></div>
                </li>
                <li id="widget_3">
                	<div class="pubinfor">
                            <div class="l_name" style="width:auto;">当前被赋权限的账号：</div>
                            <div class="c_tet" style="width:auto;padding-right:10px;font-weight:bold;">
                            	<?php echo $nickname;?>
                            </div>
                            <input type="hidden" name="auth[privilege_id]" value="<?php if(isset($privilege_id)){echo $privilege_id;}?>" />
                            <input type="hidden" name="auth[id]" value="<?php echo $member_id;?>" />
                        	<a class="blue87 floatL auth_sumbit" href="javascript:">绑定权限</a>
                        </div>
                </li>
                <li id="widget_2" class="widget">
                	<div class="wid_head">
                    	<h4 style="width:300px;">网站功能权限</h4>
                    </div><!--wid_head-->
                    <div class="wid_con" style="width:100%;">
                        
                        <div class="con_r" id="lg_tabs_c">
                        	<?php $j=1;$list = $menu_info['top'];foreach($list as $k=>$v):?>
                        	<div  class="choose_menu <?php if($j==1){echo 'nav1';}else{echo 'nav2';}?>">
                        	<input type="checkbox" value="<?php echo $v;?>" name="auth[menu][]" style="display:none;"  <?php if(in_array($v, $org_auth)){echo 'checked';}?>/>
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
	function htmlMenu($list,$data,$num,$org_auth=array(),$pstr='p',$son=true,$current=''){
		$str = '';
		if($num > 1){
			if($son){
				$str .= '<div class="pad_l" style="display:block;">';
			}else{
				$str .= '<div class="pad_l" style="display:none;">';
			}
		}
		
		foreach($list as $k=>$v){
			if($data[$v]['menu_class'] == 'information_auth'){continue;}
			$vstr = $pstr.'_'.$v;
			if($data[$v]['display']){ //3,合伙人列表  10, 我的客户列表
				//$current = in_array($v, $org_auth) || (3 == $v) || (10 == $v)?'checked':'';
                $current = (isset($org_auth) && in_array($v, $org_auth))?'checked':'';
				$str .= '<div class="dx_list">';
			}else{
				$str .= '<div class="dx_list" style="display:none">';
			}
			
            $str .= '<input type="checkbox" id="'.$vstr.'" value="'.$data[$v]['id'].'" name="auth[menu][]" '.$current.'/>';
            if(!empty($data[$v]['list'])){
				if($data[$v]['son']){
					$str .= '<span class="tab_menu current">'.$data[$v]['name'].'<b></b></span>';
				}else{
					$str .= '<span>'.$data[$v]['name'].'</span>';
				}
            	$str .= htmlMenu($data[$v]['list'],$data, 2,$org_auth,$vstr,$data[$v]['son'],$current);
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
