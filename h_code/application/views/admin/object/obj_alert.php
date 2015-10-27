
<?php $i=0;$j=0; foreach($data as $v){?>
<div class="obj_alert" style="z-index:102;width:500px;height:300px;position:fixed;background: #fff;top:<?php echo 10+$i;?>%;left:<?php echo 50+$j;?>%;margin-left: -250px;border:solid 1px #bbbbbb">
    <div class="obj_close" style="position: absolute;top:1px;right:5px;color:red;cursor: pointer;font-size: 20px">X</div>
    <div style="margin: 20px 0 0 20px;color:red;">
        很抱歉，您的项目尽调“<?php echo $v['org_name'];?>”报告被打回修改
    </div>
    <div style="margin: 20px 0 0 20px;">
        <div><?php echo $v['name'];?>：</div>
        <div style="text-indent: 2em;"><?php echo $v['sur_mark'];?></div>
    </div>
</div>
<?php $i+=0.4;$j+=0.2; }?>
<div class="obj_screen" style="z-index:101;width:100%;height:100%;position:fixed;top:0px;left:0px;background: #000;opacity: 0.4">
