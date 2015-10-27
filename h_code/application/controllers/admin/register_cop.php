<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @ 合伙人注册功能 
 * @ author Steven.Robin.Shen 
 * @ 15/05/22
 */
class Register_cop extends MY_Controller{

	//private $expire_time = 300;
    //private $memberInfo = array(); //当前登录用户信息

	public function __construct(){
		parent::__construct($_flag = 'frontend');
		$this->backend_header_data['title'] = '' ;//页面title
		$this->backend_header_data['keywords'] = '' ;//页面关键字
		$this->backend_header_data['description'] = '' ;//页面描述
        $this->load->model("admin_user_model");      // 导入后台会员模型
	}

	public function index(){
          //echo '合伙人注册!';exit;
        $data = array();
        $member_id = $this->input->get_post('member_id')?$this->input->get_post('member_id'):0;
        if($member_id){
            $r = $this->admin_user_model->get_one('*','id ='.$member_id); 
            if($r){
                if(!$r['status']){ //申请驳回状态
                        $data['member_info'] = $r;
                        foreach($r as $k => $v){

                        }  
                }
            }
        }
        //echo '<pre>';
        //print_r($data);exit;
        $this->load->view('admin/copartner/register',$data);
    }

    /*******************************************************
    **@ 保存合伙人注册信息
    **@ Steven.Robin.Shen shenys@kangm.cn
    **@ date 15/05/22
    ********************************************************/
    public function  save(){
        $member_info = $this->input->get_post('member_info')?$this->input->get_post('member_info'):0;        
        //echo '<pre>';
        //print_r($member_info);exit;
         
        if($member_info){
            if($member_info['id']){ //update
                    $member_id = $member_info['id'];
                    unset($member_info['id']);
                    if(empty($member_info['password'])){
                            unset($member_info['password']);
                    }else{
                            //密码加密存放
                            $encrypt = randomstr();
                            $member_info['password'] = encryptMd5(trim($member_info['password']),$encrypt);
                            $member_info['encrypt'] = $encrypt; 
                    }
                    $member_info['status'] = 1;
                    //echo '<pre>';
                    //print_r($member_info);exit;
                    $r = $this->admin_user_model->update($member_info,'id ='.$member_id);
                    if($r){
                            $return = array(
                                'status' => 1,
                                'data' => $member_id,
                                'msg' => '更新成功!'
                            ); 
                    }
            }else{ //insert
                    //密码加密存放
                    $encrypt = randomstr();
                    $member_info['password'] = encryptMd5(trim($member_info['password']),$encrypt);
                    $member_info['encrypt'] = $encrypt; 
                    //echo '<pre>';
                    //print_r($member_info);exit;
                    //数据验证开始
                    $valid = $this->check($member_info);
                    //echo '<pre>';
                    //print_r($valid);exit;
                    if($valid){
                        if(!$valid['status']){
                            die(json_encode($valid));
                        
                        }
                    }
                    //exit;
                    //数据验证结束
                    $r = $this->admin_user_model->insert($member_info,true);
                    if($r){
                            $return = array(
                                'status' => 1,
                                'data' => $r,
                                'msg' => '注册成功，下面需要您提交身份验证的信息!'
                            ); 
                         
                    }
            }
        }else{
            $return = array(
                'status' => 0,
                'data' => '',
                'msg' => '参数错误！',
            ); 
        }
        echo json_encode($return); 
    }

    /**********************************************
    **验证手机/邮箱等是否唯一
    **
    ***********************************************/
    public function is_single(){
        $col_name_arr = array(
                            '1' => 'mobile',
                            '2' => 'email',
                        ); 
        $value = $this->input->get_post('value')?$this->input->get_post('value'):0;  //查询字段名称 
        $type = $this->input->get_post('type')?intval($this->input->get_post('type')):0;  //1,moblie 2,email
        $member_id = $this->input->get_post('member_id')?intval($this->input->get_post('member_id')):0;
        if($value){
            $where = $col_name_arr[$type]." ='".$value."' and id<>".$member_id;
            //echo $where;exit;
            $r = $this->admin_user_model->get_one('*',$where);
            if($r){
                    $return = array(
                        'status' => 0,
                        'data' => '',
                        'msg' => '不唯一'
                    ); 
            }else{
                    $return = array(
                        'status' => 1,
                        'data' => '',
                        'msg' => '唯一'
                    ); 
            
            }
        
        }else{
            $return = array(
                'status' => 0,
                'data' => '',
                'msg' => '参数错误！'
            ); 
        }
        echo json_encode($return);
    }

    /**********************************************************
    ** @function  查询介绍人列表
    ** @Steven.Robin.Shen shenys@kangm.cn
    ** @date 15/05/22
    ***********************************************************/
    public function get_introduce_users(){
        $where = 'status =2 and dele_status='.NO_DELETE_STATUS; 
        $r = $this->admin_user_model->select('id,name',$where);  
        if($r){
            $return = $r; 
        }else{
            $return = array(); 
        }
        echo json_encode($return);
    }

