<link href="<?php echo STATICS_PATH_CSS;?>jg_infor_maxg.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo STATICS_PATH_CSS;?>validator/validator.css"></link>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>validator/formValidator.min.js"></script> 
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>validator/formValidatorRegex.js"></script> 
<script>
	$(function(){
		 $.formValidator.initConfig({formID:"formPwd",onError:function(){alert("校验没有通过，具体错误请看错误提示")}});
			$("#oldPwd").formValidator({onShow:"请输当前密码",onFocus:"密码由4-15位字符的字母、数字、下划线组成",onCorrect:"格式正确"}).regexValidator({regExp:"^[a-zA-Z0-9_]{4,15}$",dataType:"string",onError:"你输入的格式不正确,请确认"});
			$("#newPwd").formValidator({onShow:"请输新密码",onFocus:"密码由4-15位字符的字母、数字、下划线组成",onCorrect:"格式正确"}).regexValidator({regExp:"^[a-zA-Z0-9_]{4,15}$",dataType:"string",onError:"你输入的格式不正确,请确认"});
			$("#newRePwd").formValidator({onShow:"请输确认密码",onFocus:"密码由4-15位字符的字母、数字、下划线组成",onCorrect:"格式正确"}).regexValidator({regExp:"^[a-zA-Z0-9_]{4,15}$",dataType:"string",onError:"你输入的格式不正确,请确认"}).compareValidator({desID:"newPwd",operateor:"=",dataType:'value',onError:"两次密码不相同，请确认"});
			$.formValidator.reloadAutoTip();
	})

</script>
<!--右侧-->
        <div id="right_1">
        	<ul id="column1" class="column">
            	<li id="widget_4">
                    <div class="where_page"><a href="/">圣康金融云平台</a><b>></b><a href="javascript:">信息管理</a><b>></b><span>账号设置</span></div>
                </li>
                <li id="widget_3" class="widget">
                	<div class="wid_head">
                    	<h4>密码修改</h4>
                    </div><!--wid_head-->
                    <div class="wid_con">
                    	<div class="edit_pass_suc">
                        	<p class="edit_p1">
                            	<span class="edi_dh"></span>
                                <span class="edi_wz">密码修改成功！</span>
                            </p>
                        </div>
                    </div><!--wid_con-->
                </li>
                
            </ul>
            
        </div><!--#right_1-->