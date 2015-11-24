<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/11/6
 * Time: 20:00
 */

class Manage extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数
    private $page; //每页条数
    private $login_role;
    private $member_id;

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('province_model');
        $this->load->model('city_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->login_role=$this->member_info['login_role_id'];
        $this->member_id=$this->member_info['id'];
//        $this->login_role=2;
//        $this->member_id=5;
    }

    /**
     * 运营商列表页面
     */
    public function index(){
        $this->where= 'dele_status = '.NO_DELETE_STATUS;    //未删除的

        //限制运营商权限
        if($this->login_role==THIRD_ROLE_INFO){
            $this->where.=' and id='.$this->member_id;
        }

        $select_id=$this->input->get_post('select_id'); //选择的省份id
        if($select_id){
            $this->where.= ' and province = '.$select_id;    //选择省份
        }

        $s_name=$this->input->get_post('s_name'); //填写的代理商名字
        if($s_name){
            $this->where.= " and user_name like '%{$s_name}%'";    //检索代理商
        }

        $res=$this->admin_user_model->list_info('*',$this->where,$this->page,$this->perpage);
        foreach($res as $k=>$v){
            $tmp1=$this->province_model->getProvince(1,$v['province']);
            $tmp2=$this->city_model->getCity(1,$v['city']);
            $res[$k]['zone']=$tmp1['name'].' '.$tmp2['name'];
        }

        $data['province']=$this->province_model->getProvince();
        $data['data']=$res;
        $data['select_id']=$select_id;
        $data['s_name']=$s_name;
        $data['login_role']=$this->login_role;
        $data['member_id']=$this->member_id;
        $data['pages']=pages($this->admin_user_model->getCount($this->where),$this->page,$this->perpage);

        $this->rendering_admin_template($data,'manage','man_list');

    }

    /**
     * 创建代理商信息
     */
    public function create(){
        $data=array();
        $data['province']=$this->province_model->getProvince();
        $this->rendering_admin_template($data,'manage','man_create');
    }

    /**
     * 修改代理商信息
     */
    public function edit(){
        $id=$this->input->get_post('id');

        if($this->login_role==THIRD_ROLE_INFO){
            $where['id']=$this->member_id;
        }else{
            $where['id']=$id;
        }

        $data_info=$this->admin_user_model->get_one('*',$where);
        $province=$this->province_model->getProvince();

        $data['data_info']=$data_info;
        $data['province']=$province;
        $data['city']=$this->city_model->getList($data_info['province']);

        $this->rendering_admin_template($data,'manage','man_create');
    }

    /**
     * ajax 处理管理员新建
     *
     */
    public function createManager(){
        if($this->login_role==THIRD_ROLE_INFO){
            $id=$this->member_id;
        }else{
            $id=$this->input->get_post('check_id');
        }

        $name= $this->input->get_post('name');
        $login_role_id = $this->input->get_post('login_role_id')?$this->input->get_post('login_role_id'):2; //角色类型
        $province_id = $this->input->get_post('province_id')?$this->input->get_post('province_id'):0; //省id
        $city_id = $this->input->get_post('city_id')?$this->input->get_post('city_id'):0; //市id
        $addr= $this->input->get_post('addr');
        $mobile= trim($this->input->get_post('mobile'));
        $email= $this->input->get_post('email');
        $password= $this->input->get_post('password');
        $repassword= $this->input->get_post('repassword');

        //用户名
        if(!$name){
            $data=array(
                'status'=>0,
                'msg'=>'请填写代理商！'
            );
            exit(json_encode($data));
        }
        //省id
        if(!$province_id){
            $data=array(
                'status'=>0,
                'msg'=>'请选择省！'
            );
            exit(json_encode($data));
        }
        //省id
        if(!$city_id){
            $data=array(
                'status'=>0,
                'msg'=>'请选择市！'
            );
            exit(json_encode($data));
        }
        //手机号不能为空
        if(!$mobile){
            $data=array(
                'status'=>0,
                'msg'=>'请填写手机号码！'
            );
            exit(json_encode($data));
        }

        //手机号码的合法性
        if (!preg_match("/^13[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|15[0-9]{9}$|18{1}[0-9]{9}$/", $mobile)) {
            $data = array(
                'status' => 0,
                'msg' => '手机号不合法！',
            );
            exit(json_encode($data));
        }

        if($id){
            $where_m['id']=$id;
            $where_m['dele_status']=NO_DELETE_STATUS;
            $mem_info=$this->admin_user_model->get_one('*',$where_m);
            if($mem_info['mobile']!=$mobile) {
                //判断手机号是否唯一
                $where_m = "id <> {$id} and mobile ='{$mobile}' and dele_status=".NO_DELETE_STATUS;
                if ($this->admin_user_model->get_one('*', $where_m)) {
                    $data = array(
                        'status' => 0,
                        'msg' => '手机号码已存在！'
                    );
                    exit(json_encode($data));
                }
            }
            $post_data['up_date']=date('Y-m-d H:i:s');

        }else {
            //判断手机号是否唯一
            $where_m = "mobile ='{$mobile}' and dele_status=".NO_DELETE_STATUS;
            if ($this->admin_user_model->get_one('*', $where_m)) {
                $data = array(
                    'status' => 0,
                    'msg' => '手机号码已存在！'
                );
                exit(json_encode($data));
            }
        }

        //判断密码是否一致
        if (!empty($password) && !empty($repassword)) {
            if (strlen(trim($password)) < 6) {
                $data = array(
                    'status' => 0,
                    'msg' => '密码长度至少6位！'
                );
                exit(json_encode($data));

            } elseif (trim($password) !== trim($repassword)) {
                $data = array(
                    'status' => 0,
                    'msg' => '密码不一致！'
                );
                exit(json_encode($data));
            }
            //密码加密存放
            $encrypt = randomstr();
            $post_data['password'] = encryptMd5(trim($password), $encrypt);
            $post_data['encrypt'] = $encrypt;
        }

        $post_data['user_name']=$name;
        $post_data['province']=$province_id;
        $post_data['city']=$city_id;
        $post_data['addr']=$addr;
        $post_data['mobile']=$mobile;
        $post_data['email']=$email;
        $post_data['login_role_id']=$login_role_id;


        //执行插入
        if(!$id){
            $r = $this->admin_user_model->insert($post_data,true);
            $msg = '创建成功！';
        }else{
            $r = $this->admin_user_model->update($post_data,'id ='.$id);
            $msg = '修改成功！';
        }

        $data=array(
            'status'=>1,
            'msg'=>$msg
        );
        exit(json_encode($data));

    }

    /**
     * 删除代理商
     */
    public function deleteAgent(){
        if($this->login_role_id!=MANGER_ROLE_INFO){
            $info = array(
                'status' => 0,
                'msg' => '无权限操作！',
            );
            exit(json_encode($info));
        }


        $id=$this->input->get_post('id')?$this->input->get_post('id'):0;

        if($this->member_id==$id){
            $info = array(
                'status' => 0,
                'msg' => '无权限操作！',
            );
            exit(json_encode($info));
        }

        $info = array(
            'status' => 0,
            'msg' => '删除失败',
        );

        if(!$id){
            exit(json_encode($info));
        }

        $where="id in ({$id}) ";
        $data['dele_status']=DELETE_STATUS;
        $bool=$this->admin_user_model->update($data,$where);

        if($bool){
            $info = array(
                'status' => 1,
                'msg' => '删除成功',
            );
            exit(json_encode($info));
        }
        exit(json_encode($info));
    }

    /**
     * 检查手机号码唯一性
     */
    public function is_single(){
        $member_id=$this->input->get_post('member_id');
        $mobile=$this->input->get_post('value');

        if($member_id){
            $data=array(
                'status'=>1,
                'msg'=>'数据获取成功！'
            );
            exit(json_encode($data));

        }
        //判断手机号是否唯一
        $where_m = "mobile ='{$mobile}'";
        if($this->admin_user_model->get_one('*',$where_m)){
            $data=array(
                'status'=>0,
                'msg'=>'手机号码已存在！'
            );
            exit(json_encode($data));
        }else{
            $data=array(
                'status'=>1,
                'msg'=>'手机号码可用！'
            );
            exit(json_encode($data));
        }
    }

    /**
     * 获取城市列表
     */
    public function getCityById(){
        $p_id=$this->input->get_post('p_id');

        $tmp=$this->city_model->getList($p_id);
        $data=array(
            'status'=>1,
            'data'=>$tmp,
            'msg'=>'数据获取成功！'
        );
        exit(json_encode($data));
    }

}
