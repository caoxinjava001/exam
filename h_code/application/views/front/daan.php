<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0051)http://www.mokaoba.com/exam/Paperda.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE><?php echo $exam_name;?></TITLE>
    <META content="text/html; charset=UTF-8" http-equiv=Content-Type>
    <META content=zh-CN http-equiv=Content-Language>
    <META content=no-cache http-equiv=pragma>
    <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/daan_files/ymPrompt.css">
    <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/daan_files/test.css">
    <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/daan_files/basetest.css">
    <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/daan_files/testing.css">
    <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/daan_files/analysis.css">
    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/jingAjax.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/base.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/dotestr_nav1_0311.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/TestPaperCart.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/ymPrompt_source.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/js/jq_min.js"></SCRIPT>

    <SCRIPT language=javascript type=text/javascript
            src="<?php echo STATICS_PATH;?>/daan_files/shopcart.js"></SCRIPT>

    <SCRIPT type=text/javascript>
        function OnPlay(url) {
            window.open("http://www.mokaoba.com/exam/Mp3_Player.aspx?urlpath=" + escape(url), "newwindow", "height=20,width=260");
        }
    </SCRIPT>

    <STYLE type=text/css>.ListenPlay {
            MARGIN-TOP: -13px; WIDTH: 126px; BACKGROUND: url(/images/ListenPlay.gif) no-repeat; FLOAT: left; HEIGHT: 24px; CURSOR: pointer
        }
        .dafen {
            POSITION: relative; PADDING-BOTTOM: 20px; MARGIN-TOP: -180px; WIDTH: 210px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat right bottom; FLOAT: right; MARGIN-RIGHT: 80px
        }
        .dafen SPAN {
            WIDTH: 70px; DISPLAY: block; FLOAT: right; HEIGHT: 86px; OVERFLOW: hidden
        }
        .dafen SPAN.a0 {
            WIDTH: 64px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat 0px 0px
        }
        .dafen SPAN.a1 {
            WIDTH: 38px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat 0px -97px
        }
        .dafen SPAN.a2 {
            WIDTH: 68px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -87px 0px
        }
        .dafen SPAN.a3 {
            WIDTH: 68px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -77px -96px
        }
        .dafen SPAN.a4 {
            WIDTH: 61px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -194px 0px
        }
        .dafen SPAN.a5 {
            WIDTH: 77px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -169px -91px
        }
        .dafen SPAN.a6 {
            WIDTH: 61px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -298px 0px
        }
        .dafen SPAN.a7 {
            WIDTH: 57px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -402px 0px
        }
        .dafen SPAN.a8 {
            BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -271px -92px
        }
        .dafen SPAN.a9 {
            WIDTH: 68px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/fenshu.png) no-repeat -364px -89px
        }
        .bj_fen {
            BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat 0px -81px
        }
        .bj_fen .fen {
            COLOR: #333; FONT-SIZE: 30px
        }
        .bj_fen .red_18 {
            COLOR: #c00; FONT-SIZE: 16px; FONT-WEIGHT: bold
        }
        .illustrate_c .View {
            DISPLAY: inline; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat 0px -220px; MARGIN-LEFT: 6px
        }
        .illustrate_c A {
            TEXT-INDENT: -9999px; WIDTH: 150px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat 0px -190px; FLOAT: left; HEIGHT: 23px; FONT-SIZE: 0px
        }
        .lookover {
            LINE-HEIGHT: 24px; PADDING-RIGHT: 15px; DISPLAY: inline; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat right -851px; FLOAT: right; COLOR: #c00; FONT-SIZE: 12px; MARGIN-RIGHT: 10px
        }
        .lookover2 {
            BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat right -875px
        }
        .dajx_r {
            PADDING-LEFT: 38px; FLOAT: left
        }
        .jxnum {
            LINE-HEIGHT: 22px; MARGIN-TOP: 10px; PADDING-LEFT: 15px; WIDTH: 97%; FLOAT: left; HEIGHT: auto
        }
        .rubric_title {
            PADDING-BOTTOM: 0px; LINE-HEIGHT: 22px; PADDING-LEFT: 0px; WIDTH: 100%; PADDING-RIGHT: 0px; PADDING-TOP: 0px
        }
        .rubric_title {
            LINE-HEIGHT: 22px; PADDING-LEFT: 20px; WIDTH: 90%; WORD-WRAP: break-word; FLOAT: left; WORD-BREAK: break-all; _overflow: hidden
        }
        .rubric_title .jiexi {
            TEXT-ALIGN: center; LINE-HEIGHT: 16px; WIDTH: 42px; PADDING-RIGHT: 3px; DISPLAY: inline; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -128px -87px; FLOAT: left; HEIGHT: 16px; COLOR: #f00; FONT-SIZE: 12px; MARGIN-RIGHT: 5px
        }
        .fsinfo {
            WIDTH: 100%; FLOAT: left; HEIGHT: auto; FONT-SIZE: 12px
        }
        .ptext {
            PADDING-LEFT: 23px; FLOAT: left; COLOR: #999; FONT-SIZE: 12px; PADDING-TOP: 3px
        }
        .fsinfo .huf {
            WIDTH: auto; FLOAT: right
        }
        .fsinfo .huf .reAnaly {
            DISPLAY: inline; FLOAT: right; MARGIN-LEFT: 10px; PADDING-TOP: 3px
        }
        .fsinfo .huf .leftA {
            PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; WIDTH: auto; PADDING-RIGHT: 0px; FONT-FAMILY: 微软雅黑; FLOAT: right; PADDING-TOP: 0px
        }
        .fsinfo .huf .leftA SPAN.lf_bg {
            WIDTH: 2px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -130px -108px; FLOAT: left; HEIGHT: 23px; OVERFLOW: hidden
        }
        .fsinfo .huf .leftA A {
            BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) repeat-x 0px -248px; FLOAT: left; CURSOR: pointer
        }
        .fsinfo .huf .leftA .love {
            PADDING-BOTTOM: 0px; LINE-HEIGHT: 22px; PADDING-LEFT: 20px; PADDING-RIGHT: 6px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -184px -144px; FLOAT: left; PADDING-TOP: 1px
        }
        .fsinfo .huf .leftA .md {
            WIDTH: 2px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -136px -108px; FLOAT: left; HEIGHT: 23px; OVERFLOW: hidden
        }
        .fsinfo .huf .leftA .nolove {
            PADDING-BOTTOM: 0px; LINE-HEIGHT: 22px; PADDING-LEFT: 20px; PADDING-RIGHT: 6px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -184px -169px; FLOAT: left; PADDING-TOP: 1px
        }
        .fsinfo .huf .leftA SPAN.rt_bg {
            WIDTH: 2px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -133px -108px; FLOAT: left; HEIGHT: 23px; OVERFLOW: hidden
        }
        .Pop-up {
            POSITION: absolute; PADDING-BOTTOM: 2px; PADDING-LEFT: 2px; WIDTH: auto; PADDING-RIGHT: 2px; BACKGROUND: #fcf2d7; PADDING-TOP: 2px
        }
        .Pop-up .pop-box {
            BORDER-BOTTOM: #fdbc6f 1px solid; BORDER-LEFT: #fdbc6f 1px solid; PADDING-BOTTOM: 2px; LINE-HEIGHT: 24px; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; BACKGROUND: #fff; FLOAT: left; COLOR: #666; BORDER-TOP: #fdbc6f 1px solid; BORDER-RIGHT: #fdbc6f 1px solid; PADDING-TOP: 2px
        }
        .Pop-up .pop-box .succeed {
            PADDING-LEFT: 30px; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/ks_key.png) no-repeat -171px -597px; FLOAT: left
        }
    </STYLE>

    <SCRIPT type=text/javascript>
        $(document).ready(function () {
            $('.sidelist2').mousemove(function () {
                $(this).find('.i-list2').show();
                $(this).find('.h3').addClass('hover2');
            });
            $('.sidelist2').mouseleave(function () {
                $(this).find('.i-list2').hide();
                $(this).find('.h3').removeClass('hover2');
            });
        });
    </SCRIPT>

    <META name=GENERATOR content="MSHTML 8.00.6001.23580"></HEAD>
