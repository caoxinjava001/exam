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
class Exam_stem_Model extends MY_Model{

	public function __construct() {
		parent::__construct();
		$this->_table = "h_exam_stem";	// 表名
		$this->initDB();
	}

}
?>
