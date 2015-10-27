<link href="<?php echo STATICS_PATH_CSS;?>/zh_permissions_gl.css" type="text/css" rel="stylesheet" />
<script src="<?php echo STATICS_PATH_JS;?>/information_auth.js" type="text/javascript"></script>
<script>
	$(function(){
		information_auth._auth_index();
	})
</script>
<!--右侧-->
        <div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="#">圣康金融云平台</a><b>></b><a href="#">信息管理</a><b>></b><a href="#">权限管理</a><b>></b><span>账户权限管理</span></div>
                </li>
                <li id="widget_3" class="widget">
                	<!--div class="wid_head">
                    	<h4>教务信息搜索</h4>
                    </div--><!--wid_head-->
                    <div class="pubinfor">
                    	<form action="/information_auth/index" method="post">
                        <div class="l_name" style="width:12%;">用户名：</div>
                        <div class="c_tet"><input type="text" value="" class="txt1" name="nickname"/></div>
                        <!--div class="l_name" style="width:12%;">真实姓名：</div>
                        <div class="c_tet"><input type="text" value="" class="txt1"  name="teacher_name"/></div-->
                        <input type="submit" value="搜索" class="gray50 floatL" />
                        </form>

                    </div>
                </li>
                <li id="widget_2" class="widget" style="border-bottom:none;">
                	<div class="wid_head">
                    	<!--span class="jw_b_t_js">您有<b><?php echo $count;?></b>个教务</span-->
                   	  <h4>帐号列表</h4>
                    </div><!--wid_head-->
                    <div class="wid_con tab_ls">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <th width="3%" align="center"></th>
                              <th width="10%" style="text-align:center">id</th>
                              <th width="20%" style="text-align:center" align="center">用户名</th>
                              <th width="20%" style="text-align:center" align="center">手机号</th>
                              <th width="16%" style="text-align:center" align="center">状态</th>
                              <th width="32%" style="text-align:center" align="center" class="last">操作</th>
                          </tr>
                          <?php foreach($auth_list as $ak=>$av):?>
                          <tr>
                              <td align="center"></td>
                              <td align="center"><?php echo $av['id'];?></td>
                              <td align="center"><?php echo $av['name'];?></td>
                              <td align="center"><?php echo $av['mobile'];?></td>
                              <td align="center"><span class="ykq"><?php if(isset($av['status'])){ if($av['status'] == CLOUD_MENU_MEMBER_LOOK_STATUS_OPEN){echo '已开启';}else{echo '禁用';}}else{echo '未开通';}?></span></td>
                              <td align="center" class="last">
                              	<?php if(isset($av['status'])){?>
	                              	<?php if($av['status'] == CLOUD_MENU_MEMBER_LOOK_STATUS_OPEN){?>
	                              	<!--a href="javascript:" class="jw_ck stop_auth" rel="<?php echo $av['aid'];?>">关闭</a-->
	                                <?php }else{?>
	                                <!--a href="javascript:" class="jw_ck stop_auth" rel="<?php echo $av['aid'];?>">开启</a-->
	                                <?php }?>
	                                <a href="/information_auth/binding?aid=<?php echo $av['aid'];?>" class="jw_ck">编辑</a>
	                                <a href="/information_auth/detail?aid=<?php echo $av['aid'];?>" class="jw_sc">浏览</a>
                                <?php }else{?>
                                	<a href="/information_auth/binding?mid=<?php echo $av['id'];?>" class="jw_ck">开通</a>
                                <?php }?>
                              </td>
                          </tr>
                          <?php endforeach;?>
                      </table>
                    </div><!--wid_con-->
                </li>
            </ul>

                <div class="list-page"> <?php echo $pages;?></div>
        </div>

