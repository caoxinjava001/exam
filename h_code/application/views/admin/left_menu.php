 <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>圣康金融</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i><?php echo (isset($left_top_id) && isset($menu_info[$left_top_id]))?$menu_info[$left_top_id]['name']:'';?></a>
                    <ul class="sub-menu">
                        <?php  if(isset($left_top_id) && isset($menu_info[$left_top_id]['list'])){ 
                            $i=0;
                            $list = $menu_info[$left_top_id]['list'];
                            foreach($list as $k=>$v):
                                //echo '<pre>';
                                //print_r($menu_info[$v]);
                                if(intval($menu_info[$v]['display']) == 2){continue;}
                            ?>
                                <?php if($menu_info[$v]['name']){?>
                                        <li><a href="<?php echo '/'.$menu_info[$v]['menu_class'].'/'.$menu_info[$v]['function'];?>"><i class="icon-font">&#xe008;</i><?php echo $menu_info[$v]['name'];?></a></li>
                                <?php } ?>
                    	<?php endforeach;}?>

                    </ul>
            </li>
         </ul>
        </div>
    </div>
