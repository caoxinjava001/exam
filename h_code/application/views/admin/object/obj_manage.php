<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">项目待审列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="get">
                <table class="search-tab">
                    <tr>
                        <th width="120">筛选项目：</th>
                        <td>
                            <select name="industry" id="">
                                <option value="" >按行业</option>
                                <?php foreach($industry as $v){?>
                                    <option value="<?php echo $v['id'];?>" <?php echo ($industry_id==$v['id'])?'selected':'';?>><?php echo $v['name'];?></option>
                                <?php }?>
                            </select>
                        </td>
                        <?php /*?>
                        <td>
                            <select name="type" id="">
                                <option value="" >按上市方式</option>
                                <?php foreach($type as $v){?>
                                <option value="<?php echo $v['id'];?>"  <?php echo ($type_id==$v['id'])?'selected':'';?>><?php echo $v['name'];?></option>
                                <?php }?>
                            </select>
                        </td>
                        */ ?>
                        <!--                            <th width="70">关键字:</th>-->
                        <!--                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>-->
                        <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>企业名称</th>
                        <th>联系方式</th>
                        <th>所属行业</th>
                        <?php /*
                        <th>上市板块</th>
                        */ ?>
                        <th>投资经理</th>
                        <th>项目状态</th>
                        <th>生产经营信息表</th>
                        <th>财务信息表</th>
                        <th>是否冻结</th>
                        <th>注册日期</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" ></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
                            <td><?php echo $v['org_name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <td><?php echo $v['industry_name']?></td>
                            <?php /*
                            <td><?php echo $v['type_name']?></td>
                            */ ?>
                            <td><?php echo $v['manager']?></td>
                            <td><?php echo $v['obj_step']?></td>
                            <td><a href="<?php echo ADMIN_PATH.$v['pro_resource'];?>">查看</a></td>
                            <td><a href="<?php echo ADMIN_PATH.$v['fin_resource'];?>">查看</a></td>
                            <td><?php echo $v['dele_status']?'未冻结':'已冻结';?></td>

                            <td><?php echo $v['create_time']?></td>
                            <td>
                                <?php if($is_next==$v['next_id']){?>
                                    <?php if($v['obj_status'] == OBJ_ONE && $v['status']==VER_IN_AUDIT) {?>
                                    <a class="show_pic" href="javascript:void(0)" rel="<?php echo $v['id'];?>" sur="<?php echo $v['sur_resource'];?>">上传尽调报告</a>
                                    <?php }elseif($v['obj_status'] == OBJ_FOUR && $v['status']==VER_IN_AUDIT){?>
                                        <a class="edit_status" href="javascript:void(0)" rel="<?php echo $v['id'];?>" >更新终审状态</a>
                                    <?php }?>
								<?php }?>
                            </td>
                        </tr>
                    <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>
<form id="edit_form">
    <input type="hidden" name="id" id="edit_id"/>
    <div class="show_edit_status " style="display:none;left: 50%;margin-left: -150px;margin-top: -100px;position:fixed;top: 40%;z-index: 100;width:300px;height:200px; background-color:#fff;border:1px solid #000;">
    <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
    <div style="margin:50px 0 0 80px;">
        <input type="radio" name="end_status" value='1' checked />终审通过
        <input type="radio" name="end_status" value='2' />否决
    </div>
    <input type="button" id="sub_edit_status" value='确定' style="margin:50px 0 0 80px;">
    <input type="button" class="close_pic_box" value='取消' style="margin:50px 0 0 30px;">
</div>
</form>

<iframe name="myupfile" border=0 hidden='yes' width=0 height=0></iframe>
<form id="info_submit" method='post' action="/object/ajaxManage" enctype="multipart/form-data" target="myupfile">
    <input type="hidden" name="id" id="id"/>
    <div class="pic_box2 close_box" style="display:none;left: 50%;margin-left: -325px;margin-top: -100px;position:fixed;top: 20%;z-index: 100;width:650px;height:400px; background-color:#fff;border:1px solid #000;">
        <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
        <div style="margin:20px 0 0 20px;">
            <div>尽调报告</div>
            <div style="display: block;margin:20px 0 0 50px;">
				 尽调文件:<input type="file" class="sect_1 floatL" name="survey"  value="">
            </div>
        </div>
		<?php /*
        <div style="margin:10px 0 0 20px;">审核操作：
            <select name="sur_type">
                <option value="1">审核通过</option>
                <option value="2">打回修改</option>
                <option value="3">否决企业融资计划</option>
            </select>
        </div>
		*/ ?>
        <div style="margin:25px 0 0 20px;">附言：</div>
        <textarea name="sur_tip"  cols="60" rows="5" style="margin:10px 0 0 20px;"></textarea>
        <input type="submit" value='完成' style="margin:10px 0 0 20px;">
    </div>
</form>

<script>
    /**
     * Created By YJ 2015-05-25
     */
    $(function(){
        var _host=config.domain.wf;
        var _url=_host+'/object/ajaxManage';
        var _id,_sur;
        var _data={},obj={},_msg={};
        //第一步
        $('.show_pic').bind('click',function(){
            _id=$(this).attr('rel');
            $('#id').attr('value',_id);
            $('.pic_box2').show();
            getAlert(_id);
        })
        $('.close_pic_box').bind('click',function(){
            $('.close_box').hide();
            $('.show_edit_status').hide();
            $('.down_file').attr('href','');
        })


        $('.end').bind('click',function(){
			});
        //完成
        //$('.end').bind('click',function(){
        //    _data=$('#form_sub').serialize();
        //    obj.data=_data;
        //    obj.type="post";
        //    obj.url=_url;
        //    if(confirm('确定提交吗？')) {
        //        _util.ajax(obj, function (d) {
        //            _msg.msg = d.msg;
        //            _msg.callback = function () {
        //                window.location.reload();
        //                $('#fin_tip,#pro_tip').val('');

        //            }
        //            _show_msg(_msg, 2000);
        //        });
        //    }
        //})

        /**
         * 获取打回修改提示弹框
         * @param eid
         */
        function getAlert(eid) {
            _data.id=eid;
            _data.type=1;   //查询打回的
            obj.type = "post";
            obj.url = _host + '/object/ajaxAlert';
            obj.data =_data;
                _util.ajax(obj, function (d) {
                    _msg.len = d.len;
                    if (_msg.len > 0) {
                        $('#info_submit').after(d.data);
                    }
                });
        }
        //关闭打回弹窗
        $('.obj_close').live('click',function(){
            $(this).parent('.obj_alert').fadeOut();
            $(this).parent('.obj_alert').next('.obj_screen').fadeOut();
        })
        /**
         * 终审操作
         */
        $('.edit_status').bind('click',function(){
            _id=$(this).attr('rel');
            $('#edit_id').val(_id);
            $('.show_edit_status').show();
        })
        $('#sub_edit_status').bind('click',function(){
            _data=$('#edit_form').serialize();
            obj.data=_data;
            obj.type="post";
            obj.url=_host+'/object/ajaxEndStatus';
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
    })


</script>
<script type="text/javascript">
document.domain="xinnuos.com";
function getShow(statu,msg) {
	if (statu == 0) {
		location.href="/object/actionList";
	} else {
		_show_msg(msg,2500); //_show_msg(data['data']['id'],2500);
	}
	return false;
}

</script>
<!--/main-->