<BODY style="CURSOR: default" id=paperbody>
<FORM id=form1 method=post action=#>
    <DIV class=aspNetHidden></DIV><A name=a>&nbsp;</A>
    <DIV class=testing_header>
        <DIV class=width960>
            <DIV class="testing_logo fl"><A href="#" target=_blank><IMG src="<?php echo STATICS_PATH;?>/daan_files/testing_logo.png" width=242 height=32></A></DIV>
            <DIV class="header_btn fl">
                <UL></UL></DIV>
            <DIV style="WIDTH: 311px; FLOAT: left" class="righter fr">
                <!--<DIV style="WIDTH: 198px" class="function_button fl">
<UL>
  <LI><IMG style="CURSOR: pointer" 
  onclick="com_all_favoriteadd('SxbCom_favoriteadd',300,150,this,40,-260,'45551','清大网校','2', 1,0);" 
  alt="" src="<?php echo STATICS_PATH;?>/daan_files/collect_btn.png" width=85 height=36> </LI>
  <LI><A href="#" target=_blank><IMG 
  src="<?php echo STATICS_PATH;?>/daan_files/view_btn_test.png" width=85 height=36></A></LI></UL></DIV>-->
                <DIV class="user fr">
                    <DIV id=sidebar2>
                        <DIV class=sidelist2><SPAN>
