<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0050)http://www.mokaoba.com/exam/paperks.aspx -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $exam_name;?></title>
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <meta content="zh-CN" http-equiv="Content-Language">
  <meta content="no-cache" http-equiv="pragma">
  <link rel="stylesheet" type="text/css" href="<?php echo STATICS_PATH;?>/shiti_files/ymPrompt.css">
  <link rel="stylesheet" type="text/css" href="<?php echo STATICS_PATH;?>/shiti_files/test.css">
  <link rel="stylesheet" type="text/css" href="<?php echo STATICS_PATH;?>/shiti_files/basetest.css">
  <link rel="stylesheet" type="text/css" href="<?php echo STATICS_PATH;?>/shiti_files/testing.css">
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/jingAjax.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/base.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/dotestr_nav1_0311.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/TestPaperCart.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/ymPrompt_source.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/js/jq_min.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/shopcart.js"></script>
  <script type="text/javascript">
    function OnPlay(url) {
      window.open("http://www.mokaoba.com/exam/Mp3_Player.aspx?urlpath=" + escape(url), "newwindow", "height=20,width=260");
    }
  </script>
  <style type=text/css>
    .ListenPlay {
      margin-top: -23px;
      width: 126px;
      /*background: url(/images/ListenPlay.gif) no-repeat;*/
      float: left;
      height: 24px;
      cursor: pointer
    }
  </style>

  <script type="text/javascript">
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
  </script>
  <meta name="generator" content="mshtml 8.00.6001.23580">
