<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">企业待审列表</span></div>
    </div>

    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>介绍人</th>
                        <th>联系方式</th>
                        <?php if($role==ROLE_SIX){?>
                        <th>所属行业</th>
                            <?php /*
                        <th>上市方式</th>
                            */ ?>
                        <?php }?>
                        <?php if($role>ROLE_ONE){?>
                        <th><?php echo $process;?></th>
                        <?php }?>
                        <th>注册日期</th>
                        <th>操作</th>
                    </tr>
                        <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" ></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
                            <td><?php echo $v['intro_name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <?php if($role==ROLE_SIX){?>
                                <td><?php echo $v['industry_name']?></td>

                            <?php /*
                                <td><?php echo $v['type_name']?></td>
                             */ ?>

                            <?php }?>
                            <?php if($role>ROLE_ONE){?>
                            <td><?php echo $v['suggest']?></td>
                            <?php }?>
                            <td><?php echo $v['create_time']?></td>
                            <td>
                                <a class="show_pic" href="javascript:void(0)" rel="<?php echo $v['id'];?>" pro="<?php echo $v['pro_resource'];?>" fin="<?php echo $v['fin_resource'];?>">审核</a>
                            </td>
                        </tr>
                        <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>

<form id="form_sub">
    <input type="hidden" name="id" id="id"/>
    <div class="pic_box close_box" style="display:none;left: 50%;margin-left: -325px;margin-top: -100px;position:fixed;top: 20%;z-index: 100;width:650px;height:400px; background-color:#fff;border:1px solid #000;">
        <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
        <div style="margin:20px 0 0 20px;">
            <div style="margin:60px 0 0 0;">生产经营信息表:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="pro_file" >查看</a></div>
            <div style="margin:20px 0 0 0;">财务信息表:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="fin_file" >查看</a></div>
        </div>
        <?php if($role==ROLE_FOUR){?>
        <div style="margin:10px 0 0 20px;">分类操作：
            <select name="industry" id="industry">
                <option value="">选择行业</option>
                <?php foreach($industry as $v){?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['name'];?></option>
                <?php }?>
            </select>
            <?php /*
            <select  name="type" id="type">
                <option value="">选择行业</option>
                <?php foreach($type as $v){?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['name'];?></option>
                <?php }?>
            </select>
            */ ?>
        </div>
        <?php }?>
        <?php if($role==ROLE_SIX){?>
            <div style="display: block;margin:10px 0 0 20px;">分配投资经理：
                <select name="next_id">
                    <option value="">请选择</option>
                    <?php foreach($next_person as $v){?>
                        <option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
                    <?php }?>
                </select>
                <span style="color:red">* 审核通过必选，不通过不选择</span>
            </div>
        <?php }?>
        <div style="margin:10px 0 0 20px;">审核操作：
            <select name="pro_type">
                <option value="1">审核通过</option>
                <option value="2">驳回</option>
            </select>
        </div>
        <div style="margin:25px 0 0 20px;">附言：</div>
        <textarea name="pro_tip" id="pro_tip" cols="60" rows="5" style="margin:10px 0 0 20px;"></textarea>
        <a class="end" href="javascript:void(0)" style="margin:10px 0 0 100px;">完成</a>
    </div>

</form>

<script>
    /**
     * Created By YJ 2015-05-25
     */
    $(function(){
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
    })

</script>
<!--/main-->
