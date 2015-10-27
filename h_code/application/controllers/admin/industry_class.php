<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/******************************************************************************
** @Name : platform_class 
** @use  : MY_Controller
** @version : 1.0
** @author  : shenys@kangm.cn
** @desc    : 行业分类管理 _暂停 /寇总 曹鑫 沈云升  15/07/16沟通
** @date    : 2015-07-16 PM;
******************************************************************************/
class industry_class extends MY_Controller
{
	/**************************************************************************
	** @Name : __construct
	** @desc : access public
	** @reutrn : void;
	**************************************************************************/
	public function __construct() {
		parent::__construct();
		//$lang_filename = "course_cate";				// 语言包文件名；
		//$this->load_lang_file($lang_filename);	// 加载语言包文件；
		$this->backend_header_data['top_nav_current'] = '';//头部菜单默认选中状态值
        $this->backend_header_data['title'] = '圣康在线-后台-行业分类' ;//页面title
		$this->backend_left_data['left_nav_son'] = 'platform_class_index' ;//左侧菜单子菜单默认选中状态
		$this->is_use_cache = IS_USE_CACHE_NO; // 是否使用缓存
		$tag_tree_params["model_name"] = "yidu_platform_class_model";
		$tag_tree_params["is_cache"] = $this->is_use_cache;
		$tag_tree_params["org_id"] = $this->org_id;
		$this->load->library('Tag_tree',$tag_tree_params);
	}
	
	/**************************************************************************
	** @Name : index
	** @author : Steven.Robin.Shen shenys@yduedu.com
	** @desc   : 医度平台分类管理列表页
	** @date   : 2014-12-16 AM;
	** @reutrn : array();
	**************************************************************************/
	public function index() {

		$curr_id = 0;
		$this->tag_tree->setParamParentId($curr_id);
		$data_list = $this->tag_tree->getNextChildList();
		
		$view_data["data"]["view"] = $data_list; // 显示数据 
		$this->rendering_template($view_data, 'platform_manager', 'platform_class'); // 渲染模板
	}
	
	
	
	/**************************************************************************
	** @Name : ajax_add
	** @author : tuzhanpeng@yduedu.com
	** @desc   : 添加课程分类方法
	** @date   : 2013-09-04 PM;
	** @reutrn : array();
	**************************************************************************/
	public function ajax_add() {

		$name = $_POST["name"];
		//$parent_id = $_POST['pid'];

		$note_all_id = $_POST['pid'];

		$list_str = explode("-",$note_all_id);
		$key_val = count($list_str)-1;
		$parent_id = $list_str[$key_val];	
		if (!$parent_id) {
			$ret["status"] = -1;
			sendJsonData($ret);
		}
		// 设置分类名称
		$this->tag_tree->setCateName($name);
		// 设置父级id
		$this->tag_tree->setParentId($parent_id);
		// 设置创建者 id
		$this->tag_tree->setCreateBy($this->mid);
		$ret = $this->tag_tree->add();


		$str_kongge = $this->getSpaceStr($note_all_id);
		$count_list_len = $this->getSpaceCount($note_all_id);
		$count_list_len = $count_list_len ;
		$show_left_px = 12 * $count_list_len;
		$note_all_id_val = $note_all_id."-".$ret["id"]; 
		$str_list .= "<tr parent=\"node-".$note_all_id."-\" id=\"node-".$note_all_id_val."-\" style=\"display: table-row;\">";
		$str_list .= "<td align=\"left\">";
		$str_list .= "	<span style=\"cursor: pointer;background-position:".$show_left_px."px center; \" onclick=\"show_hide('".$ret["id"]."','".$note_all_id_val."');\" class=\"addico\" >".$str_kongge."<b>L</b><label id=\"show_name_".$note_all_id_val."\">".trim($name)."</label></span>";
		$str_list .= "</td>";
		$str_list .= "<td align=\"center\">";
		//$str_list .= "	<span><a href=\"javascript:add(".$val["id"].")\" class=\"corblue\">添加子类</a></span>";
		$str_list .= "	<span>";
		$str_list .= '<a class="corblue" href="javascript:add(\''.$note_all_id_val.'\')">添加子类</a>';
		$str_list .= "	</span>";
		$str_list .= "</td>";
		$str_list .= "<td align=\"center\">";
		$str_list .= "	<span onclick=\"move_up('node-".$note_all_id_val."-');\" class=\"topico\">移动</span>";
		$str_list .= "</td>";
		$str_list .= "<td align=\"center\">";
		$str_list .= "	<span onclick=\"move_down('node-".$note_all_id_val."-');\" class=\"botico\">下移</span>";
		$str_list .= "</td>";
		$str_list .= "<td align=\"center\">";
		$str_list .= "	<span><a href=\"javascript:edit('".$note_all_id_val."')\" class=\"corblue marr5\">改名</a><a href=\"javascript:del('".$note_all_id_val."')\" class=\"corblue\">删除</a></span>";
		$str_list .= "</td>";
		$str_list .= "</tr>".chr(13);

		$ret['show_list'] = $str_list;
		$ret['note_all_id'] = $note_all_id;
		sendJsonData($ret);

	}
	
