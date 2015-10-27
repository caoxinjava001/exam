<!DOCTYPE html>
<html>
  <head>
    <title>合伙人注册-合伙人使用</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta content="webkit" name="renderer">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link href="<?php echo STATICS_PATH; ?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo STATICS_PATH; ?>/css/public.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo STATICS_PATH; ?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="<?php echo STATICS_PATH; ?>/js/jq_min.js"></script>
    <script type="text/javascript" src="<?php echo STATICS_PATH; ?>/js/ui/jquery-ui.custom.min.js"></script>
      <script type="text/javascript" src="<?php echo STATICS_PATH; ?>/js/ui/jquery-ui-timepicker-addon.js"></script>

    <script type="text/javascript" src="<?php echo STATICS_PATH; ?>/js/util.js"></script>



  </head>
  <body>
    <div class="xu" id="xu">
        <div class="cont_left">
            <div class="cont_demand">
                <p class="demand_p1">注册您的账号</p>
            </div>
            <form id="xinnuo_reg">
                <div class="demand_text">
                    <?php if(!empty($member_info['reject_desc'])){ ?>
                    <p style="color:red"> 对不起，您的身份认证没有通过。没通过的原因是：<?php echo $member_info['reject_desc']?$member_info['reject_desc']:'' ?>。 请核实您的个人信息，重新提交。 如有疑问，请联系您的介绍人 
                    <?php } ?>
                     </p>
                <div class="text">
                    <input type="hidden" id="member_id" name="member_info[id]" value="<?php echo $member_info['id']?$member_info['id']:''; ?>"  />
                    <span class="floatL span1">  <i>*</i>姓名:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $member_info['name']?$member_info['name']:''; ?>" name="member_info[name]" placeholder="请输入姓名">
                    <span class="floatL span2">中英文均可，不超过20个字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>介绍人:</span>
                    <select class="sect_1 floatL" name="member_info[intro_id]">
                        <option value="0">请选择您的介绍人</option>
                    </select>
                    <span class="floatL span2">请选择您的介绍人</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>类型:</span>
                    <select class="sect_1 floatL" name="member_info[login_role_id]">
                        <option value="0">请选择注册类型</option>
                        <option <?php echo 2 == intval($member_info['login_role_id'])?'selected="selected"':''; ?> value="2">机构</option>
                        <option <?php echo 3 == intval($member_info['login_role_id'])?'selected="selected"':''; ?> value="3">个人</option>
                    </select>

                    <span class="floatL span2">请选择您的注册类型</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>密码:</span>
                    <input type="password" class="sect_1 floatL" name="member_info[password]" placeholder="请填写密码" value="">
                    <span class="span2 floatL">请填写密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>确认密码:</span>
                    <input type="password" class="input1 floatL" r_name="member_info[repassword]" placeholder="请填写确认密码" value="">
                    <span class="floatL span2">请填写确认密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" placeholder="请填写手机号码" class="input1 floatL" name="member_info[mobile]" value="<?php echo $member_info['mobile']?$member_info['mobile']:''; ?>">
                    <span class="span2" style="display: none;">请填写手机号码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>邮箱:</span>
                    <input type="text" name="member_info[email]" placeholder="请输入邮箱" class="input1 floatL" value="<?php echo $member_info['email']?$member_info['email']:''; ?>">
                    <span class="floatL span2">请填写邮箱</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>所在机构:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[org_name]" placeholder="请填写机构名称" value="<?php echo $member_info['org_name']?$member_info['org_name']:''; ?>">
                    <span class="span2 floatL">请填写机构名称，不超过30个字</span>
                </div>

                <div class="text">
                    <span class="floatL span1"><i>*</i>性别:</span>
                    <select class="sect_1 floatL" name="member_info[gender]">
                        <option <?php echo  $member_info['gender']?$member_info['gender']:''; ?> value="1">男</option>
                        <option <?php echo  $member_info['gender']?$member_info['gender']:''; ?> value="2">女</option>
                    </select>
                    <span class="floatL span2">请选择性别</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>生日:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[birth]" placeholder="请选择生日" value="<?php echo $member_info['birth']?$member_info['birth']:''; ?>">
                    <span class="span2 floatL">请选择生日</span>
                    <script type="text/javascript">
                        $("[name='member_info[birth]']").datepicker({
                            changeMonth: true,
                            changeYear: true,
                            showButtonPanel:true,
                            yearRange: "1902:<?php echo date("Y")?>",
                            defaultDate: new Date("1990/01/01"),
                            closeText:"关闭",
                            maxDate:new Date("<?php echo date("Y-m-d") ?>")
                        });
                        var intro_id_select_v="<?php echo $member_info['intro_id']?:0;?>";
                    </script>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>个人介绍:</span>
                    <textarea class="sect_1 floatL t_area" name="member_info[describe]" placeholder="请填写个人介绍" ><?php echo $member_info['describe']?$member_info['describe']:''; ?></textarea>
                    <span class="span2 floatL">请填写个人介绍</span>
                </div>

                <!--<input type="checkbox" class="floatL checked_1" checked="checked" id="regFormProtocolC">
                <input type="hidden" value="1" id="cxy_phoneC" name="cxy">
                <p class="see_1">我已仔细阅读并<a target="_blank" href="">同意《用户使用协议》</a></p>-->
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="regFormSubBtnC" value="注册">
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo STATICS_PATH; ?>/js/xinnuo_reg.js"></script>
  </body>
</html>
