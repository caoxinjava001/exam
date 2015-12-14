<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0050)http://www.mokaoba.com/exam/paperks.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE><?php echo $exam_name;?></TITLE>
  <META content="text/html; charset=UTF-8" http-equiv=Content-Type>
  <META content=zh-CN http-equiv=Content-Language>
  <META content=no-cache http-equiv=pragma>
  <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/shiti_files/ymPrompt.css">
  <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/shiti_files/test.css">
  <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/shiti_files/basetest.css">
  <LINK rel=stylesheet type=text/css href="<?php echo STATICS_PATH;?>/shiti_files/testing.css">
  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/jingAjax.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/base.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/dotestr_nav1_0311.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/TestPaperCart.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/ymPrompt_source.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/js/jq_min.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript src="<?php echo STATICS_PATH;?>/shiti_files/shopcart.js"></SCRIPT>

  <SCRIPT type=text/javascript>
    function OnPlay(url) {
      window.open("http://www.mokaoba.com/exam/Mp3_Player.aspx?urlpath=" + escape(url), "newwindow", "height=20,width=260");
    }
  </SCRIPT>

  <STYLE type=text/css>.ListenPlay {
      MARGIN-TOP: -23px; WIDTH: 126px; BACKGROUND: url(/images/ListenPlay.gif) no-repeat; FLOAT: left; HEIGHT: 24px; CURSOR: pointer
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
<FORM method=post name=form1 action=#>
  <DIV><A name=a>&nbsp;</A>
    <DIV class=testing_header>
      <DIV class=width960>
        <DIV class="testing_logo fl"><A href="javascript:;" target=_blank><IMG src="<?php echo STATICS_PATH;?>/shiti_files/testing_logo.png" width=242 height=32></A></DIV>

        <DIV class="righter fr">

          <DIV style="WIDTH: 185px" class="user fr">
            <DIV id=sidebar2>
              <DIV class=sidelist2>
                  <SPAN>
                    <H3><A class=drop2><?php echo $this->input->get_post('user_name');?></A></H3>
                  </SPAN>
                <DIV class=i-list2>
                  <DIV class=i-list3>
                    <UL>

                      <DIV class=h8></DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV></DIV>
    <DIV class=h63></DIV>
    <DIV class=width960>
      <DIV class=h15></DIV>
      <DIV class=testing_position><SPAN>你当前位置：</SPAN><A href="<?php echo MAIN_PATH.'/examination/examList?user_id='.$this->input->get_post('user_id').'&user_name='.$this->input->get_post('user_name')?>">试题列表</A> &gt;&gt;<?php echo $exam_name;?></DIV>
      <DIV class=h15></DIV>
      <DIV style="WIDTH: 0px; DISPLAY: none" id=Header class=Ksbody></DIV><!--timefixed结束-->
      <DIV class=testing_content>
        <DIV class=title>
          <H4><SPAN id=lblpapername><?php echo $exam_name;?></SPAN></H4></DIV>
        <DIV class=h15></DIV>


        <SCRIPT language=javascript type=text/javascript>var totalItems = 150; var leavTotal = 150; var hasDoTotal = 0; var totalNames = "";</SCRIPT>

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
              <DIV id=<?php echo $e_id;?>_itemPageIndex_1>
                <?php
                  if(!empty($single)){
                    $i=1;
                    foreach($single as $v){
                ?>
                <DIV
                    style="BORDER-BOTTOM: rgb(255,255,255) 1px solid; BORDER-LEFT: rgb(255,255,255) 1px solid; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; BORDER-TOP: rgb(255,255,255) 1px solid; BORDER-RIGHT: rgb(255,255,255) 1px solid; PADDING-TOP: 10px"
                    id=xt_<?php echo $v['exam_id'].'_'.$v['id'];?> class="question border_t_g_r"
                    onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"
                    onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                  <DIV class=ques_title><STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                    <P><?php echo $v['title'];?>(&nbsp;&nbsp;&nbsp; )。</P>
                    <?php foreach($v['answer'] as $kk=>$vv){?>
                    <P>&nbsp; <?php echo $kk.' . '.$vv;?></P>
                    <?php }?>
                        </DIV>
                  <DIV class=choice></DIV>
                  <DIV class=h10></DIV>
<!--                  <DIV class="biaoji fixed"><A class=mark_ans_img_ing title=拿不定答案，暂时标记一下，呆会做答-->
<!--                                               onclick="SXBmakemark_mark_0311(this,'921016','870487','0');return false;"-->
<!--                                               href="javascript:;"-->
<!--                                               target=_blank></A></DIV>-->
                  <DIV class=selectanswer><SPAN class=xuanze_txt>[选择答案]</SPAN>
                    <UL class=zimu>
                      <LI id=li_0_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect0(this);return false;"
                          input_value="A" input_name="itemMyAns_0_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">A</A></LI>
                      <LI id=li_0_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect0(this);return false;"
                          input_value="B" input_name="itemMyAns_0_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">B</A></LI>
                      <LI id=li_0_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect0(this);return false;"
                          input_value="C" input_name="itemMyAns_0_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">C</A></LI>
                      <LI id=li_0_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect0(this);return false;"
                          input_value="D" input_name="itemMyAns_0_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">D</A></LI></UL></DIV>
                  <DIV class=h10></DIV></DIV><!--question结束-->
                <?php $i++;} } ?>

                </DIV></DIV></DIV>

          <DIV style="DISPLAY: none" id=dt_xt_more_0_0>
            <DIV class=chak><A onClick="dtControl('0',1);">点击展开本大题全部题目</A></DIV></DIV></DIV>

        <DIV id=con_one_1>
          <DIV class=h10></DIV>
          <DIV id=dt_xt_title_1 class=part2 onClick="dtControl('1',0);">多选题</DIV>
          <DIV style="DISPLAY: none" id=dt_xt_content_1>
            <DIV
                class=style_dt_desc>二、多选题</DIV><!--part1结束-->
            <DIV class=container>
              <DIV id=<?php echo $e_id;?>_itemPageIndex_1>
                <?php
                if(!empty($more)){
                  $i=1;
                  foreach($more as $v){
                    ?>
                <DIV style="PADDING-LEFT: 10px; PADDING-RIGHT: 10px; PADDING-TOP: 10px"
                     id=xt_<?php echo $v['exam_id'].'_'.$v['id'];?> class="question border_t_g_r"
                     onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"
                     onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                  <DIV class=ques_title><STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                    <P><?php echo $v['title'];?>(&nbsp;&nbsp;&nbsp; )。</P>
                    <?php foreach($v['answer'] as $kk=>$vv){?>
                      <P>&nbsp; <?php echo $kk.' . '.$vv;?></P>
                    <?php }?>
                  </DIV>
                  <DIV class=choice></DIV>
                  <DIV class=h10></DIV>

                  <DIV class=selectanswer><SPAN class=xuanze_txt>[选择答案]</SPAN>
                    <UL class=zimu2>
                      <LI id=li_1_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect1(this);return false;"
                          input_value="A" input_name="itemMyAns_1_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">A</A></LI>
                      <LI id=li_1_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect1(this);return false;"
                          input_value="B" input_name="itemMyAns_1_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">B</A></LI>
                      <LI id=li_1_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect1(this);return false;"
                          input_value="C" input_name="itemMyAns_1_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">C</A></LI>
                      <LI id=li_1_<?php echo $v['id'];?>_1 onClick="doTotalItemsSelect1(this);return false;"
                          input_value="D" input_name="itemMyAns_1_<?php echo $v['id'];?>_1"><A onclick=this.blur();
                                                                               href="javascript:void(0);">D</A></LI></UL></DIV>
                  <DIV class=h10></DIV></DIV><!--question结束-->
                <?php $i++;} } ?>


              </DIV></DIV></DIV>
          <DIV id=dt_xt_more_0_1>
            <DIV class=chak><A onClick="dtControl('1',1);">点击展开本大题全部题目</A></DIV></DIV></DIV>
        <DIV id=con_one_2>
          <DIV class=h10></DIV>
          <DIV id=dt_xt_title_2 class=part2 onClick="dtControl('2',0);">判断题</DIV>
          <DIV style="DISPLAY: none" id=dt_xt_content_2>
            <DIV
                class=style_dt_desc>三、判断题</DIV><!--part1结束-->
            <DIV class=container>
              <DIV id=<?php echo $e_id;?>_itemPageIndex_1>
                <?php
                if(!empty($judge)){
                $i=1;
                foreach($judge as $v){
                ?>
                <DIV style="PADDING-LEFT: 10px; PADDING-RIGHT: 10px; PADDING-TOP: 10px"
                     id=xt_<?php echo $v['exam_id'].'_'.$v['id'];?> class="question border_t_g_r"
                     onmousemove="readymousemove_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"
                     onmouseout="readymouseleave_lx('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');">
                  <DIV class=ques_title><STRONG class=xt_index>第<SPAN><?php echo $i;?></SPAN>题</STRONG>
                    <P><?php echo $v['title'];?></P>
                  </DIV>
                  <DIV class=choice></DIV>
                  <DIV class=h10></DIV>

                  <DIV class=selectanswer><SPAN class=xuanze_txt>[选择答案]</SPAN>
                    <UL class=zimu>
                      <LI onClick="doTotalItemsSelect0(this);return false;" input_value="A"
                          input_name="itemMyAns_2_<?php echo $v['id'];?>"><A onclick=this.blur();
                                                             href="javascript:void(0);">√ </A></LI>
                      <LI onClick="doTotalItemsSelect0(this);return false;" input_value="B"
                          input_name="itemMyAns_2_<?php echo $v['id'];?>"><A onclick=this.blur();
                                                             href="javascript:void(0);">Ⅹ </A></LI></UL></DIV>
                  <DIV class=h10></DIV></DIV><!--question结束-->
                  <?php $i++;} } ?>

                </DIV></DIV></DIV>
          <DIV id=dt_xt_more_0_2>
            <DIV class=chak><A onClick="dtControl('2',1);">点击展开本大题全部题目</A></DIV></DIV></DIV>
        <DIV class=h10></DIV>
        <DIV class=h10></DIV>
        <!--<DIV id=totalItemsView1 class=situation_num>已做 <SPAN class=green>0</SPAN> 题 / 共 
<SPAN class=green>150</SPAN> 题 &nbsp;&nbsp;剩余 <SPAN class=green>150</SPAN> 题未作答 
</DIV>-->
        <DIV class=h20></DIV>
        <DIV class=subject_btn><INPUT id=dt_input_1_0 class=input11 onClick="dtControl('0',1);" value=单选题 type=button><INPUT id=dt_input_1_1 class=input22 onClick="dtControl('1',1);" value=多选题 type=button><INPUT id=dt_input_1_2 class=input22 onClick="dtControl('2',1);" value=判断题 type=button>
        </DIV>
        <DIV class=h25></DIV>
        <DIV class=cut_question>
          <DIV class=line></DIV></DIV>
        <DIV class=h25></DIV>
        <DIV class=hand_paper>
          <INPUT id=hdStopTimes value=0 type=hidden name=hdStopTimes>
          <INPUT id=LastTime value=0 type=hidden name=LastTime>
          <img style="BORDER-RIGHT-WIDTH: 0px; WIDTH: 182px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; HEIGHT: 50px; BORDER-LEFT-WIDTH: 0px" id=ImageButton1 class=curPointer onclick="doSumbit()" src="<?php echo STATICS_PATH;?>/shiti_files/hand_paper.png" type=image name=ImageButton1>
          <SPAN id=lbljsTime>
            <SCRIPT language=javascript type=text/javascript> ExamM = 120; countTime = 120;</SCRIPT>
          </SPAN>
        </DIV>
        <DIV class=h25></DIV>
        <DIV class=testing_banner></DIV>
        <DIV class=h25></DIV><!--complete结束--></DIV></DIV><!--content结束--></DIV><!--width960结束--><A
      name=b></A>
  <DIV class=h20></DIV>
  <DIV class=footer><A href="http://www.mokaoba.com/help/vip/"
                       target=_blank>VIP会员</A>&nbsp;|&nbsp;<A href="http://www.mokaoba.com/help/pay/"
                                                              target=_blank>支付方式</A>&nbsp;|&nbsp;<A
        href="http://www.mokaoba.com/help/contactus/"
        target=_blank>联系我们</A>&nbsp;|&nbsp;<A
        href="http://www.mokaoba.com/help/banquan/"
        target=_blank>版权说明</A>&nbsp;|&nbsp;<A href="http://www.mokaoba.com/help/"
                                              target=_blank> 帮助中心</A><BR><A href="http://www.mokaoba.com/"
                                                                            target=_blank>模考吧</A>&nbsp;|&nbsp;湘ICP备11011645号 </DIV>
  <DIV class=h20></DIV></DIV>
  <DIV style="DISPLAY: none" id=stopDiv>
    <DIV
        style="TEXT-ALIGN: center; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; CURSOR: pointer; PADDING-TOP: 0px"><IMG
          onclick=TimeStart(); src="<?php echo STATICS_PATH;?>/shiti_files/btn_continue.gif"></DIV></DIV>
  <DIV style="DISPLAY: none"><IMG src="<?php echo STATICS_PATH;?>/shiti_files/but_close.gif"> <IMG
        src="<?php echo STATICS_PATH;?>/shiti_files/but_guang_jixu.gif"> <IMG src="<?php echo STATICS_PATH;?>/shiti_files/but_guang.gif"> <IMG
        src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2_1.gif"> <IMG src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2_2.gif"> <IMG
        src="<?php echo STATICS_PATH;?>/shiti_files/Video_cart_add_bj.gif"> </DIV>
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
                        if(!empty($single)){
                        $i=1;
                        foreach($single as $v){
                        ?>
                        <LI
                            style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                            id=li_xt_<?php echo $v['id'];?> class=mark_ans_do_0><A
                              onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></A></LI>
                        <?php $i++;}}?>
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
                        if(!empty($more)){
                        $i=1;
                        foreach($more as $v){
                        ?>
                        <LI
                            style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                            id=li_xt_<?php echo $v['id'];?> class=mark_ans_do_0><A
                              onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></A></LI>
                          <?php $i++;}}?>

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
                        if(!empty($judge)){
                        $i=1;
                        foreach($judge as $v){
                        ?>
                        <LI
                            style="BORDER-BOTTOM: #c6c6c6 1px solid; BORDER-LEFT: #c6c6c6 1px solid; BORDER-TOP: #c6c6c6 1px solid; BORDER-RIGHT: #c6c6c6 1px solid"
                            id=li_xt_<?php echo $v['id'];?> class=mark_ans_do_0><A
                              onclick="ctrolScroll_new('xt_<?php echo $v['exam_id'].'_'.$v['id'];?>');"><?php echo $i;?></A></LI>
                          <?php $i++;}}?>

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
      <DIV style="BACKGROUND: #e8e8e8" id=ExamSubmit1 class=explain>
        <DIV class="explain1 fl">
          <DL>
            <DT><IMG src="<?php echo STATICS_PATH;?>/shiti_files/text1.png" width=23 height=23></DT>
            <DD>未作答</DD></DL>
          <DL>
            <DT><IMG src="<?php echo STATICS_PATH;?>/shiti_files/text2.png" width=23 height=23></DT>
            <DD><SPAN class=black>已作答</SPAN></DD></DL>
          <!--<DL style="WIDTH: 55px">
  <DT><IMG src="<?php echo STATICS_PATH;?>/shiti_files/text3.png" width=23 height=23></DT>
  <DD style="WIDTH: 25px"><SPAN class=orange>疑问</SPAN></DD></DL>--></DIV>
        <DIV class=h10></DIV>
        <DIV class=explain1_btn><IMG style="CURSOR: pointer" onclick="doSumbit()" src="<?php echo STATICS_PATH;?>/shiti_files/fast1.png" width=93 height=34>
        </DIV></DIV></DIV>
    <DIV style="DISPLAY: none; CURSOR: pointer" id=adleft_display_id1
         onclick=set_adleft_display();><IMG src="<?php echo STATICS_PATH;?>/shiti_files/btn_bottom_nav_min1.gif">
    </DIV></DIV>
  <DIV class=top_lx_lx><A
        href="#a"><IMG alt=""
                       src="<?php echo STATICS_PATH;?>/shiti_files/top_pic_lx.png"></A> </DIV>
  <SCRIPT language=javascript type=text/javascript>
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

  <SCRIPT language=javascript type=text/javascript
          src="<?php echo STATICS_PATH;?>/shiti_files/disableSelect.js"></SCRIPT>

  <SCRIPT language=javascript type=text/javascript
          src="<?php echo STATICS_PATH;?>/shiti_files/papertest_nav1_0311.js"></SCRIPT>
  <script language=javascript type=text/javascript>
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
          all_data[_eid].answer.push(p.attr('input_value'));
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
      var all_res=[];  //总数据
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
          all_res[_s_id[2]]=_sids;
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
        all_res[_m_id[2]]=_mids;
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
        all_res[_j_id[2]]=_jids;
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
</FORM>
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
                                                    src="<?php echo STATICS_PATH;?>/shiti_files/but_close.gif" width=13 height=13> </TD></TR>
      <TR>
        <TD height=46>&nbsp; </TD>
        <TD class="fB f14px" align=left>此试卷已成功添加到收藏夹！ </TD></TR>
      <TR>
        <TD>&nbsp; </TD>
        <TD height=30 vAlign=top align=left><IMG style="CURSOR: pointer"
                                                 onclick="closeShopCart('SxbCom_favoriteadd')" src="<?php echo STATICS_PATH;?>/shiti_files/but_guang.gif"
                                                 width=64 height=21>&nbsp;&nbsp;<A
              href="javascript:;"
              target=_blank><IMG src="<?php echo STATICS_PATH;?>/shiti_files/but_shoucang2.gif" width=74 height=21></A>
        </TD></TR></TBODY></TABLE></DIV></DIV>
</BODY></HTML>