<H3><A class=drop2>admin</A></H3></SPAN>
                            <DIV class=i-list2>
                                <DIV class=i-list3>
                                    <UL>
                                        <!--<LI><A  href="#"  target=_blank>我的错题库</A></LI>
  <LI><A  href="#"  target=_blank>我做过的试卷</A></LI>
  <LI><A  href="#" target=_blank>我收藏的试卷</A></LI>--></UL>
                                    <DIV class=h8></DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV>
    <DIV class=h63></DIV>
    <DIV class=width960>
        <DIV class=h15></DIV>
        <DIV class=testing_position><SPAN>你当前位置：</SPAN><A href="#">模考吧在线考试中心</A> &gt;&gt; <A href="#">职业资格</A> &gt;&gt; <A href="#">证券从业资格</A> &gt;&gt; <A  href="#">证券投资分析</A>
        </DIV>
        <DIV class=h15></DIV>
        <DIV style="LINE-HEIGHT: 10px; DISPLAY: none; HEIGHT: 10px" id=Header></DIV><!--timefixed结束-->
        <DIV class=testing_content>
            <DIV class=title>
                <H4><SPAN id=lblpapername><?php echo $exam_name;?></SPAN></H4></DIV>
            <DIV class=h15></DIV><!--step结束-->
            <DIV
                style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; BORDER-TOP: medium none; BORDER-RIGHT: medium none"
                class=content>
                <DIV class=h15></DIV>

                <DIV class=h25></DIV>
                <DIV class=h10></DIV>
                <DIV class=subject_btn><INPUT id=dt_input_0 class=input11 onClick="dtControl('0',1);" value=单选题 type=button><INPUT id=dt_input_1 class=input22 onClick="dtControl('1',1);" value=多选题 type=button><INPUT id=dt_input_2 class=input22 onClick="dtControl('2',1);" value=判断题 type=button>
                </DIV><!--categoribtn结束-->
                <DIV class=h10></DIV>
                <DIV id=con_one_0>
                    <DIV class=h10></DIV>
                    <DIV id=dt_xt_title_0 class="part2 part2_1"
                         onclick="dtControl('0',0);">单选题</DIV>
                    <DIV id=dt_xt_content_0>
                        <DIV
                            class=style_dt_desc>一、单选题</DIV><!--part1结束-->
                        <DIV class=container>
                            <DIV id=921016_itemPageIndex_1>
                                <?php if(!empty($use_dec_v['single'])){
                                $i=1;
                                foreach($use_dec_v['single'] as $v){
                                ?>
                                <DIV
                                    style="BORDER-BOTTOM: rgb(255,255,255) 1px solid; BORDER-LEFT: rgb(255,255,255) 1px solid; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; BORDER-TOP: rgb(255,255,255) 1px solid; BORDER-RIGHT: rgb(255,255,255) 1px solid; PADDING-TOP: 10px"
                                    id=xt_921016_<?php echo $v['id'];?> class="question border_t_g_r"
                                    onmousemove="readymousemove_lx('xt_921016_<?php echo $v['id'];?>');"
                                    onmouseout="readymouseleave_lx('xt_921016_<?php echo $v['id'];?>');">
                                    <DIV id=search_pareid_<?php echo $v['id'];?> class=ques_title>
                                        <STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                                        <P><?php echo $v['exam']['title'];?></P>
                                        <?php foreach($v['exam']['answer'] as $kk=>$vv){?>
                                            <P>&nbsp; <?php echo $kk.' . '.$vv;?></P>
                                        <?php }?>
                                    </DIV>
                                    <DIV id=itemsContent_921016_1 class=choice></DIV>
                                    <DIV class=h10></DIV>
                                    <DIV class="analysis fixed">
                                        <DIV class=analysis_l>查看答案</DIV>
                                    </DIV>
                                    <DIV class="youranswer fixed">
                                        <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid"
                                             class="youranswer_nei2 fixed">
                                    <?php
                                    array_multisort($v['answer']);
                                    $c_a=explode(',',$v['exam']['correct_answer']);
                                    array_multisort($c_a);
                                    ?>
                                            <?php if($v['answer']==$c_a){?>
                                            <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/gou.png" width=31 height=27></DIV>
                                            <?php }else{?>
                                            <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/cha.png" width=31 height=27></DIV>
                                            <?php }?>
                                            <DIV style="COLOR: #0090c5" class=ana_txt>【考生答案】：
                                                <?php foreach($v['answer'] as $vv){
                                                    echo $vv.' ';
                                                }?>
                                                <BR><SPAN class=red>【正确答案】：<?php echo $v['exam']['correct_answer'];?></SPAN></DIV>
                                        </DIV></DIV>
                                    <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid" class=kongbai></DIV>
                                    <DIV style="BORDER-BOTTOM: #c5eab7 1px solid; BORDER-LEFT: #c5eab7 1px solid; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/dajxbg.png) #f1f7ed no-repeat; BORDER-RIGHT: #c5eab7 1px solid" class="dajx fixed">
                                        <DIV style="PADDING-LEFT: 27px; WIDTH: 83px; COLOR: #333; FONT-SIZE: 14px; PADDING-TOP: 10px" class=dajx_l>[答案解析]</DIV>
                                        <DIV style="COLOR: #333" class=dajx_r><SPAN></SPAN>
                                            <P><?php echo $v['exam']['correct_desc'];?></P><BR></DIV>

                                        <DIV style="COLOR: #333" class=h20></DIV></DIV>
                                    <DIV class=h10></DIV>
                                    <DIV style="DISPLAY: none" id=Itemdes_Pages_itemid_<?php echo $v['id'];?>>1</DIV></DIV><!--question结束-->
                                <?php $i++;}}?>

                                </DIV></DIV></DIV>
                    <DIV style="DISPLAY: none" id=dt_xt_more_0_0>
                        <DIV class=chak><A onClick="dtControl('0',1);">点击展开本大题全部题目</A></DIV>
                    </DIV>
                </DIV>

                <DIV id=con_one_1>
                    <DIV class=h10></DIV>
                    <DIV id=dt_xt_title_1 class=part2 onClick="dtControl('1',0);">多选题</DIV>
                    <DIV style="DISPLAY: none" id=dt_xt_content_1>
                        <DIV
                            class=style_dt_desc>二、多选题</DIV><!--part1结束-->
                        <DIV class=container>
                            <DIV id=921017_itemPageIndex_1>
                                <?php if(!empty($use_dec_v['more'])){
                                $i=1;
                                foreach($use_dec_v['more'] as $v){
                                ?>
                                <DIV style="PADDING-LEFT: 10px; PADDING-RIGHT: 10px; PADDING-TOP: 10px"
                                     id=xt_921017_<?php echo $v['id'];?> class="question border_t_g_r"
                                     onmousemove="readymousemove_lx('xt_921017_<?php echo $v['id'];?>');"
                                     onmouseout="readymouseleave_lx('xt_921017_<?php echo $v['id'];?>');">
                                    <DIV class=ques_title><STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                                        <P><?php echo $v['exam']['title'];?></P>
                                        <?php foreach($v['exam']['answer'] as $kk=>$vv){?>
                                            <P>&nbsp; <?php echo $kk.' . '.$vv;?></P>
                                        <?php }?>
                                    </DIV>
                                    <DIV id=itemsContent_921017_1 class=choice></DIV>
                                    <DIV class=h10></DIV>
                                    <DIV class="analysis fixed">
                                        <DIV class=analysis_l>查看答案</DIV>
                                        <DIV class=analysis_r>

                                        </DIV>
                                    </DIV>
                                    <DIV class=youranswer>
                                        <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid" class="youranswer_nei2 fixed">
                                            <?php
                                            array_multisort($v['answer']);
                                            $c_a=explode(',',$v['exam']['correct_answer']);
                                            array_multisort($c_a);
                                            ?>
                                            <?php if($v['answer']==$c_a){?>
                                                <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/gou.png" width=31 height=27></DIV>
                                            <?php }else{?>
                                                <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/cha.png" width=31 height=27></DIV>
                                            <?php }?>
                                            <DIV style="COLOR: #0090c5" class=ana_txt>【考生答案】：
                                                <?php
                                                    echo implode(',',$v['answer']);
                                                ?>
                                                <BR>
                                                <SPAN class=red>【正确答案】：<?php echo $v['exam']['correct_answer'];?></SPAN></DIV>
                                            <DIV class=ana_txt2>

                                            </DIV></DIV></DIV>
                                    <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid"
                                         class=kongbai></DIV>
                                    <DIV
                                        style="BORDER-BOTTOM: #c5eab7 1px solid; BORDER-LEFT: #c5eab7 1px solid; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/dajxbg.png) #f1f7ed no-repeat; BORDER-RIGHT: #c5eab7 1px solid"
                                        class="dajx fixed">
                                        <DIV
                                            style="PADDING-LEFT: 27px; WIDTH: 83px; COLOR: #333; FONT-SIZE: 14px; PADDING-TOP: 10px"
                                            class=dajx_l>[答案解析]</DIV>
                                        <DIV style="COLOR: #333" class=dajx_r><SPAN></SPAN>
                                            <P><?php echo $v['exam']['correct_desc'];?></P><BR></DIV>

                                        <DIV style="COLOR: #333" class=h20></DIV></DIV>
                                    <DIV class=h10></DIV>
                                    <DIV style="DISPLAY: none" id=Itemdes_Pages_itemid_<?php echo $v['id'];?>>1</DIV></DIV><!--question结束-->
                                    <?php $i++;}}?>


                                </DIV></DIV></DIV>
                    <DIV id=dt_xt_more_0_1>
                        <DIV class=chak><A onClick="dtControl('1',1);">点击展开本大题全部题目</A></DIV>
                    </DIV>
                </DIV>

                <DIV id=con_one_2>
                    <DIV class=h10></DIV>
                    <DIV id=dt_xt_title_2 class=part2 onClick="dtControl('2',0);">判断题</DIV>
                    <DIV style="DISPLAY: none" id=dt_xt_content_2>
                        <DIV class=style_dt_desc>三、判断题</DIV><!--part1结束-->
                        <DIV class=container>
                            <DIV id=921018_itemPageIndex_1>

                                <?php if(!empty($use_dec_v['judge'])){
                                $i=1;
                                foreach($use_dec_v['judge'] as $v){
                                ?>
                                <DIV style="PADDING-LEFT: 10px; PADDING-RIGHT: 10px; PADDING-TOP: 10px"
                                     id=xt_921018_<?php echo $v['id'];?> class="question border_t_g_r"
                                     onmousemove="readymousemove_lx('xt_921018_<?php echo $v['id'];?>');"
                                     onmouseout="readymouseleave_lx('xt_921018_<?php echo $v['id'];?>');">
                                    <DIV class=ques_title><STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                                        <P><?php echo $v['exam']['title'];?></P></DIV>
                                    <DIV id=itemsContent_921018_1 class=choice></DIV>
                                    <DIV class=h10></DIV>
                                    <DIV class="analysis fixed">
                                        <DIV class=analysis_l>查看答案</DIV>
                                        <DIV class=analysis_r></DIV>
                                    </DIV>
                                    <DIV class=youranswer>
                                        <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid" class="youranswer_nei2 fixed">
                                            <?php
                                            array_multisort($v['answer']);
                                            $c_a=explode(',',$v['exam']['correct_answer']);
                                            array_multisort($c_a);
                                            ?>
                                            <?php if($v['answer']==$c_a){?>
                                                <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/gou.png" width=31 height=27></DIV>
                                            <?php }else{?>
                                                <DIV class=gou><IMG src="<?php echo STATICS_PATH;?>/daan_files/cha.png" width=31 height=27></DIV>
                                            <?php }?>

                                            <DIV style="COLOR: #0090c5" class=ana_txt>【考生答案】：<?php if($v['answer'][0]=='A'){echo "√";} if($v['answer'][0]=='B'){echo 'X';}?>
                                                <BR>
                                                <SPAN class=red>【正确答案】：<?php echo $v['exam']['correct_answer']=='A'?"√":'Ⅹ'?>
                                                </SPAN>
                                            </DIV>
                                        </DIV>
                                    </DIV>
                                    <DIV style="BORDER-LEFT: #c5eab7 1px solid; BORDER-RIGHT: #c5eab7 1px solid" class=kongbai></DIV>
                                    <DIV
                                        style="BORDER-BOTTOM: #c5eab7 1px solid; BORDER-LEFT: #c5eab7 1px solid; BACKGROUND: url(<?php echo STATICS_PATH;?>/daan_files/dajxbg.png) #f1f7ed no-repeat; BORDER-RIGHT: #c5eab7 1px solid"
                                        class="dajx fixed">
                                        <DIV
                                            style="PADDING-LEFT: 27px; WIDTH: 83px; COLOR: #333; FONT-SIZE: 14px; PADDING-TOP: 10px"
                                            class=dajx_l>[答案解析]</DIV>
                                        <DIV style="COLOR: #333" class=dajx_r>
                                            <P><?php echo $v['exam']['correct_desc'];?></P><BR>
                                        </DIV>

                                        <DIV style="COLOR: #333" class=h20></DIV>
                                    </DIV>
                                    <DIV class=h10></DIV>
                                    <DIV style="DISPLAY: none" id=Itemdes_Pages_itemid_<?php echo $v['id'];?>>1</DIV></DIV><!--question结束-->
                                    <?php $i++;}}?>

                                </DIV></DIV></DIV>
                    <DIV id=dt_xt_more_0_2>
                        <DIV class=chak><A onClick="dtControl('2',1);">点击展开本大题全部题目</A></DIV>
                    </DIV>
                    </DIV>

                <DIV class=h10></DIV>
                <DIV class=h25></DIV>
                <DIV class=subject_btn><INPUT id=dt_input_1_0 class=input11 onClick="dtControl('0',1);" value=单选题 type=button><INPUT id=dt_input_1_1 class=input22 onClick="dtControl('1',1);" value=多选题 type=button><INPUT id=dt_input_1_2 class=input22 onClick="dtControl('2',1);" value=判断题 type=button>
                </DIV>
                <DIV class=h25></DIV>
                <DIV class=testing_banner></DIV>
                <DIV class=h25></DIV>
                </DIV><!--complete结束-->
            </DIV><!--content结束-->
        </DIV><!--width960结束-->
        <A name=b></A>
    <DIV class=h20></DIV>
    <DIV class=footer><A href="#"
                         target=_blank>VIP会员</A>&nbsp;|&nbsp;<A href="#"
                                                                target=_blank>支付方式</A>&nbsp;|&nbsp;<A
            href="#"
            target=_blank>联系我们</A>&nbsp;|&nbsp;<A
            href="#"
            target=_blank>版权说明</A>&nbsp;|&nbsp;<A href="#"
                                                  target=_blank> 帮助中心</A><BR><A href="#"
                                                                                target=_blank>模考吧</A>&nbsp;|&nbsp;湘ICP备11011645号 </DIV>
    <DIV class=h20></DIV>
    <DIV style="DISPLAY: none" id=stopDiv>
        <DIV
            style="TEXT-ALIGN: center; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; CURSOR: pointer; PADDING-TOP: 0px"><IMG
                onclick=TimeStart(); src="<?php echo STATICS_PATH;?>/daan_files/btn_continue.gif"></DIV></DIV>
    <DIV style="DISPLAY: none"><IMG src="<?php echo STATICS_PATH;?>/daan_files/but_close.gif"> <IMG
            src="<?php echo STATICS_PATH;?>/daan_files/but_guang_jixu.gif"> <IMG src="<?php echo STATICS_PATH;?>/daan_files/but_guang.gif"> <IMG
            src="<?php echo STATICS_PATH;?>/daan_files/but_shoucang2_1.gif"> <IMG src="<?php echo STATICS_PATH;?>/daan_files/but_shoucang2_2.gif">
        <IMG src="<?php echo STATICS_PATH;?>/daan_files/Video_cart_add_bj.gif"> </DIV>
    <DIV
        style="BORDER-BOTTOM: #c5c5c5 1px solid; BORDER-LEFT: #c5c5c5 1px solid; BORDER-TOP: #c5c5c5 1px solid; TOP: 63px; BORDER-RIGHT: #c5c5c5 1px solid"
        id=bottomNav class="rightBottomNav fast_menu_lx">
        <DIV
            style="BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; WIDTH: 205px; BORDER-TOP: 0px; BORDER-RIGHT: 0px"
            id=adleft_display_id0 class=bottomNav_all>
            <DIV class=bottomNav_top11 onclick=set_adleft_display();></DIV>
            <DIV
                style="TEXT-ALIGN: center; PADDING-BOTTOM: 0px; OVERFLOW-Y: auto; BACKGROUND-COLOR: rgb(248,248,248); MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; HEIGHT: auto; PADDING-TOP: 0px"
                id=bottomNav_con>
                <TABLE class=tbItemsNav border=0 cellSpacing=0 cellPadding=0 align=center>
                    <TBODY>
                    <TR>
                        <TD align=left>
                            <TABLE class=xtNavA_con_tab border=0 cellSpacing=0 cellPadding=0
                                   width="100%">
                                <TBODY>
                                <TR>
                                    <TD style="CURSOR: pointer" id=xtNavA_dt_0 class=xtNavA_bg_dt
                                        onclick="dtControl('0',2);">
                                        <DIV style="PADDING-LEFT: 8px"><A style="TEXT-DECORATION: none"
                                                                          id=leftTab_0 class=leftTabCurr title=单选题>
                                                <H6
                                                    style="COLOR: #2f3743; FONT-SIZE: 14px; FONT-WEIGHT: normal; TEXT-DECORATION: none">单选题</H6></A></DIV></TD></TR>
                                <TR id=dt_xt_nav_1_0>
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff" class=xtNavA>
                                            <UL style="PADDING-LEFT: 2px">

                                                <?php
                                                $right=0;
                                                if(!empty($use_dec_v['single'])){
                                                $i=1;
                                                foreach($use_dec_v['single'] as $v){
                                                ?>
                                                    <?php
                                                    array_multisort($v['answer']);
                                                    $c_a=explode(',',$v['exam']['correct_answer']);
                                                    array_multisort($c_a);
                                                    ?>
                                                <LI
                                                    style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                                                    id=li_xt_<?php echo $v['id'];?> class="<?php echo ($v['answer']==$c_a)?'mark_ans_r_lx':'mark_ans_rq_0_lx_error'?>"><A
                                                        onclick="ctrolScroll_new('xt_921016_<?php echo $v['id'];?>');"><?php echo $i;?></A></LI>
                                                    <?php
                                                    if($v['answer']==$c_a){
                                                        $right+=1;
                                                    }$i++;}}?>

                                            </UL>
                                            <DIV class=clear></DIV></DIV></TD></TR>
                                <TR style="HEIGHT: 1px; OVERFLOW: hidden">
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff; HEIGHT: 1px; OVERFLOW: hidden"
                                             class=xtNavA>
                                            <UL>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI></UL>
                                            <DIV class=clear></DIV></DIV></TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                        <TD align=left>
                            <TABLE class=xtNavA_con_tab border=0 cellSpacing=0 cellPadding=0
                                   width="100%">
                                <TBODY>
                                <TR>
                                    <TD style="CURSOR: pointer" id=xtNavA_dt_1 class=xtNavA_bg_dtdt_bg0
                                        onclick="dtControl('1',2);">
                                        <DIV style="PADDING-LEFT: 8px"><A style="TEXT-DECORATION: none"
                                                                          id=leftTab_1 class=leftTabCurr title=多选题>
                                                <H6
                                                    style="COLOR: #2f3743; FONT-SIZE: 14px; FONT-WEIGHT: normal; TEXT-DECORATION: none">多选题</H6></A></DIV></TD></TR>
                                <TR style="DISPLAY: none" id=dt_xt_nav_1_1>
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff" class=xtNavA>
                                            <UL style="PADDING-LEFT: 2px">
                                                <?php
                                                if(!empty($use_dec_v['more'])){
                                                $i=1;
                                                foreach($use_dec_v['more'] as $v){
                                                ?>
                                                <?php
                                                array_multisort($v['answer']);
                                                $c_a=explode(',',$v['exam']['correct_answer']);
                                                array_multisort($c_a);
                                                ?>
                                                <LI
                                                    style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                                                    id=li_xt_<?php echo $v['id'];?> class="<?php echo ($v['answer']==$c_a)?'mark_ans_r_lx':'mark_ans_rq_0_lx_error'?>"><A
                                                        onclick="ctrolScroll_new('xt_921017_<?php echo $v['id'];?>');"><?php echo $i;?></A></LI>
                                                <?php
                                                    if($v['answer']==$c_a){
                                                        $right+=1;
                                                    }
                                                    $i++;}}?>

                                            </UL>
                                            <DIV class=clear></DIV></DIV></TD></TR>
                                <TR style="HEIGHT: 1px; OVERFLOW: hidden">
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff; HEIGHT: 1px; OVERFLOW: hidden"
                                             class=xtNavA>
                                            <UL>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI></UL>
                                            <DIV class=clear></DIV></DIV></TD></TR></TBODY></TABLE></TD></TR>
                    <TR>
                        <TD align=left>
                            <TABLE class=xtNavA_con_tab border=0 cellSpacing=0 cellPadding=0
                                   width="100%">
                                <TBODY>
                                <TR>
                                    <TD style="CURSOR: pointer" id=xtNavA_dt_2 class=xtNavA_bg_dtdt_bg0
                                        onclick="dtControl('2',2);">
                                        <DIV style="PADDING-LEFT: 8px"><A style="TEXT-DECORATION: none"
                                                                          id=leftTab_2 class=leftTabCurr title=判断题>
                                                <H6
                                                    style="COLOR: #2f3743; FONT-SIZE: 14px; FONT-WEIGHT: normal; TEXT-DECORATION: none">判断题</H6></A></DIV></TD></TR>
                                <TR style="DISPLAY: none" id=dt_xt_nav_1_2>
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff" class=xtNavA>
                                            <UL style="PADDING-LEFT: 2px">
                                                <?php
                                                if(!empty($use_dec_v['judge'])){
                                                $i=1;
                                                foreach($use_dec_v['judge'] as $v){
                                                ?>
                                                <?php
                                                array_multisort($v['answer']);
                                                $c_a=explode(',',$v['exam']['correct_answer']);
                                                array_multisort($c_a);
                                                ?>
                                                <LI
                                                    style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                                                    id=li_xt_<?php echo $v['id'];?> class="<?php echo ($v['answer']==$c_a)?'mark_ans_r_lx':'mark_ans_rq_0_lx_error'?>"><A
                                                        onclick="ctrolScroll_new('xt_921018_<?php echo $v['id'];?>');"><?php echo $i;?></A></LI>
                                                <?php
                                                    if($v['answer']==$c_a){
                                                        $right+=1;
                                                    }
                                                    $i++;}}?>

                                            </UL>
                                            <DIV class=clear></DIV></DIV></TD></TR>
                                <TR style="HEIGHT: 1px; OVERFLOW: hidden">
                                    <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" align=middle>
                                        <DIV style="BACKGROUND: #fff; HEIGHT: 1px; OVERFLOW: hidden"
                                             class=xtNavA>
                                            <UL>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI>
                                                <LI class=mark_ans_do_0></LI></UL>
                                            <DIV
                                                class=clear></DIV></DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV>
            <DIV
                style="PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BACKGROUND: #e8e8e8; PADDING-TOP: 0px"
                id=ExamSubmit1 class=explain>
                <DIV class=h12></DIV>
                <DIV style="MARGIN: 0px auto; WIDTH: 112px" class=explain2>
                    <DL>
                        <DT><IMG src="<?php echo STATICS_PATH;?>/daan_files/text1.png" width=23 height=23></DT>
                        <DD>正确</DD></DL>
                    <DL>
                        <DT><IMG src="<?php echo STATICS_PATH;?>/daan_files/text2.png" width=23 height=23></DT>
                        <DD><SPAN class=black>错误</SPAN></DD></DL></DIV>
                <DIV class=h10></DIV>
                <DIV class=fast_test_f>共<SPAN class=test_view_xt_r><?php echo $quest_num;?></SPAN>题 答对<SPAN
                        class=test_view_xt_r><?php echo $right;?></SPAN>题 答错<SPAN class=test_view_xt_r><?php echo $quest_num-$right;?></SPAN>题</DIV>
                <DIV class=h10></DIV>
                <DIV class=explain1_btn></DIV>
                <DIV class=h10></DIV>
                <DIV class=lodge_btn><A
                        href="#"><IMG alt=""
                                      src="<?php echo STATICS_PATH;?>/daan_files/answers_jiexi_03.png"></A></DIV>
                <DIV class=h10></DIV></DIV></DIV>
        <DIV style="DISPLAY: none; CURSOR: pointer" id=adleft_display_id1
             onclick=set_adleft_display();><IMG src="<?php echo STATICS_PATH;?>/daan_files/btn_bottom_nav_min1.gif">
        </DIV></DIV>
    <SCRIPT language=javascript type=text/javascript>
        var dtStr = "921016,921017,921018";var dtArr = dtStr.split(",");var dtCur = 0;var pid = "45551";var recid = "261562";

        var readtag = null;

        var timerLoad1 = null;
        var times = 0;
        function paperLoad1() {
            if (times == 0) {
                myItemsPages.setTabaja_ItemPages(null, '1', dtArr[0], pid, 'papertest_view_hd_130121', recid, readtag, 1);
            }
            else if (times % 20 == 0) {
                if (document.getElementById(dtArr[0] + "_itemPageIndex_1").innerHTML.length < 300) {
                    myItemsPages.setTabaja_ItemPages(null, '1', dtArr[0], pid, 'papertest_view_hd_130121', recid, readtag, 1);
                }
                else {
                    clearTimeout(timerLoad1);
                }
            }
        }
        timerLoad1 = setTimeout("paperLoad1()", 100);

    </SCRIPT>

    <SCRIPT type=text/javascript>

        var Alert = ymPrompt.alert;
        function cancelFn() {
            //Alert("点击了'取消'按钮");
        }
        function okFn() {
            //Alert("点击了'确定'按钮");
        }
        function closeFn() {
            //Alert("点击了'关闭'按钮");
            //window.location.href = window.location.href;
        }
        function handler(tp) {
            if (tp == 'ok') {
                okFn();
            }
            if (tp == 'cancel') {
                cancelFn();
            }
            if (tp == 'close') {
                closeFn()
            }
        }

        $("#digg").live("click", function () {
            var digg = $(this).attr("digg") * 1;
            var AnalyseID = $(this).attr("AnalyseID") * 1;
            var obj = $(this);
            if (digg != 0) {
                $.ajax({
                    type: "POST",
                    url: "/AjaxControls/SubjectExplain.ashx",
                    data: { Act: "DiggAnaly", Digg: digg, AnalyseID: AnalyseID },
                    dataType: 'json',
                    success: function (result) {
                        if (result.S == "1") {
                            PopUp(obj, "操作成功", 1);
                            obj.attr("digg", 0)
                            if (digg == 1) {
                                obj.find("span").html("赞同(" + result.DiggTop + ")");
                            }
                            else {
                                obj.find("span").html("反对(" + result.DiggDown + ")");
                            }
                        }
                        else {
                            PopUp(obj, "操作成功", 1);
                        }
                    }
                });
            }
        })

        $(".lookover").live("click", function () {
            var obj = $(this);
            var eid = $(this).attr("eid");
            var daid = $(this).attr("daid");
            var xt $(this).attr("xtsid");
            if ($("#explation_" + daid + " .jxnum").size() == 0) {
                GetAnalyseList(eid, daid, xtsid, obj);
            }
            else {
                var AnalyseNum = obj.attr("AnalyseNum");
                $("#explation_" + daid).html("<a href=\"javascript:;\" AnalyseNum=\"" + AnalyseNum + "\" xt\"" + xtsid + "\" daid=\"" + daid + "\" eid=\"" + eid + "\" class=\"lookover\" load=\"1\">网友解析(" + AnalyseNum + ")</a>");
            }
        });
        function GetAnalyseList(eid, daid, xtsid, obj) {
            $.ajax({
                type: "GET",
                url: "/AjaxControls/SubjectExplain.ashx",
                data: { Act: "GetAnalyseList", ExamID: eid, XTSID: xtsid },
                dataType: 'json',
                success: function (result) {
                    if (result.S == 1) {
                        var html = "", nickname = "";
                        if (result.AnalyseList.length > 0) {
                            html += "<a href=\"javascript:;\" eid=\"" + eid + "\" daid=\"" + daid + "\" xt\"" + xtsid + "\" AnalyseNum=\"" + result.AnalyseList.length + "\" class=\"lookover lookover2\" load=\"1\">收起</a>";
                            for (i = 0; i < result.AnalyseList.length; i++) {
                                nickname = (result.AnalyseList[i].UserName == "") ? "模考吧网友" : result.AnalyseList[i].UserName;
                                html += "<div class=\"jxnum\"><div class=\"rubric_title\"><span class=\"jiexi\">解析" + (i + 1) + "</span> " + unescape(result.AnalyseList[i].ExplainContent) + "</div><div class=\"fsinfo\"><div class=\"ptext\">" + nickname + "-" + result.AnalyseList[i].CreateDate + "</div><div class=\"huf\"><p class=\"leftA\"><span class=\"lf_bg\"></span><a title=\"\" id=\"digg\" digg=1 AnalyseID=\"" + result.AnalyseList[i].ID + "\" href=\"javascript:;\"><span class=\"love\">赞同(" + result.AnalyseList[i].ZanTongShu + ")</span></a><span class=\"md\"></span><a title=\"不喜欢也点一下\" id=\"digg\" digg=-1 AnalyseID=\"" + result.AnalyseList[i].ID + "\" href=\"javascript:;\"><span class=\"nolove\">反对(" + result.AnalyseList[i].FanDuiShu + ")</span></a><span class=\"rt_bg\"></span></p></div></div></div>";
                            }
                            $("#explation_" + daid).html(html);
                        }
                        else {
                            PopUp(obj, "没有更多解析，您也可以为该题提供您认为正确的解析", 0);
                        }
                    }

                }
                ,
                error: function (e) { /*notice("载入错误",3);错误处理*/ }
                ,
                async: true,
                cache: false
            });
        }
        var PopUpOut;
        function PopUp(obj, v, t) {
            if (t == 1) { $(".Pop-up").find("span").attr("class", "succeed").html(v); } else { $(".Pop-up").find("span").attr("class", "nosuc").html(v); }
            $(".Pop-up").css({ left: "" + (obj.offset().left - $(".Pop-up").width() + obj.width()) + "px", top: "" + (obj.offset().top + 36) + "px" }).slideDown();
            clearTimeout(PopUpOut);
            PopUpOut = setTimeout(function () { $(".Pop-up").slideUp(); }, 2000);
        }
    </SCRIPT>

    <SCRIPT type=text/javascript>
        function readymousemove_lx(id) {
            if (document.getElementById(id) != null) {
                document.getElementById(id).style.border = "#50b926 1px solid";
            }
        }

        function readymouseleave_lx(id) {
            if (document.getElementById(id) != null) {
                document.getElementById(id).style.border = "#fff 1px solid";
            }
        }
    </SCRIPT>
