<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">充值卡列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="get">
                <table class="search-tab">
                    <tr>
                        <th width="100">充值卡号:</th>
                        <td>
                            <input type="text" name="number" id="number" value="<?echo $number; ?>"/>
                        </td>
                        <?php if($login_role==MANGER_ROLE_INFO){?>
                        <th width="100">代理商名称:</th>
                        <td>
                            <input type="text" name="s_name" id="s_name" value="<?echo $s_name; ?>" /> 
                        </td>
                        <?php }?>
                        <th width="80">卡状态:</th>
                        <td>
                            <select name="select_id">
                                <option value="" <?php echo $select_id==''?'selected':'';?>>所有</option>
                                <option value="0" <?php echo (strlen($select_id)>0&&$select_id==0)?'selected':'';?>>未激活</option>
                                <option value="1" <?php echo (strlen($select_id)>0&&$select_id==1)?'selected':'';?>>激活</option>
                            </select>
                        </td>
                        <th width="120">开始/结束时间:</th>
                        <td>
                            <input type="text" name="start_time" id="s_date_start" class="xx_time"  value="<?echo $start_time; ?>" />
                        </td>
                        <td>
                            <input type="text" name="end_time" id="s_date_end" class="xx_time" value="<?echo $end_time; ?>" />
                        </td>
                        <td>
                            <input class="btn btn-primary btn2" value="查询" type="submit">
                        </td>

                    </tr>
                    <?php if($login_role==MANGER_ROLE_INFO){?>
                    <tr>
                        <td></td>
                        <td>
                            <a id="updateOrd" href="/card/create" class="btn btn-primary btn2"><i class="icon-font"></i>增加充值卡</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
<!--            <a id="dele_select_agents" class="btn btn-primary btn2" href="javascript:;" >批量删除</a>-->
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
<!--                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>-->
                        <th>ID</th>
                        <th>充值卡号</th>
                        <th>代理商</th>
                        <th>卡状态</th>
                        <th>使用人</th>
                        <th>使用时间</th>
                        <?php if($login_role==MANGER_ROLE_INFO){?>
                        <th>操作</th>
                        <?php }?>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
<!--                            <td class="tc"><input name="ids"  type="checkbox" rel="--><?php //echo $v['id'];?><!--"></td>-->
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['number']?></td>
                            <td><?php echo $v['admin_name']?></td>
                            <td><?php echo $v['use_status']==1?'已使用':'未使用'?></td>
                            <td><?php echo $v['user_name']?></td>
                            <td><?php echo $v['use_start_time'],' --- ',$v['use_end_time']?></td>
                            <?php if($login_role==MANGER_ROLE_INFO){?>
                            <td>
                                <a class="audit" href="<?php MAIN_PATH;?>/card/edit?id=<?php echo $v['id'];?>" >修改</a>
<!--                                <a class="dele_Agent" href="javascript:;" rel="--><?php //echo $v['id'];?><!--" >删除</a>-->
                            </td>
                            <?php }?>
                        </tr>
                    <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-timepicker-addon.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery.ui.datepicker-zh.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui-timepicker-zh-CN.js"></script>
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
</script>
<!--/main-->
