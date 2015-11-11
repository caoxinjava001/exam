<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/11/6
 * Time: 20:00
 */

class Classify extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数
    private $login_role;
    private $member_id;

    public function __construct(){
        parent::__construct();
        $this->load->model('exam_tag_model');

        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;

        $this->login_role=$this->member_info['login_role_id'];
        $this->member_id=$this->member_info['id'];
//        $this->login_role=2;
//        $this->member_id=5;
        $this->valid(); //不是管理员不容许操作

    }

    /**
     * 运营商列表页面
     */
    public function index(){
        $this->where= 'dele_status = '.NO_DELETE_STATUS;    //未删除的
        $s_name=$this->input->get_post('s_name'); //分类名字

        if($s_name){
            $this->where.= " and cate_name like '%{$s_name}%'";    //检索代理商
        }


        $res=$this->exam_tag_model->list_info('*',$this->where,$this->page,$this->perpage);


        $data['data']=$res;
        $data['s_name']=$s_name;
        $data['login_role']=$this->login_role;
        $data['pages']=pages($this->exam_tag_model->getCount($this->where),$this->page,$this->perpage);

        $this->rendering_admin_template($data,'classify','class_list');

    }

    /**
     * 创建代理商信息
     */
    public function create(){
        $data=array();
        $this->rendering_admin_template($data,'classify','class_create');
    }

    /**
     * 修改代理商信息
     */
    public function edit(){
        $id=$this->input->get_post('id');
        $where['id']=$id;
        $where['dele_status']=NO_DELETE_STATUS;

        $data_info=$this->exam_tag_model->get_one('*',$where);

        $data['data_info']=$data_info;

        $this->rendering_admin_template($data,'classify','class_create');
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
        $number=trim($this->input->get_post('cate_name'));


        //卡号
        if(strlen($number)<1){
            $data=array(
                'status'=>0,
                'msg'=>'请填写分类名称！'
            );
            exit(json_encode($data));
        }



        if($id){
            $where_c['id']=$id;
            $where_c['dele_status']=NO_DELETE_STATUS;

            $nem_info=$this->exam_tag_model->get_one('*',$where_c);

            if($nem_info['cate_name']!=$number){
                $where_m="cate_name ='{$number}' and id <> ".$id." and dele_status=".NO_DELETE_STATUS;
                if($this->exam_tag_model->get_one('*',$where_m)){
                    $data=array(
                        'status'=>0,
                        'msg'=>'分类名称已存在！'
                    );
                    exit(json_encode($data));
                }
            }
            $post_data['modify_time']=date('Y-m-d H:i:s');

        }else {
            //判断卡号是否唯一
            $where_m = "cate_name ='{$number}' and dele_status=".NO_DELETE_STATUS;
            if ($this->exam_tag_model->get_one('*', $where_m)) {
                $data = array(
                    'status' => 0,
                    'msg' => '分类名称已存在！'
                );
                exit(json_encode($data));
            }

        }

        $post_data['cate_name']=$number;


        //执行插入
        if(!$id){
            $r = $this->exam_tag_model->insert($post_data,true);
            $msg = '创建成功！';
        }else{
            $r = $this->exam_tag_model->update($post_data,'id ='.$id);
            $msg = '修改成功！';
        }

        $data=array(
            'status'=>1,
            'msg'=>$msg
        );
        exit(json_encode($data));

    }
    /**
     * 删除分类
     */
    public function deleteAgent(){
        if($this->login_role_id!=MANGER_ROLE_INFO){
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

        $id=$this->input->get_post('id')?$this->input->get_post('id'):0;

        if(!$id){
            exit(json_encode($info));
        }

        $where="id in ({$id}) ";
        $data['dele_status']=DELETE_STATUS;
        $bool=$this->exam_tag_model->update($data,$where);

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
     * 检查分类名
     */
    public function is_single(){
        $number=$this->input->get_post('cate_name');

        if(strlen($number)<0){
            $data=array(
                'status'=>0,
                'msg'=>'请填写分类名称！'
            );
            exit(json_encode($data));

        }
        //判断卡号是否唯一
        $where_m = "cate_name ='{$number}' and dele_status=".NO_DELETE_STATUS;

        if($this->exam_tag_model->get_one('*',$where_m)){
            $data=array(
                'status'=>0,
                'msg'=>'分类名称已存在！'
            );
            exit(json_encode($data));
        }else{
            $data=array(
                'status'=>1,
                'msg'=>'分类名称可用！'
            );
            exit(json_encode($data));
        }
    }

    /**
     * 不是管理员则跳转
     */
    protected function valid(){
        if($this->login_role!=MANGER_ROLE_INFO){
            redirect(MAIN_PATH.'/manage/index');
        }
    }
}
