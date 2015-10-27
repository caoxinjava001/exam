<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1">企业家详情</p>
        </div>
        <form id="xinnuo_reg">
            <div class="demand_text">
                </p>
                <div class="text">
                    <input type="hidden" id="member_id" name="member_info[id]" value="<?php echo $member_info['id'] ? $member_info['id'] : ''; ?>"  />
                    <span class="floatL span1">  <i>*</i>姓名:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $data['name']; ?>" name="member_info[name]" placeholder="请输入姓名">
                    <span class="floatL span2">中英文均可，不超过20个字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>介绍人:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $data['intro_name']; ?>" name="member_info[intro_id]" placeholder="请输入姓名">
                    <span class="floatL span2">请选择您的介绍人</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" placeholder="请填写手机号码" class="input1 floatL" name="member_info[mobile]" value="<?php echo $data['mobile'];?>">
                    <span class="span2" style="display: none;">请填写手机号码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>企业名称:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[org_name]" placeholder="请填写企业名称" value="<?php echo $data['org_name']; ?>">
                    <span class="span2 floatL">请填写企业名称，不超过30个字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>生产经营信息表:</span>
                    <div style="margin:10px 0 0 200px">
                        <a href="<?php echo $data['pro_resource']?ADMIN_PATH.$data['pro_resource']:'#'?>"><?php echo $data['pro_resource']?'下载查看':'暂时没有上传'?></a>
                    </div>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>财务信息表:</span>
                    <div style="margin:10px 0 0 200px">
                        <a href="<?php echo $data['fin_resource']?ADMIN_PATH.$data['fin_resource']:'#'?>"><?php echo $data['fin_resource']?'下载查看':'暂时没有上传'?></a>
                    </div>
                </div>
                <?php /*
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="regFormSubBtnC" value="注册">
                </div>
                */ ?>
            </div>
        </form>
    </div>
</div>