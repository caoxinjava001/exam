<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">项目待审列表</span></div>
    </div>
    <div class="result-wrap">
        <div class="main">
        <div class="section">
            <div class="head">
                <span>基本信息</span>
            </div>
            <div class="body">
                <ul class="base_info">
                    <li>
                        <label >企业全称：</label>
                        <div class="text_1"><?php echo $org_name;?></div>
                    </li>
                    <li>
                        <label >业务代码：</label>
                        <div class="text_1"><?php echo $code;?></div>
                    </li>
                    <li>
                        <label >主营产品或服务：</label>
                        <div class="text_1"><?php echo $pro_info;?></div>
                    </li>
                    <li>
                        <label >主营行业：</label>
                        <div class="text_1"><?php echo $industry_name?></div>
                    </li>
                    <li>
                        <label >联系人：</label>
                        <div class="text_1"><?php echo $link_name;?></div>
                    </li>
                    <li>
                        <label >联系方式：</label>
                        <div class="text_1"><?php echo $mobile;?></div>
                    </li>
                    <li>
                        <label >生产经营信息表:</label>
                        <div class="text_1 dis_none">
                            <?php if(!empty($sc_res)){?>
                            <a href="<?php echo $sc_res;?>">查看</a>
                            <?php }else{?>
                                <span style="color:red;">暂无</span>
                            <?php }?>
                        </div>
                    </li>
                    <li>
                        <label >营业执照：</label>
                        <div class="text_1 dis_none">
                            <?php if(!empty($yy_res)){?>
                                <a href="<?php echo $yy_res;?>">查看</a>
                            <?php }else{?>
                                <span style="color:red;">暂无</span>
                            <?php }?>
                        </div>
                    </li>
                    <li>
                        <label >组织机构代码证：</label>
                        <div class="text_1 dis_none">
                            <?php if(!empty($og_res)){?>
                                <a href="<?php echo $og_res;?>">查看</a>
                            <?php }else{?>
                                <span style="color:red;">暂无</span>
                            <?php }?>
                        </div>
                    </li>
                    <li>
                        <label >税务证：</label>
                        <div class="text_1 dis_none">
                            <?php if(!empty($xw_res)){?>
                                <a href="<?php echo $xw_res;?>">查看</a>
                            <?php }else{?>
                                <span style="color:red;">暂无</span>
                            <?php }?>
                        </div>
                    </li>
                    <li>
                        <label >其他附件：</label>
                        <div class="text_1 dis_none">
                            <?php if(!empty($other_res)){?>
                                <a href="<?php echo $other_res;?>">查看</a>
                            <?php }else{?>
                                <span style="color:red;">暂无</span>
                            <?php }?>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="section">
            <div class="head">
                <span>近三年财务情况</span>
            </div>
            <div class="body">
                <div class="show_nav_box">
                    <div class="nav current_show">2014年度</div>
                    <div class="nav">2013年度</div>
                    <div class="nav">2012年度</div>
                    <div class="clear_float"></div>
                </div>
                <?php $i=1; foreach($cw_info as $v){?>
                <ul class="base_info show_no<?php echo $i;?>">
                    <li>
                        <label >资产总额:</label>
                        <div class="text_1"><?php echo $v['zc_total'];?> 万元</div>
                    </li>
                    <li>
                        <label >净资产：</label>
                        <div class="text_1"><?php echo $v['jzc_total'];?> 万元</div>
                    </li>
                    <li>
                        <label >营业成本额：</label>
                        <div class="text_1"><?php echo $v['yy_cb'];?> 万元</div>
                    </li>
                    <li>
                        <label >企业所得税：</label>
                        <div class="text_1"><?php echo $v['qy_sd'];?> 万元</div>
                    </li>
                    <li>
                        <label >净利润：</label>
                        <div class="text_1"><?php echo $v['m_ly'];?> 万元</div>
                    </li>
                    <li>
                        <label >报税工资表年平均人数：</label>
                        <div class="text_1"><?php echo $v['m_bs'];?> </div>
                    </li>
                </ul>
                <?php $i++;}?>
            </div>
        </div>
        <div class="section">
            <div class="head">
                <span>监控管理</span>
            </div>
            <div class="body">
                <ul class="base_info show_no1">
                    <li>
                        <label >可信度:</label>
                        <?php if($my_role_id==ROLE_FOUR){?>
                        <div class="text_1">
                            <select id="kx_select">
                                <option value="<?php echo TRUTH_NORMAL;?>" <?php echo (intval($kx_status)===TRUTH_NORMAL)?'selected':'';?>>正常</option>
                                <option value="<?php echo TRUTH_INVALID;?>" <?php echo (intval($kx_status)===TRUTH_INVALID)?'selected':'';?>>无效</option>
                                <option value="<?php echo TRUTH_QUERY;?>" <?php echo (intval($kx_status)===TRUTH_QUERY)?'selected':'';?>>质疑</option>
                            </select>
                            <button id="sub_kx_btn" entid="<?php echo $id;?>"> 确定 </button>
                            <div class="text_1 info_kx" style="<?php echo $kx_status==TRUTH_NORMAL?'display:none':'';?>">
                                <input type="text" id="kx_info" value="<?php echo $kx_info;?>"/>
                            </div>
                        </div>
                        <?php }else{?>
                        <div class="text_1">
                            <?php echo $kx_status==TRUTH_NORMAL?'正常':'';echo $kx_status==TRUTH_INVALID?'无效':'';echo $kx_status==TRUTH_QUERY?'质疑':'';?>
                        </div>
                        <div class="text_1">
                            <?php echo $kx_info;?>
                        </div>
                        <?php }?>
                    </li>
                    <li>
                        <label >尽调审核：</label>
                        <div class="text_1"><?php echo $audit_had;?></div>
                    </li>
                    <li>
                        <label >企业尽调状态：</label>
                        <div class="text_1"><?php echo $audit_status;?></div>
                    </li>
                </ul>
            </div>
        </div>
            <div class="section">
                <div class="head">
                    <span>反馈信息</span>
                </div>
                <div class="body">
                    <div class="fankui_box">
                        <?php $j=1; foreach($logs as $v){?>
                        <ul class="fankui">
                            <li><label ><?php echo $j;?></label></li>
                            <li><?php echo $v['role_name'];?></li>
                            <li><?php echo $v['manage_name'];?></li>
                            <li>
                                <span><?php echo $v['cw_status'];?></span>
                                <span><?php echo $v['zw_status'];?></span>
                                <span><?php echo $v['fw_status'];?></span>
                            </li>
                            <li><?php echo $v['create_time'];?></li>
                            <li class="clear_float">
                                <label >附言：</label>
                                <p class="text_1"><?php echo $v['mark'];?></p>
                            </li>
                            <div class="clear_float"></div>
                        </ul>
                        <?php $j++; }?>
                    </div>
                    <ul class="base_info show_no1">

                        <li>
                            <label >附言:</label>
                            <form id="form_audit">
                                <input type="hidden" name="ent_id" value="<?php echo $id;?>"/>
                            <div class="text_1 dis_none">
                                <input type="checkbox" name="type1"/>财务
                                <input type="checkbox" name="type2"/>政务
                                <input type="checkbox" name="type3"/>法务
                            </div>
                            <div class="text_1 dis_none">
                                <textarea name="mark" class="mark" cols="30" rows="10"></textarea>
                            </div>
                        </li>
                        <li>
                            <div class="show_nav_box">
                                <div class="btn" rel="1">内容通过</div>
                                <div class="btn" rel="2">内容不通过</div>
                                <?php if($my_role_id==$next_role_id){?>
                                <div class="btn" rel="3">专业通过</div>
                                <div class="btn" rel="4">专业不通过</div>
                                <?php }?>
                                <div class="clear_float"></div>
                            </div>
                        </li>
                        <input type="hidden" name="control" value="1"/>
                        </form>
                    </ul>
                </div>
            </div>
        <script>
            
        </script>
    </div>
    </div>
    <div class="show_big_box">
        <div class="close_s_b">X</div>
        <img src="" width="900" alt=""/>
    </div>
