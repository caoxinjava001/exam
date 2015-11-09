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
class Card_info_Model extends MY_Model{

	public function __construct() {
		parent::__construct();
		$this->_table = "h_card_info";	// 表名
		$this->initDB();
	}

}
?>
