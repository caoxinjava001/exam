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
                <p class="demand_p1">提交资料</p>
            </div>
			<iframe name="myupfile" border=0 hidden='yes' width=0 height=0></iframe>
            <form id="info_submit" method='post' action="/bs/saveSecAjax" enctype="multipart/form-data" target="myupfile">
                <div class="demand_text">
					<input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                    <p>请您上传您的企业的相关信息</p>
					<?php if (count($show_log_info) > 0 && !empty($show_log_info['pro_mark'])  ) { ?>
                    <p><b>审核未通过原因:<?php echo $show_log_info['pro_mark'];?></b></p>
					<?php } ?>
                    <div class="text">
                        <span class="floatL span1" style="width: 130px;"><i>*</i>生产经营信息表:</span>
                        <input type="file"  class="input1 floatL" name="production_info" value="">
                    </div>
                    <div class="text">
                        <span class="floatL span1" style="width: 130px;"><i>*</i>财务信息表:</span>
                        <input type="file" class="sect_1 floatL" name="finance_info"  value="">

                    </div>
                    <div class="text">
                        <span class="floatL span1" style="width: 130px;"></span>
						<?php /*
                        <input type="button" class="btn btn-blue" id="subBtn" value="提交">
						*/?>
                        <input type="submit" class="btn btn-blue" id="subBtn" value="提交">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
	//document.domain="<?php echo WF_PATH;?>";
	document.domain="xinnuos.com";
	function getShow(statu,msg) {
		if (statu == 0) {
			location.href="/login/logg";
		} else {
			_show_msg(msg,2500); //_show_msg(data['data']['id'],2500);
		}
		return false;
	}
	/*
        (function(){
            $("#subBtn","#info_submit").click(function(){
                $("#info_submit").submit();
            });
        })(window);
	 */
    </script>
  </body>
</html>
