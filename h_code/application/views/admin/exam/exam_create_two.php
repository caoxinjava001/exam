<div class="crumb-wrap">
    <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><a href="/manage/index"><span class="crumb-name">试卷信息</span></a></div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH ?>/js/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/jq_min.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ht-hd.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ht-effect.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/jhh_tag_tree.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/jhh-common.js"></script>
<script type="text/javascript" src="http://statics.yduedu.com/orgmange/js/ui/jquery-ui.custom.min.js"></script>
<link href="http://statics.yduedu.com/orgmange/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet" />

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1"><?php echo '增加试题';?></p>
        </div>
		<iframe name="myupfile" border=0 hidden='yes' width=0 height=0></iframe>
		<form method="post" id="add_student_form"  action="/exam/addQuestionAjaxAction" onsubmit="return check_form()" target="myupfile">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>

            <div class="demand_text">
				<div class="text">
                    <span class="floatL span1"><i>*</i>题型:</span>
					<select class="sect_1 floatL" name="question_type" id="q_type_id" onchange="getQuestion(this.value);return false;">
						<option value="0">请选择</option>
						<option value="<?php  echo EXAM_SINGLE;?>" >单选题</option>
						<option value="<?php  echo EXAM_JUDGE;?>">判断题</option>
						<option value="<?php  echo EXAM_MORE;?>">多选题</option>
					</select>
                    <span class="span2 floatL">请选择用户角色</span>
                </div>

				<div class="text" id='show_question_id'>
				</div>

                <div class="text" style='text-decoration: none;border-bottom: 6px solid #ccc;'>
					 <br>
                </div>
                <div>
					<ul class='lvchange'>
						<h1 style='font-size: 20px; border-bottom: 1px #333 solid; margin-top: 30px;padding-bottom: 5px;'>单选题</h1>
						<?php foreach($single_list as $val) { ?>
						<li id="k_k_<?php echo $val['id']; ?>"><span><?php echo $val['title']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><input type="button" value="删除" onclick='deleQustion(<?php echo $val['id']; ?>);return false;'>&nbsp;<input type="button" value="修改" onclick='updateQustion(<?php echo $val['id']; ?>);return false;'></span></li>
						<?php } ?>
					</ul>

					<ul class='lvchange'>
					    <h1 style='font-size: 20px; border-bottom: 1px #333 solid; margin-top: 30px;padding-bottom: 5px;'>判断题</h1>
						<?php foreach($judge_list as $val) { ?>
				        <li id="k_k_<?php echo $val['id']; ?>"><span><?php echo $val['title']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><input type="button" value="删除" onclick='deleQustion(<?php echo $val['id']; ?>);return false;'>&nbsp;<input type="button" value="修改"  onclick='updateQustion(<?php echo $val['id']; ?>);return false;'></span></li>
						<?php } ?>
					 </ul>


					 <ul class='lvchange'>
                        <h1 style='font-size: 20px; border-bottom: 1px #333 solid; margin-top: 30px;padding-bottom: 5px;'>多选题</h1>
						<?php foreach($more_list as $val) { ?>
                        <li id="k_k_<?php echo $val['id']; ?>"><span><?php echo $val['title']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><input type="button" value="删除" onclick='deleQustion(<?php echo $val['id']; ?>);return false;'>&nbsp;<input type="button" value="修改" onclick='updateQustion(<?php echo $val['id']; ?>);return false;'></span></li>
							<?php } ?>
                     </ul>
				</div>
                <div class="text">
                    <span class="floatL span1"></span>
                    <a href='/exam/index'><input type="button" class="btn btn-blue" id="createManager" value="返回"></a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
	.lvchange li{ margin:20px 0; }
	.lvchange li input{ float:right;margin-left:15px;}
</style>

<script>



function updateQustion(id){
	var id = id;
	if (id == 0 || id == '') {
		_msg='非法操作';
		_show_msg(_msg, 2000);
		return false;
	}
	$("textarea").each(function(){
			t_name=$(this).attr("name");
			CKEDITOR.instances[t_name]&&CKEDITOR.instances[t_name].destroy();
	});
	var url = '/exam/updateQuestion';
	 $.post(
			 url,
			 {
			 id:id
			 },
			 function(data) {
				 if (data["status"] == 1) {
				 //$("#q_type_id option[text='单选题']").attr("selected", true); 
				 //alert(data["xuan_list"]);
				 $("#q_type_id").html(data["xuan_list"]);
				 $("#show_question_id").html(data["data"]);
				 return false;
				 } else {
				 _show_msg(data['data'],2500); //_show_msg(data['data']['id'],2500);
				 }
				 return false;
			 },
			 "json"
		  );
	 return false;
}

function deleQustion(id){
	var id = id;
	if (id == 0 || id == '') {
		_msg='非法操作';
		_show_msg(_msg, 2000);
		return false;
	}
	var url = '/exam/delQuestion';
	 $.post(
			 url,
			 {
			 id:id
			 },
			 function(data) {
				 if (data["status"] == 1) {
					$("#k_k_"+id).remove();
					return false;
				 } else {
					_show_msg(data['data'],2500); //_show_msg(data['data']['id'],2500);
				 }
				 return false;
			 },
			 "json"
		  );
	 return false;
}

function getQuestion(q_type_id) {
	var q_type_id = q_type_id;
	if (q_type_id == 0 || q_type_id == '') {
		_msg='请选择题型';
		_show_msg(_msg, 2000);
		return false;
	}
	$("textarea").each(function(){
			t_name=$(this).attr("name");
			CKEDITOR.instances[t_name]&&CKEDITOR.instances[t_name].destroy();
	});
	var url = '/exam/getQuestioninfoTpl';
	 $.post(
			 url,
			 {
			 q_type_id:q_type_id
			 },
			 function(data) {
				 if (data["status"] == 1) {
					$("#show_question_id").html(data["data"]);
			 return false;
					//window.location.href='/manage/index';//登录成功后的默认页面.
				 } else {
					//_show_msg(message_info,2500);
					_show_msg(data['data'],2500); //_show_msg(data['data']['id'],2500);
				 }
				 return false;
			 },
			 "json"
		  );
	 return false;
}

 $(function(){
/*
        $('.close_pic_box').bind('click',function(){
            $('.close_box').hide();
        })
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
var sigle_list_arr=[];
//var sigle_list={};
document.domain="<?php echo MAIN_DOMAIN_INFO;?>";
var _cid_v='<?php echo $id; ?>'
function getShow(statu,msg) {
	if (statu == 0) {
		location.href="/exam/createTwo?id="+_cid_v;
		//$.jhh.cm.show_dialog({msg:msg,width:300,height:100});
	} else {
		$.jhh.cm.show_dialog({msg:msg,width:300,height:100});
	}
	return false;
}

</script>
