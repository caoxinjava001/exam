<link href="<?php echo STATICS_PATH_CSS;?>/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo STATICS_PATH_CSS;?>/ui/jquery-ui-timepicker-addon.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/jq_min.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ui/jquery-ui.custom.min.js"></script> 
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ui/jquery.ui.datepicker-zh.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH_JS;?>/ui/jquery-ui-timepicker-zh-CN.js"></script>
<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="get">
                <table class="search-tab">
                    <tr>
                        <th width="120">姓名:</th>
                        <td>
                                <input name="s_name" id="s_name" type="text" value="<?php echo $search_info['s_name']?>">
                        </td>
                        <th width="120">企业名称:</th>
                        <td>
                                <input name="s_ent_name" id="s_ent_name" type="text" value="<?php echo $search_info['s_ent_name']?>">
                        </td>
                        <th width="80">开始时间:</th>
                        <td>
                                <input type="text" id="s_date_start" name="s_date_start" value="<?php echo (isset($search_info['s_date_start']) && $search_info['s_date_start']!='null') ? $search_info['s_date_start'] : '';?>" class="xx_time" style="width:100px;" />&nbsp;&nbsp;到&nbsp;&nbsp;
                        </td>
                        <th width="80">结束时间:</th>
                        <td>
								<input type="text" id="s_date_end" name="s_date_end" value="<?php echo (isset($search_info['s_date_end']) && $search_info['s_date_end']!='null') ? $search_info['s_date_end'] : '';?>" class="xx_time" style="width:100px;" />
                        </td>
                        <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <!--            <div class="result-title">-->
            <!--                <div class="result-list">-->
            <!--                    <a href="/main/cinsert"><i class="icon-font"></i>新增作品</a>-->
            <!--                    <input name="manage_type"  type="radio" rel="1" checked>审核通过-->
            <!--                    <input name="manage_type"  type="radio" rel="2">驳回-->
            <!--a class="freeze" href="javascript:void(0)" rel="1"><i class="icon-font"></i>冻结</a>
            <a class="freeze" href="javascript:void(0)" rel="2"><i class="icon-font"></i>解冻</a-->
            <!--                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>角色</th>
                        <th>姓名</th>
                        <th>审核状态</th>
                        <!--th>流程下游审批人</th-->
                        <th>企业名称</th>
                        <th>企业调查阶段</th>
                        <th>审查阶段</th>
                        <th>创建时间</th>
                        <!--th>操作</th-->
                        <?php /*
                        <th>操作</th>
                        */ ?>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['role_name']?></td>
                            <td><?php echo $v['m_name']?></td>
                            <td>
                                <?php
                                switch($v['status']){
                                    case VER_NOT_AUDIT:
                                        echo '审核不通过';
                                        break;
                                    case VER_IN_AUDIT:
                                        echo '未审核';
                                        break;
                                    case VER_HAD_AUDIT:
                                        echo '已审核通过';
                                        break;
                                }
                                ?>
                            </td>
                            <!--td>
                                <select class="bind_next" rel="<?php echo $v['id'];?>">
                                    <option value="" >未指定</option>
                                    <?php foreach($v['next_audit'] as $val){?>
                                        <option value="<?php echo $val['id'];?>" <?php echo ($v['next_id']==$val['id'])?'selected':'';?>><?php echo  $val['name'];?></option>
                                    <?php }?>
                                </select>
                            </td-->
                            <td><?php echo $v['ent_name']; ?></td>
                            <td><?php echo $v['ent_stage']; ?></td>
                            <td><?php 
                                if($v['role_id']){
                                    switch($v['role_id']){
                                        case 400:
                                            echo '一级审查';
                                            break;
                                        case 500:
                                            echo '二级审查';
                                            break;
                                        case 600:
                                            echo '三级审查';
                                            break;
                                        case 700:
                                            echo '四级审查';
                                            break;
                                        case 800:
                                            echo '一级审查';
                                            break;
                                        case 900:
                                            echo '二级审查';
                                            break;
                                    } 
                                }
                            ?></td>
                            <td><?php echo $v['create_time']?substr($v['create_time'],0,10):''; ?></td>
                            <!--td><a href="/manage_sale/index?id=<?php echo $v['id'];?>">修改</a></td-->
                            <?php /*
                            <td>
                                <a class="audit" href="<?php MAIN_PATH;?>/audit/detail/<?php echo $v['id'];?>" rel="<?php echo $v['id'];?>" >重置密码</a>
                            </td>
                            */ ?>
                        </tr>
                    <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
	/****日历 start***/
	$('#s_date_start').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel:true,
		closeText:"关闭",
		onSelect:function(selectedDate){
			//当选择开始日期后，设置结束日期的最小值
			$( "#s_date_end" ).datepicker( "option", "minDate", selectedDate );
		} 
	});
	
	$('#s_date_end').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		closeText: "关闭",
		onSelect:function(selectedDate){
			//当开选择开始日期后，设置结束日期的最小值
			$( "#date_start" ).datepicker( "option", "maxDate", selectedDate );
		} 
	});
	/***日历 end***/
});
    /**
     * 处理冻结和解冻
     * Created By YJ 2015-05-25
     */
    $(function(){
        var id,url=config.domain.wf+'/audit/ajaxManage',ids='',_msg={};
        //批量审核
        $('.freeze').bind('click',function(){
            var obj={},data={};
            var _dom= $("input:checkbox[name='ids']:checked");
            var _type= $(this).attr('rel');
            var _len=_dom.length;
            var i=1;
            var _s='';
            _dom.each(function () {
                ids+=$(this).parent().next().html();
                if(i<_len){
                    ids+=',';
                }
                i+=1;
            });

            data.id=ids;
            data.type=_type;
            data.up='dele_status';

            obj.data=data;
            obj.type='post';
            obj.url=url;

            _util.ajax(obj,function(d){
                _msg.msg= d.msg;
                _msg.callback=function(){
                    window.location.reload();
                }
                _show_msg(_msg,2000);
            });
        })
    })

    /**
     * 绑定下游审批人
     */
    $('.bind_next').change(function () {
        var _box={},obj={},data={};
        if(confirm("确定要修改下游审核人吗？")){
            data.id=$(this).attr('rel');
            data.role_id=$(this).val();
            obj.url=config.domain.wf+'/manage/bindNext';
            obj.data=data;
            obj.type='post';

            _util.ajax(obj,function(d){
                _box.msg= d.msg;
                _box.callback=function(){
                }
                _show_msg(_box,2000);
            });
        }
    });
    //全选
    $('.allChoose').bind('click',function(){
        var _this_status=$(this).attr('checked');
        if(_this_status=='checked'){
            $("input[name='ids']").attr('checked',true);
        }else{
            $("input[name='ids']").attr('checked',false);
        }
    })

</script>
<!--/main-->
