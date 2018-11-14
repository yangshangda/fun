<?php
namespace Admin\Controller;
//后台控制器
class IndexController extends CommonController {
	//后台首页
	// 后台首页
	public function index() {
// 		$info = array (
// 				'操作系统' => PHP_OS,
// 				'运行环境' => $_SERVER ["SERVER_SOFTWARE"],
// 				'PHP运行方式' => php_sapi_name (),
// 				'ThinkPHP版本' => THINK_VERSION . ' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
// 				'上传附件限制' => ini_get ( 'upload_max_filesize' ),
// 				'执行时间限制' => ini_get ( 'max_execution_time' ) . '秒',
// 				'服务器时间' => date ( "Y年n月j日 H:i:s" ),
// 				'北京时间' => gmdate ( "Y年n月j日 H:i:s", time () + 8 * 3600 ),
// 				'服务器域名/IP' => $_SERVER ['SERVER_NAME'] . ' [ ' . gethostbyname ( $_SERVER ['SERVER_NAME'] ) . ' ]',
// 				'剩余空间' => round ( (disk_free_space ( "." ) / (1024 * 1024)), 2 ) . 'M',
// 		);
// 		$this->assign ( 'info', $info );
		$sys_info['os']=PHP_OS;//操作系统
		$sys_info['web_server']=$_SERVER['SERVER_SOFTWARE'];//运行环境
		$sys_info['way']=php_sapi_name();//php运行方式
		$sys_info['version']=THINK_VERSION;//tp版本
		$sys_info['phpv']=phpversion();//php版本
		$model=new \Think\Model();
		$mysqlinfo=$model->query("select VERSION() as version");
		$sys_info['mysqlv']  = $mysqlinfo[0]['version'];//mysql版本
		$sys_info['fileupload']=ini_get ( 'upload_max_filesize' );//文件上传限制
		$sys_info['max_ex_time']= ini_get ( 'max_execution_time' ) . '秒';//执行时间限制
		$sys_info['time']= gmdate ( "Y年n月j日 H:i:s", time () + 8 * 3600 );//北京时间
		$sys_info['ip']= $_SERVER ['SERVER_NAME'] . ' [ ' . gethostbyname ( $_SERVER ['SERVER_NAME'] ) . ' ]';//服务器域名/IP
		$sys_info['memory_limit']=ini_get('memory_limit');//最大内存
		$sys_info['memory_remain']=round ( (disk_free_space ( "." ) / (1024 * 1024)), 2 ) . 'M';//剩余空间
		$this->assign ( 'sys_info', $sys_info );
		$this->display ();
	}
}
