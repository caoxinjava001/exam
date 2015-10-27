<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/06/10
 * Time: 15:00
 */

class Enterprise_Sort extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('role_info_model');
        $this->load->model('bind_next_model');
		$this->load->model('Member_org_model');
		$this->load->model('ent_sort_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->where.= 'login_role_id = '.PARTNER_ADMIN;  // 合伙人
        $this->where.= ' and id not in (1) ';  // 过滤 Admin 超级用户

    }

    /**
     * 创建管理员页面
     */
    public function index(){
        $data=array();
        $id = $this->input->get_post('id')?$this->input->get_post('id'):0;
        if($id){
                $r = $this->ent_sort_model->get_one('*','id ='.$id);
                if($r){
                    $data['sort_info'] = $r; 
                }
        }
        $this->rendering_admin_template($data,'enterprise','ent_sort_add');
    }

    /**
     * ajax 处理管理员新建
     *
     */
    public function create_sort(){
        $post_data = $this->input->get_post('sort_info')?$this->input->get_post('sort_info'):0;
        if($post_data){
                $id = $post_data['id']?$post_data['id']:0;
                unset($post_data['id']);
                //判断分类名称是否已经存在
                if($this->ent_sort_model->get_one('*',array('name'=>$post_data['name']))){
                    $return = array(
                        'status'=>0,
                        'msg'=>'该分类已存在！'
                    );
                }else{

                        if(!$id){ //执行插入
                                $post_data['created_by'] = $this->mid;
                                //print_r($post_data);exit;
                                $r = $this->ent_sort_model->insert($post_data,true);
                                if($r) {
                                    $return = array(
                                        'status' => 1,
                                        'data' => $r,
                                        'msg' => '创建成功！'
                                    );
                                }
                        }else{ //更新
                                $post_data['modify_by'] = $this->mid;
                                $post_data['modify_time'] = date('Y-m-d H:i:s');
                                $r = $this->ent_sort_model->update($post_data,'id ='.$id);
                                if($r) {
                                    $return = array(
                                        'status' => 1,
                                        'data' => $r,
                                        'msg' => '创建成功！'
                                    );
                                }
                        
                        }
                }
        }else{
            $return = array(
                'status' => 0,
                'data' =>'',
                'msg' => '参数错误！',
            ); 
        }
        exit(json_encode($return));
    }

    /******************************************
    ** function 列表
    **
    ******************************************/
    public function sort_list(){
        //echo '企业信息分类列表';    
        $data = array();
        $where = 'dele_status ='.NO_DELETE_STATUS;
        $search_name = $this->input->get_post('search_name')?trim($this->input->get_post('search_name')):'';
        if($search_name){
                $where .= " and name like'%".$search_name."%'"; 
        }
        
        $result = $this->ent_sort_model->list_info('*',$where,$this->page,$this->perpage);
        if($result){

        }
        //echo '<pre>';
        //print_r($result);exit;
        $data['data'] = $result;
        $data['pages']=pages($this->ent_sort_model->getCount($where),$this->page,$this->perpage);
        $data['search_name'] = $search_name;

        $this->rendering_admin_template($data,'enterprise','sort_list');
    }

    /*********************
    **
    **
    ***********************/
    public function delete(){
        $id = $this->input->get_post('id');
        //echo $id;  
        if($id){
            $param = array(
                'dele_status' => 0,
            ); 
            $r = $this->ent_sort_model->update($param,'id ='.$id);
            if($r){
                $return = array(
                    'status' => 1,
                    'data' => $id,
                    'msg' => '删除成功！',
                ); 
            }
        }else{
                $return = array(
                    'status' => 0,
                    'data' => $id,
                    'msg' => '参数错误！',
                ); 
        }
        echo json_encode($return);
    }


}
