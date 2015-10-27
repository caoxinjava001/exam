<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1">添加企业信息分类</p>
        </div>
        <form id="form1">
            <input type="hidden" name="sort_info[id]" value="<?php echo $sort_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1"><i>*</i>分类名称:</span>
                    <input type="text" class="sect_1 floatL" name="sort_info[name]" placeholder="请填写企业信息分类名称" value="<?php echo $sort_info['name']; ?>">
                    <span class="span2 floatL">请填写分类名称</span>
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
            obj.url = config.domain.wf+'/enterprise_sort/create_sort';
           _util.ajax(obj, function (d) {
               _msg.msg = d.msg;
               if(d.status==1) {
                   _msg.callback = function()
                   {
                       colum.attr('value','');
                       location.href = '/enterprise_sort/sort_list';
                       //跳转到绑定权限页面
                       //location.href = '/information_auth/binding?mid='+d.data;
                   }
               }
                _show_msg(_msg,1000);
            });
        }else{
            _show_msg('表单填写有误！');
        }
    })

</script>

