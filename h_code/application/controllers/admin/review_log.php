<?php
/**
 * Created by .
 * User:　Steven.Robin.Shen shenys@kangm.cn 
 * Date: 2015/07/06
 * Time: 15:00
 */

class Review_Log  extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('user_model');
        $this->load->model('role_info_model');
		$this->load->model('ent_audit_log_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        //$this->where.= 'login_role_id = '.SALE_PERSONAL;  //角色类型 
        //$this->where.= ' and id not in (1) ';  // 过滤 Admin 超级用户
        $this->where = 'dele_status =1 and ent_id<>0 and manage_id<>0 and role_id<>0';

    }

    /**
     * 审核列表 
     */
    public function index(){

        if($_GET){
                $s_name = $this->input->get_post('s_name')?trim($this->input->get_post('s_name')):'';
                $s_ent_name = $this->input->get_post('s_ent_name')?trim($this->input->get_post('s_ent_name')):'';
                $s_date_start = $this->input->get_post('s_date_start')?$this->input->get_post('s_date_start'):'';
                $s_date_end = $this->input->get_post('s_date_end')?$this->input->get_post('s_date_end'):'';

                if(!empty($s_name)){ //用户名
                    $where_t = "dele_status =1 and name like'%".$s_name."%'"; 
                    $r_admin_user = $this->admin_user_model->get_one('*',$where_t);
                    if($r_admin_user){
                        $this->where .= ' and manage_id='.$r_admin_user['id']; 
                        $search_info['s_name'] = $s_name;
                    }
                }

                if(!empty($s_ent_name)){ //企业名称
                    $where_t = "dele_status =1 and org_name like'%".$s_ent_name."%'"; 
                    $r_user = $this->user_model->get_one('*',$where_t);
                    if($r_user){
                        $this->where .= ' and ent_id='.$r_user['id']; 
                        $search_info['s_ent_name'] = $s_ent_name;
                    }

                }

                if(!empty($s_date_start)){ //开始时间
                    
                        $this->where .= " and create_time>='".$s_date_start."'"; 
                        $search_info['s_date_start'] = $s_date_start;
                }

                if(!empty($s_date_end)){ //结束时间

                        $this->where .= " and create_time<='".date('Y-m-d H:i:s',strtotime($s_date_end.' 23:59:59'))."'"; 
                        $search_info['s_date_end'] = $s_date_end;
                }
        }
        $this->where.=' and control_type='.INVEST;
        $result=$this->ent_audit_log_model->list_info('*',$this->where,$this->page,$this->perpage);
        if($result){
                foreach($result as $k=>$v){

                        if($v['manage_id']){ //用户名id
                            $where_t = "dele_status =1 and id =".$v['manage_id']; 
                            $r_admin_user = $this->admin_user_model->get_one('*',$where_t);
                            if($r_admin_user){
                                $result[$k]['m_name'] = $r_admin_user['name']; 
                            }
                        }

                        if($v['ent_id']){ //企业名称id
                            $where_t = "dele_status =1 and id =".$v['ent_id']; 
                            $r_user = $this->user_model->get_one('*',$where_t);
                            if($r_user){
                                $result[$k]['ent_name'] = $r_user['org_name']; 
                            }

                        }

                        if($v['role_id']){ //角色id
                            $where_t = "dele_status =1 and id=".$v['role_id']; 
                            $r_role_info = $this->role_info_model->get_one('*',$where_t);
                            if($r_role_info){
                                $result[$k]['role_name'] = $r_role_info['name']; 
                            }
                        }

                        if($v['ent_id']){ //企业id
                            $where_t = "dele_status =1 and id=".$v['ent_id']; 
                            $r_ent_info = $this->user_model->get_one('*',$where_t);
                            if($r_ent_info){

                                if( 1 == $r_ent_info['nr_status']){
                                        $result[$k]['ent_stage'] = SEARCH_START; 
                                }else if( 2 == $r_ent_info['zy_status']){
                                        $result[$k]['ent_stage'] = SEARCH_START_PASS; 
                                }else if( 0 == $r_ent_info['zy_status']){
                                        $result[$k]['ent_stage'] = SEARCH_START_NOPASS; 
                                }else{
                                        $result[$k]['ent_stage'] = SEARCH_START; 
                                }
                            }
                        }

                }
        }

        $data['data']=$result;
        $data['pages']=pages($this->ent_audit_log_model->getCount($this->where),$this->page,$this->perpage);
        $data['search_info'] = $search_info;
        //echo '<pre>';
        //print_r($data);exit;

        $this->rendering_admin_template($data,'review_log','list');
    }

    /**
     * 市值审核列表
     */
    public function marketLog(){
        if($_GET){
            $s_name = $this->input->get_post('s_name')?trim($this->input->get_post('s_name')):'';
            $s_ent_name = $this->input->get_post('s_ent_name')?trim($this->input->get_post('s_ent_name')):'';
            $s_date_start = $this->input->get_post('s_date_start')?$this->input->get_post('s_date_start'):'';
            $s_date_end = $this->input->get_post('s_date_end')?$this->input->get_post('s_date_end'):'';

            if(!empty($s_name)){ //用户名
                $where_t = "dele_status =1 and name like'%".$s_name."%'";
                $r_admin_user = $this->admin_user_model->get_one('*',$where_t);
                if($r_admin_user){
                    $this->where .= ' and manage_id='.$r_admin_user['id'];
                    $search_info['s_name'] = $s_name;
                }
            }

            if(!empty($s_ent_name)){ //企业名称
                $where_t = "dele_status =1 and org_name like'%".$s_ent_name."%'";
                $r_user = $this->user_model->get_one('*',$where_t);
                if($r_user){
                    $this->where .= ' and ent_id='.$r_user['id'];
                    $search_info['s_ent_name'] = $s_ent_name;
                }

            }

            if(!empty($s_date_start)){ //开始时间

                $this->where .= " and create_time>='".$s_date_start."'";
                $search_info['s_date_start'] = $s_date_start;
            }

            if(!empty($s_date_end)){ //结束时间

                $this->where .= " and create_time<='".date('Y-m-d H:i:s',strtotime($s_date_end.' 23:59:59'))."'";
                $search_info['s_date_end'] = $s_date_end;
            }
        }
        $this->where.=' and control_type='.MARKET;

        $result=$this->ent_audit_log_model->list_info('*',$this->where,$this->page,$this->perpage);
        if($result){
            foreach($result as $k=>$v){

                if($v['manage_id']){ //用户名id
                    $where_t = "dele_status =1 and id =".$v['manage_id'];
                    $r_admin_user = $this->admin_user_model->get_one('*',$where_t);
                    if($r_admin_user){
                        $result[$k]['m_name'] = $r_admin_user['name'];
                    }
                }

                if($v['ent_id']){ //企业名称id
                    $where_t = "dele_status =1 and id =".$v['ent_id'];
                    $r_user = $this->user_model->get_one('*',$where_t);
                    if($r_user){
                        $result[$k]['ent_name'] = $r_user['org_name'];
                    }

                }

                if($v['role_id']){ //角色id
                    $where_t = "dele_status =1 and id=".$v['role_id'];
                    $r_role_info = $this->role_info_model->get_one('*',$where_t);
                    if($r_role_info){
                        $result[$k]['role_name'] = $r_role_info['name'];
                    }
                }

                if($v['ent_id']){ //企业id
                    $where_t = "dele_status =1 and id=".$v['ent_id'];
                    $r_ent_info = $this->user_model->get_one('*',$where_t);
                    if($r_ent_info){

                        if( 1 == $r_ent_info['nr_status']){
                            $result[$k]['ent_stage'] = SEARCH_START;
                        }else if( 2 == $r_ent_info['zy_status']){
                            $result[$k]['ent_stage'] = SEARCH_START_PASS;
                        }else if( 0 == $r_ent_info['zy_status']){
                            $result[$k]['ent_stage'] = SEARCH_START_NOPASS;
                        }else{
                            $result[$k]['ent_stage'] = SEARCH_START;
                        }
                    }
                }

            }
        }

        $data['data']=$result;
        $data['pages']=pages($this->ent_audit_log_model->getCount($this->where),$this->page,$this->perpage);
        $data['search_info'] = $search_info;
        //echo '<pre>';
        //print_r($data);exit;

        $this->rendering_admin_template($data,'review_log','list');
    }
}