</head>
<body style="cursor: default" id="paperbody">
  <form method="post" name="form1" action="#">
    <div>
      <a name="a">&nbsp;</a>
      <div class="testing_header">
        <div class="width960">
          <div class="testing_logo fl">
            <a href="javascript:;" target="_blank"><img src="<?php echo STATICS_PATH;?>/shiti_files/testing_logo.png" width="242" height="32"></a>
          </div>

          <div class="righter fr">
            <div style="WIDTH: 185px" class="user fr">
              <div id=sidebar2>
                <div class=sidelist2>
                    <span>
                      <h3><a class="drop2"><?php echo $this->input->get_post('user_name');?></a></h3>
                    </span>
                  <div class="i-list2">
                    <div class="i-list3">
                        <div class=h8></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="h63"></div>
      <div class="width960">
        <div class="h15"></div>
        <div class="testing_position">
          <span>你当前位置：</span>
          <a href="<?php echo MAIN_PATH.'/examination/examList?user_id='.$this->input->get_post('user_id').'&user_name='.$this->input->get_post('user_name')?>">试题列表</a>
          &gt;&gt;<?php echo $exam_name;?>
        </div>


        <div class="h15"></div>
        <div style="width: 0px; display: none" id="Header" class="Ksbody"></div><!--timefixed结束-->
        <div class=testing_content>
          <div class=title>
            <h4><span id="lblpapername"><?php echo $exam_name;?></span></h4>
          </div>
          <div class="h15"></div>
          <script language="javascript" type="text/javascript">
            var totalItems = 150; var leavTotal = 150; var hasDoTotal = 0; var totalNames = "";
          </script>
          <div class="subject_btn">
            <input id="dt_input_0" class="input11" onclick="dtControl('0',1);" value="单选题" type="button">
            <input id="dt_input_1" class="input22" onclick="dtControl('1',1);" value="多选题" type="button">
            <input id="dt_input_2" class="input22" onclick="dtControl('2',1);" value="判断题" type="button">
          </div><!--categoribtn结束-->
          <div class="h10"></div>
          <div id="con_one_0">
            <div class="h10"></div>
            <div id="dt_xt_title_0" class="part2 part2_1" onclick="dtControl('0',0);">单选题</div>
            <div id="dt_xt_content_0">
              <div class="style_dt_desc">一、单选题</div><!--part1结束-->
              <div class="container">
                <div id="<?php echo $e_id;?>_itemPageIndex_1">
                  <?php
                    if(!empty($single)){
                      $i=1;
                      foreach($single as $v){
                  ?>
                  <div style="border-bottom: rgb(255,255,255) 1px solid; border-left: rgb(255,255,255) 1px solid; padding-left: 10px; padding-right: 10px; border-top: rgb(255,255,255) 1px solid; border-right: rgb(255,255,255) 1px solid; padding-top: 10px" id="xt_<?php echo $v['exam_id'].'_'.$v['id'];?>" class="question border_t_g_r" onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');" onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                    <div class="ques_title">
                      <strong class="xt_index">第<span><?php echo $i;?></span>题</strong>
                      <p><?php echo $v['title'];?>(&nbsp;&nbsp;&nbsp; )。</p>
                      <?php foreach($v['answer'] as $kk=>$vv){?>
                      <p>&nbsp; <?php echo $kk.' . '.$vv;?></p>
                      <?php }?>
                    </div>
                    <div class="choice"></div>
                    <div class="h10"></div>
  <!--                  <DIV class="biaoji fixed"><A class=mark_ans_img_ing title=拿不定答案，暂时标记一下，呆会做答-->
<!--                                               onclick="SXBmakemark_mark_0311(this,'921016','870487','0');return false;"-->
<!--                                               href="javascript:;"-->
<!--                                               target=_blank></A></DIV>-->
                    <div class="selectanswer">
                      <span class="xuanze_txt">[选择答案]</span>
                      <ul class="zimu">
                        <li id="li_0_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect0(this);return false;" input_value="A" input_name="itemMyAns_0_<?php echo $v['id'];?>_1">
                          <a onclick="this.blur();" href="javascript:void(0);">A</a>
                        </li>
                        <li id="li_0_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect0(this);return false;" input_value="B" input_name="itemMyAns_0_<?php echo $v['id'];?>_1">
                          <a onclick="this.blur();" href="javascript:void(0);">B</a>
                        </li>
                        <li id="li_0_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect0(this);return false;" input_value="C" input_name="itemMyAns_0_<?php echo $v['id'];?>_1">
                          <a onclick="this.blur();" href="javascript:void(0);">C</a>
                        </li>
                        <li id="li_0_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect0(this);return false;" input_value="D" input_name="itemMyAns_0_<?php echo $v['id'];?>_1">
                          <a onclick="this.blur();" href="javascript:void(0);">D</a>
                        </li>
                      </ul>
                    </div>
                    <div class="h10"></div>
                  </div><!--question结束-->
                <?php $i++;} } ?>

                </div>
              </div>
            </div>

          <div style="display: none" id="dt_xt_more_0_0">
            <div class="chak"><a onclick="dtControl('0',1);">点击展开本大题全部题目</a></div>
          </div>

        <div id="con_one_1">
          <div class="h10"></div>
          <div id="dt_xt_title_1" class="part2" onclick="dtControl('1',0);">多选题</div>
          <div style="display: none" id="dt_xt_content_1">
            <div class="style_dt_desc">二、多选题</div><!--part1结束-->
            <div class="container">
              <div id="<?php echo $e_id;?>_itemPageIndex_1">
                <?php
                if(!empty($more)){
                  $i=1;
                  foreach($more as $v){
                    ?>
                <div style="padding-left: 10px; padding-right: 10px; padding-top: 10px" id="xt_<?php echo $v['exam_id'].'_'.$v['id'];?>" class="question border_t_g_r" onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');" onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                  <div class="ques_title"><strong class="xt_index">第<span><?php echo $i;?></span>题</strong>
                    <p><?php echo $v['title'];?>(&nbsp;&nbsp;&nbsp; )。</p>
                    <?php foreach($v['answer'] as $kk=>$vv){?>
                      <p>&nbsp; <?php echo $kk.' . '.$vv;?></P>
                    <?php }?>
                  </div>
                  <div class="choice"></div>
                  <div class="h10"></div>

                  <div class="selectanswer"><span class="xuanze_txt">[选择答案]</span>
                    <ul class="zimu2">
                      <li id="li_1_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect1(this);return false;" input_value="A" input_name="itemMyAns_1_<?php echo $v['id'];?>_1">
                        <a onclick="this.blur();" href="javascript:void(0);">A</a>
                      </li>
                      <li id="li_1_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect1(this);return false;" input_value="B" input_name="itemMyAns_1_<?php echo $v['id'];?>_1">
                        <a onclick="this.blur();" href="javascript:void(0);">B</a>
                      </li>
                      <li id="li_1_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect1(this);return false;" input_value="C" input_name="itemMyAns_1_<?php echo $v['id'];?>_1">
                        <a onclick=this.blur(); href="javascript:void(0);">C</a>
                      </li>
                      <li id="li_1_<?php echo $v['id'];?>_1" onclick="doTotalItemsSelect1(this);return false;" input_value="D" input_name="itemMyAns_1_<?php echo $v['id'];?>_1">
                        <A onclick="this.blur();" href="javascript:void(0);">D</A>
                      </li>
                    </ul>
                  </div>
                  <div class="h10"></div>
                </div><!--question结束-->
                <?php $i++;} } ?>
              </div>
            </div>
          </div>

          <div id="dt_xt_more_0_1">
            <div class="chak"><a onclick="dtControl('1',1);">点击展开本大题全部题目</a></div>
          </div>

        </div>

        <div id="con_one_2">
          <div class="h10"></div>
          <div id="dt_xt_title_2" class="part2" onclick="dtControl('2',0);">判断题</div>
          <div style="display: none" id="dt_xt_content_2">
            <div class="style_dt_desc">三、判断题</div><!--part1结束-->
            <div class="container">
              <div id="<?php echo $e_id;?>_itemPageIndex_1">
                <?php
                if(!empty($judge)){
                $i=1;
                foreach($judge as $v){
                ?>
                <div style="padding-left: 10px; padding-right: 10px; padding-top: 10px" id="xt_<?php echo $v['exam_id'].'_'.$v['id'];?>" class="question border_t_g_r" onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');" onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                  <div class="ques_title">
                    <strong class="xt_index">第<span><?php echo $i;?></span>题</strong>
                    <p><?php echo $v['title'];?></p>
                  </div>
                  <div class="choice"></div>
                  <div class="h10"></div>

                  <div class="selectanswer"><span class="xuanze_txt">[选择答案]</span>
                    <ul class="zimu">
                      <li onclick="doTotalItemsSelect0(this);return false;" input_value="A" input_name="itemMyAns_2_<?php echo $v['id'];?>">
                        <a onclick="this.blur();" href="javascript:void(0);">√ </a>
                      </li>
                      <li onclick="doTotalItemsSelect0(this);return false;" input_value="B" input_name="itemMyAns_2_<?php echo $v['id'];?>">
                        <a onclick="this.blur();" href="javascript:void(0);">Ⅹ </a>
                      </li>
                    </ul>
                  </div>
                  <div class="h10"></div>
                </div><!--question结束-->
                  <?php $i++;} } ?>
              </div>
            </div>
          </div>

          <div id="dt_xt_more_0_2">
            <div class="chak"><a onclick="dtControl('2',1);">点击展开本大题全部题目</a></div>
          </div>
        </div>

        <div class="h10"></div>
        <div class="h10"></div>
        <!--<DIV id=totalItemsView1 class=situation_num>已做 <SPAN class=green>0</SPAN> 题 / 共 
