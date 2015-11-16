<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/11/6
 * Time: 20:00
 */

class Examination extends MY_Controller{

    public function __construct(){
        parent::__construct('frontend');
        $this->load->model('exam_model');
        $this->load->model('exam_tag_model');
        $this->load->model('exam_stem_model');
        $this->load->model('member_exam_model');

    }

    /**
     * 考试页面
     */
    public function index(){
        $data=array();
        $id=$this->input->get_post('id')?$this->input->get_post('id'):1;
        $where['dele_status']=NO_DELETE_STATUS;
        $where['exam_id']=$id;

        $where_e['dele_status']=NO_DELETE_STATUS;
        $where_e['status']=0;
        $where_e['id']=$id;
        $exam=$this->exam_model->get_one('exam_name',$where_e);

        if(!empty($exam)) {
            //单选
            $where['stem_cate_id'] = EXAM_SINGLE;
            $data['single'] = $this->turnTo($this->exam_stem_model->select('*', $where));

            //判断
            $where['stem_cate_id'] = EXAM_JUDGE;
            $data['judge'] = $this->turnTo($this->exam_stem_model->select('*', $where));

            //多选
            $where['stem_cate_id'] = EXAM_MORE;
            $data['more'] = $this->turnTo($this->exam_stem_model->select('*', $where));


            $data['e_id'] = $id;
            $data['exam_name'] = $exam['exam_name'];
        }

        $this->load->view('/front/shiti',$data);	// 导入 主体部分 视图模板
    }

    /**
     * 考试结果
     */
    public function result(){
        $data=array();
        $uid =$this->input->get_post('uid')?$this->input->get_post('uid'):1;
        $eid =$this->input->get_post('eid')?$this->input->get_post('eid'):1;
        $where['user_id']=$uid;
        $where['exam_id']=$eid;
        $where['dele_status']=NO_DELETE_STATUS;

        $where_e['dele_status']=NO_DELETE_STATUS;
        $where_e['status']=0;
        $where_e['id']=$eid;
        $exam=$this->exam_model->get_one('exam_name',$where_e);

        if(!empty($exam)) {
            $data = $this->member_exam_model->get_one('*', $where);
            $data['use_dec_v'] = unserialize($data['use_dec_v']);
            $data['exam_name'] = $exam['exam_name'];
            $data['quest_num']=count($data['use_dec_v']['judge'])+count($data['use_dec_v']['single'])+count($data['use_dec_v']['more']);
        }
//        var_dump($data['use_dec_v']['more'][0]);die;
        $this->load->view('/front/daan',$data);	// 导入 主体部分 视图模板
    }

    /**
     * 考试列表
     */
    public function examList(){
        $data=array();

        $this->load->view('/front/liebiao',$data);	// 导入 主体部分 视图模板
    }

    /**
     * 处理交卷数据
     */
    public function anwserOver(){
        $content=$this->input->get_post('data')?$this->input->get_post('data'):array();
        $uid =$this->input->get_post('uid')?$this->input->get_post('uid'):0;
        $eid =$this->input->get_post('eid')?$this->input->get_post('eid'):0;
        $data_arr=array();

        if(!$uid){
            $info = array(
                'status' => 0,
                'msg' => '没有登录！',
            );
            exit(json_encode($info));
        }

        if(empty($content)){
            $info = array(
                'status' => 0,
                'msg' => '数据错误！',
            );
            exit(json_encode($info));
        }

        foreach($content as $v){
            if(!$v['id']){
                continue;
            }
            if($v['type']==EXAM_SINGLE){
                $v['exam']=$this->getExam($v['id']);
                $data_arr['single'][]=$v;
            }
            if($v['type']==EXAM_JUDGE){
                $v['exam']=$this->getExam($v['id']);
                $data_arr['judge'][]=$v;
            }
            if($v['type']==EXAM_MORE){
                $v['exam']=$this->getExam($v['id']);
                $data_arr['more'][]=$v;
            }
        }
        $insert['use_dec_v']=serialize($data_arr);
        $insert['exam_id']=$eid;
        $insert['user_id']=$uid;

        $id=$this->member_exam_model->insert($insert,true);
        if($id){
            $info = array(
                'status' => 1,
                'msg' => '交卷成功！',
            );
        }else{
            $info = array(
                'status' => 0,
                'msg' => '交卷超时,请重试！',
            );
        }

        exit(json_encode($info));
    }
    /**
     * 转化数据
     * @param array $data
     * @return array
     */
    protected function turnTo($data=array()){
        if(empty($data)){
            return $data;
        }
        foreach($data as $k => $v){
            if(!$v['answer']){
                continue;
            }
            $data[$k]['answer']=unserialize($v['answer']);
        }
        return $data;
    }

    /**
     * 根据id获取问题信息
     * @param int $id
     * @return array
     */
    protected function getExam($id){
        if(!$id){
            return array();
        }
        $where['dele_status']=NO_DELETE_STATUS;
        $where['id']=$id;

        $res=$this->exam_stem_model->get_one('*',$where);
        $res['answer']=unserialize($res['answer']);
        return $res;
    }
}
