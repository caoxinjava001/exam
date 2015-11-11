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
        <form id="card_add">
            <input type="hidden" name="check_id" value="<?php echo $data_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1">充值卡号:</span>
                    <input type="text" class="sect_1 floatL" name="number" placeholder="请填写充值卡号" value="<?php echo !empty($data_info['number'])?$data_info['number']:'';?>">
                    <span class="span2 floatL">请填写卡号</span>
                </div><div class="text">
                    <span class="floatL span1">代理商:</span>
                    <select  class="sect_1 floatL" name="admin_id">
                        <option value="0">请选择代理商</option>
                        <?php foreach($admin_users as $v){?>
                            <option <?php if($v['id']== $data_info['admin_id']) echo 'selected="selected"';?> value="<?php echo $v['id'];?>"><?php echo $v['user_name'];?></option>
                        <?php }?>
                    </select>
                    <span class="span2 floatL">请选择代理商</span>
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
                    <input type="button" class="btn btn-blue" id="createCard" value="提 交">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    /**
     * Created By YJ 2015-05-25
     *
     * 创建新卡号
     */
    $('#createCard').bind('click',function(){
        var is_sub=false;
        var _numb=$("[name='number']");
        var _admin=$("[name='admin_id']");
        var _sele=$("[name='select_id']");
        var nb=_numb.val();
        var _id=$("[name='check_id']").val();

        //检测卡号
        if(nb.length<1){
            _numb.next('span').removeClass("span2").addClass("span4");
            _numb.next('span').html('请填写卡号');

        }else{
            var _this=_numb;
            _this.next('span').removeClass("span4").addClass("span2");

            var obj = {}, _msg={};
            var up_data = {number:nb};
            obj.data = up_data;
            obj.type = 'post';
            obj.url = config.domain.wf+'/card/is_single';
            if(!_id) {
                _util.ajax(obj, function (d) {
                    _this.next('span').html(d.msg);
                    _this.next('span').removeClass("span2").addClass("span4");
                    if (d.status == 1) {
                        is_sub = true;
                    }
                });
            }else{
                is_sub = true;
            }
        }
        //检测代理商
        if(!parseInt(_admin.val())){
            _admin.next('span').removeClass("span2").addClass("span4");
        }else{
            _admin.next('span').removeClass("span4").addClass("span2");
            is_sub=true;
        }
        //提交数据
        if(is_sub){
            var obj = {}, _msg={};
            var up_data =$('#card_add').serialize();
            obj.data = up_data;
            obj.type = 'post';
            obj.url = config.domain.wf+'/card/createCard';
            _util.ajax(obj, function (d) {
                _show_msg(d.msg);
                if(d.status==1){
                    $('span').removeClass("span4").addClass("span2");
                    if(!_id){
                        _admin.val('');
                        _numb.val('');
                        _sele.val('');
                    }
                }
            });
        }
    })
</script>
