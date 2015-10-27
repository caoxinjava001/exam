<?php
/**
 * Created by PhpStorm.
 * User: Steven.Robin.Shen 
 * Date: 2015/06/01
 * Time: 15:00
 */

class Manage_Sale extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('role_info_model');
        $this->load->model('bind_next_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):1;
        $this->where.= 'login_role_id = '.PARTNER_ADMIN;  // 合伙人
        $this->where.= ' and id not in (1) ';  // 过滤 Admin 超级用户

    }

    /**
     * 创建销售人员页面
     */
    public function index(){
        $data=array();
        $id = $this->input->get_post('id')?$this->input->get_post('id'):0;
        if($id){
                $r = $this->admin_user_model->get_one('*','id ='.$id);
                if($r){
                    $data['member_info'] = $r; 
                }
        }
        //echo '<pre>';
        //print_r($data);exit;
        $this->rendering_admin_template($data,'manage_sale','add');
    }

    /**
     * 所有销售员信息
     */
    public function all_list(){
        $s_name = $this->input->get_post('s_name')?trim($this->input->get_post('s_name')):'';

        $where = 'login_role_id ='.SALE_PERSONAL;
        if(!empty($s_name)){
            $where.=" and name like '%".$s_name."%'"; //角色
        }
        $result=$this->admin_user_model->list_info('*',$where,$this->page,$this->perpage);
        //print_r($result);exit;
        foreach($result as $k=>$v){

        }

        $data['data']=$result;
        $data['s_name']=$s_name;
        $data['pages']=pages($this->admin_user_model->getCount($where),$this->page,$this->perpage);

        //echo '<pre>';
        //print_r($data);exit;
        $this->rendering_admin_template($data,'manage_sale','all_list');
    }

    /**
     * ajax 处理销售人员新建
     *
     */
    public function createManager(){
        $admin_user = $this->input->get_post('admin_user')?$this->input->get_post('admin_user'):0;
        if($admin_user){
                $member_id = $admin_user['id']?$admin_user['id']:0;
                unset($admin_user['id']);
                $where = 'mobile ='.$admin_user['mobile'].' and id<>'.$member_id;
                $r = $this->admin_user_model->get_one('*',$where);
                if($r){
                    $return = array(
                        'status' => 0,
                        'data' =>'',
                        'msg' => '该手机号已存在！'
                    );
                }else{
                        if(!preg_match("/^13[0-9]{1}[0-9]{8}$|17[02]{1}[0-9]{8}$|15[0-9]{9}$|18{1}[0-9]{9}$/",$admin_user['mobile'])){                    
                            $data = array(
                                    'status' => 0,
                                    'msg' => '手机号不合法！',
                            );
                            exit(json_encode($data));
                        }    

                        //判断密码是否一致
                        if(!empty($admin_user['password']) && !empty($admin_user['repassword'])){
                            if(strlen(trim($admin_user['password']))<6){
                                $data=array(
                                    'status'=>0,
                                    'msg'=>'密码长度至少6位！'
                                );
                                exit(json_encode($data));
                                    
                            }elseif( trim($admin_user['password']) !== trim($admin_user['repassword'])){
                                $data=array(
                                    'status'=>0,
                                    'msg'=>'密码不一致！'
                                );
                                exit(json_encode($data));
                            }
                        }else{ //新增
                            if(!$member_id){
                                $data=array(
                                    'status'=>0,
                                    'msg'=>'密码不能为空！'
                                );
                                exit(json_encode($data));
                            } 
                        }

                        //密码加密存放
                        if(!empty($admin_user['password'])){
                                $encrypt = randomstr();
                                $admin_user['password'] = encryptMd5(trim($admin_user['password']),$encrypt);
                                $admin_user['encrypt'] = $encrypt;
                        }else{ //修改时，密码不变的情况。
                                unset($admin_user['password']);
                        }
                        $admin_user['login_role_id'] = SALE_PERSONAL;
                        $admin_user['status'] = VER_HAD_AUDIT;
                        unset($admin_user['repassword']);
                        if(!$member_id){ //insert
                                $r = $this->admin_user_model->insert($admin_user,true);
                        }else{ //update
                                $r = $this->admin_user_model->update($admin_user,'id ='.$member_id);
                        }

                        if($r) {
                            if(!$member_id){
                                    $return = array(
                                        'status' => 1,
                                        'data' =>$r,
                                        'msg' => '添加成功！'
                                    );
                            }else{
                                    $return = array(
                                        'status' => 2,
                                        'data' =>$r,
                                        'msg' => '修改成功！'
                                    );
                            
                            }
                        }
                }
        }else{
                    $return = array(
                        'status' => 0,
                        'data' =>'',
                        'msg' => '参数错误！'
                    );
        
        }
        exit(json_encode($return));
    }
}
