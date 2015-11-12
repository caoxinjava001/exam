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
class Member_exam_model extends MY_Model{

	public function __construct() {
		parent::__construct();
		$this->_table = "h_member_exam";	// 表名
		$this->initDB();
	}

}
?>
