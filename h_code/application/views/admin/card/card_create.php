<div class="crumb-wrap">
    <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a href="/card/index"><span class="crumb-name">充值卡列表</span></a></div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1"><?php echo $data_info['id']?'修改充值卡':'增加充值卡';?></p>
        </div>
        <form id="manage_add">
            <input type="hidden" name="check_id" value="<?php echo $data_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1">充值卡号:</span>
                    <input type="text" class="sect_1 floatL" name="name" placeholder="请填写充值卡号" value="<?php echo !empty($data_info['number'])?$data_info['number']:'';?>">
                </div><div class="text">
                    <span class="floatL span1">代理商:</span>
                    <select  class="sect_1 floatL" name="province_id">
                        <option value="0">请选择省份</option>
                        <?php foreach($province as $v){?>
                            <option <?php if($v['id']== $data_info['province']) echo 'selected="selected"';?> value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="text">
                    <span class="floatL span1">卡状态:</span>
                    <select  class="sect_1 floatL" name="select_id">
                        <option value="0" <?php echo (strlen($data_info['use_status'])>0&&$data_info['use_status']==0)?'selected':'';?>>未激活</option>
                        <option value="1" <?php echo (strlen($data_info['use_status'])>0&&$data_info['use_status']==1)?'selected':'';?>>激活</option>
                    </select>
                </div>

                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="createManager" value="提 交">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    /**
     * Created By YJ 2015-05-25
     *
     * 获取相关城市
     */
    $("[name='province_id']").bind('change',function(){
        var b=$(this).val();
        if(b) {
            var obj = {}, _msg={},_html="<option value=\"0\">请选择城市</option>";
            var up_data = {p_id:b};
            obj.data = up_data;
            obj.type = 'post';
            obj.url = config.domain.wf+'/manage/getCityById';
           _util.ajax(obj, function (d) {
               if(d.status==1) {
                   var len= d.data.length;
                   for(var i=0;i<len;i++) {
                       _html += "<option value=\"" + d.data[i]['id'] + "\">" + d.data[i]['name'] + "</option>";
                   }
                   $("[name='city_id']").html(_html);
               }

            });
        }
    })

</script>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/manage_add.js"></script>
