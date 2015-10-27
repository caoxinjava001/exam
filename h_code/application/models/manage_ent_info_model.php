<?php
/**
 * role_info_Model 
 * 
 * @uses MY
 * @uses _Model
 * @package 
 * @version $Id$
 * @author kangm <all@kangm.com> 
 */
class Manage_ent_info_Model extends MY_Model{

	/**
	 * __construct 
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->_table = "yt_manage_ent_info";	// 表名
		$this->initDB();
	}

    /**
     * 查看是否有未读信息
     * @param $ent_id
     * @param $manage_id
     */
    public function isRead($ent_id,$manage_id){
        if(!$ent_id||!$manage_id){return false;}
        $where=array(
            'ent_id'=>$ent_id,
            'manage_id'=>$manage_id,
            'dele_status'=>NO_DELETE_STATUS,
        );
        $status=$this->get_one('status',$where);
        if($status['status']==1){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 标记为已读
     * @param $ent_id
     * @param $manage_id
     */
    public function hasRead($ent_id,$manage_id){
        if(!$ent_id||!$manage_id){return false;}
        $where=array(
            'ent_id'=>$ent_id,
            'manage_id'=>$manage_id,
        );
        return $this->update(array('status'=>2),$where);
    }
}
?>