</FORM>
<SCRIPT language=javascript type=text/javascript
        src="<?php echo STATICS_PATH;?>/daan_files/disableSelect.js"></SCRIPT>

<SCRIPT language=javascript type=text/javascript
        src="<?php echo STATICS_PATH;?>/daan_files/papertest_nav1_0311.js"></SCRIPT>

<DIV
    style="Z-INDEX: 9900; POSITION: absolute; WIDTH: 300px; DISPLAY: none; HEIGHT: 150px; TOP: 56px; LEFT: 499px"
    id=SxbCom_favoriteadd>
    <DIV
        style="MARGIN: 0px auto; WIDTH: 300px; BACKGROUND: url(/images/paperks/Video_cart_add_bj.gif) no-repeat; HEIGHT: 110px">
        <TABLE style="WIDTH: 300px; HEIGHT: 110px" border=0 cellSpacing=0 cellPadding=0
               align=center>
            <TBODY>
            <TR>
                <TD height=15 width="25%">&nbsp; </TD>
                <TD vAlign=top width="75%" align=right><IMG style="CURSOR: pointer"
                                                            onclick="closeShopCart('SxbCom_favoriteadd')" alt=关闭
                                                            src="<?php echo STATICS_PATH;?>/daan_files/but_close.gif" width=13 height=13> </TD></TR>
            <TR>
                <TD height=46>&nbsp; </TD>
                <TD class="fB f14px" align=left>此试卷已成功添加到收藏夹！ </TD></TR>
            <TR>
                <TD>&nbsp; </TD>
                <TD height=30 vAlign=top align=left><IMG style="CURSOR: pointer"
                                                         onclick="closeShopCart('SxbCom_favoriteadd')"
                                                         src="<?php echo STATICS_PATH;?>/daan_files/but_guang.gif" width=64 height=21>&nbsp;&nbsp;<A
                        href="#"
                        target=_blank><IMG src="<?php echo STATICS_PATH;?>/daan_files/but_shoucang2.gif" width=74
                                           height=21></A> </TD></TR></TBODY></TABLE></DIV></DIV>
<DIV style="Z-INDEX: 999; DISPLAY: none" class=Pop-up>
    <DIV class=pop-box><SPAN class=succeed>保存成功</SPAN></DIV></DIV>

</BODY></HTML>

