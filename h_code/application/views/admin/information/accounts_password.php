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
                    <div class="wid_con"><!--infor_1-->
                    	<form action="/information_accounts/updatePassword" method="POST" name='formPwd' id="formPwd">
                        <div class="mmxg_con">
                            <div class="pubinfor">
                                <div class="l_name">当前密码：</div>
                                <div class="c_tet"><input type="password" value="" class="txt1" name="oldPwd" id="oldPwd" /></div>
                                <div id="oldPwdTip" style="width:300px;float:left;"></div>
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">新密码：</div>
                                <div class="c_tet"><input type="password" value="" class="txt1" name="newPwd" id="newPwd" /></div>
                                <div id="newPwdTip" style="width:300px;float:left;"></div>
                            </div>
                            <div class="pubinfor">
                                <div class="l_name">重复一次新密码：</div>
                                <div class="c_tet"><input type="password" value="" class="txt1" name="newRePwd"  id="newRePwd"/></div>
                                <div id="newRePwdTip" style="width:300px;float:left;"></div>
                            </div>
                            <input type="submit" value="保存密码" class="blue80 clearB" />
                        </div><!--mmxg_con-->
                        </form>
                    </div><!--wid_con-->
                </li>
                
            </ul>
            
        </div><!--#right_1-->