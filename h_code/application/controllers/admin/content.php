<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Content 
 * 
 * @uses MY
 * @uses _Controller
 * @package 
 * @version $Id$
 * @author jackcao <caoxin@159jh.com> 
 */
class Content extends MY_Controller {

	/**
	 * __construct 
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->backend_header_data['top_nav_current'] = 'index';
		//$this->backend_header_data['title']       = $this->title;//页面title
		//$this->backend_header_data['keywords']    = $this->title;//页面关键字
		//$this->backend_header_data['description'] = $this->title;//页面描述
		//$this->load->model('Car_base_data_Model','fz_content_model');
		//$this->backend_left_data['left_nav_son']='order_index';//左侧菜单子菜单默认选中状态  值：类名_方法名
		$this->backend_left_data['left_nav_son']='ccontent';//左侧菜单子菜单默认选中状态  值：类名_方法名
	}
	

	/**
	 * clist 
	 * 
	 * @access public
	 * @return void
	 */
	public function clist() {

		//$curr_url_list = pathinfo($curr_domain_name);
		$data = array();
		$this->rendering_admin_template($data,'content','c_list');
	}


	/**
	 * cUpdate 
	 * 
	 * @access public
	 * @return void
	 */
	public function cUpdate() {
		$data = array();
		$this->rendering_admin_template($data,'content','add_update');
	}
}

?>
