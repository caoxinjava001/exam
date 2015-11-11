<div class="crumb-wrap">
    <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a href="/classify/index"><span class="crumb-name">试卷分类列表</span></a></div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1"><?php echo $data_info['id']?'修改分类':'增加分类';?></p>
        </div>
        <form id="card_add">
            <input type="hidden" name="check_id" value="<?php echo $data_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1">分类名称:</span>
                    <input type="text" class="sect_1 floatL" name="cate_name" placeholder="请填写分类名" value="<?php echo !empty($data_info['cate_name'])?$data_info['cate_name']:'';?>">
                    <span class="span2 floatL">请填写分类名</span>
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
        var is_sub=true;
        var _numb=$("[name='cate_name']");
        var nb=_numb.val();
        var _id=$("[name='check_id']").val();

        //检测卡号
        if(nb.length<1){
            _numb.next('span').removeClass("span2").addClass("span4");
            _numb.next('span').html('请填写分类名');

        }else{
            //提交数据
            if(is_sub){
                var obj = {}, _msg={};
                var up_data =$('#card_add').serialize();
                obj.data = up_data;
                obj.type = 'post';
                obj.url = config.domain.wf+'/classify/createCard';
                _util.ajax(obj, function (d) {
                    _show_msg(d.msg);
                    if(d.status==1){
                        $('span').removeClass("span4").addClass("span2");
                        if(!_id){
                            _numb.val('');
                        }
                    }
                });
            }
        }


    })
</script>
