<div class="crumb-wrap">
    <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a href="/manage/index"><span class="crumb-name">代理商列表</span></a></div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1"><?php echo $data_info['id']?'修改代理商':'增加代理商';?></p>
        </div>
        <form id="manage_add">
            <input type="hidden" name="check_id" value="<?php echo $data_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1"><i>*</i>代理商名称:</span>
                    <input type="text" class="sect_1 floatL" name="name" placeholder="请填写代理商名称" value="<?php echo !empty($data_info['user_name'])?$data_info['user_name']:'';?>">
                    <span class="span2 floatL">请填写代理商名称</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>省份:</span>
                    <select  class="sect_1 floatL" name="login_role_id">
                        <option value="2" <?php echo $data_info['login_role_id']==THIRD_ROLE_INFO?'selected':'' ;?>>代理商</option>
                        <option value="1" <?php echo $data_info['login_role_id']==MANGER_ROLE_INFO?'selected':'' ;?>>管理员</option>
                    </select>
                    <span class="span2 floatL">请选择省份</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>省份:</span>
                    <select  class="sect_1 floatL" name="province_id">
                        <option value="0">请选择省份</option>
                        <?php foreach($province as $v){?>
                            <option <?php if($v['id']== $data_info['province']) echo 'selected="selected"';?> value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="span2 floatL">请选择省份</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>城市:</span>
                    <select  class="sect_1 floatL" name="city_id">
                        <option value="0">请选择城市</option>
                        <?php foreach($city as $v){?>
                            <option <?php if($v['id']== $data_info['city']) echo 'selected="selected"';?> value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="span2 floatL">请选择城市</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i></i>地址:</span>
                    <input type="text" class="sect_1 floatL" name="addr" placeholder="请填写地址" value="<?php echo !empty($data_info['addr'])?$data_info['addr']:'';?>">
                    <span class="span2 floatL">请正确填写地址</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" class="sect_1 floatL" name="mobile"  placeholder="请填写用户手机号" value="<?php echo !empty($data_info['mobile'])?$data_info['mobile']:'';?>">
                    <span class="span2 floatL">请正确填写用户手机号</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i><i></i>邮箱:</span>
                    <input type="text" class="sect_1 floatL" name="email" placeholder="请填写邮箱" value="<?php echo !empty($data_info['email'])?$data_info['email']:'';?>">
                    <span class="span2 floatL">请正确填写邮箱</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>密码:</span>
                    <input type="password" class="sect_1 floatL" name="password" placeholder="请输入6位密码">
                    <span class="span2 floatL">请填写用户6位密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>确认密码:</span>
                    <input type="password" class="sect_1 floatL" name="repassword" placeholder="请确认密码">
                    <span class="span2 floatL">请确认密码一致</span>
                </div>
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="createManager" value="确 定">
                    <input type="reset" class="btn btn-blue" id="" value="重置">
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
