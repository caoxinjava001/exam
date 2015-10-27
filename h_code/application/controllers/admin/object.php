<?php
/**
 * Created by PhpStorm.
 * User: YJ
 * Date: 2015/6/10
 * Time: 9:34
 */

class Object extends MY_Controller {
    private $where; //where条件
    private $perpage=10; //每页条数
    private $role_id;   //用户登录角色id
    private $data=array();      //数据容器
    private $type=0;  //企业类型
    private $market; //市值管理用户角色
    private $invest; //投资管理用户角色

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_user_model');
        $this->load->model('bind_next_model');
        $this->load->model('role_info_model');
        $this->load->model('user_model');
        $this->load->model('ent_audit_log_model');
        $this->load->model('manage_ent_info_model');
        $this->load->model('super_get_model');
        $this->load->model('ent_sort_model');

        $this->page=$this->input->get('page')>=1?$this->input->get('page'):0;
        $this->where.='id > 0 ';
        $this->role_id=$this->member_info['role_id'];

        if($this->role_id==ROLE_EIGHT){
            redirect(MAIN_PATH.'/market/index');
        }
        $this->market=array(ROLE_NINE,ROLE_SIX,ROLE_SEVEN);
        $this->invest=array(ROLE_FOUR,ROLE_FIVE,ROLE_SIX,ROLE_SEVEN);

    }

    //根据角色选择控制器
	public function actionList() {
        $this->type=INVEST; //投资
        //超级管理员
        if($this->mid==1){
            $this->index();
        }
        switch ($this->role_id) {
            case ROLE_FOUR:
                $this->index();
                break;
            case ROLE_FIVE:
                $this->index();
                break;
            case ROLE_SIX:
                $this->index();
                break;
            case ROLE_SEVEN:
                $this->index();
                break;
            case ROLE_EIGHT:
                $this->index();
                break;
            case ROLE_NINE:
                $this->index();
                break;
        }
	}
    //根据角色选择控制器
    public function marketList() {
        $this->type=MARKET; //市值
        //超级管理员
        if($this->mid==1){
            $this->index();
        }
        switch ($this->role_id) {
            case ROLE_FOUR:
                $this->index();
                break;
            case ROLE_FIVE:
                $this->index();
                break;
            case ROLE_SIX:
                $this->index();
                break;
            case ROLE_SEVEN:
                $this->index();
                break;
            case ROLE_EIGHT:
                $this->index();
                break;
            case ROLE_NINE:
                $this->index();
                break;
        }
    }
    /**
     * 投资总监第二轮审核（尽调后）
     */
    protected function index(){
        //获取查询条件
        $org_name=$this->input->get('org_name');    //企业名
        $bus_name=$this->input->get('bus_name');    //业务员名
        $truth=$this->input->get('truth');      //可信度
        $level=$this->input->get('level');      //审核等级
        $not_read_ids=$this->getNewList();      //企业id
        $type=$this->type?$this->type:INVEST;    //企业类型

        //拼装where条件
        if(!empty($not_read_ids)){
            $id_str=implode(',',$not_read_ids);
            $this->where='id in ('.$id_str.')';
            $order_by=' find_in_set(id,\''.$id_str.'\')';
        }

        $this->where.=$org_name?' and org_name like \'%'.$org_name.'%\'':'';
        if($bus_name){
            //获取匹配的业务员ID
            $ids=$this->getServiceIds($bus_name);
            $this->where.=' and service_id in ('.$ids.')';
        }
        $this->where.=$level?' and role_id ='.$level:'';

        //不是内勤只显示正常状态的企业
        if($this->role_id!=ROLE_FOUR){
            $this->where.=' and kx_status ='.TRUTH_NORMAL;
        }else{
            $this->where.=$truth?' and kx_status ='.$truth:'';
        }
        //企业类型
        if($type>0){
            $this->where.=" and control_type={$type}";
        }

        //获取待审企业数据
        $sql='select * ';
        $sql.=' from yt_user ';
        $sql.=' where '.$this->where;
        $sql.=$order_by?' order by '.$order_by:' order by id desc ';
        $sql.=' limit '.$this->page.','.$this->perpage;
//        $result=$this->user_model->list_info('*',$this->where,$this->page,$this->perpage);
        $result=$this->user_model->get_execute($sql);

        //获取其他信息
        foreach($result as $k=>$v){
            //获取业务员姓名和编码
            $service=$this->admin_user_model->getIntro($v['service_id']);
            $result[$k]['intro_name']=$service['name'];
            $result[$k]['service_code']=$service['service_code'];
            //获取审核状态
            $result[$k]['audit_status']=$this->getAuditStatus($v['role_id'],$v['zy_status']);
            //获取是否有未读消息
            $result[$k]['is_read']=$this->manage_ent_info_model->isRead($v['id'],$this->mid);
            //获取尽调审核
            $result[$k]['audit_had']=$this->getAuditLevelName($v['role_id']);
        }

        $this->data['data']=$result;
        $this->data['role']=$this->role_id;
        $this->data['org_name']=$org_name;
        $this->data['bus_name']=$bus_name;
        $this->data['truth']=$truth;
        $this->data['level']=$level;
        $this->data['is_next']=$this->role_id;
        $this->data['type']=$type;
        $this->data['pages']=pages($this->user_model->getCount($this->where),$this->page,$this->perpage);

        $this->rendering_admin_template($this->data,'object','obj_audit');
    }

    /**
     * 详情页
     */
    public function detail(){
        //判断是否是投资公司的人
        if(!in_array($this->role_id,$this->invest)&&!in_array($this->role_id,$this->market)){
            $this->alert();
        }
        //企业详情ID
        $id=$this->uri->segment(3);
        //类型
        $type=$this->uri->segment(4)?$this->uri->segment(4):1;

        //获取企业信息
        $res=$this->user_model->get_one('*',array( 'id'=>$id,'control_type'=>$type));
        if(!empty($res)) {
            //标记此条信息为已读
            $this->manage_ent_info_model->hasRead($id, $this->mid);
            //获取行业名称
            $in_name = $this->ent_sort_model->get_one('name', array('id' => $res['industry_id']));
            $res['industry_name'] = $in_name['name'] ? $in_name['name'] : '其他';
            //获取尽调状态
            $res['audit_status'] = $this->getAuditStatus($res['role_id'], $res['zy_status']);
            //获取尽调审核状态
            $res['audit_had'] = $this->getAuditLevelName($res['role_id']);
            //登录用户自己的角色ID
            $res['my_role_id'] = $this->role_id;
            //获取所有反馈信息
            $log = $this->ent_audit_log_model->select('*', array('dele_status' => NO_DELETE_STATUS, 'ent_id' => $id));
            foreach ($log as $k => $v) {
                if (empty($v)) {
                    continue;
                }
                $log[$k]['cw_status'] = $v['cw_status'] ? '财务' : '';
                $log[$k]['zw_status'] = $v['zw_status'] ? '政务' : '';
                $log[$k]['fw_status'] = $v['fw_status'] ? '法务' : '';
                //角色名称
                $role_name = $this->role_info_model->get_one('name as role_name', array('id' => $v['role_id']));
                $log[$k]['role_name'] = $role_name['role_name'];
                //管理员名称
                $manage_name = $this->admin_user_model->get_one('name as manage_name', array('id' => $v['manage_id']));
                $log[$k]['manage_name'] = $manage_name['manage_name'];
            }
            $res['logs'] = $log;
            //获取近三年财务状况
            $res['cw_info'][] = unserialize($res['one_other_info']);
            $res['cw_info'][] = unserialize($res['two_other_info']);
            $res['cw_info'][] = unserialize($res['three_other_info']);
        }
        $this->data=$res;
        if($type==MARKET){
            $this->rendering_admin_template($this->data,'object','mar_detail');
        }else{
            $this->rendering_admin_template($this->data,'object','obj_detail');
        }
    }


    /**
     * 获取匹配的业务员的ID
     * @param $bus_name
     * @return string
     */
    private function getServiceIds($bus_name){
        $where='name like \'%'.$bus_name.'%\'';
        $res=$this->admin_user_model->select('id',$where);
        $arr=array();
        foreach($res as $v){
            $arr[]=$v['id'];
        }
        $ids=implode(',',$arr);
        $ids=$ids?$ids:0;
        return $ids;
    }
    /**
     * 获取审核状态
     * @param $role_id
     * @param $status
     * @return string
     */
    private function getAuditStatus($role_id,$status){
        if($status==VER_IN_AUDIT && $role_id==0) {
           return '启动初调';
        }
        if($status==VER_HAD_AUDIT && $role_id>0) {
            return '初调通过';
        }
        if($status==VER_NOT_AUDIT && $role_id>0) {
            return '初调未通过';
        }
    }

    /**
     * 获取审核等级名称
     * @param $role_id
     * @return string
     */
    private function getAuditLevelName($role_id){
        switch($role_id){
            case ROLE_FOUR:
                return '一级审核';
                break;
            case ROLE_FIVE:
                return '二级审核';
                break;
            case ROLE_SIX:
                return '三级审核';
                break;
            case ROLE_SEVEN:
                return '四级审核';
                break;
            case ROLE_EIGHT:
                return '一级审核';
                break;
            case ROLE_NINE:
                return '二级审核';
                break;
            default:
                return '';
        }
    }

    /**
     * 获取未读信息
     * @return array
     */
    private function getNewList(){
        $where=array(
            'manage_id'=>$this->mid,
        );
        //创建时间倒序获取未读企业ID
        $ids=$this->manage_ent_info_model->select_limit('*',$where,'','status asc,create_time asc');
        //过滤多余ID
        $id_box=array();
        foreach($ids as $v){
            if(in_array($v['ent_id'],$id_box)){ continue;}
            $id_box[]=$v['ent_id'];
        }
        return $id_box;
    }
    
    /**
     * 修改可信度
     */
    public function ajaxKx(){
        $id=$this->input->get_post('id');
        $status=$this->input->get_post('kx_status');
        $info=$status>TRUTH_NORMAL?$this->input->get_post('kx_info'):'';

        $up_data=array(
            'kx_status'=>$status,
            'kx_info'=>$info,
        );
        $bool=$this->user_model->update($up_data,array('id'=>$id));

        if($bool){
            $data=array(
                'msg'=>'修改成功！',
                'status'=>1
            );
            exit(json_encode($data));
        }else{
            $data=array(
                'msg'=>'修改失败！',
                'status'=>0
            );
            exit(json_encode($data));
        }
    }
    /**
     * ajax处理审核
     */
    public function ajaxAudit(){
        $control_type=$this->input->get_post('control'); //类型
        $id=$this->input->get_post('ent_id');   //企业id
        $mark=$this->input->get_post('mark'); //备注
        $audit_type=$this->input->get_post('audit_type'); //处理类型

        $type1=$this->input->get_post('type1')?1:0;   //财务
        $type2=$this->input->get_post('type2')?1:0;   //政务
        $type3=$this->input->get_post('type3')?1:0;   //法务

        //内容审核
        if($audit_type==1||$audit_type==2){
            $status=$audit_type==1?VER_HAD_AUDIT:VER_NOT_AUDIT;//判断操作
            $up_data1=array(
                'ent_id'=>$id,
                'manage_id'=>$this->mid,
                'role_id'=>$this->role_id,
                'status'=>$status,
                'mark'=>$mark,
                'cw_status'=>$type1,
                'zw_status'=>$type2,
                'fw_status'=>$type3,
                'step_status'=>CONTENT_AUDIT,
                'control_type'=>$control_type,
            );
            //记录日志
            $bool=$this->ent_audit_log_model->insert($up_data1,true);
            //修改企业内容审核状态
            if($bool){
                $bool2=$this->user_model->update(array('nr_status'=>$status),array('id'=>$id));
            }
            //返回处理结果
            if($bool2){
                $data=array(
                    'status'=>1,
                    'msg'=>'内容审核成功',
                );
            }else{
                $data=array(
                    'status'=>0,
                    'msg'=>'内容审核失败',
                );
            }
            exit(json_encode($data));

        }

        //专业审核
        if($audit_type==3||$audit_type==4){
            $status=$audit_type==3?VER_HAD_AUDIT:VER_NOT_AUDIT;//判断操作
            $up_data2=array(
                'ent_id'=>$id,
                'manage_id'=>$this->mid,
                'role_id'=>$this->role_id,
                'status'=>$status,
                'mark'=>$mark,
                'cw_status'=>$type1,
                'zw_status'=>$type2,
                'fw_status'=>$type3,
                'step_status'=>PRO_AUDIT,
                'control_type'=>$control_type,
            );
            //记录日志
            $bool=$this->ent_audit_log_model->insert($up_data2,true);
            //修改企业内容审核状态
            if($bool){
                $next=$this->role_info_model->getRoleInfoByRoleId($this->role_id);
                $up_data3['zy_status']=$status;
                $up_data3['role_id']=$this->role_id;

                //审核不通过，不提交给下一步审核
                if($audit_type==4){
                    $up_data3['next_role_id']=$this->role_id==ROLE_SEVEN?$this->role_id:0;
                }else{
                    $up_data3['next_role_id']=$this->role_id==ROLE_SEVEN?$this->role_id:$next['p_id'];
                }

                if($this->role_id==ROLE_SEVEN ){
                    if($status==VER_HAD_AUDIT){
                        $up_data3['nr_status']=$status;
                    }
                    $up_data3['obj_status']=$status;
                }
                $bool2=$this->user_model->update($up_data3,array('id'=>$id));
            }
            //返回处理结果
            if($bool2){
                $data=array(
                    'status'=>1,
                    'msg'=>'专业审核成功',
                );
            }else{
                $data=array(
                    'status'=>0,
                    'msg'=>'专业审核失败',
                );
            }
            exit(json_encode($data));
        }
    }
    protected function alert(){
        $alert = "<div style=\"border:1px solid #ddd;width:300px;height:200px;position:absolute;top:50%;left:50%;margin-left:-150px;margin-top:-100px;background-color:#eee;\">";
        $alert .= "<div style=\"margin-left:30px;;margin-top:90px;\">";
        $alert .= "只有市值公司人员可以使用本功能！";
        $alert .= "<span id=\"desc\" style=\"color:red\">3</span>";
        $alert .= "</div>";
        $alert .= "</div>";
        $alert .= "<script type=\"text/javascript\">";
        $alert .= "function go(){";
        $alert .= "window.location.href='" . ADMIN_PATH . "';";
        $alert .= " }";
        $alert .= "function cha(){";
        $alert .= "var ss=parseInt(document.getElementById('desc').innerHTML);";
        $alert .= "if(ss>0){";
        $alert .= "var s=ss-1;";
        $alert .= "document.getElementById('desc').innerHTML =s;";
        $alert .= " }}";
        $alert .= "setInterval('cha()',1000);";
        $alert .= "setTimeout('go()',4000);";
        $alert .= "</script>";
        echo $alert;die;
    }

}
