<link href="<?php echo STATICS_PATH_CSS;?>jg_infor.css" type="text/css" rel="stylesheet" />
<script src="<?php echo STATICS_PATH_JS;?>detail_org.js" type="text/javascript"></script>
<style>
.default_hidden{display:none;}
</style>
<script>
	$(function(){
		detail_org._init();
	})
</script>

<!--右侧-->
        <div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="/">圣康金融云平台</a><b>></b><span>专家信息</span></div>
                </li>
            	<li id="widget_1" class="widget">
                	<div class="wid_head">
                    	<h4>专家信息</h4>
                        <span class="amend"><b class="png"></b>修改资料</span>
                        <span class="keep_savant default_hidden"><b class="png"></b>保存</span>
                    </div><!--wid_head-->
                    <div class="wid_con">
                        <div class="infor_2" style="display:block;">
                        	<div class="headimg">
                            	<img src="<?php echo $pic;?>" width="180" height="180" alt="" />
                            	<input type="hidden" name="savantDetailId" value="<?php echo $savantDetailId;?>">
                                <p><a href="<?php echo base_url('information_detail/head_modify')?>">修改头像</a></p>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">手机：</div>
                                <div class="c_tet"><?php echo $mobile;?></div>
                            </div>
                            <div class="pubinfor password">
                            	<div class="l_name">*密码：</div>
                                <div class="c_tet">************<a href="<?php echo base_url('information_accounts/updatePassword')?>">修改密码</a></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*专家名称：</div>
                                <div class="c_tet"><?php echo $nickname;?></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*就职单位：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $savantCompany;?></span><span class="default_hidden"><input type="text" value="<?php echo $savantCompany;?>" class="txt1" name="savantCompany" /></span></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*所属科室：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $department_name;?></span>
                                <span class="default_hidden">
                                      <select class="sect_1 floatL marr15" id="department"  name="department">
	                                   <?php foreach($recollections as $value){ ?>	                                	
	                                		<option value="<?php echo $value['id'] ?>" <?php if($value['id'] == $department){echo 'selected';}?>><?php echo $value['cate_name']; ?></option>	                                	
	                                   <?php } ?>
                                    </select>
                                    </span>
                                </div>
                            </div>
                             <div class="pubinfor">
                            	<div class="l_name">*职称：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $savant_position_name;?></span>
                                <span class="default_hidden">
                                      <select class="sect_1 floatL marr15" id="savantPosition" name="savantPosition">
                                   		<?php foreach($technical_title as $value){ ?>	                                	
	                                		<option value="<?php echo $value['id'] ?>" <?php if($value['id'] == $savantPosition){echo 'selected';}?>><?php echo $value['cate_name']; ?></option>	                                	
	                                    <?php } ?>
                                    </select>
                                    </span>
                                </div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*擅长领域：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $speciality;?></span><span class="default_hidden"><input type="text" value="<?php echo $speciality;?>" class="txt1" name="speciality" /></span></div>
                            </div>
                            <div class="pubinfor introduce">
                            	<div class="l_name">*个人介绍：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $descpt;?></span><span class="default_hidden"><textarea name="descpt" ><?php echo $descpt;?></textarea></span></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">职业证书：</div>
                                <div class="c_tet"><img src="<?php echo $savantCardUrl;?>" width="449"  alt="" /></div>
                            </div>
                        </div><!--infor_2-->
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
      