    <link href="<?php echo STATICS_PATH;?>/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo STATICS_PATH;?>/css/b_reg.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/ui/jquery-ui.custom.min.js"></script>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            <p class="demand_p1">合伙人信息</p>
        </div>
        <form id="xinnuo_reg">
            <input type="hidden" name="member_info[id]" value="<?php echo $data['id'];?>"/>
            <div class="demand_text">
                <div class="text">
                    <span class="floatL span1">  <i>*</i>姓名:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $data['name'];?>" name="member_info[name]" placeholder="请输入昵称">
                    <span class="floatL span2" style="display: none;">中英文均可，不超过14个英文或7个汉字</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>介绍人:</span>
                    <input type="text" class="input1 floatL" value="<?php echo $data['intro_name'];?>" name="member_info[intro_id]" placeholder="请输入昵称">
                    <span class="floatL span2">请选择您的介绍人</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>类型:</span>
                    <select class="sect_1 floatL" name="member_info[login_role_id]">
                        <option value="0">请选择注册类型</option>
                        <option value="2" <?php echo ($data['login_role_id']==PARTNER_ORG)?'selected':'';?>>机构</option>
                        <option value="3" <?php echo ($data['login_role_id']==PARTNER_PERSONAL)?'selected':'';?>>个人</option>
                    </select>

                    <span class="floatL span2">请选择您的介绍人</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>手机号:</span>
                    <input type="text" placeholder="请填写手机号码" class="input1 floatL"  value="<?php echo $data['mobile'];?>" disabled>
                    <span class="span2" style="display: none;">请填写手机号码</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>邮箱:</span>
                    <input type="text"  placeholder="请输入邮箱" class="input1 floatL" value="<?php echo $data['email'];?>" disabled>
                    <span class="floatL span2">请填写邮箱</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>所在机构:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[org_name]" placeholder="请填写机构名称" value="<?php echo $data['org_name'];?>">
                    <span class="span2 floatL">请填写机构名称，不超过30个字</span>
                </div>

                <div class="text">
                    <span class="floatL span1"><i>*</i>性别:</span>
                    <select class="sect_1 floatL" name="member_info[gender]">
                        <option value="1" <?php echo ($data['gender']==1)?'selected':'';?>>男</option>
                        <option value="2" <?php echo ($data['gender']==2)?'selected':'';?>>女</option>
                    </select>
                    <span class="floatL span2">请选择性别</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>生日:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[birth]" placeholder="请选择生日" value="<?php echo $data['birth'];?>">
                    <span class="span2 floatL">请选择生日</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>个人介绍:</span>
                    <textarea class="sect_1 floatL t_area" name="member_info[describe]" placeholder="请填写个人介绍" ><?php echo $data['describe'];?></textarea>
                    <span class="span2 floatL">请填写个人介绍</span>
                </div>

                <div class="text">
                    <span class="floatL span1"><i>*</i>证件类型:</span>
                    <select class="sect_1 floatL" name="member_info[gender]">
                        <option value="1" <?php echo ($data['identify_type']==1)?'selected':'';?>>身份证</option>
                        <option value="2" <?php echo ($data['identify_type']==2)?'selected':'';?>>护照</option>
                    </select>
                    <span class="span2 floatL">请选择个人证件类型</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>证件号:</span>
                    <input type="text" class="sect_1 floatL" name="member_info[identify_num]" placeholder="证件号码" value="<?php echo $data['identify_num'];?>">
                    <span class="span2 floatL">请填写个人证件号</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>证件合照:</span>
                    <input type="hidden" name="member_info[identify_pic]" value="<?php echo $data['identify_pic'];?>"/>
                    <?php if($data['identify_pic']){?>
                        <img src="<?php echo PIC_PATH . $data['identify_pic']; ?>" alt="" width="687"/>
                    <?php }else{?>
                        <span>暂时没有上传！</span>
                    <?php }?>
                    <span class="span2 floatL">请填上传证件合照</span>
                </div>
                <div class="text">
                    <span class="floatL span1"><i>*</i>证件照:</span>
                    <input type="hidden" name="member_info[yy_pic]" value="<?php echo $data['yy_pic'];?>"/>
                    <?php if($data['yy_pic']){?>
                    <img src="<?php echo PIC_PATH . $data['yy_pic']; ?>" alt="" width="687"/>
                    <?php }else{?>
                        <span>暂时没有上传！</span>
                    <?php }?>
                    <span class="span2 floatL">请填上传证件照</span>
                </div>
                <!--<input type="checkbox" class="floatL checked_1" checked="checked" id="regFormProtocolC">
                <input type="hidden" value="1" id="cxy_phoneC" name="cxy">
                <p class="see_1">我已仔细阅读并<a target="_blank" href="">同意《用户使用协议》</a></p>-->
                <?php /*
                <div class="text">
                    <span class="floatL span1"></span>
                    <input type="botton" class="btn btn-blue" id="editFormSubBtnC" value="修 改">
                </div>
                */ ?>
            </div>
        </form>
    </div>
</div>
    <script type="text/javascript" src="<?php echo STATICS_PATH;?>/js/xinnuo_reg.js"></script>

    <script>
        /**
         * Created By YJ 2015-05-25
         */
        $('#editFormSubBtnC').bind('click',function(){
            var obj={};
            var up_data=$('#xinnuo_edit').serialize();
            obj.data=up_data;
            obj.url='<?php echo ADMIN_PATH;?>/audit/editMemberInfo'
            _util.ajax(obj,function(d){
                    _show_msg(d.msg);
            });
        })
    </script>

