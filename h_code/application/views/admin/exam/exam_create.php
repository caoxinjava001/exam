<div class="crumb-wrap">
    <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a href="/manage/index"><span class="crumb-name">试卷信息</span></a></div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH ?>/js/ckeditor/ckeditor.js"></script>



<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1"><?php echo '增加试卷';?></p>
        </div>

			<iframe name="myupfile" border=0 hidden='yes' width=0 height=0></iframe>
			<form method="post" id="add_student_form"  action="<?php echo $url_action; ?>" target="myupfile">
            <input type="hidden" name="check_id" value="<?php echo $data_info['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1"><i>*</i>试卷名称:</span>
                    <input type="text" class="sect_1 floatL" name="name" placeholder="请填写代理商名称" value="<?php echo !empty($data_info['user_name'])?$data_info['user_name']:'';?>">
                    <span class="span2 floatL">请填写试卷名称</span>
                </div>
				<div class="text">
                    <span class="floatL span1"><i>*</i>试卷分类:</span>
                    <select  class="sect_1 floatL" name="province_id">
                        <?php foreach($exam_tag_list as $v){?>
                            <option <?php if($v['id']== $data_info['province']) echo 'selected="selected"';?> value="<?php echo $v['id'];?>"><?php echo $v['cate_name'];?></option>
                        <?php }?>
                    </select>
                    <span class="span2 floatL">请选择用户角色</span>
                </div>
                <div class="text" style='text-decoration: none;border-bottom: 1px solid black;'>
                    <span class="floatL span1"><i></i>试卷列表:</span> <input type="button" value='增加试卷'  name="addr" class="btn btn-blue" onclick='add_update_show()'>
					 <br>
                </div>


                <div>
					<ul>
						<li><span>111</span>&nbsp;&nbsp;<span><input type="button" value="修改">&nbsp;<input type="button" value="删除"></span></li>
						<li><span>111</span>&nbsp;&nbsp;<span><input type="button" value="修改">&nbsp;<input type="button" value="删除"></span></li>
						<li><span>111</span>&nbsp;&nbsp;<span><input type="button" value="修改">&nbsp;<input type="button" value="删除"></span></li>
					</ul>
				</div>
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="button" class="btn btn-blue" id="createManager" value="确 定">
                </div>
            </div>
        </form>
    </div>
</div>


<form id="form_sub">
    <input type="hidden" name="id" id="id"/>
    <div class="pic_box close_box" style="display:none;left: 50%;margin-left: -325px;margin-top: -100px;position:fixed;top: 20%;z-index: 100;width:650px;height:400px; background-color:#fff;border:1px solid #000;">
        <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
        <div style="margin:20px 0 0 20px;">

            <div style="margin:20px 0 0 0;">题型:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="q_type" id="q_type_id">
					<option value="">单选题</option>
				</select>
			</div>
        </div>
        <div style="margin:10px 0 0 20px;">审核操作：
            <select name="pro_type">
                <option value="1">审核通过</option>
                <option value="2">驳回</option>
            </select>
        </div>
        <div style="margin:25px 0 0 20px;">附言：</div>
        <textarea name="pro_tip" id="pro_tip" cols="60" rows="5" style="margin:10px 0 0 20px;"></textarea>
		<script>
		var t_name='pro_tip';
CKEDITOR.instances[t_name]&&CKEDITOR.instances[t_name].destroy();
		</script>

        <a class="end" href="javascript:void(0)" style="margin:10px 0 0 100px;">完成</a>
    </div>
</form>
<script>
function add_update_show() {
	$('.pic_box').show();
}


 $(function(){
        $('.close_pic_box').bind('click',function(){
            $('.close_box').hide();
        })
/*
        var _host=config.domain.wf;
        var _url=_host+'/enterprise/ajaxAudit';
        var _id,_pro,_fin,pro_type;
        var _data={},obj={},_msg={};
        //第一步
        $('.show_pic').bind('click',function(){
            _id=$(this).attr('rel');
            _pro=$(this).attr('pro');
            _fin=$(this).attr('fin');
            $('#id').attr('value',_id);
            if(_pro){$('#pro_file').attr('href',_host+_pro);}
            if(_fin){ $('#fin_file').attr('href',_host+_fin);}

            $('.pic_box').show();
        })
        $('.close_pic_box').bind('click',function(){
            $('.close_box').hide();
        })
        //完成
        $('.end').bind('click',function(){
            pro_type=$("input:radio[name='pro_type']:checked").attr('rel');

            _data=$('#form_sub').serialize();
            obj.data=_data;
            obj.type="post";
            obj.url=_url;
            if(confirm('确定提交吗？')) {
                _util.ajax(obj, function (d) {
                    _msg.msg = d.msg;
                    _msg.callback = function () {
                        window.location.reload();
                        $('#fin_tip,#pro_tip').val('');

                    }
                    _show_msg(_msg, 2000);
                });
            }
        })
*/
    })


document.domain="<?php echo MAIN_DOMAIN_INFO;?>";
function getShow(statu,msg) {
	if (statu == 0) {
		location.href="/exam/index";
	} else {
		$.jhh.cm.show_dialog({msg:msg,width:300,height:100});
	}
	return false;
}

</script>
