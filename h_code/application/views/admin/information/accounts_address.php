<link href="<?php echo STATICS_PATH_CSS;?>account_settings.css" type="text/css" rel="stylesheet" />
<!--右侧-->
        <div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="#">圣康金融云平台</a><b>></b><a href="#">机构</a><b>></b><a href="#">信息管理</a><b>></b><span>账号设置</span></div>
                </li>
                
                <li id="widget_3">
                	<?php 
                		$this->load->view('information/accounts_header');	
                	?>
                    <div class="wid_con">
                    	<div id="b2"  class="nav1">
                        	<div class="gxdz_con">
                            	<h4>个性地址</h4>
                                <div class="pubinfor">
                                    <div class="l_name">个性地址：</div>
                                    <div class="l_name" style="text-align:center;font-weight:bold;color:#333;">http://shop.yduedu.com/</div>
                                    <div class="c_tet"><input type="text" value="<?php echo @$specificAddr;?>" class="txt1"  onblur="ajaxBindAddr(this)"/></div>
                                    <div class="prompt" style="display:block;height:40px;line-height:20px;">注：个性地址是至少4个字符的字母和数字组合，建议使用真实姓名的拼音</div>
                                </div>
                               <!--   <h4>域名绑定</h4>
                                <div class="pubinfor">
                                    <div class="l_name">机构店铺域名：</div>
                                    <div class="l_name" style="text-align:center;font-weight:bold;color:#333;">yduedu.yduedu.com</div>
                                </div>
                                <div class="pubinfor">
                                    <div class="l_name">机构自有网站网址：</div>
                                    <div class="c_tet"><input type="text" value="" class="txt1" /></div>
                                    <div class="prompt">请输入您的域名和我们的平台域名进行绑定</div>
                                </div>
                                <div class="pubinfor">
                                    <div class="l_name">绑定域名备注：</div>
                                    <div class="c_tet" style="width:65%;">
                                        <textarea>企业介绍</textarea>
                                        <div class="ts_font">你还可以输入<b>140</b>个字</div>
                                    </div>
                                </div>
                                <input type="submit" value="保存" class="blue60" />
                            </div>--><!--gxdz_con-->
                        </div>
                        
                       
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
		<script>
		function ajaxBindAddr(obj){
			var specificAddr = $(obj).val();
			if(specificAddr.length == 0){
				$.jhh.cm.show_dialog({msg:'你的还没填写个性地址呢',width:100,height:65});
				return false;
			}
			$.post('/information/information_accounts/ajaxBindAddr',{'specificAddr':specificAddr},function(data){
				if(data.code ==41006){
					window.location.reload(true);
				}
			},'json');
		}
		</script>