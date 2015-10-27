<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">天使和VC投资项目测试工具</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">企业名称:</th>
                        <td>
                            <input name="s_name" id="s_name" value="<?php echo $s_name;?>" >
                        </td>
                        <th width="120">联系人:</th>
                        <td>
                            <input name="s_user_name" id="s_user_name" value="<?php echo $s_user_name;?>" >
                        </td>
                        <!--th width="120">企业性质:</th>
                        <td>
                            <select name="s_ent_character" id="s_ent_character">
                                <option value="-1" >--请选择--</option>
                                <option <?php echo $s_ent_character == 1?'selected="selected"':''; ?> value="1">民营私企</option>
                                <option <?php echo $s_ent_character == 2?'selected="selected"':''; ?> value="2">国有企业</option>
                                <option <?php echo $s_ent_character == 3?'selected="selected"':''; ?> value="3">集体企业</option>
                                <option <?php echo $s_ent_character == 4?'selected="selected"':''; ?> value="4">上市公司</option>
                                <option <?php echo $s_ent_character == 0?'selected="selected"':''; ?> value="0">其他</option>
                            </select>
                        </td>
                        <th width="120">融资需求:</th>
                        <td>
                            <select name="s_is_financing" id="s_is_financing">
                                <option value="-1" >--请选择--</option>
                                <option <?php echo $s_is_financing == 0?'selected="selected"':''; ?> value="0">暂不融资</option>
                                <option <?php echo $s_is_financing  == 1?'selected="selected"':''; ?> value="1">正在融资</option>
                        </td>
                        <th width="120">冻结状态:</th>
                        <td>
                            <select name="s_status" id="">
                                <option value="-1">--请选择--</option>
                                <option <?php echo $s_status == 1?'selected="selected"':''; ?> value="1">解冻</option>
                                <option <?php echo $s_status == 2?'selected="selected"':''; ?> value="2">冻结</option>
                            </select>
                        </td-->
                        <td><input class="btn btn-primary btn2" name="search" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            
            <!--a class="freeze" href="javascript:void(0)" rel="2"><i class="icon-font"></i>冻结</a>
            <a class="freeze" href="javascript:void(0)" rel="1"><i class="icon-font"></i>解冻</a-->
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <!--th ><input class="allChoose" id="allChoose" name="" type="checkbox"></th-->
                        <th class="tc" width="5%">ID</th>
                        <th>公司名称</th>
                        <th>一级行业</th>
                        <th>融资方式</th>
                        <th>拟融资金额</th>
                        <th>本年收入</th>
                        <th>联系姓名</th>
                        <th>联系手机</th>
                        <th>提交日期</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($data as $v){?>
                        <tr>
                            <!--td class="tc"><input name="ids"  type="checkbox" rel="<?php echo $v['id'];?>"></td-->
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['name']?></td>
                            <td>
                            <?php 
                                if($v['industry_id']){
                                    $tmp = explode(',',$v['industry_id']); 
                                    if($tmp){
                                        $r = $this->sk_cate_model->get_one('*','id ='.$tmp[0]); 
                                        if($r){
                                            echo $r['name'];
                                        }
                                    }
                                }
                            ?>
                            </td>
                            <td>
                                    <?php 
                                        if($v['financing_way']){
                                            switch($v['financing_way']){
                                                case 1:
                                                    echo '天使投资人';
                                                    break;
                                                case 2:
                                                    echo '投资机构投资';
                                                    break;
                                                case 3:
                                                    echo '股权众筹';
                                                    break;
                                                case 4:
                                                    echo '天使或创业投资基金';
                                                    break;
                                                case 5:
                                                    echo '以上均可';
                                                    break;
                                            }
                                        }
                                    ?>
                            </td>
                            <td><?php echo $v['financing_amount'];?></td>
                            <td>
                            <?php
                                if($v['revenue_this_year']){
                                    switch($v['revenue_this_year']){
                                        case 1:
                                            echo '无收入';
                                            break;
                                        case 2:
                                            echo '100万以下';
                                            break;
                                        case 3:
                                            echo '100-300万';
                                            break;
                                        case 4:
                                            echo '300-500万';
                                            break;
                                        case 5:
                                            echo '500万以上';
                                            break;
                                    } 
                                }
                            ?>
                            </td>
                            <td><?php echo $v['user_name']?></td>
                            <td><?php echo $v['user_mobile']?></td>
                            <td>
                            <?php 
                                $tmp = explode(' ',$v['ctime']);
                                echo $tmp[0];
                                if(count($tmp)>1){
                                        echo '<br>'.$tmp[count($tmp)-1];
                                }
                            ?>
                            </td>
                            <td>
                                    <a href="/angel_investigation_info/show?id=<?php echo $v['id'];?>">查看</a>
                                    <!--a class="freeze" href="javascript:void(0)"><?php echo $v['status'] == 1?'冻结':'解冻';?></a-->
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
        var id,url=config.domain.wf+'/angel_round/ajax_isdel',ids='',_msg={};
        
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
            data.status=_type;
            data.up='dele_status';

            obj.data=data;
            obj.type='post';
            obj.url=url;

            _util.ajax(obj,function(d){
                _msg.msg= d.msg;
                _msg.callback=function(){
                    window.location.reload();
                    $("input:checkbox[name='ids']").attr('checked',false);
                    $('#allChoose').attr('checked',false);
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
