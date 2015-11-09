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
class Province_Model extends MY_Model{

	public function __construct() {
		parent::__construct();
		$this->_table = "h_province";	// 表名
		$this->initDB();
	}

	/**
	 * @param int $type
	 * @param int $id
	 * @return mixed
	 */
	public function getProvince($type=0,$id=0){
		switch($type){
			case 0:
				return $this->select('*',array(),500,'id ASC');
				break;
			case 1:
				return $this->get_one('*',array('id'=>$id));
				break;
		}
	}

}
?>
