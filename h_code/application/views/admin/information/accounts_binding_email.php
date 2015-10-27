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
                    	<div id="b4" class="nav1">
                        	<div class="xgyx_con">
								<?php if($checkEmail != $this ->system_info['check_email_audit']){ ?>
								<div class="pubinfor">
                                    <div class="l_name">你绑定的邮箱：</div>
                                    <div class="c_tet"><input type="text" value="" class="txt1"  id="email"/></div>
									 <input type="submit" value="保存" class="blue60 floatL"  onclick="ajaxBindEmail()"/>
                                </div>
								<?php }else{?>
                                <div class="pubinfor">
                                    <div class="l_name">邮箱：</div>
                                    <div class="c_tet" style="font-weight:bold;"><?php echo $email;?></div>
                                </div>
                                <div class="pubinfor">
                                    <div class="l_name">新邮箱：</div>
                                    <div class="c_tet"><input type="text" value="" class="txt1" id="email" /></div>
                                    <input type="submit" value="保存" class="blue60 floatL"  onclick="ajaxBindEmail(1)"/>
                                </div>
                                <?php }?>
                                <!--邮箱修改成功弹窗-->
                                <div class="ht_window xgyx_win" style="display:none;">
                                    <div class="window_c">
                                        <div class="title">
                                            <h3>邮箱绑定</h3>
                                            <span class="close" onclick="closeDiv()">关闭按钮</span>
                                        </div><!--title-->
                                        <div class="c_con">
                                        	<p>您修改的邮箱为"<span id="emails"></span>"，</p>
											<p>您会在这个邮箱中收到激活邮件，请点击激活链接验证邮箱。</p>
                                        </div><!--c_con-->
                                    </div>
                                </div><!--ht_window-->
                                
                            </div><!--xgyx_con-->
                        </div>
                        
                       
                    </div><!--wid_con-->
                </li>
            </ul>
            
        </div><!--#right_1-->
		<script>
		function ajaxBindEmail(){
			var type = arguments[0];
			var email = $("#email").val();
			$.post('/information/information_accounts/ajaxSendEmail',{'email':email,'type':type},function(data){
				if(data.code ==41006){
					$("#emails").html(email);
					$(".xgyx_win").show();
					
				}else{
					$.jhh.cm.show_dialog({msg:data.msg,width:100,height:65});
				}
			},'json');
		}
		function closeDiv(){
			$(".xgyx_win").hide();
		}
		</script>
