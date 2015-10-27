<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">企业市值信息</span></div>
    </div>
    <div class="result-wrap">
        <div class="main">
        <div class="section">
            <div class="head">
                <span>基本信息</span>
            </div>

			
				<?php if ($user_info_list['is_zy_show']){ ?>
			<span style='color:#d00'>
				<B><?php echo $user_info_list['is_zy_show'].":"; ?></B>
				<?php echo $user_info_list['kx_info']; ?>
			</span>
			
				<?php } ?>
			<?php if ($user_info_list['is_nr_show'] ) { ?>
				<br>
			<span style='color:#d00'>
				<B><?php echo $user_info_list['is_nr_show']; ?></B>
			</span>
			<?php } ?>
			<?php if($user_info_list['is_zyn_show']) { ?>
				<br>
			<span style='color:#d00'>
				<B><?php echo $user_info_list['is_zyn_show']; ?></B>
			</span>
			<?php } ?>


			<?php
			$action_url = '/market/addAjax'; 
			if ($id) {
				$action_url = '/market/updateAjax'; 
			}
			?>
			<iframe name="myupfile" border=0 hidden='yes' width=0 height=0></iframe>
			<form id="info_submit" method='post' action="<?php echo $action_url; ?>" enctype="multipart/form-data" target="myupfile">
            <div class="body">
                <ul class="base_info">
                    <li>
                        <label >企业全称：</label>
						<input type='hidden' value='<?php echo $id; ?>' name='qid'/>
                        <div class="text_1"><input name="org_name" type="text" value="<?php echo $user_info_list['org_name']; ?>" /></div>
                    </li>
                    <li>
                        <label >业务代码：</label>
                        <div class="text_1"><input name="code" type="text" value="<?php echo $user_info_list['code']; ?>" /></div>
                    </li>
                    <li>
                        <label >主营产品或服务：</label>
                        <div class="text_1"><input name="pro_info" type="text" value="<?php echo $user_info_list['pro_info']; ?>" /></div>
                    </li>
                    <li>
                        <label >主营行业：</label>
                        <div class="text_1">
						<select name='industry_id'>
						<?php foreach($sort_info_list as $val) { ?>
						<option value="<?php echo $val['id']; ?>" <?php if($user_info_list['industry_id'] == $val['id']) {echo  "selected='selected'"; }?>><?php echo $val['name']; ?></option>
						<?php } ?>
						</select>
						</div>
                    </li>
                    <li>
                        <label >主办券商联系人：</label>
                        <div class="text_1"><input name="link_name" type="text" value="<?php echo $user_info_list['link_name']; ?>" /></div>
                    </li>
                    <li>
                        <label >董秘电话：</label>
                        <div class="text_1"><input name="mobile" type="text" value="<?php echo $user_info_list['mobile']; ?>" /></div>
                    </li>

                    <li>
                        <label >股票代码：</label>
                        <div class="text_1"><input name="stock_code" type="text" value="<?php echo $user_info_list['stock_code']; ?>" /></div>
                    </li>
                    
                    <li>
                        <label >现股价：</label>
                        <div class="text_1"><input name="stock_value" type="text" value="<?php echo $user_info_list['stock_value']; ?>" /></div>
                    </li>
                    <li>
                        <label >市盈率：</label>
                        <div class="text_1"><input name="profit" type="text" value="<?php echo $user_info_list['profit']; ?>" /></div>
                    </li>
                    <li>
                        <label >市净率：</label>
                        <div class="text_1"><input name="net_profit" type="text" value="<?php echo $user_info_list['net_profit']; ?>" /></div>
                    </li>
                    <li>
                        <label >商定投资价格：</label>
                        <div class="text_1"><input name="invest_value" type="text" value="<?php echo $user_info_list['invest_value']; ?>" /></div>
                    </li>
                    <li>
                        <label >投资年财务预期：</label>
                        <div class="text_1"><input name="fin_exp" type="text" value="<?php echo $user_info_list['fin_exp']; ?>" /></div>
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
                <ul class="base_info show_no1">
                    <li>
                        <label >资产总额:</label>
                        <div class="text_1"><input name="zc_total_one" type="text" value="<?php echo $user_info_list['one_info']['zc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净资产：</label>
                        <div class="text_1"><input name="jzc_total_one" type="text" value="<?php echo $user_info_list['one_info']['jzc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >营业成本额：</label>
                        <div class="text_1"><input name="yw_cb_one" type="text" value="<?php echo $user_info_list['one_info']['yy_cb']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >企业所得税：</label>
                        <div class="text_1"><input name="qy_sd_one" type="text" value="<?php echo $user_info_list['one_info']['qy_sd']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净利润：</label>
                        <div class="text_1"><input name="m_ly_one" type="text" value="<?php echo $user_info_list['one_info']['m_ly']; ?>" /> 万元</div>
                    </li>
                </ul>
                <ul class="base_info show_no2">
                    <li>
                        <label >资产总额:</label>
                        <div class="text_1"><input name="zc_total_two" type="text" value="<?php echo $user_info_list['two_info']['zc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净资产：</label>
                        <div class="text_1"><input name="jzc_total_two" type="text" value="<?php echo $user_info_list['two_info']['jzc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >营业成本额：</label>
                        <div class="text_1"><input name="yw_cb_two" type="text" value="<?php echo $user_info_list['two_info']['yy_cb']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >企业所得税：</label>
                        <div class="text_1"><input name="qy_sd_two" type="text" value="<?php echo $user_info_list['two_info']['qy_sd']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净利润：</label>
                        <div class="text_1"><input name="m_ly_two" type="text" value="<?php echo $user_info_list['two_info']['m_ly']; ?>" /> 万元</div>
                    </li>
                </ul>
                <ul class="base_info show_no3">
                    <li>
                        <label >资产总额:</label>
                        <div class="text_1"><input name="zc_total_three" type="text" value="<?php echo $user_info_list['three_info']['zc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净资产：</label>
                        <div class="text_1"><input name="jzc_total_three" type="text" value="<?php echo $user_info_list['three_info']['jzc_total']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >营业成本额：</label>
                        <div class="text_1"><input name="yw_cb_three" type="text" value="<?php echo $user_info_list['three_info']['yy_cb']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >企业所得税：</label>
                        <div class="text_1"><input name="qy_sd_three" type="text" value="<?php echo $user_info_list['three_info']['qy_sd']; ?>" /> 万元</div>
                    </li>
                    <li>
                        <label >净利润：</label>
                        <div class="text_1"><input name="m_ly_three" type="text" value="<?php echo $user_info_list['three_info']['m_ly']; ?>" /> 万元</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section">
            <div class="body">
                <ul class="base_info show_no1">
                    <li>
                        <div class="show_nav_box">
							<input type='submit' value="提交信息"/>
							<a href="/market/index" >返回</a>
							<?php /*<input type='button' value="返回"/>*/?>
							<?php /* ?>
                            <div class="btn">内容通过</div>
							<?php */ ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
		</form>
    </div>
    </div>
</div>


<script>
    $(function(){
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
    })

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
		location.href="/market/index";
	} else {
		_show_msg(msg,2500); //_show_msg(data['data']['id'],2500);
	}
	return false;
}

</script>
<!--/main-->
