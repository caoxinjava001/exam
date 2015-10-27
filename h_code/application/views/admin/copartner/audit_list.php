<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">合伙人待审列表</span></div>
    </div>

    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <input name="manage_type"  type="radio" rel="1" checked>审核通过
                    <?php /*
                    <input name="manage_type"  type="radio" rel="2">驳回
                    */　?>
                    <a id="manage_all" href="javascript:void(0)" ><i class="icon-font"></i>批量处理</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>手机</th>
                        <th>邮箱</th>
                        <th>介绍人</th>
                        <th>个人证件号</th>
                        <th>机构证件号</th>
                        <th>提交审核时间</th>
                        <th>审核个人</th>
                        <th>审核机构</th>
                        <th>审核操作</th>
                    </tr>
                        <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <td><?php echo $v['email']?></td>
                            <td><?php echo $v['intro_name']?></td>
                            <td><?php echo $v['identify_num']?></td>
                            <td><?php echo $v['org_num']?></td>
                            <td><?php echo $v['submit_time']?></td>
                            <td><a class="show_pic" href="javascript:void(0)" rel="<?php echo PIC_PATH.$v['identify_pic'];?>">查看</a></td>
                            <td><a class="show_pic" href="javascript:void(0)" rel="<?php echo PIC_PATH.$v['yy_pic'];?>">查看</a></td>
                            <td>
                                <a class="audit_pass" href="javascript:void(0)" rel="<?php echo $v['id'];?>" deal_type="1">通过</a>
                                <a class="audit_no_pass" href="javascript:void(0)" rel="<?php echo $v['id'];?>" deal_type="2">驳回</a>
                            </td>
                        </tr>
                        <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>
<div id="pic_box" style="display:none;left: 50%;margin-left: -325px;margin-top: -100px;position:absolute;top: 20%;z-index: 100;width:650px;height:550px; background-color:#fff;border:1px solid #ddd;">
    <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
    <img src="" alt="" width="650"/>
</div>
<div id="error_box" style="display:none;left: 50%;margin-left: -325px;margin-top: -100px;position:fixed;top: 20%;z-index: 100;width:650px;height:350px; background-color:#fff;border:1px solid #ddd;">
    <div class="close_pic_box" style="float: right;margin:5px 10px 0 0;color:red;font-size:20px;cursor: pointer;">X</div>
    <div style="margin:30px 0 0 30px;font-size:15px;">驳回原因：</div>
    <div style="margin:30px 0 0 30px;font-size:15px;">
        <textarea style="width: 580px; height: 157px;" id="error_mark"></textarea>
    </div>
    <div style="margin:30px auto;font-size:15px;width:50px">
        <button id="do_it">提 交</button>
    </div>
</div>
<script>
    /**
     * Created By YJ 2015-05-25
     */
    //显示用户图片
    $('.show_pic').bind('click',function(){
        var pic_uri=$(this).attr('rel');
        $('#pic_box>img').attr('src',pic_uri);
        $('#pic_box').show();
    })
    $('.close_pic_box').bind('click',function(){
        $('#pic_box').hide();
        $('#error_box').hide();
        $('#pic_box>img').attr('src','');
    })
    //处理审核和驳回
    $(function(){
        var id,url=config.domain.wf+'/audit/ajaxManage',type,ids='',tip='',_msg={},obj={},data={};
        //单个审核
        $('.audit_pass').bind('click',function(){
            data.id=$(this).attr('rel');
            data.type=$(this).attr('deal_type');
            data.up='status';

            obj.data=data;
            obj.type='post';
            obj.url=url;
            if(confirm('确定此操作？')) {
                _util.ajax(obj, function (d) {
                    _msg.msg = d.msg;
                    _msg.callback = function () {
                        //审核通过,跳转到绑定权限页面。
                        window.location.reload();
                        //location.href = '/information_auth/binding?mid='+d.data;
                    }
                    _show_msg(_msg, 2000);
                });
            }
        })
        //单个驳回
        $('.audit_no_pass').bind('click',function(){
            data.id=$(this).attr('rel');
            data.type=$(this).attr('deal_type');
            data.up='status';
            $('#error_box').show();
            $('#do_it').bind('click',function(){
                data.tip=$('#error_mark').val();
                if(!data.tip){
                    _show_msg('请写入驳回原因！');
                    return;
                }
                obj.data=data;
                obj.type='post';
                obj.url=url;
                if(confirm('确定此操作？')) {
                    _util.ajax(obj, function (d) {
                        _msg.msg = d.msg;
                        _msg.callback = function () {
                            window.location.reload();
                            $('#error_mark').val('');
                        }
                        _show_msg(_msg, 2000);
                    });
                }
            });
        })
        //批量审核
        $('#manage_all').bind('click',function(){
            var _dom= $("input:checkbox[name='ids']:checked");
            var _type= $("input:radio[name='manage_type']:checked").attr('rel');
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
            data.up='status';
            data.type=_type;
            data.id=ids;

            obj.url=url;
            obj.type='post';
            obj.data=data;
            if(confirm('确定此操作？')) {

                _util.ajax(obj, function (d) {
                    _msg.msg = d.msg;
                    _msg.callback = function () {
                        window.location.reload();
                    }
                    _show_msg(_msg, 2000);
                });
            }
        })


    })

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
