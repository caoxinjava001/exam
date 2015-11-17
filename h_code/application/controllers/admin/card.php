<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/11/6
 * Time: 20:00
 */

class Card extends MY_Controller{
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
        $this->load->model('card_info_model');
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
            $this->where.=' and admin_id='.$this->member_id;
        }

        $number=$this->input->get_post('number'); //卡号
        if($number){
            $this->where.= " and number = '{$number}'";
        }

        $select_id=$this->input->get_post('select_id'); //选择的卡状态
        if(strlen($select_id)>0){
            $select_id=intval($select_id);
            $this->where.= ' and use_status = '.$select_id;
        }else{
            $select_id=null;
        }

        $s_name=$this->input->get_post('s_name'); //填写的代理商名字
        if($s_name){
            $where_id= "dele_status =".NO_DELETE_STATUS." and user_name like '%{$s_name}%'";    //检索代理商
            $temp=$this->admin_user_model->get_one('id',$where_id);
            if(!empty($temp)){
                $this->where.=" and admin_id in (".implode(',',$temp).")";
            }else{
                $this->where.=" and admin_id in (0)";
            }
        }

        $start_time=trim($this->input->get_post('start_time')); //开始时间
        $end_time=trim($this->input->get_post('end_time')); //结束时间
        if($start_time){
            $s_time=str_replace('/','-',$start_time);
            $this->where.= " and use_start_time >='{$s_time}'";
        }
        if($end_time){
            $e_time=str_replace('/','-',$end_time);
            $this->where.= " and use_end_time <= '{$e_time}'";
        }
        $res=$this->card_info_model->list_info('*',$this->where,$this->page,$this->perpage);
        foreach($res as $k=>$v){
            $temp=$this->admin_user_model->get_one('*',array('id'=>$v['admin_id']));
            $res[$k]['admin_name']=$temp['user_name'];
        }

        $data['number']=$number;
        $data['data']=$res;
        $data['select_id']=$select_id;
        $data['s_name']=$s_name;
        $data['start_time']=$start_time;
        $data['end_time']=$end_time;
        $data['login_role']=$this->login_role;
        $data['pages']=pages($this->card_info_model->getCount($this->where),$this->page,$this->perpage);

        $this->rendering_admin_template($data,'card','card_list');

    }

    /**
     * 创建代理商信息
     */
    public function create(){
        $data=array();
        $where['dele_status']=NO_DELETE_STATUS;
        $data['admin_users']=$this->admin_user_model->select('id,user_name',$where);
        $this->rendering_admin_template($data,'card','card_create');
    }

    /**
     * 修改代理商信息
     */
    public function edit(){
        $id=$this->input->get_post('id');

        $where['id']=$id;
        if($this->login_role==THIRD_ROLE_INFO){
            $where['admin_id']=$this->member_id;
        }

        $data_info=$this->card_info_model->get_one('*',$where);

        $where1['dele_status']=NO_DELETE_STATUS;
        $data['admin_users']=$this->admin_user_model->select('id,user_name',$where1);

        $data['data_info']=$data_info;

        $this->rendering_admin_template($data,'card','card_create');
    }

    /**
     * ajax 处理管理员新建
     *
     */
    public function createCard(){
        if($this->login_role==THIRD_ROLE_INFO){
            $data=array(
                'status'=>0,
                'msg'=>'您没有权限！'
            );
            exit(json_encode($data));
        }

        $id=$this->input->get_post('check_id');
        $number=trim($this->input->get_post('number'));
        $admin_id=$this->input->get_post('admin_id');
        $select_id=$this->input->get_post('select_id');

        //卡号
        if(strlen($number)<1){
            $data=array(
                'status'=>0,
                'msg'=>'请填写卡号！'
            );
            exit(json_encode($data));
        }

        //代理商
        if(!$admin_id){
            $data=array(
                'status'=>0,
                'msg'=>'请选择代理商！'
            );
            exit(json_encode($data));
        }


        if($id){
            $where_c['id']=$id;
            $where_c['dele_status']=NO_DELETE_STATUS;

            $nem_info=$this->card_info_model->get_one('*',$where_c);

            if($nem_info['number']!=$number){
                $where_m="number ='{$number}' and id <> ".$id." and dele_status=".NO_DELETE_STATUS;
                if($this->card_info_model->get_one('*',$where_m)){
                    $data=array(
                        'status'=>0,
                        'msg'=>'充值卡号已存在！'
                    );
                    exit(json_encode($data));
                }
            }
        }else {
            //判断卡号是否唯一
            $where_m = "number ='{$number}' and dele_status=".NO_DELETE_STATUS;
            if ($this->card_info_model->get_one('*', $where_m)) {
                $data = array(
                    'status' => 0,
                    'msg' => '充值卡号已存在！'
                );
                exit(json_encode($data));
            }

        }

        $post_data['number']=$number;
        $post_data['admin_id']=$admin_id;
        $post_data['use_status']=$select_id;


        //执行插入
        if(!$id){
            $r = $this->card_info_model->insert($post_data,true);
            $msg = '创建成功！';
        }else{
            $r = $this->card_info_model->update($post_data,'id ='.$id);
            $msg = '修改成功！';
        }

        $data=array(
            'status'=>1,
            'msg'=>$msg
        );
        exit(json_encode($data));

    }


    /**
     * 检查充值卡号码唯一性
     */
    public function is_single(){
        $number=$this->input->get_post('number');

        if(strlen($number)<0){
            $data=array(
                'status'=>0,
                'msg'=>'请填写卡号！'
            );
            exit(json_encode($data));

        }
        //判断卡号是否唯一
        $where_m = "number ='{$number}' and dele_status=".NO_DELETE_STATUS;
        if($this->card_info_model->get_one('*',$where_m)){
            $data=array(
                'status'=>0,
                'msg'=>'充值卡号已存在！'
            );
            exit(json_encode($data));
        }else{
            $data=array(
                'status'=>1,
                'msg'=>'充值卡号可用！'
            );
            exit(json_encode($data));
        }
    }

}
