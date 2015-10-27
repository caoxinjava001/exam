<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">企业列表</span></div>
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
                        <th>介绍人</th>
                        <th>联系方式</th>
                        <th>审核阶段</th>
                        <th>生产经营信息表</th>
                        <th>财务信息表</th>
                        <th>分类情况</th>
                        <th>是否冻结</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
                            <td><?php echo $v['intro_name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <td><?php echo $v['progress'];?></td>
                            <td><a href="<?php echo ADMIN_PATH.$v['pro_resource'];?>">查看</a></td>
                            <td><a href="<?php echo ADMIN_PATH.$v['fin_resource'];?>">查看</a></td>
                            <td><?php echo ($v['industry_name']||$v['type_name'])?$v['industry_name']:'未分类';?></td>
                            <td><?php echo $v['dele_status']?'未冻结':'已冻结';?></td>
                            <td><?php echo $v['create_time']?></td>
                            <td>
                                <a class="audit" href="<?php echo ADMIN_PATH.'/enterprise/detail/'.$v['id'];?>" rel="<?php echo $v['id'];?>" >查看</a>
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
     * 处理冻结和解冻
     * Created By YJ 2015-05-25
     */
    $(function(){
        var id,url=config.domain.wf+'/enterprise/ajaxFreeze',ids='',_msg={};
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
