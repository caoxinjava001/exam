<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">合伙人列表</span></div>
        </div>
        <div class="result-wrap">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>用户ID</th>
                            <th>用户姓名</th>
                            <th>审核状态</th>
                            <th>电话</th>
                            <th>缴费情况</th>
                            <th>培训情况</th>
                            <th>是否冻结</th>
                            <th>创建日期</th>
                        </tr>
						<?php 
							foreach ($member_info_list as $val) { 
								$is_status = $val['status'];
								$show_status = '审核未通过';
								if ($is_status==VER_IN_AUDIT) {
									$show_status = '未审核';
								} elseif($is_status==VER_HAD_AUDIT){
									$show_status = '审核通过';
								}

								$show_dj = '是';
								$is_delete_status = $val['dele_status'];
								if ($is_delete_status==NO_DELETE_STATUS) {
									$show_dj = '否';
								}
							?>
                        <tr>
                            <td><?php echo $val['id']; ?></td>
                            <td><?php echo $val['name']; ?></td>
                            <td><?php echo $show_status; ?></td>
                            <td><?php echo $val['mobile']; ?></td>
                            <td>0</td>
                            <td>未完成</td>
                            <td><?php echo $show_dj ?></td>
                            <td>
							<?php echo $val['create_time']; ?>
                            </td>
                        </tr>
						<?php } ?>
                    </table>
                </div>
        </div>
    </div>
    <!--/main-->
