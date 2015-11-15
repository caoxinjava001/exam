<?php

class Exam extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数
    private $login_role;
    private $member_id;

    public function __construct(){
        parent::__construct();
        $this->load->model('exam_model');
        $this->load->model('exam_tag_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->login_role=$this->member_info['login_role_id'];
        $this->member_id=$this->member_info['id'];
//        $this->login_role=2;
//        $this->member_id=5;
    }


    /**
     * 列表页面
     */
    public function index(){
		$exam_tag_where['dele_status'] = NO_DELETE_STATUS;
		$exam_tag_list=$this->exam_tag_model->select('*',$exam_tag_where);
        $this->where= 'dele_status = '.NO_DELETE_STATUS;    //未删除的
        $select_id=$this->input->get_post('select_id'); //选择的卡状态
        if(strlen($select_id)>0){
            $select_id=intval($select_id);
            $this->where.= ' and cate_id = '.$select_id;
        }else{
            $select_id=null;
        }
        $s_name=$this->input->get_post('s_name'); //填写的代理商名字
        if($s_name){
            $this->where .= " and exam_name like '%{$s_name}%'";    //检索代理商
        }
        $exam_list=$this->exam_model->list_info('*',$this->where,$this->page,$this->perpage);
		$exam_list = is_array($exam_list) ? $exam_list : array();
		foreach($exam_list as $key=>$val) {
			$where_tag['id'] = $val['cate_id'];
			$tmp_exam_tag_list=$this->exam_tag_model->get_one('*',$where_tag);
			$exam_list[$key]['tag_list'] = $tmp_exam_tag_list;
		}
        $data['select_id']=$select_id;
        $data['s_name']=$s_name;
        $data['exam_tag_list']=$exam_tag_list;
        $data['exam_list']=$exam_list;
        $data['pages']=pages($this->exam_model->getCount($this->where),$this->page,$this->perpage);
        $this->rendering_admin_template($data,'exam','exam_list');
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