</div>

<script>
    /**
     * Created By YJ 2015-05-25
     */
    $(function(){
        var _host=config.domain.wf;
        var _url=_host+'/object/ajaxManage';
        var _id,_sur;
        var _data={},obj={},_msg={};
        //三年财务状况切换
        $('.nav').bind('click',function(){
            $(this).addClass('current_show');
            $(this).siblings().removeClass('current_show');
            $('.show_no'+(parseInt($(this).index())+1)).show();
            $('.show_no'+(parseInt($(this).index())+1)).siblings('.base_info').hide();
        })
        //显示关闭图片弹窗
        $('.show_big').bind('click',function(){
            $('.show_big_box img').attr('src',$(this).attr('src'));
            $('.show_big_box').show();
        })
        $('.close_s_b').bind('click',function(){
            $('.show_big_box').hide();
        })
        //可信度信息填写框展示
        $('#kx_select').change(function(){
            if($(this).val()==1){
                $('.info_kx').hide();
            }else{
                $('.info_kx').show();
            }
        })
        //修改可信度
        $('#sub_kx_btn').bind('click',function(){
            var _ent_id=$(this).attr('entid');
            var _kx_status=$('#kx_select').val();
            var _kx_info=$('#kx_info').val();

            _data.id=_ent_id;
            _data.kx_status=_kx_status;
            _data.kx_info=_kx_info;
            obj.type = "post";
            obj.url = _host + '/object/ajaxKx';
            obj.data =_data;
            _util.ajax(obj, function (d) {
                _msg.msg = d.msg;
                _msg.callback = function () {
                    window.location.reload();
                }
                _show_msg(_msg, 2000);
            });
        })
        //审核
        $('.btn').bind('click',function(){
            var _audit_type=$(this).attr('rel');
            if(_audit_type){
                obj.url = _host + '/object/ajaxAudit';
                obj.type = "post";
                obj.data =$('#form_audit').serialize()+"&audit_type="+_audit_type;
                _util.ajax(obj,function(d){
                    _msg.msg = d.msg;
                    _msg.callback = function () {
                        window.location.reload();
                    }
                    _show_msg(_msg, 2000);
                })
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