	/**************************************************************************
	** @Name : edit
	** @author : tuzhanpeng@yduedu.com
	** @desc   : 修改课程分类方法
	** @date   : 2013-09-04 PM;
	** @reutrn : array();
	**************************************************************************/
	public function ajax_edit() {

		//$id = intval($_POST["id"]);
		$name = isset($_POST["name"]) ? $_POST["name"] : '';

		$note_all_id = trim($_POST['id']);

		$list_str = explode("-",$note_all_id);
		$key_val = count($list_str)-1;
		$id = $list_str[$key_val];	
		if (!$parent_id) {
			//$ret["status"] = -1;
			//sendJsonData($ret);
		}
		// 设置id
		$this->tag_tree->setId($id);
		// 设置分类名称
		$this->tag_tree->setCateName($name);
		// 设置修改者 id
		$this->tag_tree->setModifyBy($this->mid);

		$ret = $this->tag_tree->update();

		$ret['note_all_id'] = $note_all_id;
		$ret['show_name'] = trim($name);
		sendJsonData($ret);

	}
	
	/**************************************************************************
	** @Name : ajax_del
	** @author : tuzhanpeng@yduedu.com
	** @desc   : 删除课程分类方法
	** @date   : 2013-09-05 PM;
	** @reutrn : array();
	**************************************************************************/
	public function ajax_del() {
		//$id = intval($_POST["id"]);
		$name = $_POST["name"];

		$note_all_id = $_POST['id'];
		$list_str = explode("-",$note_all_id);
		$key_val = count($list_str)-1;
		$id = $list_str[$key_val];	
		
		if (!$id) {
			$ret["status"] = -1;
			sendJsonData($ret);
		}
		// 设置id
		$this->tag_tree->setId($id);
		// 设置分类名称
		$this->tag_tree->setCateName($name);
		// 设置修改者 id
		$this->tag_tree->setModifyBy($this->mid);
		$ret = $this->tag_tree->delete();
		$ret['note_all_id'] = $note_all_id;
		sendJsonData($ret);
	}
	
	/**************************************************************************
	** @Name : ajax_set_order
	** @author : tuzhanpeng@yduedu.com
	** @desc   : 修改课程分类排序的方法
	** @date   : 2013-09-07 PM;
	** @reutrn : json array();
	**************************************************************************/
	public function ajax_set_order() {
		$curr_id = $_POST["curr_id"];
		$update_id = $_POST["update_id"];
		// 排序功能 设置当前id
		$this->tag_tree->setParamCurrtId($curr_id);
		// 排序功能 设置修改id
		$this->tag_tree->setParamUpdateId($update_id);
		// 设置修改者 id
		$this->tag_tree->setModifyBy($this->mid);
		$ret = $this->tag_tree->setOrder();
		sendJsonData($ret);

	}

