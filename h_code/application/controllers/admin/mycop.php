<?php

/**
 * mycop 
 * 
 * @uses MY
 * @uses _Controller
 * @package 
 * @version $Id$
 * @author kangm <all@kangm.com> 
 */
class mycop extends MY_Controller {
    private $where; //where条件
    private $perpage=10; //每页条数

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('user_model');
    }


	//我的合伙人:w
    /**
     * myNextList 
     * 
     * @access public
     * @return void
     */
    public function myNextList(){
		//$where .=  "dele_status =".NO_DELETE_STATUS;
		$where = 'intro_id ='.$this->mid;
		$member_info_list = $this->admin_user_model->select('*', $where);
		$member_info_list = is_array($member_info_list) ? $member_info_list : array();

        $data['member_info_list']=$member_info_list;
        $this->rendering_admin_template($data,'mycop','cop_list');
    }

	//我的客户
    /**
     * mycopList 
     * 
     * @access public
     * @return void
     */
    public function mycopList(){
		$where = 'intro_id ='.$this->mid;
		$member_info_list = $this->user_model->select('*', $where);
		$member_info_list = is_array($member_info_list) ? $member_info_list : array();
        $data['member_info_list']=$member_info_list;
        $this->rendering_admin_template($data,'mycop','user_list');

	}

}