    /**********************************************************
    ** @认证第一步
    **
    **
    **********************************************************/
    public function auth_first(){
        $data = array();
        $member_id = $this->input->get_post('member_id')?intval($this->input->get_post('member_id')):0;
        if($member_id){
                $r = $this->admin_user_model->get_one('*','id ='.$member_id);
                if($r){
                        $data['member_info'] = $r;
                        $this->load->view('admin/copartner/auth_first',$data);
                }else{
                    echo '该记录不存在！';
                }
        }else{
            echo '参数错误！';
        }
    }
    
    /**********************************************************
    ** @认证第二步
    **
    **
    **********************************************************/
    public function auth_sec(){
        $member_id = $this->input->get_post('member_id')?$this->input->get_post('member_id'):0;
        if($member_id){
                $r = $this->admin_user_model->get_one('*','id ='.$member_id);
                if($r){
                        //$data['member_id'] = $r['id'];
                        //$data['login_role_id'] = $r['login_role_id'];
                        $data['member_info'] = $r;
                        $this->load->view('admin/copartner/auth_sec',$data);
                }else{
                    echo '该记录不存在！';
                }
        }else{
            echo '参数错误！';
        }
    }

    /************************************************************
    ** @ function 认证信息保存
    ** @ param id  id_type  id_number id_pic 
    ** @date 15/05/24
    ***************************************************************/
    public function ajax_auth_save(){
        $member_id = $this->input->get_post('member_id')?$this->input->get_post('member_id'):0;
        $id_type = $this->input->get_post('id_type')?$this->input->get_post('id_type'):1; 
        $id_number = $this->input->get_post('id_number')?$this->input->get_post('id_number'):0;
        $id_pic = $this->input->get_post('id_pic')?$this->input->get_post('id_pic'):0;
        $flag = $this->input->get_post('flag')?$this->input->get_post('flag'):0;
        if($member_id && $id_number && $id_pic && $flag){
            if($flag == 1){ //身份证信息
                    $params = array(
                        'identify_type' => $id_type,
                        'identify_num' => $id_number,
                        'identify_pic' => $id_pic,
                    );  
            }elseif($flag == 2){ //机构信息
                    $params = array(
                        'org_num' => $id_number,
                        'yy_pic' => $id_pic,
                    );  
            
            }else{
                    $return = array(
                        'status' => 0,
                        'data' => '',
                        'msg' => '参数错误！',   
                    );
            }
            //数据更新
            if(in_array($flag,array(1,2))){
                $r = $this->admin_user_model->update($params,'id ='.$member_id);
                if($r){
                    $return = array(
                        'status' => 1,
                        'data' => $member_id,
                        'msg' => '更新成功！',   
                    );
                    $message = json_encode($params);
                    log_message_user("INFO", $message,'cop_auth_info');
                }else{
                    $return = array(
                        'status' => 0,
                        'data' => '',
                        'msg' => '更新失败！',   
                    );
                }
            }else{
                    $return = array(
                        'status' => 0,
                        'data' => '',
                        'msg' => '参数错误！',   
                    );
            }
        }else{
            $return = array(
                'status' => 0,
                'data' => '',
                'msg' => '参数错误！',   
            );
        }
        echo json_encode($return);
    }

    /****************************************************
    ** @function 待入库信息验证
    ** @date 15/05/25
    ** @
    *****************************************************/
    private function check($member_info){
        $intro_id = $member_info['intro_id']?$member_info['intro_id']:0; //介绍人id
        $login_role_id = $member_info['login_role_id']?$member_info['login_role_id']:0; //登录角色
        $name = $member_info['name']?$member_info['name']:0; //用户名
        $gender = $member_info['gender']?$member_info['gender']:0; //性别
        $password = $member_info['password']?$member_info['password']:0; //密码
        $encrypt = $member_info['encrypt']?$member_info['encrypt']:0; //随机码
        $mobile = $member_info['mobile']?$member_info['mobile']:0; //手机号
        $email = $member_info['email']?$member_info['email']:0; //邮箱
        $birth = $member_info['birth']?$member_info['birth']:0; //生日
        $describe = $member_info['describe']?$member_info['describe']:0; //个人介绍

        //非空验证
        if($intro_id && $login_role_id && $name && $gender && $password && $encrypt && $mobile && $email && $birth && $describe){ 
                //手机邮箱 唯一性验证
                $r_mobile = $this->admin_user_model->get_one('*','mobile ='.$mobile);
                $r_email = $this->admin_user_model->get_one('*',"email ='".$email."'");
                if($r_mobile){
                    $return = array(
                        'status' => 0,
                        'data' =>'',
                        'msg' => '手机号已存在！' ,

                    ); 
                }elseif($r_email){
                    $return = array(
                        'status' => 0,
                        'data' => '',
                        'msg' => '邮箱已存在！' ,

                    ); 
                
                }else{
                    $return = array(
                        'status' => 1,
                        'data' => '' ,
                        'msg' => '入库信息验证通过！' ,

                    ); 
                }
        }else{ //参数错误
            $return = array(
                'status' => 0,
                'data' => '',
                'msg' => '参数错误',
            ); 
        }
        //返回验证结果
        return $return;

    }


   

}
?>