<SPAN class=green>150</SPAN> 题 &nbsp;&nbsp;剩余 <SPAN class=green>150</SPAN> 题未作答 
</DIV>-->
        <div class="h20"></div>
        <div class="subject_btn">
          <input id="dt_input_1_0" class="input11" onclick="dtControl('0',1);" value="单选题" type="button">
          <input id="dt_input_1_1" class="input22" onclick="dtControl('1',1);" value="多选题" type="button">
          <input id="dt_input_1_2" class="input22" onclick="dtControl('2',1);" value="判断题" type="button">
        </div>
        <div class="h25"></div>
        <div class="cut_question">
          <div class="line"></div>
        </div>
        <div class="h25"></div>
        <div class="hand_paper">
          <input id="hdStopTimes" value="0" type="hidden" name="hdStopTimes">
          <input id="LastTime" value="0" type="hidden" name="LastTime">
          <img style="border-right-width: 0px; width: 182px; border-top-width: 0px; border-bottom-width: 0px; height: 50px; border-left-width: 0px" id="ImageButton1" class="curPointer" onclick="doSumbit();return false;" src="<?php echo STATICS_PATH;?>/shiti_files/hand_paper.png" type="image" name="ImageButton1">
          <span id="lbljsTime">
            <script language="javascript" type="text/javascript">
              ExamM = 120; countTime = 120;
            </script>
          </span>
        </div>
        <div class="h25"></div>
        <div class="testing_banner"></div>
        <div class="h25"></div><!--complete结束-->

          </div>
        </div><!--content结束-->
      </div><!--width960结束-->



      <a name="b"></a>
      <div class="h20"></div>
      <div class="footer">
        <a href="http://www.mokaoba.com/help/vip/" target="_blank">VIP会员</a>&nbsp;|&nbsp;
        <a href="http://www.mokaoba.com/help/pay/" target="_blank">支付方式</a>&nbsp;|&nbsp;
        <a href="http://www.mokaoba.com/help/contactus/" target="_blank">联系我们</a>&nbsp;|&nbsp;
        <a href="http://www.mokaoba.com/help/banquan/" target="_blank">版权说明</a>&nbsp;|&nbsp;
        <a href="http://www.mokaoba.com/help/" target="_blank"> 帮助中心</a><br>
        <a href="http://www.mokaoba.com/" target="_blank">模考吧</a>&nbsp;|&nbsp;湘ICP备11011645号
      </div>
      <div class="h20"></div>
    </div>



  <div style="display: none" id="stopDiv">
    <div style="text-align: center; oadding-bottom: 0px; margin: 0px; padding-left: 0px;padding-right: 0px; cursor: pointer;padding-top: 0px">
      <img onclick="TimeStart();" src="<?php echo STATICS_PATH;?>/shiti_files/btn_continue.gif">
    </div>
  </div>
  <div style="display: none">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/but_close.gif">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/but_guang_jixu.gif">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/but_guang.gif">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2_1.gif">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2_2.gif">
    <img src="<?php echo STATICS_PATH;?>/shiti_files/Video_cart_add_bj.gif">
  </div>
  <div style="border-bottom: #c5c5c5 1px solid; border-left: #c5c5c5 1px solid; border-top: #c5c5c5 1px solid; top: 63px; border-right: #c5c5c5 1px solid" id="bottomNav" class="rightBottomNav fast_menu_lx">
    <div style="border-bottom: 0px; border-left: 0px; width: 205px; border-top: 0px; border-right: 0px" id="adleft_display_id0" class="bottomNav_all">
      <div class="bottomNav_top11" onclick="set_adleft_display();"></div>
      <div style="text-align: center; padding-bottom: 0px; overflow-y: auto; background-color: rgb(248,248,248); margin: 0px; padding-left: 0px; padding-right: 0px; height: auto; padding-top: 0px" id="bottomNav_con">
        <table class="tbItemsNav" border="0" cellSpacing="0" cellPadding="0" align="center">
          <tbody>
            <tr>
              <td align="left">
                <table class="xtNavA_con_tab" border="0" cellSpacing="0" cellPadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td style="cursor: pointer" id="xtNavA_dt_0" class="xtNavA_bg_dt" onclick="dtControl('0',2);">
                        <div style="padding-left: 8px">
                          <a style="text-decoration: none" id="leftTab_0" class="leftTabCurr" title="单选题">
                            <h6 style="color: #2f3743; font-size: 14px; font-weight: normal; text-decoration: none">单选题</h6>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr id="dt_xt_nav_1_0">
                      <td style="padding-left: 8px; padding-right: 8px" align="middle">
                        <div style="background: #fff" class="xtNavA">
                          <ul style="padding-left: 2px">
                            <?php
                            if(!empty($single)){
                            $i=1;
                            foreach($single as $v){
                            ?>
                            <li style="border-bottom: #c6c6c6 1px solid; border-left: #c6c6c6 1px solid; border-top: #c6c6c6 1px solid; border-right: #c6c6c6 1px solid" id="li_xt_<?php echo $v['id'];?>" class="mark_ans_do_0">
                              <a onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></a>
                            </li>
                            <?php $i++;}}?>
                            </ul>
                          <div class="clear"></div>
                        </div>
                      </td>
                    </tr>
                    <tr style="height: 1px; overflow: hidden">
                      <td style="padding-left: 8px; padding-right: 8px" align="middle">
                        <div style="background: #fff; height: 1px; overflow: hidden" class="xtNavA">
                          <ul>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                          </ul>
                          <div class="clear"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="left">
                <table class="xtNavA_con_tab" border="0" cellSpacing="0" cellPadding="0" width="100%">
                  <tbody>
                  <tr>
                    <td style="cursor: pointer" id="xtNavA_dt_1" class="xtNavA_bg_dtdt_bg0" onclick="dtControl('1',2);">
                      <div style="padding-left: 8px">
                        <a style="text-decoration: none" id="leftTab_1" class="leftTabCurr" title="多选题">
                          <h6 style="color: #2f3743; font-size: 14px; font-weight: normal; text-decoration: none">多选题</h6>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr style="display: none" id="dt_xt_nav_1_1">
                    <td style="padding-left: 8px; padding-right: 8px" align="middle">
                      <div style="background: #fff" class="xtNavA">
                        <ul style="padding-left: 2px">
                          <?php
                          if(!empty($more)){
                          $i=1;
                          foreach($more as $v){
                          ?>
                          <li style="border-bottom: #c6c6c6 1px solid; border-right: #c6c6c6 1px solid; border-top: #c6c6c6 1px solid; border-right: #c6c6c6 1px solid" id="li_xt_<?php echo $v['id'];?>" class="mark_ans_do_0">
                            <a onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></a>
                          </li>
                            <?php $i++;}}?>
                        </ul>
                        <div class="clear"></div>
                      </div>
                    </td>
                  </tr>
                  <tr style="height: 1px; overflow: hidden">
                    <td style="padding-left: 8px; padding-right: 8px" align="middle">
                      <div style="background: #fff; height: 1px; overflow: hidden" class="xtNavA">
                        <ul>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                          <li class="mark_ans_do_0"></li>
                        </ul>
                        <div class="clear"></div>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td align="left">
                <table class="xtNavA_con_tab" border="0" cellSpacing="0" cellPadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td style="cursor: pointer" id="xtNavA_dt_2" class="xtNavA_bg_dtdt_bg0" onclick="dtControl('2',2);">
                        <div style="padding-left: 8px">
                          <a style="text-decoration: none" id="leftTab_2" class="leftTabCurr" title="判断题">
                            <h6 style="color: #2f3743; font-size: 14px; font-weight: normal; text-decoration: none">判断题</h6>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr style="display: none" id="dt_xt_nav_1_2">
                      <td style="padding-left: 8px; padding-right: 8px" align="middle">
                        <div style="background: #fff" class="xtNavA">
                          <ul style="padding-left: 2px">
                            <?php
                            if(!empty($judge)){
                            $i=1;
                            foreach($judge as $v){
                            ?>
                            <li style="border-bottom: #c6c6c6 1px solid; border-left: #c6c6c6 1px solid; border-top: #c6c6c6 1px solid; border-right: #c6c6c6 1px solid" id="li_xt_<?php echo $v['id'];?>" class="mark_ans_do_0">
                              <a onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></a>
                            </li>
                              <?php $i++;}}?>

                            </ul>
                          <div class="clear"></div>
                        </div>
                      </td>
                    </tr>
                    <tr style="height: 1px; overflow: hidden">
                      <td style="padding-left: 8px; padding-right: 8px" align="middle">
                        <div style="background: #fff; height: 1px; overflow: hidden" class="xtNavA">
                          <ul>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                            <li class="mark_ans_do_0"></li>
                          </ul>
                          <div class="clear"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="background: #e8e8e8" id="ExamSubmit1" class="explain">
        <div class="explain1 fl">
          <dl>
            <dt><img src="<?php echo STATICS_PATH;?>/shiti_files/text1.png" width="23" height="23"></dt>
            <dd>未作答</dd>
          </dl>
          <dl>
            <dt><img src="<?php echo STATICS_PATH;?>/shiti_files/text2.png" width="23" height="23"></dt>
            <dd><span class="black">已作答</span></dd>
          </dl>
          <!--<DL style="WIDTH: 55px">
  <DT><IMG src="<?php echo STATICS_PATH;?>/shiti_files/text3.png" width=23 height=23></DT>
  <DD style="WIDTH: 25px"><SPAN class=orange>疑问</SPAN></DD></DL>--></div>
        <div class="h10"></div>
        <div class="explain1_btn"><img style="cursor: pointer" onclick="doSumbit();return false;" src="<?php echo STATICS_PATH;?>/shiti_files/fast1.png" width="93" height="34">
        </div>
      </div>
    </div>
    <div style="display: none; cursor: pointer" id="adleft_display_id1" onclick="set_adleft_display();">
      <img src="<?php echo STATICS_PATH;?>/shiti_files/btn_bottom_nav_min1.gif">
    </div>
  </div>
    <div class="top_lx_lx">
      <a href="#a"><img alt="" src="<?php echo STATICS_PATH;?>/shiti_files/top_pic_lx.png"></a>
    </div>
  <script language="javascript" type="text/javascript">
    var dtStr = "921016,921017,921018";var dtArr = dtStr.split(",");var dtCur = 0;var pid = "45266";

