<?php
/**
 * 天使轮调查信息列表
 * Created by PhpStorm.
 * User: Steven.Robin.Shen 
 * Date: 2015/07/22
 * Time: 15:31
 */

class Angel_Investigation_Info extends MY_Controller{
    private $where; //where条件
    private $perpage=10; //每页条数

    public function __construct(){
        parent::__construct();
        //$this->load->model('admin_user_model');
        //$this->load->model('role_info_model');
        //$this->load->model('bind_next_model');
        $this->load->model('angel_round_model');
        $this->load->model('sk_cate_model');
        $this->page=$this->input->get('page')>=1?$this->input->get('page'):1;
        $this->where = 'dele_status =1';  //0,删除 1,有效 

    }

    /**
     * 天使轮调查信息 
     */
    public function init(){

        //$this->where = 'login_role_id ='.SALE_PERSONAL;
        if(isset($_POST['search'])){
                $s_name = $this->input->get_post('s_name')?trim($this->input->get_post('s_name')):'';//公司名称
                $s_user_name = $this->input->get_post('s_user_name')?trim($this->input->get_post('s_user_name')):''; //联系人
                /**
                $s_ent_character = $this->input->get_post('s_ent_character')?trim($this->input->get_post('s_ent_character')):0; //企业性质
                $s_is_financing = $this->input->get_post('s_is_financing')?trim($this->input->get_post('s_is_financing')):0; //融资需求
                $s_status = $this->input->get_post('s_status')?trim($this->input->get_post('s_status')):0; //公司状态: 冻结/解冻
                **/

                if(!empty($s_name)){ //公司名称
                    $this->where.=" and name like '%".$s_name."%'"; 
                }
                if(!empty($s_user_name)){ //联系人
                    $this->where.=" and user_name like '%".$s_user_name."%'"; 
                }
                /**
                //echo $s_ent_character;exit;
                if(intval($s_ent_character) != -1){ //企业性质
                    $this->where.=' and ent_character='.$s_ent_character; 
                }
                if(intval($s_is_financing) != -1){ //融资需求
                    $this->where.=' and is_financing='.$s_is_financing; 
                }
                if(intval($s_status) != -1){ //公司状态 冻结/解冻
                    $this->where.=' and status='.$s_status; 
                }
                **/
        }
        //echo $this->where;exit; 
        $order = 'dele_status desc,id desc'; //根据需求: 冻结的公司往后放。
        $result=$this->angel_round_model->list_info('*',$this->where,$this->page,$this->perpage,$order);
        //print_r($result);exit;
        foreach($result as $k=>$v){

        }

        $data['data']=$result;
        $data['s_name'] = $s_name;
        $data['s_user_name'] = $s_user_name;
        //$data['s_ent_character'] = $s_ent_character;
        //$data['s_is_financing'] = $s_is_financing;
        //$data['s_status'] = $s_status;

        $data['pages']=pages($this->angel_round_model->getCount($this->where),$this->page,$this->perpage);

        //echo '<pre>';
        //print_r($data);exit;
        $this->rendering_admin_template($data,'angel_round','list');
    }

    /*************************************
    ** @ 查看详细信息
    ** @ Steven.Robin.Shen shenys@kangm.cn
    ** @ date 15/07/22
    **************************************/
    public function  show(){
        $data = array();
        $id = $this->input->get_post('id');
        if($id){
                $r = $this->angel_round_model->get_one('*','id ='.$id);
                if($r){
                    $data['infos'] = $r;
                }else{
                    echo '查询结果 空！';
                }
        
        }else{
            echo '参数错误！'; 
        }
        $this->rendering_admin_template($data,'angel_round','show');
    }

    /**************************************************************
    ** @ function 冻结 解冻 
    ** @ Steven.Robin.Shen shenys@kangm.cn
    ** @ date 15/07/16
    ***************************************************************/
    public function ajax_isdel(){
        //echo '冻结/解冻'; 
        $ids = $this->input->get_post('id')?$this->input->get_post('id'):0;
        $status = $this->input->get_post('status')?$this->input->get_post('status'):0;
        if($ids && $status){
            $param = array(
                'status' => $status,        
            );
            //print_r($param);exit;
            $r = $this->angel_round_model->update($param,'id in('.$ids.')');
            if($r){
                    $return = array(
                        'status' => 1,
                        'msg' =>'更新成功！', 
                        'data' => $ids,
                    ); 
            
            }else{
                    $return = array(
                        'status' => 0,
                        'msg' =>'更新失败！', 
                        'data' => $ids,
                    ); 
            }
        }else{
            $return = array(
                'status' => 0,
                'msg' =>'参数错误!', 
                'data' => '',
            ); 
        }
        echo json_encode($return);
    } 

}
