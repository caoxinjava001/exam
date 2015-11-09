<?php
/**
 * Admin_user_Model 
 * 
 * @uses MY
 * @uses _Model
 * @package 
 * @version $Id$
 * @author jackcao <caoxin@kangm.com> 
 */
class City_Model extends MY_Model{

	public function __construct() {
		parent::__construct();
		$this->_table = "h_city";	// 表名
		$this->initDB();
	}

	/**
	 * @param int $type
	 * @param int $id
	 * @return mixed
	 */
	public function getCity($type=0,$id=0){
		switch($type){
			case 0:
				return $this->select('*',array(),500,'id ASC');
				break;
			case 1:
				return $this->get_one('*',array('id'=>$id));
				break;
		}
	}

	/**
	 * 根据省级id获取城市列表
	 * @param $id
	 */
	public function getList($id){
		return $this->select('*',array('provinceid'=>$id),500,'id ASC');
	}
}
?>