//    var timerLoad1 = null;
//    var times = 0;
//
//    function paperLoad1() {
//      if (times == 0) {
//        myItemsPages.setTabaja_ItemPages(null, '1', dtArr[0], pid, 'papertest_hd_130121', null, null, 1);
//      }
//      else if (times % 20 == 0) {
//        if (document.getElementById(dtArr[0] + "_itemPageIndex_1").innerHTML.length < 300) {
//          myItemsPages.setTabaja_ItemPages(null, '1', dtArr[0], pid, 'papertest_hd_130121', null, null, 1);
//        }
//        else {
//          clearTimeout(timerLoad1);
//        }
//      }
//    }
//    timerLoad1 = setTimeout("paperLoad1()", 100);
//
//
//
//    var hdStopTimes_obj = document.getElementById("hdStopTimes");
//
//    var ExamM,
//        ExamS,
//        ZT;
//
//    var boolStop = false;
//
//    ExamS = 00;
//    LastTime();
//    function LastTime() {
//      ExamS--;
//      if (ExamS < 0) {
//        ExamS = 59;
//        ExamM--;
//
//      }
//
//      if (ExamM < 0) {
//        document.getElementById("ExamTime").innerHTML = "0:00";
//        ExamSubmit(1);
//        return;
//
//      }
//      if (ExamS < 10) {
//        document.getElementById("ExamTime").innerHTML = ExamM + ":0" + ExamS;
//
//      }
//      else {
//        document.getElementById("ExamTime").innerHTML = ExamM + ":" + ExamS;
//
//      }
//      ZT = setTimeout("LastTime()", 1000);
//      document.all.LastTime.value = countTime - ExamM;
//    }
//    function TimeStop() {
//      clearTimeout(ZT);
//      boolStop = true;
//      stopTimes();
//
//      var html = document.getElementById("stopDiv").innerHTML;
//      ymPrompt.win({ message: html, width: 156, height: 51, titleBar: false, maskAlpha: 0.95 });
//    }
//    function TimeStart() {
//      if (boolStop) {
//        LastTime();
//        boolStop = false;
//        clearTimeout(stopTimer);
//
//        ymPrompt.close();
//      }
//
//    }
//
//    var stopTimeM = 0;
//    var sotoTimeS = 0;
//    var stopTimer = null;
//    function stopTimes() {
//      sotoTimeS++;
//      if (sotoTimeS > 59) {
//        sotoTimeS = 0;
//        stopTimeM++;
//      }
//      hdStopTimes_obj.value = stopTimeM;
//
//      stopTimer = setTimeout("stopTimes()", 1000);
//    }
//
//
//    function ExamSubmit(Str) {
//
//      var msg = "考试时间到，确认提交试卷??";
//      if (Str == "0") {
//        msg = "确定提交试卷??";
//      }
//      if (confirm(msg) == true) {
//        document.getElementById("ImageButton1").click();
//      }
//      else {
//        if (Str != "0") {
//          //document.getElementById("ExamSubmit1").className = "SubmitHidden";
//        }
//      }
//
//    }
//    var Alert = ymPrompt.alert;
//    function cancelFn() {
//    }
//    function okFn() {
//    }
//    function closeFn() {
//    }
//    function handler(tp) {
//      if (tp == 'ok') {
//        okFn();
//      }
//      if (tp == 'cancel') {
//        cancelFn();
//      }
//      if (tp == 'close') {
//        closeFn()
//      }
//    }
//
//
//
//    $(document).ready(function () {
//      var mytop = $("#Header").offset().top;
//
//      $(window).scroll(function () {
//
//        if ($(window).scrollTop() > mytop) {
//
//          if (!$("#Header").hasClass("sticky")) { $("#Header").addClass("sticky"); }
//
//        }
//
//        else {
//
//          if ($("#Header").hasClass("sticky")) { $("#Header").removeClass("sticky"); }
//
//        }
//
//      });
//
//    });


  </script>

  <script type="text/javascript">
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
  </script>

  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/disableSelect.js"></script>

  <script language="javascript" type="text/javascript" src="<?php echo STATICS_PATH;?>/shiti_files/papertest_nav1_0311.js"></script>
  <script language="javascript" type="text/javascript">
    /**
     * 获取提交答题
     */
    function doSumbit(){
      var _uid='<?php echo $this->input->get_post('user_id')?$this->input->get_post('user_id'):0;?>';
      var _uname='<?php echo $this->input->get_post('user_name')?$this->input->get_post('user_name'):'';?>';
      var _exam_id='<?php echo $e_id?$e_id:0;?>';
      var _to_url='<?php echo MAIN_PATH;?>'+'/examination/result?eid='+_exam_id+'&user_id='+_uid+'&user_name='+_uname;
      var all_data=checkDone();
      var _url="<?php echo MAIN_PATH;?>"+'/examination/anwserOver';
      var obj=$("[class='select']");
      if(all_data) {
        obj.each(function () {
          var p = $(this).parent('li');
          var arr_name = p.attr('input_name').split('_');
          var _eid = arr_name[2];   //试题id
          all_data['A'+_eid].answer.push(p.attr('input_value'));
        });

        $.post(_url, {data: all_data, user_id: _uid, eid: _exam_id}, function (d) {
          alert(d.msg);
          if (d.status == 1) {
              window.location.href=_to_url;
          }
        },'json')
      }
      return false;
    }
    /**
     * 答题情况
     */
    function checkDone(){
      var all_res={};  //总数据
      var do_num=0;
      var _single_do=$('#dt_xt_nav_1_0').find('li');  //单选题
      var _more_do=$('#dt_xt_nav_1_1').find('li');  //多选题
      var _judge_do=$('#dt_xt_nav_1_2').find('li'); //判断题
      var _total=_single_do.length+_more_do.length+_judge_do.length;

      _single_do.each(function(){
          var _s_arr=$(this).attr('class').split('_');
          var _s_id=$(this).attr('id').split('_');
          var _sids={};
          _sids.type=1;  //题的类型
          _sids.id=_s_id[2];  //题的id
          _sids.do=_s_arr[3];  //做没做
          _sids.answer=[];  //答案容器
          all_res['A'+_s_id[2]]=_sids;
          if(parseInt(_s_arr[3])==1){
            do_num++;
          }
      });

      _more_do.each(function(){
        var _m_arr=$(this).attr('class').split('_');
        var _m_id=$(this).attr('id').split('_');
        var _mids={};
        _mids.type=3;  //题的类型
        _mids.id=_m_id[2];  //题的id
        _mids.do=_m_arr[3];  //做没做
        _mids.answer=[];  //答案容器
        all_res['A'+_m_id[2]]=_mids;
        if(parseInt(_m_arr[3])==1){
          do_num++;
        }
      });

      _judge_do.each(function(){
        var _j_arr=$(this).attr('class').split('_');
        var _j_id=$(this).attr('id').split('_');
        var _jids={};
        _jids.type=2;  //题的类型
        _jids.id=_j_id[2];  //题的id
        _jids.do=_j_arr[3];  //做没做
        _jids.answer=[];  //答案容器
        all_res['A'+_j_id[2]]=_jids;
        if(parseInt(_j_arr[3])==1){
          do_num++;
        }
      });
      if(do_num<1){
        alert('对不起，您不能交白卷！');
      }else if(do_num<_total){
        if(confirm('您的试题未做完，确认要交卷？')){
          return all_res;
        }else{
          return false;
        }
      }else{
        return all_res;
      }
    }
  </script>
