<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">合伙人列表</span></div>
    </div>
        <div class="search-wrap">
            <div class="search-content">
                <form method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="120">冻结状态:</th>
                            <td>
                                <select name="dele_status" id="">
                                    <option value="" >所有</option>
                                    <option value="<?php echo DELETE_STATUS;?>" <?php echo ($dele_status===DELETE_STATUS)?'selected':'';?>>已冻结</option>
                                    <option value="<?php echo NO_DELETE_STATUS;?>"  <?php echo ($dele_status===NO_DELETE_STATUS)?'selected':'';?>>未冻结</option>
                                </select>
                            </td>
                            <th width="120">审核状态:</th>
                            <td>
                                <select name="status" id="">
                                    <option value="" >所有</option>
                                    <option value="<?php echo VER_IN_AUDIT;?>"  <?php echo ($status===VER_IN_AUDIT)?'selected':'';?>>未审核</option>
                                    <option value="<?php echo VER_HAD_AUDIT;?>"  <?php echo ($status===VER_HAD_AUDIT)?'selected':'';?>>审核通过</option>
                                    <option value="<?php echo VER_NOT_AUDIT?>"  <?php echo ($status===VER_NOT_AUDIT)?'selected':'';?>>审核不通过</option>
                                </select>
                            </td>
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
                    <a class="freeze" href="javascript:void(0)" rel="1"><i class="icon-font"></i>冻结</a>
                    <a class="freeze" href="javascript:void(0)" rel="2"><i class="icon-font"></i>解冻</a>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>审核状态</th>
                        <th>介绍人</th>
                        <th>联系方式</th>
                        <th>是否冻结</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
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
                            <td><?php echo $v['intro_name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <td><?php echo $v['dele_status']?'未冻结':'已冻结';?></td>
                            <td><?php echo $v['create_time']?></td>
                            <td>
                                <a class="audit" href="<?php MAIN_PATH;?>/audit/edit/<?php echo $v['id'];?>" rel="<?php echo $v['id'];?>" >查看</a>
                                <?php /*
                                <a class="audit" href="<?php MAIN_PATH;?>/audit/detail/<?php echo $v['id'];?>" rel="<?php echo $v['id'];?>" >重置密码</a>
                                */ ?>
                            </td>

                        </tr>
                    <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
        </form>
    </div>
</div>

<script>
    /**
     * 处理审核和驳回
     * Created By YJ 2015-05-25
     */
    $(function(){
        var id,url='<?php echo ADMIN_PATH;?>/audit/ajaxManage',ids='',_msg={};
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
                    _util.showAutoBg(true);
                    window.location.reload();
                }
                _show_msg(_msg,2000);
            });
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