	public function ajaxShowList() {
		$parent_id = intval($_POST["parent_id"]);
		$note_all_id = $_POST["note_all_id"];
		$this->tag_tree->setParamParentId($parent_id);
		$data_list = $this->tag_tree->getNextChildList();
		$data_list = is_array($data_list) ? $data_list : array();
		$str_list = '';
		$str_kongge = $this->getSpaceStr($note_all_id);

		$count_list_len = $this->getSpaceCount($note_all_id);


		foreach($data_list as $val){
			
				$show_left_px = 12 * $count_list_len;
				$note_all_id_val = $note_all_id."-".$val["id"]; 
				$str_list .= "<tr parent=\"node-".$note_all_id."-\" id=\"node-".$note_all_id_val."-\" style=\"display: table-row;\">";
					$str_list .= "<td align=\"left\">";
					$str_list .= "	<span style=\"cursor: pointer;background-position:".$show_left_px."px center; \" onclick=\"show_hide('".$val["id"]."','".$note_all_id_val."');\" class=\"addico\" >".$str_kongge."<b>L</b><label id=\"show_name_".$note_all_id_val."\">".$val["cate_name"]."</label></span>";
					$str_list .= "</td>";
					$str_list .= "<td align=\"center\">";
					//$str_list .= "	<span><a href=\"javascript:add(".$val["id"].")\" class=\"corblue\">添加子类</a></span>";
					$str_list .= "	<span>";


					$str_list .= '<a class="corblue" href="javascript:add(\''.$note_all_id_val.'\')">添加子类</a>';
					$str_list .= "	</span>";
					$str_list .= "</td>";
					$str_list .= "<td align=\"center\">";
					$str_list .= "	<span onclick=\"move_up('node-".$note_all_id_val."-');\" class=\"topico\">移动</span>";
					$str_list .= "</td>";
					$str_list .= "<td align=\"center\">";
					$str_list .= "	<span onclick=\"move_down('node-".$note_all_id_val."-');\" class=\"botico\">下移</span>";
					$str_list .= "</td>";
					$str_list .= "<td align=\"center\">";
					$str_list .= "	<span><a href=\"javascript:edit('".$note_all_id_val."')\" class=\"corblue marr5\">改名</a><a href=\"javascript:del('".$note_all_id_val."')\" class=\"corblue\">删除</a></span>";
					$str_list .= "</td>";
				    $str_list .= "</tr>".chr(13);
		}
		$ret["status"] = 1;
		$ret["note_all_id"] = $note_all_id;
		$ret["data_list"] = $str_list;
		sendJsonData($ret);
	}

	private function  getSpaceStr($ret) {
		$return_value = "";
		$leve_dept = $this->getSpaceCount($ret) ;	
		for($i = 1; $i <= $leve_dept; $i++) {
			$return_value .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		return $return_value;
	}


	private function  getSpaceCount($ret) {
		$return_value = "";
		$list_str = explode("-",$ret);
		$leve_dept = count($list_str);	
		return $leve_dept;
	}

    /********************
    ** @添加顶级分类
    ** @date 14/12/16
    ** @Steven.Robin.Shen shenys@yduedu.com
    ********************/
    public function ajax_top_add(){
        $top_name = isset($_POST['name'])?$_POST['name']:0; 
        if($top_name){
                // 设置分类名称
                $this->tag_tree->setCateName($top_name);
                // 设置父级id
                $this->tag_tree->setParentId(0);
                // 设置创建者 id
                $this->tag_tree->setCreateBy($this->mid);
                $ret = $this->tag_tree->add();
                if(3 == $ret['status']){
                        $return = array(
                            'status' => 3,
                            'msg' => '添加成功！',
                            'data' => '',
                        );
                }else{
                        $return = array(
                            'status' => 0,
                            'msg' => '添加失败！',
                            'data' => '',
                        );
                }
        }else{
        
                $return = array(
                    'status' => 0,
                    'msg' => '添加失败！',
                    'data' => '',
                );
        }

        echo json_encode($return);
    }
	
}
?>
