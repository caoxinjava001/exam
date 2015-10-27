<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="webkit" name="renderer">
    <title>身份认证</title>
    <link href="http://182.92.72.93:9010/statics/main/css/ui/jquery-ui-custom.min.css" type="text/css" rel="stylesheet"/>
    <link href="http://182.92.72.93:9010/statics/main/css/public.css" type="text/css" rel="stylesheet"/>
    <link href="http://182.92.72.93:9010/statics/main/css/authentication.css" type="text/css" rel="stylesheet"/>

    <script type="text/javascript" src="http://182.92.72.93:9010/statics/main/js/jq_min.js"></script>
    <script type="text/javascript" src="http://182.92.72.93:9010/statics/main/js/ui/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="http://182.92.72.93:9010/statics/main/js/util.js"></script>
    <!--[if IE 6]>
    <script type="text/javascript" src="http://182.92.72.93:9010/statics/main/js/DD_belatedPNG.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.png, #fullbg');
    </script>
    <![endif]-->
</head>

<body>
<div id="xu" class="xu">
<!--roof-->
<div class="w_public roof">
    <div class="w clearB clearfix roof_box">
        <h1 class="roof_h1">信诺资本管理</h1>
        <a href="javascript:;" class="root_a1">＜＜ 返回首页</a>
    </div>
</div>
<!--roof-->
<!--头部-->
<div class="w_public clearB clearfix conten">
    <div class="w clearB conten_box">
        <div class="conten_bb">
            <div class="conten_d1"><img src="http://182.92.72.93:9010/statics/main/backend/images/icon_002.png" alt="" /></div>
            <div class="conten_p1">
                <p class="conten_p2">注册账号</p>
                <p class="conten_p3">认证身份</p>
                <p class="conten_p4">入驻完成</p>
            </div>
        </div>
    </div>
</div>
<!-- 中间部分 -->
<form id="approve_from">
    <div class="w_public clearB clearfix box">
        <div class="w clearB clearfix box_p1">
            <div class="box_tent">
                <input id="member_id" name="member_id" type="hidden" value="<?php echo $member_info['id']; ?>" />
                <input id="login_role_id" type="hidden" value="<?php echo $member_info['login_role_id']; ?>" />
                <div class="certification">
                    <p class="certification_p1">请认证您的身份</p>
                    <p class="certification_p2">您需要进行身份认证后才能成为正式的信诺合伙人</p>
                </div>
                <div class="certification_img ">
                    <h2>请分别上传证件照片和您本人手持证件的照片</h2>
                    <!--   <div class="certification_im1 floatL">
                           <img src="http://182.92.72.93:9010/statics/main/backend/images/icon_qi2.jpg" alt="" />
                       </div>-->
                    <div class="certification_im2 floatL none">
                        <img src="http://182.92.72.93:9010/statics/main/backend/images/icon_gs.jpg" alt="" />
                    </div>
                    <div class="certification_im3 floatL">
                        <h3>参考示例</h3>
                        <p>证件上的文字信息与证件号清晰可见</p>
                        <p>手持证件拍照，不要遮挡证件上的任何信息大小不要超过5M</p>
                    </div>
                  <!--  <div class="box_l1 text clearB clearfix">
                        <span class="text_span">请选择证件类型:</span>
                        <select class="sect_2 floatL" name="id_type" id="papers_type">
                            <option value="0">--请选择--</option>
                            <option value="1">身份证</option>
                            <option value="2">护照</option>
                        </select>
                    </div>-->

                    <div class="box_l2 text">
                        <span class="text_span">请输入证件号码:</span>
                        <input type="text" class="input1" value="<?php echo $member_info['org_num']?$member_info['org_num']:'';?>" name="id_number" id="papers_num" placeholder="证件号码">
                    </div>
                </div>
                <div class="Upload clearB clearfix">
                    <div id="apply_for_upload" class="btn2"></div>
                    <div class="other_upload upload_info" style="<?php echo $member_info['yy_pic']?'display: block;':'display: none;'; ?>">
                        <!--  <div class="certification_im1 floatL">
                              <img src="http://182.92.72.93:9010/statics/main/backend/images/icon_qi2.jpg" alt="" />
                          </div>-->
                        <div class="certification_im2 floatL">
                            <div class="upload_img_center">
                                <img real_url="<?php echo $member_info['identify_pic'] ?>" src="<?php echo $member_info['yy_pic']?PIC_PATH.'/magic/w_273/h_191'.$member_info['yy_pic']:'http://182.92.72.93:9010/statics/main/backend/images/icon_gs.jpg';?>" alt="" />
                            </div>
                        </div>
                        <input type="hidden" name="id_pic" value="<?php echo $member_info['yy_pic']?$member_info['yy_pic']:'';?>">
                        <div class="certification_im3 floatL Upload_im3">
                            <input type="button" value="申请认证" class="btn3 blue-btn"  id="approve_id">
                            <input type="button" value="取消" class="btn4" id="approve_cancel">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<!--foot-->
