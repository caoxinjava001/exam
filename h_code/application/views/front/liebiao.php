<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0033)http://www.mokaoba.com/zhengquan/ -->
<HTML><HEAD><TITLE>试题列表</TITLE>
    <META content="text/html; charset=UTF-8" http-equiv=Content-Type>
    <META name=Description
          content='试题列表'>
    <META name=keywords content='试题列表'><LINK rel=stylesheet type=text/css
                                                 href="<?php echo STATICS_PATH;?>/liebiao_files/mokaoba.css">




    <META name=GENERATOR content="MSHTML 8.00.6001.23580"></HEAD>
<BODY>
<DIV class=minNav><!--mini导航-->
    <DIV class=navInner><SPAN class=homeIco><A href="#" >VIP指南</A> | <A class=myTest href="#" >会员中心</A> | <A class=sina href="#" >官方微博</A> </SPAN><SPAN id=ks110_LoginView
                                                                                                                                                        class=login>欢迎来到清大网校<A href="#">登录</A><A href="#" >免费注册</A>
</SPAN>
    </DIV></DIV>
<DIV class="banner ">


    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td width="420"><img src="<?php echo STATICS_PATH;?>/liebiao_files/logo.jpg" width="420" height="115"></td>
            <td width="540">


                <form action="<?php echo MAIN_PATH;?>/examination/examList" method="get">
                <table width="364" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="300" background="<?php echo STATICS_PATH;?>/liebiao_files/s5.jpg" style="padding-left:10px;">
                            <input name="s_word" type="text" style="width:280px; border:1px solid #FFFFFF; color:#7f7f7f" value="<?php echo $s_word?>" size="45"  placeholder="请输入关键词"/>
                        </td>
                        <td width="81" align="center"><input type="image" src="<?php echo STATICS_PATH;?>/liebiao_files/s4.jpg" width="52" height="30" /></td>
                    </tr>
                </table>
                </form>


            </td>
        </tr>
    </table>





</DIV>
<DIV class=lc>
    <DIV><SPAN class=n1>1.选择试题</SPAN><SPAN class=n2>2.注册/登陆</SPAN><SPAN
            class=n3>3.开始答题</SPAN><SPAN class=n4>4.提交试卷</SPAN><SPAN
            class=n5>5.查看成绩</SPAN><SPAN class=n6>6.答案解析</SPAN></DIV></DIV>
<DIV class=bread><SPAN>您的位置：</SPAN><A href="#">清大网校在线考试中心</A>&nbsp;&gt; <A #href="#">职业资格</A>&nbsp;&gt; 证券从业资格 </DIV>
<DIV class="mainContent m2"><!--主体内容-->
    <DIV class=mainList>
<!--        <DIV class=nav><A class=on href="#"><STRONG>全部试题</STRONG></A><A href="#"><STRONG>模拟试题</STRONG></A><A href="#"><STRONG>历年真题</STRONG></A><A href="#"><STRONG>预测题</STRONG></A> </DIV>-->
        <DIV class=area>
            <DIV class=hy>
                <?php foreach($tags as $v){?>
                <A href="<?php echo MAIN_PATH;?>/examination/examList?t_id=<?php echo $v['id'];?>&user_name=<?php echo $user_name;?>&user_id=<?php echo $user_id;?>" class="<?php echo $curr_id==$v['id']?'currt_tag':''?>"><?php echo $v['cate_name'];?></A>
                <?php }?>
            </DIV>
        </DIV>
        <DIV class=sjTitle>
            <DIV class=cs><SPAN>进入考试</SPAN> </DIV>
            <DIV class=bt><SPAN>试卷标题</SPAN> </DIV></DIV>
        <DIV class=sjList>
            <UL>
                <?php foreach($res as $v){?>
                <LI>
                    <DIV>
                        <DIV class=newtitle><A class=mTitle  href="<?php echo MAIN_PATH;?>/examination/index?id=<?php echo $v['id'];?>&user_name=<?php echo $user_name;?>&user_id=<?php echo $user_id;?>" target=_blank><?php echo $v['exam_name'];?></A></DIV>
                        <DIV class=paper_btn><A class=exam_btn  href="<?php echo MAIN_PATH;?>/examination/index?id=<?php echo $v['id'];?>&user_name=<?php echo $user_name;?>&user_id=<?php echo $user_id;?>" target=_blank>进入考试</A></DIV>
                    </DIV>
                </LI>
                <?php }?>

            </UL>
            <DIV class=page>
                <?php echo $pages;?>
            </DIV>
        </DIV>
    </DIV>
</DIV>
<DIV class=footer>
    <a href="#">如何成为VIP会员</a>&nbsp;&nbsp;<a href="#" >联系我们</a>&nbsp;&nbsp;<a href="#" >版权说明</a>&nbsp;&nbsp;<a href="#" >帮助中心</a></p><p>湘ICP备11011645号</p>

</DIV></BODY></HTML>
