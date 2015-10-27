<!DOCTYPE html>
<html>
  <head>
    <title>企业注册-企业使用</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta content="webkit" name="renderer">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link href="<?php echo STATICS_PATH_CSS; ?>/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo STATICS_PATH_CSS; ?>/public.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo STATICS_PATH_CSS; ?>/b_reg.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="<?php echo STATICS_PATH_JS; ?>/jq_min.js"></script>
    <script type="text/javascript" src="<?php echo STATICS_PATH_JS; ?>/ui/jquery-ui.custom.min.js"></script>
      <script type="text/javascript" src="<?php echo STATICS_PATH_JS; ?>/ui/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="<?php echo STATICS_PATH_JS; ?>/util.js"></script>
  </head>

  <body>
    <div class="xu" id="xu">
        <div class="cont_left">
            <div class="cont_demand">
                <p class="demand_p1">企业家注册</p>
            </div>
            <form id="xinnuo_reg">
                <div class="demand_text">
                    <?php if(!empty($member_info['reject_desc'])){ ?>
                    <p style="color:red"> 对不起，您的身份认证没有通过。没通过的原因是：<?php echo $member_info['reject_desc']?$member_info['reject_desc']:'' ?>。 请核实您的个人信息，重新提交。 如有疑问，请联系您的介绍人 
                    <?php } ?>
                     </p>
                <div class="text">
                    <input type="hidden" id="member_id" name="member_info[id]" value="<?php echo $member_info['id'] ? $member_info['id'] : ''; ?>"  />
                    <span class="floatL span1">  <i>*</i>姓名:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $member_info['name']?$member_info['name']:''; ?>" name="member_info[name]" placeholder="请输入姓名">
                    <span class="floatL span2">中英文均可，不超过20个字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>介绍人:</span>
                    <select class="sect_1 floatL" name="member_info[intro_id]">
                        <option value="0">请选择您的介绍人</option>
						<?php foreach($role_info_list as $val) { ?>
                        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
						<?php } ?>
                    </select>
                    <span class="floatL span2">请选择您的介绍人</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>密码:</span>
                    <input type="password" class="sect_1 floatL" name="member_info[password]" placeholder="请填写密码" value="">
                    <span class="span2 floatL">请填写密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>确认密码:</span>
                    <input type="password" class="input1 floatL" name="member_info[repassword]" placeholder="请填写确认密码" value="">
                    <span class="floatL span2">请填写确认密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" placeholder="请填写手机号码" class="input1 floatL" name="member_info[mobile]" value="<?php echo $member_info['mobile']?$member_info['mobile']:''; ?>">
                    <span class="span2" style="display: none;">请填写手机号码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>企业名称:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[org_name]" placeholder="请填写企业名称" value="<?php echo $member_info['org_name']?$member_info['org_name']:''; ?>">
                    <span class="span2 floatL">请填写企业名称，不超过30个字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="regFormSubBtnC" value="注册">
                </div>
            </div>
            </form>
        </div>
    </div>
	<script>
	function sumbitClick(){

	}
	</script>

    <script type="text/javascript" src="http://182.92.72.93:9010/statics/main/js/business_reg.js"></script>

  </body>
</html>