<div class="w_public clearB clearfix foot">
    <div class="clearB clearfix foot_list">
        <ul>
            <li><a href="javascript:;">关于信诺</a></li>
            <li>|</li>
            <li><a href="javascript:;">联系我们</a></li>
            <li>|</li>
            <li><a href="javascript:;">加入我们</a></li>
            <li>|</li>
            <li><a href="javascript:;">隐私保护</a></li>
            <li>|</li>
            <li><a href="javascript:;">版权声明</a></li>
        </ul>
        <p class="foot_p"></p>
    </div>
</div>
<!--foot-->
<script type="text/javascript">
    /**
     * Created by tony on 15-05-24.
     */
    ;(function(){
        var approve_from="#approve_from", _mark_upload= 0,menber_id=$("#member_id",approve_from).val(),
            error_msg={msg:"",time:2500,width:"300px",height:"150px"},_init=function(){
                var p={};
                //绑定页面元素
                binding_btns();


                //上传照片
                p.userId=menber_id;
                p.source=0;
                p.type=1;
                p.fileSource=2;//
                p.createdBy="admin";
                p.fileType="*.gif;*.gif;*.jpeg;*.jpg;*.png";
                p.file_size='2 MB'; //上传资源最大2M
                p.button_text='上传照片'; //
                p.button_width='110'; //
                p.button_height="40";
                p.button_text_style=".uploadBtn{ color:#FFFFFF; font-size: 12; text-align:center;}";
                p.button_image_url=config.domain.statics+"main/images/upload_info_one.png";
                p.button_text_top_padding=12;
                _util._init_upload_js(function(){
                    up_load(
                        "apply_for_upload",
                        p,
                        function(file,data){
                            //上传完成后设置 file:文件信息，ServerData 服务器返回的json，上传失败则返回“fail”
                            _util.hideAutoBg(true);
                            if(data=="fail"){
                                error_msg.msg="上传失败！";
                                _show_msg(error_msg);
                            }else{

                                $("img:first",".upload_info").attr("src","http://"+data.domain+"/magic/w_273/h_191"+data.downloadUrl).attr("real_url",data.downloadUrl);
                                $("input[name='id_pic']").val(data.downloadUrl);

                                $(".upload_info").show();
                                error_msg.msg="恭喜您照片上传成功！";
                                _show_msg(error_msg);
                            }
                        },
                        function(file,percent){
                            //上传进度,返回文件信息和百分比
                            _util.showAutoBg(true);
                        },
                        function(file,errorCode,message){
                            error_msg.msg="上传失败！";
                            _show_msg(error_msg);
                        });
                });
            },binding_btns=function(){
                //申请认证
                $("#approve_id",approve_from).on("click",function(){
                    var _mark=[],type_v,num_v,blank_reg=/(^\s+)|(\s+$)/g,p={type:"post"},login_role_id=$("#login_role_id").val();
                    $.each($("img",".upload_info"),function(){
                        if(!$(this).attr("real_url")){
                            _mark.push(true);
                        }
                    });
                    if(_mark.length>0){
                        error_msg.msg="您需要上传图片！";
                        _show_msg(error_msg);
                        return false;
                    }

                    //判断类型
                   /* type_v = $("#papers_type",approve_from).val();
                    if(type_v=="0"){
                        error_msg.msg="请选择证件类型！";
                        _show_msg(error_msg);
                        return false;
                    }*/
                    num_v = $("#papers_num",approve_from).val();
                    $("#papers_num",approve_from).val(num_v.replace(blank_reg,""));
                    if(!num_v.replace(blank_reg,"")){
                        error_msg.msg="证件号码不能为空！";
                        _show_msg(error_msg);
                        return false;
                    }else{
                        num_v=$("#papers_num",approve_from).val();
                        if(num_v.length>100){
                            error_msg.msg="证件号码超过100个字符了~";
                            _show_msg(error_msg);
                            return false;
                        }
                    }


                    p.url="http://182.92.72.93:9010/register_cop/ajax_auth_save?flag=2&"+$(approve_from).serialize();
                    _util.ajax(p,function(d){
                        if(d&& d.status&& d.status==1){
                            error_msg.msg= d.msg;
                            error_msg.callback=function(){
                                    _util.showAutoBg(true);
                                    window.location.href=config.domain.wf;
                            }
                            _show_msg(error_msg);
                        }else{
                            error_msg.msg= d.msg;
                            _show_msg(error_msg);
                        }
                    });
                });
                //取消认证
                $("#approve_cancel",approve_from).on("click",function(){
                    //清空绑定数据
                    $.each($("img",".upload_info"),function(){
                        $(this).removeData("update").attr("src","");
                    });
                    $(".upload_info",approve_from).hide();
                    _mark_upload=0;
                });
            };
        _init();
    })(window);
</script>
</div>
</body>
</html>

