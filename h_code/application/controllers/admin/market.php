<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/5/27
 * Time: 11:25
 */

class  Market extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数
    private $role_id;   //用户登录角色id
    private $data=array();      //数据容器
	public $_all_type="xlsx|doc|csv|docx|gif|jpg|png|tar|gz|zip|pdf|xls|txt|ppt";

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('user_model');
        $this->load->model('ent_sort_model');
        $this->load->model('manage_ent_info_model');

        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->where.='dele_status = '.NO_DELETE_STATUS;
        $this->role_id=$this->member_info['role_id'];
    }


    public function addUpdateInfo(){
		$data = array();
		$id = $this->input->get_post('id');
		$user_info = array();
		if ($id) {
			$where_info['id'] = $id;
			$user_info = $this->user_model->get_one($select='*', $where_info);	
			$user_info['one_info'] = unserialize($user_info['one_other_info']);
			$user_info['two_info'] = unserialize($user_info['two_other_info']);
			$user_info['three_info'] = unserialize($user_info['three_other_info']);
			// 质疑
			if ($user_info['kx_status'] == TRUTH_INVALID) {
				$user_info['is_zy_show'] = '有质疑';
			}
			// 无效
			if ($user_info['kx_status'] == TRUTH_QUERY) {
				$user_info['is_zy_show'] = '无效';
			}
			// 内容审核不通过
			if ($user_info['nr_status'] == 0 ) {
				$user_info['is_nr_show'] = '内容审核不通过';
			}
			// 专业审核不通过
			if ($user_info['zy_status'] == 0 ) {
				$user_info['is_zyn_show'] = '专业审核不通过';
			}
			//var_dump($user_info);
			//var_dump($user_info);exit;
		}
		$sort_where['dele_status'] = NO_DELETE_STATUS;
		$sort_info_list = $this->ent_sort_model->select("*",$sort_where);	
        $data['sort_info_list']=$sort_info_list;
        $data['user_info_list'] = $user_info;
		//var_dump($user_info);exit;
        $data['id'] = $id;
        $this->rendering_admin_template($data,'enterprise','add_update_market');
    }



    public function updateAjax(){
		$ret["status"] = 0;
		$ret["data"] = 0;
		$ret["msg"] = '非法操作';
		$id = $this->input->get_post('qid');
		$id = intval($id);
		if (!$id) {
			$msg = "非法操作";
			$ret["status"] = -1; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}


		
		$org_name = $this->input->get_post('org_name');
		$code = $this->input->get_post('code');
		$pro_info = $this->input->get_post('pro_info');
		$industry_id = $this->input->get_post('industry_id');
		$link_name = $this->input->get_post('link_name');
		$mobile = $this->input->get_post('mobile');


		if (!$org_name) {
			$msg = "请填写企业全称";
			$ret["status"] = -1; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}
		//$where_user['org_name'] = $org_name;
		//$where_user['dele_status'] = NO_DELETE_STATUS;
		//$where_user['control_type'] = MARKET;
		//$ret_name =  $this->user_model->get_one('id',$where_user);
		//if ($ret_name && count($ret_name) > 0) {
		//	$msg = "企业已存在";
		//	$ret["status"] = -11; 
		//	$ret["msg"] = $msg;
		//	createDomainAjax($ret["msg"], $ret["status"]);
		//	exit;
		//}

		if (!$code) {
			//$msg = "请填写业务代码";
			//$ret["status"] = -2; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$pro_info) {
			//$msg = "请填写主营产品或服务";
			//$ret["status"] = -3; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}


		if (!$industry_id) {
			//$msg = "请选择主营行业";
			//$ret["status"] = -4; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$link_name) {
			$msg = "请填写主办券商联系人";
			$ret["status"] = -5; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}
		if (!$mobile) {
			$msg = "请填写联系方式";
			$ret["status"] = -6; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}

		$stock_code = $this->input->get_post('stock_code');
		$stock_value = $this->input->get_post('stock_value');
		$profit = $this->input->get_post('profit');
		$net_profit = $this->input->get_post('net_profit');
		$invest_value = $this->input->get_post('invest_value');
		$fin_exp = $this->input->get_post('fin_exp');


		// 2014
		$zc_total_one = $this->input->get_post('zc_total_one');// 资产总额
		$jzc_total_one = $this->input->get_post('jzc_total_one');// 净资产
		$yw_cb_one = $this->input->get_post('yw_cb_one');//营业成本额
		$qy_sd_one = $this->input->get_post('qy_sd_one');//企业所得税
		$m_ly_one = $this->input->get_post('m_ly_one');//净利润

		if (!$zc_total_one) {
			//$msg = "请填写2014资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_one) {
			//$msg = "请填写2014净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_one) {
			//$msg = "请填写2014营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_one) {
			//$msg = "请填写2014企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_one) {
			//$msg = "请填写2014净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_bx_one) {
			//$msg = "请填写2014报税工资表年平均人数";
			//$ret["status"] = -25; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		// 2013
		$zc_total_two = $this->input->get_post('zc_total_two');// 资产总额
		$jzc_total_two = $this->input->get_post('jzc_total_two');// 净资产
		$yw_cb_two = $this->input->get_post('yw_cb_two');//营业成本额
		$qy_sd_two = $this->input->get_post('qy_sd_two');//企业所得税
		$m_ly_two = $this->input->get_post('m_ly_two');//净利润

		if (!$zc_total_two) {
			//$msg = "请填写2013资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_two) {
			//$msg = "请填写2013净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_two) {
			//$msg = "请填写2013营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_two) {
			//$msg = "请填写2013企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_two) {
			//$msg = "请填写2013净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_bx_two) {
			//$msg = "请填写2013报税工资表年平均人数";
			//$ret["status"] = -25; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		// 2012
		$zc_total_three = $this->input->get_post('zc_total_three');// 资产总额
		$jzc_total_three = $this->input->get_post('jzc_total_three');// 净资产
		$yw_cb_three = $this->input->get_post('yw_cb_three');//营业成本额
		$qy_sd_three = $this->input->get_post('qy_sd_three');//企业所得税
		$m_ly_three = $this->input->get_post('m_ly_three');//净利润


		if (!$zc_total_three) {
			//$msg = "请填写2012资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_three) {
			//$msg = "请填写2012净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_three) {
			//$msg = "请填写2012营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_three) {
			//$msg = "请填写2012企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_three) {
			//$msg = "请填写2012净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_bx_three) {
			//$msg = "请填写2012报税工资表年平均人数";
			//$ret["status"] = -25; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		$one_info_list = array();

		$one_info_list['zc_total'] = $zc_total_one;
		$one_info_list['jzc_total'] = $jzc_total_one;
		$one_info_list['yy_cb'] = $yw_cb_one;
		$one_info_list['qy_sd'] = $qy_sd_one;
		$one_info_list['m_ly'] = $m_ly_one;

		$two_info_list = array();
		$two_info_list['zc_total'] = $zc_total_two;
		$two_info_list['jzc_total'] = $jzc_total_two;
		$two_info_list['yy_cb'] = $yw_cb_two;
		$two_info_list['qy_sd'] = $qy_sd_two;
		$two_info_list['m_ly'] = $m_ly_two;

		$three_info_list = array();
		$three_info_list['zc_total'] = $zc_total_three;
		$three_info_list['jzc_total'] = $jzc_total_three;
		$three_info_list['yy_cb'] = $yw_cb_three;
		$three_info_list['qy_sd'] = $qy_sd_three;
		$three_info_list['m_ly'] = $m_ly_three;

		$one_info_list = serialize($one_info_list);
		$two_info_list = serialize($two_info_list);
		$three_info_list = serialize($three_info_list);
		//var_dump($one_info_list,$two_info_list,$three_info_list);exit;

		$update_info = array();
		$now_data = date("Y-m-d H:i:s",time());
		//$update_info['service_id'] = $this->mid;
		$update_info['org_name'] = $org_name;
		$update_info['code'] = $code;
		$update_info['pro_info'] = $pro_info;
		$update_info['industry_id'] = $industry_id;
		$update_info['link_name'] = $link_name;
		$update_info['mobile'] = $mobile;
		$update_info['one_other_info'] = $one_info_list;
		$update_info['two_other_info'] = $two_info_list;
		$update_info['three_other_info'] = $three_info_list;
		$update_info['submit_time'] = $now_data;



		$update_info['stock_code'] = $stock_code;
		$update_info['stock_value'] = $stock_value;
		$update_info['profit'] = $profit;
		$update_info['net_profit'] = $net_profit;
		$update_info['invest_value'] = $invest_value;
		$update_info['fin_exp'] = $fin_exp;

		//var_dump($update_info);exit;
		$update_where['id'] = $id;

		$update_info['zy_status'] = 2;
		$user_info_tmp = $this->user_model->get_one('zy_status', $update_where);	
		if ($user_info_tmp['zy_status'] == 0) {
			$update_info['next_role_id'] = ROLE_NINE;
			$update_info['role_id'] = ROLE_EIGHT;
		}

		//var_dump($update_info);exit;
		$this->user_model->update($update_info,$update_where);
		if ($id) {
			$where_manage = 'dele_status ='.NO_DELETE_STATUS;
			$where_manage .= ' and role_id in ('.ROLE_SIX.','.ROLE_SEVEN.','.ROLE_NINE.') ';
			$admin_user_list_id = $this->admin_user_model->select('id',$where_manage);
			//var_dump($admin_user_list_id);
			foreach($admin_user_list_id as $val) {
				$update_ent_info = array();
				$update_et_where['ent_id'] = $id;
				$update_et_where['manage_id'] = intval($val['id']);
				$tmp_ret_u = $this->manage_ent_info_model->get_one('*',$update_et_where);
				$update_ent_info = array();
				$update_et_where['ent_id'] = $id;
				$update_ent_info['manage_id'] = intval($val['id']);
				$update_ent_info['status'] = 1;
				$update_ent_info['create_time'] = $now_data;
				if ($tmp_ret_u && count($tmp_ret_u) > 0) {
					$where_update_et['id'] = $tmp_ret_u['id'];
					$this->manage_ent_info_model->update($update_ent_info,$where_update_et);
				} else {
					$this->manage_ent_info_model->insert($update_ent_info);
				}
			}
		}
		$ret["status"] = 0 ;
		$ret["msg"] = $msg;
		createDomainAjax($ret["msg"], $ret["status"]);
    }


    public function addAjax(){
		$ret["status"] = 0;
		$ret["data"] = 0;
		$ret["msg"] = '非法操作';
		$org_name = $this->input->get_post('org_name');
		$code = $this->input->get_post('code');
		$pro_info = $this->input->get_post('pro_info');
		$industry_id = $this->input->get_post('industry_id');
		$link_name = $this->input->get_post('link_name');
		$mobile = $this->input->get_post('mobile');


		if (!$org_name) {
			$msg = "请填写企业全称";
			$ret["status"] = -1; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}
		$where_user['org_name'] = $org_name;
		$where_user['dele_status'] = NO_DELETE_STATUS;
		$where_user['control_type'] = MARKET;
		$ret_name =  $this->user_model->get_one('id',$where_user);
		if ($ret_name && count($ret_name) > 0) {
			$msg = "企业已存在";
			$ret["status"] = -11; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}

		if (!$code) {
			//$msg = "请填写业务代码";
			//$ret["status"] = -2; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$pro_info) {
			//$msg = "请填写主营产品或服务";
			//$ret["status"] = -3; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}


		if (!$industry_id) {
			//$msg = "请选择主营行业";
			//$ret["status"] = -4; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$link_name) {
			$msg = "请填写主办券商联系人";
			$ret["status"] = -5; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}
		if (!$mobile) {
			$msg = "请填写董秘电话";
			$ret["status"] = -6; 
			$ret["msg"] = $msg;
			createDomainAjax($ret["msg"], $ret["status"]);
			exit;
		}

		// 市值

		$stock_code = $this->input->get_post('stock_code');
		$stock_value = $this->input->get_post('stock_value');
		$profit = $this->input->get_post('profit');
		$net_profit = $this->input->get_post('net_profit');
		$invest_value = $this->input->get_post('invest_value');
		$fin_exp = $this->input->get_post('fin_exp');
		// 市值end




		// 2014
		$zc_total_one = $this->input->get_post('zc_total_one');// 资产总额
		$jzc_total_one = $this->input->get_post('jzc_total_one');// 净资产
		$yw_cb_one = $this->input->get_post('yw_cb_one');//营业成本额
		$qy_sd_one = $this->input->get_post('qy_sd_one');//企业所得税
		$m_ly_one = $this->input->get_post('m_ly_one');//净利润

		if (!$zc_total_one) {
			//$msg = "请填写2014资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_one) {
			//$msg = "请填写2014净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_one) {
			//$msg = "请填写2014营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_one) {
			//$msg = "请填写2014企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_one) {
			//$msg = "请填写2014净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_bx_one) {
			//$msg = "请填写2014报税工资表年平均人数";
			//$ret["status"] = -25; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}



		// 2013
		$zc_total_two = $this->input->get_post('zc_total_two');// 资产总额
		$jzc_total_two = $this->input->get_post('jzc_total_two');// 净资产
		$yw_cb_two = $this->input->get_post('yw_cb_two');//营业成本额
		$qy_sd_two = $this->input->get_post('qy_sd_two');//企业所得税
		$m_ly_two = $this->input->get_post('m_ly_two');//净利润

		if (!$zc_total_two) {
			//$msg = "请填写2013资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_two) {
			//$msg = "请填写2013净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_two) {
			//$msg = "请填写2013营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_two) {
			//$msg = "请填写2013企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_two) {
			//$msg = "请填写2013净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}



		// 2012
		$zc_total_three = $this->input->get_post('zc_total_three');// 资产总额
		$jzc_total_three = $this->input->get_post('jzc_total_three');// 净资产
		$yw_cb_three = $this->input->get_post('yw_cb_three');//营业成本额
		$qy_sd_three = $this->input->get_post('qy_sd_three');//企业所得税
		$m_ly_three = $this->input->get_post('m_ly_three');//净利润


		if (!$zc_total_three) {
			//$msg = "请填写2012资产总额";
			//$ret["status"] = -20; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$jzc_total_three) {
			//$msg = "请填写2012净资产";
			//$ret["status"] = -21; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}
		if (!$yw_cb_three) {
			//$msg = "请填写2012营业成本额";
			//$ret["status"] = -22; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$qy_sd_three) {
			//$msg = "请填写2012企业所得税";
			//$ret["status"] = -23; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_ly_three) {
			//$msg = "请填写2012净利润";
			//$ret["status"] = -24; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}

		if (!$m_bx_three) {
			//$msg = "请填写2012报税工资表年平均人数";
			//$ret["status"] = -25; 
			//$ret["msg"] = $msg;
			//createDomainAjax($ret["msg"], $ret["status"]);
			//exit;
		}




		$one_info_list = array();

		$one_info_list['zc_total'] = $zc_total_one;
		$one_info_list['jzc_total'] = $jzc_total_one;
		$one_info_list['yy_cb'] = $yw_cb_one;
		$one_info_list['qy_sd'] = $qy_sd_one;
		$one_info_list['m_ly'] = $m_ly_one;

		$two_info_list = array();
		$two_info_list['zc_total'] = $zc_total_two;
		$two_info_list['jzc_total'] = $jzc_total_two;
		$two_info_list['yy_cb'] = $yw_cb_two;
		$two_info_list['qy_sd'] = $qy_sd_two;
		$two_info_list['m_ly'] = $m_ly_two;

		$three_info_list = array();
		$three_info_list['zc_total'] = $zc_total_three;
		$three_info_list['jzc_total'] = $jzc_total_three;
		$three_info_list['yy_cb'] = $yw_cb_three;
		$three_info_list['qy_sd'] = $qy_sd_three;
		$three_info_list['m_ly'] = $m_ly_three;

		$one_info_list = serialize($one_info_list);
		$two_info_list = serialize($two_info_list);
		$three_info_list = serialize($three_info_list);
		//var_dump($one_info_list,$two_info_list,$three_info_list);exit;

		$insert_info = array();
		$now_data = date("Y-m-d H:i:s",time());
		$insert_info['service_id'] = $this->mid;
		$insert_info['org_name'] = $org_name;
		$insert_info['code'] = $code;
		$insert_info['pro_info'] = $pro_info;
		$insert_info['industry_id'] = $industry_id;
		$insert_info['link_name'] = $link_name;
		$insert_info['mobile'] = $mobile;
		$insert_info['one_other_info'] = $one_info_list;
		$insert_info['two_other_info'] = $two_info_list;
		$insert_info['three_other_info'] = $three_info_list;
		$insert_info['create_time'] = $now_data;
		$insert_info['submit_time'] = $now_data;
		$insert_info['next_role_id'] = ROLE_NINE;
		$insert_info['role_id'] = ROLE_EIGHT;


		$insert_info['control_type'] = MARKET;
		$insert_info['stock_code'] = $stock_code;
		$insert_info['stock_value'] = $stock_value;
		$insert_info['profit'] = $profit;
		$insert_info['net_profit'] = $net_profit;
		$insert_info['invest_value'] = $invest_value;
		$insert_info['fin_exp'] = $fin_exp;
		$insert_info['zy_status'] = 2;
		//var_dump($insert_info);exit;
		$ret_id =  $this->user_model->insert($insert_info,true);
		if ($ret_id) {
			$where_manage = 'dele_status ='.NO_DELETE_STATUS;
			$where_manage .= ' and role_id in ('.ROLE_SIX.','.ROLE_SEVEN.','.ROLE_NINE.') ';
			$admin_user_list_id = $this->admin_user_model->select('id',$where_manage);
			//var_dump($admin_user_list_id);
			foreach($admin_user_list_id as $val) {
				$insert_ent_info = array();
				$insert_ent_info['ent_id'] = $ret_id;
				$insert_ent_info['manage_id'] = intval($val['id']);
				$insert_ent_info['status'] = 1;
				$insert_ent_info['create_time'] = $now_data;
				$this->manage_ent_info_model->insert($insert_ent_info);
			}
		}
		$ret["status"] = 0 ;
		$ret["msg"] = $msg;
		createDomainAjax($ret["msg"], $ret["status"]);
    }

    /**
     * 企业待审
     */
    public function index(){
        //获取查询条件
        $org_name=$this->input->get('org_name');    //企业名
        $truth=$this->input->get('truth');      //可信度
        $level=$this->input->get('level');      //审核等级
		// 只有业务员才可以处理
		if ($this->member_info['role_id'] == ROLE_EIGHT || $this->member_info['id'] == 1) {
			//拼装where条件
			if ($this->member_info['role_id'] == ROLE_EIGHT) {
				$this->where = "service_id =".$this->mid;
			} else {
				$this->where = "dele_status =".NO_DELETE_STATUS;
			}
			$this->where.= " and control_type =".MARKET;
			$this->where.=$org_name?' and org_name like \'%'.$org_name.'%\'':'';
			$this->where.=$truth?' and kx_status ='.$truth:'';
			$this->where.=$level?' and next_role_id ='.$level:'';
			//获取待审企业数据
			$result=$this->user_model->list_info('*',$this->where,$this->page,$this->perpage);

			//获取其他信息
			foreach($result as $k=>$v){
				//获取业务员姓名和编码
				$service=$this->admin_user_model->getIntro($v['service_id']);
				//获取审核状态
				$result[$k]['audit_status']=getAuditStatus($v['role_id'],$v['zy_status']);
				//获取是否有未读消息

			}
			//var_dump($result);exit;
		} else {
			echo '非法操作';exit;
		}

        $data['data']=$result;
        $data['role']=$this->role_id;
        $data['org_name_v']=$org_name;
        $data['bus_name']=$bus_name;
        $data['truth']=$truth;
        $data['level']=$level;
        $data['is_next']=$this->role_id;
        $data['pages']=pages($this->user_model->getCount($this->where),$this->page,$this->perpage);


		$date = array();
        $this->rendering_admin_template($data,'enterprise','list_market');
    }

    private function getServiceIds($bus_name){
        $where='name like \'%'.$bus_name.'%\'';
        $res=$this->admin_user_model->select('id',$where);
        $arr=array();
        foreach($res as $v){
            $arr[]=$v['id'];
        }
        $ids=implode(',',$arr);
        $ids=$ids?$ids:0;
        return $ids;
    }

}
