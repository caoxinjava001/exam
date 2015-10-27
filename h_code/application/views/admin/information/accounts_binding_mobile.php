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
                    	<div id="b3"  class="nav1">
                        	<div class="sjbd_con">
								<?php  if($checkMobile !=$this ->system_info['check_mobile_audit']){?>
                            	<h4>绑定手机号码可以方便的帮助你找回密码</h4>
                                <div class="pubinfor">
                                    <div class="l_name">请输入手机号：</div>
                                    <div class="c_tet"><input type="text" value="<?php echo $mobile;?>" class="txt1" id="mobile" /></div>
                                    <input type="submit" value="立即绑定" class="blue80 floatL" onclick="ajaxSendMobile()" />
                                    <div class="prompt">目前仅支持移动、联通手机用户</div>
                                </div>
								<?php }else{?>
                                <h4 style="padding-top:30px;">您的手机号码已经成功绑定为<span><?php echo $tel;?></span></h4>
								<h4>如果想解除手机绑定，请拨打客服电话 010-68005536</h4>
                                <!--<h4>绑定为其他手机号码或解除绑定请重新输入手机</h4>
                                <div class="pubinfor">
                                    <div class="l_name">请输入手机号：</div>
                                    <div class="c_tet"><input type="text" value="" class="txt1" id="mobile" /></div>
                                    <input type="submit" value="解除绑定" class="blue80 floatL"  onclick="ajaxSendMobile()"/>
                                    <div class="prompt">目前仅支持移动、联通手机用户</div>
                                </div>-->
                                <?php }?>
                                <!--手机绑定弹窗-->
                                <div class="ht_window sjbd_win" style="display:none;">
                                    <div class="window_c">
                                        <div class="title">
                                            <h3>手机绑定</h3>
                                            <span class="close">关闭按钮</span>
                                        </div><!--title-->
                                        <div class="c_con">
											<p>收到短信后，请将验证码输入到下面的对话框内进行验证。</p>
                                            <input class="txt1 floatL" type="text" value="" id="mobile_code" />
                                            <input type="submit" class="blue60 floatL" value="确定" onclick="ajaxBindMobile()" />
                                        </div><!--c_con-->
                                    </div>
                                </div><!--ht_window-->
                                
                                <!--绑定成功弹窗-->
                                <div class="ht_window sjbd_yes" style="display:none;">
                                    <div class="window_c">
                                        <div class="title">
                                            <h3>提示</h3>
                                            <span class="close">关闭按钮</span>
                                        </div><!--title-->
                                        <div class="c_con"><b>图标</b>手机绑定成功</div><!--c_con-->
                                    </div>
                                </div><!--ht_window-->
                                
                            </div><!--sjbd_con-->
                        </div>
                        
                       
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
		<script>
			function ajaxSendMobile(){
				var mobile = $("#mobile").val();
				$.post('/information/information_accounts/ajaxSendMobile',{'mobile':mobile},function(data){
					if(data.code ==41006){
						$(".sjbd_win").show();
					}else{
						$.jhh.cm.show_dialog({msg:data.msg,width:100,height:65});
					}
				},'json');
			}
			function ajaxBindMobile(){
				var mobile = $("#mobile").val();
				var mobile_code = $("#mobile_code").val();
				$.post('/information/information_accounts/ajaxBindMobile',{'mobile':mobile,'mobile_code':mobile_code},function(data){
					if(data.code ==41006){
						$(".sjbd_win").hide();
						$(".sjbd_yes").show();
						window.location.reload(true);
					}
				},'json');
			}
		</script>