<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name"> 市值企业列表</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="get">
                <table class="search-tab">
                    <tr>
                        <th width="80">企业：</th>
                        <td>
                            <input type="text" name="org_name" placeholder="企业全称" value="<?php echo $org_name_v;?>"/>
                        </td>
                        <th width="80">可信度：</th>
                        <td>
                            <select name="truth" id="">
                                <option value=""> 所有</option>
                                <option value="<?php echo TRUTH_NORMAL;?>" <?php echo ($truth==TRUTH_NORMAL)?'selected':'';?>> 正常</option>
                                <option value="<?php echo TRUTH_INVALID;?>" <?php echo ($truth==TRUTH_INVALID)?'selected':'';?>> 无效</option>
                                <option value="<?php echo TRUTH_QUERY;?>"  <?php echo ($truth==TRUTH_QUERY)?'selected':'';?>>质疑</option>
                            </select>
                        </td>
                        <th width="80">审核权重：</th>
                        <td>
                            <select name="level" id="">
                                <option value=""> 所有</option>
                                <option value="<?php echo AUDIT_LEVEL_ONE;?>" <?php echo ($level==AUDIT_LEVEL_ONE)?'selected':'';?>> 一级审查</option>
                                <option value="<?php echo AUDIT_LEVEL_TWO;?>" <?php echo ($level==AUDIT_LEVEL_TWO)?'selected':'';?>> 二级审查</option>
                                <option value="<?php echo AUDIT_LEVEL_THREE;?>"  <?php echo ($level==AUDIT_LEVEL_THREE)?'selected':'';?>>三级审查</option>
                                <option value="<?php echo AUDIT_LEVEL_FOUR;?>"  <?php echo ($level==AUDIT_LEVEL_FOUR)?'selected':'';?>>四级审查</option>
                            </select>
                        </td>
                        <!--                            <th width="70">关键字:</th>-->
                        <!--                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>-->
                        <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        <td><a class="btn btn-primary btn2" href="/market/addUpdateInfo"  target='_blank'>增加市值企业</a></td>
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
                        <th>企业名称</th>
                        <th>联系人</th>
                        <th>联系手机</th>
                        <th>业务代码</th>
                        <th>内容疑问</th>
                        <th>尽调状态</th>
                        <th>可信度</th>
                        <th>注册日期</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <td class="tc"><input name="ids"  type="checkbox" ></td>
                            <td>
                                <div class="tag_box">
                                    <?php echo $v['id']?>
                                    <em class="<?php echo $v['is_read']?'new_tag':'';?>"></em>
                                </div>
                            </td>
                            <td><?php echo $v['org_name']?></td>
                            <td><?php echo $v['link_name']?></td>
                            <td><?php echo $v['mobile']?></td>
                            <td><?php echo $v['code']?></td>
                            <td><?php if ($v['nr_status'] == 0) { echo "有";} else { echo "无";}?></td>
                            <td><?php echo $v['audit_status']?></td>

                            <td>
							<?php 
							if($v['kx_status'] == TRUTH_NORMAL) { 
								echo "正常";
							}elseif($v['kx_status'] == TRUTH_INVALID){ 
								echo "无效";
							}else{
								echo "质疑";
							}
							?>
							</td>
                            <td><?php echo substr($v['create_time'],0,10);?></td>
                            <td>
                                <a href="<?php echo ADMIN_PATH.'/market/addUpdateInfo?id='.$v['id'];?>">修改</a>
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
     * Created By YJ 2015-05-25
     */
    $(function(){
        var _host=config.domain.wf;
        var _url=_host+'/object/ajaxAudit';
        var _id,_sur;
        var _data={},obj={},_msg={};
        //第一步
        $('.show_pic').bind('click',function(){
            _id=$(this).attr('rel');
            $('#id').attr('value',_id);
            _sur=$(this).attr('sur');
            if(_sur){$('#sur_file').attr('href',_sur);}else{ $('#sur_file').html('暂无文件')}
            $('.say_suggest').html('');

            obj.data={id:_id,type:2};
            obj.type="post";
            obj.url=_host+'/object/ajaxAlert';
            _util.ajax(obj, function (d) {
                if(d.len>0){
                    var messge=d.data['name']+' : '+ d.data['sur_mark'];
                    $('.say_suggest').html(messge);
                }
            });
            $('.pic_box2').show();
        })
        $('.close_pic_box').bind('click',function(){
            $('.close_box').hide();
            $('.down_file').attr('href','');
        })

        //完成
        $('.end').bind('click',function(){
            fin_type=$("input:radio[name='fin_type']:checked").attr('rel');

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
