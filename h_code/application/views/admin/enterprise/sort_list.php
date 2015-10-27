<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="get">
                <table class="search-tab">
                    <tr>
                        <th width="120">分类名称:</th>
                        <td>
                        <input type="text" name="search_name" value="<?php echo $search_name; ?>" />
                        </td>
                        <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
            <a id="updateOrd" href="/enterprise_sort/index" style="float: right;margin-top: 110px;position: absolute;right: 20px;top: 0;" class="btn btn-primary btn2"><i class="icon-font"></i>创建分类</a>
        </div>
    </div>
    <div class="result-wrap">
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><!--input class="allChoose" name="" type="checkbox"--></th>
                        <th style ="text-align:center" >分类名称</th>
                        <th class="tc" width="10%">操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <!--td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td-->
                            <td></td>
                            <td align="center"><?php echo $v['name']?></td>
                            <td>
                                <a href="/enterprise_sort/index?id=<?php echo $v['id'];?>">修改</a>
                                <a class="delete" href="javascript:void()" sort_id="<?php echo $v['id'];?>">删除</a>
                            </td>
                        </tr>
                    <?php }?>
                </table>
                <div class="list-page"> <?php echo $pages;?></div>
            </div>
    </div>
</div>

<script>
    /**
     * 处理冻结和解冻
     * Created By YJ 2015-05-25
     */
    $(function(){
        var id,url=config.domain.wf+'/enterprise_sort/delete',id='',_msg={};
        //批量审核
        $('.delete').bind('click',function(){
            var obj={},data={};
            var _dom= $("input:checkbox[name='sort_id']:checked");
            var _type= $(this).attr('rel');
            var _len=_dom.length;
            var i=1;
            var _s='';
            var id = $(this).attr('sort_id'); 
            //alert(id);

            data.id=id;
            data.type=_type;
            data.up='dele_status';

            obj.data=data;
            obj.type='post';
            obj.url=url;
            if(confirm("确定要删除吗？")){
                    _util.ajax(obj,function(d){
                        _msg.msg= d.msg;
                        _msg.callback=function(){
                            window.location.reload();
                        }
                        _show_msg(_msg,2000);
                    });
            }
        })
    })

</script>
<!--/main-->
