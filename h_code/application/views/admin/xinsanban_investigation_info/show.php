<link href="<?php echo STATICS_PATH;?>/css/detail.css" type="text/css" rel="stylesheet"/>

<div class="xu" id="xu">
    <div class="cont_left">
        <div class="cont_demand">
            新三板调查信息详情
        </div>
            <div class="demand_text">
            <p class="demand_p1">>>基本信息</p>
                <div class="text">
                    <span class="floatL span1">评分:</span>
                    <span class="floatL sect_1"><?php echo $infos['enter_score'];?></span>
                </div>
                <div class="text">
                    <span class="floatL span1">公司名称:</span>
                    <span class="floatL sect_1"><?php echo $infos['name'];?></span>
                </div>
                <div class="text">
                    <span class="floatL span1">所在城市:</span>
                    <span class="floatL sect_1"><?php echo $infos['city'];?></span>
                </div>
                <div class="text">
                    <span class="floatL span1">所属行业:</span>
                    <div class="right_txt_wrap">
                            <span class="floatL sect_1">
                            <?php
                                    #第一产业
                                    if($infos['industry_id_first']){
                                        $r = $this->sk_cate_model->get_one('*','id ='.$infos['industry_id_first']);
                                        if($r){
                                            echo $r['name'];
                                        }
                                    }
                            ?>
                            </span>
                            <span class="floatL sect_1">
                            <?php
                                    #第二行业
                                    if($infos['industry_id_second']){
                                        $r = $this->sk_cate_model->get_one('*','id ='.$infos['industry_id_second']);
                                        if($r){
                                            echo $r['name'];
                                        }
                                    }
                            ?>
                            </span>
                            <span class="floatL sect_1">
                            <?php
                                    #第三行业
                                    if($infos['industry_id_third']){
                                        $r = $this->sk_cate_model->get_one('*','id ='.$infos['industry_id_third']);
                                        if($r){
                                            echo $r['name'];
                                        }
                                    }
                            ?>
                            </span>
                        </div>
                </div>
                <div class="text">
                    <span class="floatL span1">企业性质:</span>
                    <span class="floatL sect_1">
                    <?php
                            switch($infos['ent_character']){
                                case 1:
                                    echo '民营私企';
                                    break;
                                case 2:
                                    echo '国有企业';
                                    break;
                                case 3:
                                    echo '集体企业';
                                    break;
                                case 4:
                                    echo '上市公司';
                                    break;
                                default:
                                    echo '其他';
                            }
                    ?>
                    </span>
                </div>
                <div class="text">
                    <span class="floatL span1">企业类型:</span>
                    <span class="floatL sect_1">
                    <?php
                            $tmp = explode(',',$infos['ent_type']);
                            foreach($tmp as $k => $v){
                                    switch($v){ 
                                        case 1: 
                                            echo '生产 ';
                                            break;
                                        case 2: 
                                            echo '服务 ';
                                            break;
                                        case 3: 
                                            echo '销售 ';
                                            break;
                                        case 4: 
                                            echo '以上综合 ';
                                            break;
                                        default:
                                            echo '其他 ';
                                    }
                            }
                    ?>
                    </span>
                </div>
                <div class="text">
                    <span class="floatL span1">经营模式:</span>
                    <span class="floatL sect_1">
                    <?php
                            $tmp = explode(',',$infos['ent_businessmodel']);
                            foreach($tmp as $k => $v){
                                    switch($v){ 
                                        case 1: 
                                            echo '单体企业 ';
                                            break;
                                        case 2: 
                                            echo '集团+分子公司+品牌连锁+移动APP+O2O ';
                                            break;
                                        case 3: 
                                            echo '互联网+现下O2O ';
                                            break;
                                        default:
                                            echo '其他 ';
                                    }
                            }
                    ?>
                    </span>
                </div>
                <div class="text">
                    <span class="floatL span1">注册资本(万):</span>
                    <span class="floatL sect_1"><?php echo $infos['reg_capital']; ?></span> </div>
                <div class="demand_text">
                        <p class="demand_p1">>>财务指标</p>

                        <fieldset class="legend">
                            <legend>2014年历史数据:</legend>
                            <div class="text">
                                <span class="floatL span1">主营业务收入(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_revenue_2014']; ?></span>
                                <span class="floatL span1">净利润(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_mrmb_2014']; ?></span>
                            </div>
                        </fieldset>
                    <fieldset class="legend">
                        <legend>2015年1-6月数据:</legend>
                        <div class="text">
                            <span class="floatL span1">主营业务收入(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_revenue_2015']; ?></span>
                            <span class="floatL span1">净利润(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_mrmb_2015']; ?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">总资产(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_totalassets_2015']; ?></span>
                            <span class="floatL span1">净资产(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_netasset_2015']; ?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">实收资本(万):</span>
                            <span class="floatL sect_1"><?php echo $infos['ent_paidupcapital_2015']; ?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">总负债(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_totaldebt_2015']; ?></span>
                            <span class="floatL span1">流动负债(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_currentdebt_2015']; ?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">流动资产(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_currentassets_2015']; ?></span>
                            <span class="floatL span1">固定负债(万):</span>
                            <span class="floatL tb_txt"><?php echo $infos['ent_fixedassets_2015']; ?></span>
                        </div>
                     </fieldset>
                </div>
                <div class="demand_text">
                        <p class="demand_p1">>>预测指标</p>

                        <fieldset class="legend">
                            <legend>2015年度:</legend>
                            <div class="text">
                                <span class="floatL span1">主营业务收入(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_expectedrevenue_2015']; ?></span>
                                <span class="floatL span1">净利润(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_expectedmrmb_2015']; ?></span>
                            </div>
                        </fieldset>
                        <fieldset class="legend">
                            <legend>2016年度:</legend>
                            <div class="text">
                                <span class="floatL span1">主营业务收入(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_expectedrevenue_2016']; ?></span>
                                <span class="floatL span1">净利润(万):</span>
                                <span class="floatL tb_txt"><?php echo $infos['ent_expectedmrmb_2016']; ?></span>
                            </div>
                        </fieldset>
                </div>
                <div class="demand_text">
                        <p class="demand_p1">>>融资需求</p>
                        <div class="text">
                            <span class="floatL span1">是否融资:</span>
                            <span class="floatL sect_1">
                            <?php
                                    switch($infos['is_financing']){
                                        case 1:
                                            echo '正在融资';
                                            break;
                                        default:
                                            echo '暂不融资';
                                    } 
                            ?> 
                            </span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">融资轮次:</span>
                            <span class="floatL sect_1">
                            <?php 
                                    switch($infos['financing_raund']){
                                        case 1:
                                            echo '种子';
                                            break;
                                        case 2:
                                            echo '天使';
                                            break;
                                        case 3:
                                            echo 'Pre_AA轮';
                                            break;
                                        case 4:
                                            echo ',A+轮';
                                            break;
                                        case 5:
                                            echo 'B轮';
                                            break;
                                        case 6:
                                            echo 'C轮';
                                            break;
                                        case 7:
                                            echo 'D轮';
                                            break;
                                        case 8:
                                            echo 'E轮';
                                            break;
                                        case 9:
                                            echo 'F轮';
                                            break;
                                        case 10:
                                            echo 'IPO上市及以后股权投资并购';
                                            break;
                                        default:
                                            echo '不详';
                                    } 
                            ?>
                            </span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">融资金额(万):</span>
                            <span class="floatL sect_1"><?php echo $infos['financing_rmb']; ?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">融资方式:</span>
                            <span class="floatL sect_1">
                            <?php
                                    $tmp = explode(',',$infos['financing_modes']);
                                    foreach($tmp as $k => $v){
                                            switch($v){
                                                case 1:
                                                    echo '债权融资 ';
                                                    break;
                                                case 2:
                                                    echo '融资租赁 ';
                                                    break;
                                                case 3:
                                                    echo '以上均可 ';
                                                    break;
                                                default:
                                                    echo '股权融资 ';
                                            }
                                    }
                            ?>
                            </span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">资金用途:</span>
                            <span class="floatL sect_1">
                            <?php
                                    $tmp = explode(',',$infos['use_of_fund']);
                                    foreach($tmp as $k => $v){
                                        switch($v){
                                            case 1:
                                                echo '偿还借款 ';
                                                break;
                                            case 2:
                                                echo '并购新业务 ';
                                                break;
                                            case 3:
                                                echo '购买固定资产 ';
                                                break;
                                            case 4:
                                                echo '启动新业务线 ';
                                                break;
                                            case 5:
                                                echo '购买房产或土地 ';
                                                break;
                                            case 6:
                                                echo '经营流动资金周转 ';
                                                break;
                                            case 7:
                                                echo '新技术研发 ';
                                                break;
                                            default:
                                                echo '其他 ';
                                        }
                                }
                            ?>
                            </span>
                        </div>
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
                            <span class="floatL span1">邮箱:</span>
                            <span class="floatL sect_1"><?php echo $infos['user_email'];?></span>
                        </div>
                        <div class="text">
                            <span class="floatL span1">座机:</span>
                            <span class="floatL sect_1"><?php echo $infos['user_telephone'];?></span>
                        </div>
                </div>

                <div class="text">
                    <input type="button" class="btn btn-blue" onclick="javascript:history.back(-1);" id="" value="返回">
                </div>
            </div>
    </div>
</div>

