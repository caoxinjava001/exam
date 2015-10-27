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
                    <div class="where_page"><a href="/">圣康金融云平台</a><b>></b><span>机构信息</span></div>
                </li>
            	<li id="widget_1" class="widget">
                	<div class="wid_head">
                    	<h4>机构信息</h4>
                        <span class="amend"><b class="png"></b>修改资料</span>
                        <span class="keep default_hidden"><b class="png"></b>保存</span>
                    </div><!--wid_head-->
                    <div class="wid_con">
                        <div class="infor_2" style="display:block;">
                        	<div class="headimg">
                            	<img src="<?php echo $pic;?>" width="180" height="180" alt="" />
                            	<input type="hidden" name="orgDetailId" value="<?php echo $orgDetailId;?>">
                                <p><a href="<?php echo base_url('information_detail/head_modify')?>">修改头像</a></p>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">邮箱：</div>
                                <div class="c_tet"><?php echo $email;?></div>
                            </div>
                            <div class="pubinfor password">
                            	<div class="l_name">*密码：</div>
                                <div class="c_tet">************<a href="<?php echo base_url('information_accounts/updatePassword')?>">修改密码</a></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*企业名称：</div>
                                <div class="c_tet"><?php echo $nickname;?></div>
                            </div>
                            <div class="pubinfor region">
                            	<div class="l_name">*所属地区：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $provinceName.$cityName;?></span>
                                <span class="default_hidden">
                                     <select onchange="showCity()"  id="province" name="province" style="float:left;margin-right:5px;">
                                	<?php foreach($province_list as $value){ ?>	                                	
	                                	<option value="<?php echo $value['id'] ?>" <?php if($province == $value['id']){echo 'selected';}?> ><?php echo $value['name']; ?></option>	                                	
                                	<?php } ?>
                                </select>
                                <select id="city" name="city" style="float:left;margin-right:5px;">
                                	<?php foreach($city_list as $value){ ?>                               		
	                                	<option value="<?php echo $value['id'] ?>" <?php if($city == $value['id']){echo 'selected';}?> ><?php echo $value['name']; ?></option>	                                	
                                	<?php } ?>
                                </select>
                                    </span>
                                </div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*机构地址：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $addr;?></span><span class="default_hidden"><input type="text" value="<?php echo $addr;?>" class="txt1" name="addr" /></span></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*企业全称：</div>
                                <div class="c_tet"><?php echo $orgName;?></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*联系人：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $contactName;?></span><span class="default_hidden"><input type="text" value="<?php echo $contactName;?>" class="txt1" name="contactName"/></span></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">*联系电话：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $contactTel;?></span><span class="default_hidden"><input type="text" value="<?php echo $contactTel;?>" class="txt1"  name="contactTel"/></span></div>
                            </div>
                            <div class="pubinfor region">
                            	<div class="l_name">所属行业：</div>
                                <div class="c_tet">
                                	<span class="default_show"><?php echo $tradeTypeName.$tradeSubTypeName;?></span>
                                 	<span class="default_hidden">
                                	<select class="sect_1 floatL marr15" onchange="showTradeSub()" id="trade" name="tradeType">
                                    <?php foreach($trade_list as $value){ ?>	                                	
                                		<option value="<?php echo $value['id'] ?>" <?php if($tradeType == $value['id']){echo 'selected';}?> ><?php echo $value['cate_name']; ?></option>	                                	
                                	<?php } ?>
                                    </select>
                                    <select class="sect_1 floatL" id="trade_sub" name="tradeSubType">
                                       <?php foreach($trade_sub_list as $value){ ?>	                                	
                                		<option value="<?php echo $value['id'] ?>" <?php if($tradeSubType == $value['id']){echo 'selected';}?> ><?php echo $value['cate_name']; ?></option>	                                	
                                	   <?php } ?>
                                    </select>
                                    </span>
                                 </div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">服务领域：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $orgProject;?></span><span class="default_hidden"><input type="text" value="<?php echo $orgProject;?>" class="txt1" name="orgProject" /></span></div>
                            </div>
                            <div class="pubinfor introduce">
                            	<div class="l_name">企业介绍：</div>
                                <div class="c_tet"><span class="default_show"><?php echo $orgDesc;?></span><span class="default_hidden"><textarea name="orgDesc" ><?php echo $orgDesc;?></textarea></span></div>
                            </div>
                            <div class="pubinfor">
                            	<div class="l_name">营业执照：</div>
                                <div class="c_tet"><img src="<?php echo $orgCardUrl;?>" width="449" height="338" alt="" /></div>
                            </div>
                        </div><!--infor_2-->
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
        <script type="text/javascript">
function showCity(){
	var str ='';
	var province_id = $("#province").val();
	$.post('/information_detail/get_city_by_province_id',{'province_id':province_id},function(data){
		if(data.code =='42007'){
			var count = data.data.length;
			for(var i=0;i<count;i++){
				str += '<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>';
			}
			$("#city").html(str);
		}else{
			$.jhh.cm.show_dialog({msg:data.msg,width:100,height:65});
		}
	},'json');
}
function showTradeSub(){
	var str ='';
	var trade_id = $("#trade").val();
	$.post('/information_detail/get_trade_sub_by_trade_id',{'trade_id':trade_id},function(data){
		if(data.code =='42007'){
			var count = data.data.length;
			for(var i=0;i<count;i++){
				str += '<option value="'+data.data[i].id+'">'+data.data[i].cate_name+'</option>';
			}
			$("#trade_sub").html(str);
		}else{
			$.jhh.cm.show_dialog({msg:data.msg,width:100,height:65});
		}
	},'json');
}


</script> 