<link href="<?php echo STATICS_PATH;?>/css/angel_detail.css" type="text/css" rel="stylesheet"/>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            天使和VC投资项目测试工具信息详情
        </div>
            <div class="demand_text">
            <p class="demand_p1">>>基本信息</p>
                <div class="text">
                    <span class="floatL span1">公司名称:</span>
                    <span class="floatL sect_1"><?php echo $infos['name'];?></span>
                </div>
                <div class="text">
                    <span class="floatL span1">所属行业:</span>
                    <div class="">
                            <span class="floatL sect_1">
                            <?php
                                    if($infos['industry_id']){
                                        $tmp_arr = explode(',',$infos['industry_id']);
                                        //print_r($tmp_arr);exit;
                                        if($tmp_arr){
                                            foreach($tmp_arr as $k => $v){
                                                $r = $this->sk_cate_model->get_one('*','id ='.$v);
                                                if($r){
                                                    echo $r['name'];
                                                    if($k != count($tmp_arr)-1){
                                                        echo '=>'; 
                                                    }
                                                }
                                            }
                                        }
                                    }
                            ?>
                            </span>
                        </div>
                </div>
                <div class="text">
                    <span class="floatL span1">项目阶段:</span>
                    <span class="floatL sect_1">
                    <?php
                            if($infos['project_step']){
                                    switch($infos['project_step']){ 
                                        case 1: 
                                            echo '商业模式设想中';
                                            break;
                                        case 2: 
                                            echo '产品或技术研发中';
                                            break;
                                        case 3: 
                                            echo '已上市并小规模推广';
                                            break;
                                        case 4: 
                                            echo '已签约客户增加，拟定大规模拓展市场';
                                            break;
                                        case 5: 
                                            echo '其他';
                                            break;
                                    }
                            }
                    ?>
                    </span>
                </div>
                <div class="text">
                    <span class="floatL span1">创新程度:</span>
                    <span class="floatL sect_1">
                    <?php
                            if($infos['innovate']){
                                    $tmp_arr = explode(',',$infos['innovate']);
                                    if($tmp_arr){
                                    $return = array();
                                    foreach($tmp_arr as $k => $v){
                                            switch($v){ 
                                                case 1: 
                                                    $return[] = '国高新 ';
                                                    break;
                                                case 2: 
                                                    $return[] = '市高新 ';
                                                    break;
                                                case 3: 
                                                    $return[] = '发明专利 ';
                                                    break;
                                                case 4: 
                                                    $return[] = '软件著作权 ';
                                                    break;
                                                case 5: 
                                                    $return[] = '著名商标 ';
                                                    break;
                                                case 6: 
                                                    $return[] = '其他 ';
                                                    break;
                                            }
                                    }
                                    echo implode('|',$return);
                                }
                            }
                    ?>
                    </span>
                </div>
                <div class="text">
                    <span class="floatL span1">本年收入(万):</span>
                    <span class="floatL sect_1">
                    <?php 
                        if($infos['revenue_this_year']){
                            switch($infos['revenue_this_year']){
                                case 1:
                                    echo '无收入';
                                    break;
                                case 2:
                                    echo '100万以下';
                                    break;
                                case 3:
                                    echo '100-300万';
                                    break;
                                case 4:
                                    echo '300-500万';
                                    break;
                                case 5:
                                    echo '500万以上';
                                    break;
                            } 
                        }
                    ?>
                    </span> 
                </div>
                <div class="text">
                    <span class="floatL span1">本年利润(万):</span>
                    <span class="floatL sect_1">
                    <?php 
                        if($infos['profit_this_year']){
                            switch($infos['profit_this_year']){
                                case 1:
                                    echo '亏损';
                                    break;
                                case 2:
                                    echo '盈亏平衡';
                                    break;
                                case 3:
                                    echo '100万以内';
                                    break;
                                case 4:
                                    echo '100万以上';
                                    break;
                            } 
                        }
                    ?>
                    </span> 
                </div>
                <div class="text">
                    <span class="floatL span1">拟融资金额(万):</span>
                    <span class="floatL sect_1"><?php echo $infos['financing_amount'];?> </span> 
                </div>
                <div class="text">
                    <span class="floatL span1">融资方式:</span>
                    <span class="floatL sect_1">
                            <?php 
                                if($infos['financing_way']){
                                    switch($infos['financing_way']){
                                        case 1:
                                            echo '天使投资人';
                                            break;
                                        case 2:
                                            echo '投资机构投资';
                                            break;
                                        case 3:
                                            echo '股权众筹';
                                            break;
                                        case 4:
                                            echo '天使或创业投资基金';
                                            break;
                                        case 5:
                                            echo '以上均可';
                                            break;
                                        
                                    }
                                }
                            ?> 
                    </span> 
                </div>

                <div class="text">
                    <span class="floatL span1">出让股权:</span>
                    <span class="floatL sect_1"><?php echo $infos['stock'];?> </span> 
                </div>
                <div class="text">
                    <span class="floatL span1">资金用途:</span>
                    <span class="floatL sect_1">
                            <?php 
                                if($infos['fund_use']){
                                    $tmp_arr = explode(',',$infos['fund_use']);
                                    $return = array();
                                    foreach($tmp_arr as $k => $v){
                                            switch($v){
                                                case 1:
                                                    $return[] = '补充流动资金 ';
                                                    break;
                                                case 2:
                                                    $return[] = '扩建厂房 ';
                                                    break;
                                                case 3:
                                                    $return[] = '购买土地 ';
                                                    break;
                                                case 4:
                                                    $return[] = '技术研发 ';
                                                    break;
                                                case 5:
                                                    $return[] = '购置设备 ';
                                                    break;
                                                case 6:
                                                    $return[] = '拓展市场 ';
                                                    break;
                                                case 7:
                                                    $return[] = '债务置换 ';
                                                    break;
                                                case 8:
                                                    $return[] = '临时周转 ';
                                                    break;
                                                
                                            }
                                    }
                                    echo implode('|',$return);
                                }
                            ?> 
                    </span> 
                </div>
                <div class="text">
                    <span class="floatL span1">深入支持:</span>
                    <span class="floatL sect_1">
                            <?php 
                                if($infos['support']){
                                    $tmp_arr = explode(',',$infos['support']);
                                    $return = array();
                                    foreach($tmp_arr as $k => $v){
                                            switch($v){
                                                case 1:
                                                    $return[] = '协助诊断、设计融资方案 ';
                                                    break;
                                                case 2:
                                                    $return[] = '协助制定融资计划书 ';
                                                    break;
                                                case 3:
                                                    $return[] = '提供人才服务 ';
                                                    break;
                                                case 4:
                                                    $return[] = '组织资方实施融资路演 ';
                                                    break;
                                                case 5:
                                                    $return[] = '提供规范化财务管理 ';
                                                    break;
                                                case 6:
                                                    $return[] = '提供人力资源管理 ';
                                                    break;
                                                case 7:
                                                    $return[] = '委托知识产权服务 ';
                                                    break;
                                                
                                            }
                                    }
                                    echo implode('|',$return);
                                }
                            ?> 
                    </span> 
                </div>

                <div class="demand_text info">
                        <p class="demand_p1">>>联系方式</p>
                        <div class="text">
                            <span class="floatL span1">姓名:</span>
                            <span class="floatL sect_1"><?php echo $infos['user_name'];?></span>
                            <span class="floatL span1">职务:</span>
                            <span class="floatL sect_1"><?php echo $infos['user_position'];?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">手机:</span>
                            <span class="floatL sect_1"><?php echo $infos['user_mobile'];?></span>
                        </div>
                </div>

                <div class="text">
                    <input type="button" class="btn btn-blue" onclick="javascript:history.back(-1);" id="" value="返回">
                </div>
            </div>
    </div>
</div>

