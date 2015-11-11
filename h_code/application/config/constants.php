<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('WF_PATH','www.exam.test ');//金衡网地址
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*********域名常量start************/
define('MAIN_PATH',        'http://www.exam.test');
define('STATICS_PATH', 		'http://www.exam.test/statics/main');	//静态页面系统地址
define('MAIN_H_PATH', 		'http://'.$_SERVER['HTTP_HOST']);//分中心网地址
define('ADMIN_PATH',        'http://www.exam.test');	//社区接口
define('PIC_PATH',        'http://www.exam.test');	//图片路径
//define('HOME_PATH',         'http://home.yduedu.com/');		//社区接口
//define('NEWS_PATH',         'http://news.yduedu.com');		//金衡网新闻中心地址
//define('WWW_IMG_PATH',      STATICS_PATH.'/yidu_web3.0/images/');
/*********域名常量end************/

/**********JS CSS IMG地址 start***************/
define('STATICS_PATH_JS',	STATICS_PATH.'/js');      // 公用JS目录
define('STATICS_PATH_CSS',	STATICS_PATH.'/css');     // 公用CSS目录
define('STATICS_PATH_IMG',	STATICS_PATH.'/images');  // 公用images目录

define('STATICS_PATH_BACKEND_JS',	STATICS_PATH.'/backend/js');      // 后台JS目录
define('STATICS_PATH_BACKEND_CSS',	STATICS_PATH.'/backend/css');     // 后台CSS目录
define('STATICS_PATH_BACKEND_IMG',	STATICS_PATH.'/backend/images');  // 后台images目录

define('STATICS_PATH_FRONTEND_JS',	STATICS_PATH.'/frontend/js');     // 前台JS目录
define('STATICS_PATH_FRONTEND_CSS',	STATICS_PATH.'/frontend/css');    // 前台CSS目录
define('STATICS_PATH_FRONTEND_IMG',	STATICS_PATH.'/frontend/images'); // 前台images目录

//define('API_ADD_COLLECT',           API_PATH . '/collect/addCollect'); //API添加收藏接口地址
/**********JS CSS IMG地址 end***************/


/*******全局 状态 start************/
define('DELETE_STATUS', 0);// 删除状态
define('NO_DELETE_STATUS', 1);// 未删除状态
define('CURRENT_PAGE_NUM_OF_PARAM', 3);// 页码在参数中的位置
define('YDU_LOCKED_KEYS',  "YduEDu.com@))$"); // 公共密匙
/*******全局状态 end************/

define('SYS_TIME',time()); 

/*******上传 状态 end************/
define('UPLOAD_TYPE_PIC',      1);   // 图片
define('FLASH_TYPE_FROM_YDU', 2); //  来源于医度
define('PIC_TYPE_VAL',"*.gif;*.gif;*.jpeg;*.jpg;*.png"); // 允许上传的图片格式


/*******用户信息 start************/
define('MANGER_ROLE_INFO',	1);//管理员
define('THIRD_ROLE_INFO',		2);//代理商




?>