</form>
<div style="z_index: 9900; position: absolute; width: 300px; display: none; height: 150px; top: 56px; left: 499px" id="SxbCom_favoriteadd">
  <div style="margin: 0px auto; width: 300px; background: url(/images/paperks/Video_cart_add_bj.gif) no-repeat; height: 110px">
    <table style="width: 300px; height: 110px" border="0" cellSpacing="0" cellPadding="0" align="center">
      <tbody>
      <tr>
        <td height="15" width="25%">&nbsp; </td>
        <td vAlign="top" width="75%" align="right">
          <img style="cursor: pointer" onclick="closeShopCart('SxbCom_favoriteadd')" alt="关闭" src="<?php echo STATICS_PATH;?>/shiti_files/but_close.gif" width="13" height="13">
        </td>
      </tr>
      <tr>
        <td height="46">&nbsp; </td>
        <td class="fB f14px" align="left">此试卷已成功添加到收藏夹！ </td>
      </tr>
      <tr>
        <td>&nbsp; </td>
        <td height="30" vAlign="top" align="left">
          <img style="cursor: pointer" onclick="closeShopCart('SxbCom_favoriteadd')" src="<?php echo STATICS_PATH;?>/shiti_files/but_guang.gif" width="64" height="21">&nbsp;&nbsp;
          <a href="javascript:;" target="_blank"><img src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2.gif" width="74" height="21"></a>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
