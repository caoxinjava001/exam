<?php

/**
 * Card_info 
 * 
 * @uses MY
 * @uses _Controller
 * @package 
 * @version $Id$
 * @author jackcao <caoxin@159jh.com> 
 */
class Card_info extends MY_Controller{

    public function __construct(){
        parent::__construct('frontend');
        $this->load->model('card_info_model');

    }

    public function updateCardInfo(){

		$data=array();
		$number=$this->input->get_post('number');   //
		$user_id=$this->input->get_post('user_id');   //
		$user_name=$this->input->get_post('user_name');   //
		$use_start_time=$this->input->get_post('use_start_time');   //
		$use_end_time=$this->input->get_post('use_end_time');   //
		if(!$number){
			$ret['s'] = -1;
			$ret['m'] = "充值卡不能为空";
			sendJsonData($ret);
		echo 'iiii:wa';exit;
		}

		$user_id =intval($user_id);
		if(!$user_id){
			$ret['s'] = -2;
			$ret['m'] = "用户id不能为空";
			sendJsonData($ret);
		}

		if(!$user_name){
			$ret['s'] = -3;
			$ret['m'] = "用户名不能为空";
			sendJsonData($ret);
		}


		if(!$use_start_time){
			$ret['s'] = -4;
			$ret['m'] = "使用开始时间为空";
			sendJsonData($ret);
		}

		if(!$use_end_time){
			$ret['s'] = -5;
			$ret['m'] = "使用开始时间为空";
			sendJsonData($ret);
		}

        $where['number']=$number;
        $where['use_status']=0;
        $card_res=$this->card_info_model->get_one('*',$where);
		$card_res = is_array($card_res) ? $card_res : array();
		$card_id = intval($card_res['id']);
		if (!$card_id) {
			$ret['s'] = -6;
			$ret['m'] = "该充值卡为无效卡";
			sendJsonData($ret);
		}

		$update_info['user_id'] = $user_id;
		$update_info['user_name'] = $user_name;
		$update_info['use_start_time'] = $use_start_time;
		$update_info['use_end_time'] = $use_end_time;
		$update_info['use_status'] = 1;
		$update_info['user_use_time'] = date('Y-m-y H:i:s',time());
		$where_update['id'] = $card_id;
        $card_update_res=$this->card_info_model->update($update_info,$where_update);


		if (!$card_update_res) {
			$ret['s'] = -7;
			$ret['m'] = "充值卡使用失败";
			sendJsonData($ret);
		}

		$ret['s'] = 1;
		$ret['m'] = "充值卡使用成功";
		sendJsonData($ret);

    }
}
