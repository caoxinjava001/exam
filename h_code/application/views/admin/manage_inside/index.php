<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1" style="width:150px;">创建合伙人内勤</p>
        </div>
        <form id="form1">
            <input type="hidden" name="admin_user[id]" value="<?php echo $member_info[id]?$member_info[id]:''?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1"><i>*</i>姓名:</span>
                    <input type="text" class="sect_1 floatL" name="admin_user[name]" placeholder="请填写用户姓名" value="<?php echo $member_info[name]?$member_info[name]:''?>">
                    <span class="span2 floatL">请填写用户姓名</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" class="sect_1 floatL" name="admin_user[mobile]" placeholder="请填写用户手机号" value="<?php echo $member_info[mobile]?$member_info[mobile]:''?>">
                    <span class="span2 floatL">请正确填写用户手机号</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>密码:</span>
                    <input type="password" class="sect_1 floatL" name="admin_user[password]" placeholder="请输入至少6位密码">
                    <span class="span2 floatL">请填写至少6位密码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>确认密码:</span>
                    <input type="password" class="sect_1 floatL" name="admin_user[repassword]" placeholder="请确认密码">
                    <span class="span2 floatL">请确认密码一致</span>
                </div>
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="createManager" value="确 定">
                    <input type="reset" class="btn btn-blue" id="" value="取消">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    /**
     * Created By YJ 2015-05-25
     */
    var b=true,colum =$(".sect_1");

    /**
     * ajax 创建用户
     */
    $('#createManager').bind('click',function(){
        if(b) {
            var obj = {}, _msg={};
            var up_data = $('#form1').serialize();
            obj.data = up_data;
            obj.type = 'post';
            obj.url = config.domain.wf+'/manage_inside/createManager';
           _util.ajax(obj, function (d) {
               _msg.msg = d.msg;
               if(d.status==1) {
                   _msg.callback = function()
                   {
                       colum.attr('value','');
                   }
               }else if(d.status == 2){
                   _msg.callback = function()
                   {
                       location.href = '/manage_sale/all_list';
                   }
               }
               _show_msg(_msg,1000);
            });
        }else{
            _show_msg('表单填写有误！');
        }
    })

</script>

