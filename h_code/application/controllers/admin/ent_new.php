<?php

class Ent_new extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数
    private $role_id;   //用户登录角色id
    private $data=array();      //数据容器

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        //$this->load->model('role_info_model');
        $this->load->model('user_model');
        //$this->load->model('ent_audit_log_model');
        //$this->load->model('super_get_model');

        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->where.='dele_status = '.NO_DELETE_STATUS;
        $this->role_id=$this->member_info['role_id'];
    }


    public function addUpdateInfo(){
		$ret = array();
        $this->data['data']=$ret;
        $this->rendering_admin_template($this->data,'enterprise','add_update');
    }



    /**
     * 企业待审
     */
    public function index(){
        //获取适合本人的where条件
        $this->getRoleWhere();
        //获取待审企业数据
        $result=$this->user_model->list_info('*',$this->where,$this->page,$this->perpage);
        foreach($result as $k=>$v){
            $name=$this->admin_user_model->getIntro($v['intro_id']);    //获取介绍人
            $industry_name=$this->super_get_model->getIndustryById($v['industry_id']);  //所属行业
            $type_name=$this->super_get_model->getTypeById($v['industry_id']);  //所属上市方式
            $suggest=$this->super_get_model->getPreSuggest($v['id'],$this->mid);    //获取审核意见
            $mark=($suggest['pro_mark'])?$suggest['pro_mark']:'暂无';

            $result[$k]['intro_name']=$name['name'];
            $result[$k]['industry_name']=$industry_name['name'];
            $result[$k]['type_name']=$type_name['name'];
            $result[$k]['suggest']=$suggest['name'].'：'.$mark;
        }
        $process = $this->role_info_model->get_one('name', array('id' => $result[0]['role_id']));

        //获取400投资内勤的审核行业信息
        $this->data['industry']=$this->super_get_model->getAllIndustry();
        //获取400投资内勤的审核分类
        $this->data['type']=$this->super_get_model->getAllType();

        //获取500投资经理人
        if($this->role_id==ROLE_SIX) {
            $this->data['next_person'] = $this->admin_user_model->getListByRoleId(ROLE_FIVE);
        }

        $this->data['data']=$result;
        $this->data['role']=$this->role_id;
        $this->data['process']=$process['name'].'审核意见';
        $this->data['pages']=pages($this->user_model->getCount($this->where),$this->page,$this->perpage);

        $this->rendering_admin_template($this->data,'enterprise','ent_audit');
    }

    /**
     * 查看企业注册信息
     */
    public function detail(){
        $ret=$this->user_model->get_one('*',array('id'=>$this->uri->segment(3)));
        $name=$this->admin_user_model->getIntro($ret['intro_id']);
        $ret['intro_name']=$name['name'];
        $this->data['data']=$ret;
        $this->rendering_admin_template($this->data,'enterprise','ent_detail');
    }
    /**
     * 显示管理员审核过的用户
     */
    public function allUser(){
        //企业用户
        $result=$this->user_model->list_info('*','',$this->page,$this->perpage);
        //获取用户审核的进度
        foreach ($result as $k => $v) {
            $progress = $this->role_info_model->get_one('name', array('id' => $v['role_id']));  //已审核人
            $next_role_id = $this->admin_user_model->get_one('role_id', array('id' => $v['next_id'])); //下一步审核人role_id
            $next_role = $this->role_info_model->get_one('name', array('id' => $next_role_id['role_id']));  //下一步审核人

            $name=$this->admin_user_model->getIntro($v['intro_id']);
            $industry_name=$this->super_get_model->getIndustryById($v['industry_id']);  //所属行业
            $type_name=$this->super_get_model->getTypeById($v['type_id']);  //所属上市方式

            if($v['obj_status']==OBJ_NONE){
                if($v['next_id']&&$v['status']==VER_IN_AUDIT){
                    $process=$progress['name'].'已审核';
                    $process.=','.$next_role['name'].'审核中';
                }else{
                    $process='资料待审核';
                }
            }elseif($v['obj_status']==OBJ_REPLAR){
                $process='资料修改中';
            }else{
                $process='项目已立项';
            }

            $result[$k]['progress'] =$process ;
            $result[$k]['intro_name'] = $name['name'];
            $result[$k]['industry_name']=$industry_name['name'];
            $result[$k]['type_name']=$type_name['name'];
        }
        $this->data['data']=$result;
        $this->data['pages']=pages($this->user_model->getCount(),$this->page,$this->perpage);

        $this->rendering_admin_template($this->data,'enterprise','ent_list');
    }


    /**
     * 获取该谁审核条件
     */
    private function getRoleWhere(){
        $role = $this->member_info['role_id'];
        switch ($role){
            case ROLE_ONE:
                $this->where .= " and role_id = 0 and next_id = 0 and obj_status = 0";
                break;
            default:
                $this->where .= " and obj_status = 0 and  next_id = ".$this->mid;
                break;
            }
    }

    /**
     * ajax处理用户审核
     * @param   form表单serialize()
     * @return  status:0操作失败，1操作成功 msg:操作提示
     */
    public function ajaxAudit(){

        $id=$this->input->get_post('id');
        $type=$this->input->get_post('type');
        $industry=$this->input->get_post('industry');
        $pro_type=$this->input->get_post('pro_type');
        $pro_tip=$this->input->get_post('pro_tip');
        $next=$this->input->get_post('next_id');
        $manager=0;

        //获取下一步审核人id
        switch($this->role_id){
            case ROLE_FOUR:
                $manager=$this->bind_next_model->get_one('next_id',array('current_id'=>$this->mid));
                $manager=$this->bind_next_model->get_one('next_id',array('current_id'=>$manager['next_id']));
                $next_id=$manager['next_id'];
                break;
            case ROLE_SIX:
                $next_id=$next;
                $manager=$next;
                break;
            default:
                $next_id=$this->bind_next_model->get_one('next_id',array('current_id'=>$this->mid));
                $next_id=$next_id['next_id'];
                break;
        }

        //查看下一级审核人是否未冻结
        $is_free=$this->admin_user_model->get_one('dele_status',array('id'=>$next_id));

        //判断如果是投资总监审核通过必须分配投资经理
        if($pro_type==1&&$this->role_id==ROLE_SIX){
            if(!$next){
                $data=array(
                    'status'=>0,
                    'msg'=>'审核通过必须分配投资经理！'
                );
                exit(json_encode($data));
            }
        }

        //判断如果是投资总监审核通过必须分配投资经理
        if($pro_type==1&&$this->role_id==ROLE_FOUR){
            if(!$industry){
                $data=array(
                    'status'=>0,
                    'msg'=>'审核通过必须分配行业！'
                );
                exit(json_encode($data));
            }
        }

        //判断是否有下级审核
        if((!$next_id&&$pro_type==1)||$is_free['dele_status']==DELETE_STATUS){
            $data=array(
                'status'=>0,
                'msg'=>'您的下一级审核人还没有确定，暂时不能做‘审核通过’操作！'
            );
            exit(json_encode($data));
        }


        //执行审核记录
        $up_data=array(
            'ent_id'=>$id,
            'manage_id'=>$this->mid,
            'role_id'=>$this->member_info['role_id'],
            'pro_mark'=>$pro_tip,
            'status'=>($pro_type==1)?'2':0,
            'step_status'=>($pro_type==1&&($this->role_id>400))?1:0
        );
        $up_data1 = array(
            'role_id' => $this->member_info['role_id'],
        );
        //通过
        if($pro_type==1) {
            $up_data1['next_id'] = $next_id;
            if($this->role_id==ROLE_FOUR) {
                $up_data1['type_id'] = $type;
                $up_data1['industry_id'] = $industry;
            }
            $up_data1['obj_status'] = ($this->role_id==ROLE_SIX)?1:0;
            $up_data1['manage_id'] = ($this->role_id==ROLE_SIX)?$manager:0;
        }
        //驳回
        if($pro_type==2){
            $up_data1['next_id']=0;
            $up_data1['role_id']=0;
            $up_data1['obj_status']=OBJ_REPLAR;
        }

        $this->user_model->update($up_data1,array('id'=>$id));
        //记录信息
        $bool=$this->ent_audit_log_model->insert($up_data);

        if($bool){
            if($pro_type==2){
                $this->ent_audit_log_model->update(array('dele_status'=>DELETE_STATUS),array('ent_id'=>$id));
            }
            $data=array(
                'status'=>1,
                'msg'=>'操作成功！'
            );
            exit(json_encode($data));
        }else{
            $data=array(
                'status'=>0,
                'msg'=>'操作失败！'
            );
            exit(json_encode($data));
        }
    }

    /**
     * ajax操作冻结企业用户和解冻
     * @param   id :企业用户id，多个用逗号隔开
     * @param   type: 1为冻结，2为解冻
     * @return  status:0操作失败，1操作成功 msg:操作提示
     */
    public function ajaxFreeze(){
        $ids=$this->input->get_post('id');
        $type=$this->input->get_post('type');
        $data=array(
            'status'=>0,
            'msg'=>'操作失败！'
        );
        if($ids && $type) {
            $where='id in ('.$ids.')';
            if ($type == 1) {
                $up_data['dele_status']=0;
            }
            if ($type == 2) {
                $up_data['dele_status']=1;
            }
            $bool=$this->user_model->update($up_data,$where);
            if($bool){
                $data=array(
                    'status'=>1,
                    'msg'=>'操作成功！'
                );
            }
            exit(json_encode($data));
        }
        exit(json_encode($data));
    }
}
