<!--左侧-->
    	<div id="left_1">
            <div class="leftnav_2">
            	<h2>信息管理</h2>
                <div id="my_menu" class="sdmenu_2">
                  <div class="collapsed" <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_detail'){echo ' style="background: url('."'".STATICS_PATH_IMG.'img/collapsed_bg.png'."'".') no-repeat scroll 0% 0% transparent;"';}?>>
                    <span><a href="<?php echo base_url('information_detail/index');?>" <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_detail'){echo 'style="color: rgb(255, 255, 255); font-weight: bold; text-decoration: none;"';}?> >机构信息</a></span>
                  </div>
                  <div <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_accounts'){echo ' style="background: url('."'".STATICS_PATH_IMG.'img/collapsed_bg.png'."'".') no-repeat scroll 0% 0% transparent;"';}else{echo 'class="collapsed"';}?>>
                    <span><a href="javascript:void(0)" <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_accounts'){echo 'style="color: rgb(255, 255, 255); font-weight: bold; text-decoration: none;"';}?>>帐号设置</a></span>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_updatePassword'){echo 'current';}?>" href="<?php echo base_url('information_accounts/updatePassword');?>">密码修改</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_address'){echo 'current';}?>" href="<?php echo base_url('information_accounts/address');?>">个性地址</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_bindingMobile'){echo 'current';}?>" href="<?php echo base_url('information_accounts/bindingMobile');?>">手机绑定</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_bindingEmail'){echo 'current';}?>" href="<?php echo base_url('information_accounts/bindingEmail');?>">邮箱绑定</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_bindingOther'){echo 'current';}?>" href="<?php echo base_url('information_accounts/bindingOther');?>">第三方绑定</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_accounts_shopAuth'){echo 'current';}?>" href="<?php echo base_url('information_accounts/shopAuth');?>">权限设置</a>
                  </div>
                  <div <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_auth'){echo ' style="background: url('."'".STATICS_PATH_IMG.'img/collapsed_bg.png'."'".') no-repeat scroll 0% 0% transparent;"';}else{echo 'class="collapsed"';}?> >
                    <span><a href="javascript:" <?php if(isset($left_nav_parent) && $left_nav_parent == 'information_auth'){echo 'style="color: rgb(255, 255, 255); font-weight: bold; text-decoration: none;"';}?>>账号权限</a></span>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_auth_index'){echo 'current';}?>" href="<?php echo base_url('information_auth/index');?>">网站功能权限管理</a>
                    <a class="stla <?php if(isset($left_nav_son) && $left_nav_son == 'information_auth_binding'){echo 'current';}?>" href="<?php echo base_url('information_auth/binding');?>">帐号权限绑定</a>
                  </div>
                </div><!--sdmenu_2-->
                
             </div><!--leftnav_2-->
        </div><!--#left_1-->
        
        <!--热区-->
        <div id="resizer_1"><div class="toggler">热区</div></div>