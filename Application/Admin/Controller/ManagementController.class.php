<?php
namespace Admin\Controller;
use Think\Controller;
//属性控制器
class ManagementController extends CommonController {
	public function index(){

		$admin_table = M('fun_admin');
		$info = $admin_table->where()->select();
		$count = count($info);
		
		$this->info = $info;
		$this->count = $count;
		$this->display();

	}

//添加管理员
	public function addManagement(){
		//$data = I('post');
		$data['adminName'] = I('adminName');
		$data['adminSex'] = I('sex');
		$data['adminPhone'] = I('phone');
		$data['adminAddress'] = I('address');
		$data['adminDepartment'] = I('department');
		$data['adminQQ'] = I('qq');
		$data['adminWeChat'] = I('weChat');
		$data['adminEmail'] = I('email');
		$data['adminState'] = I('state');
		$data['adminDescription'] = I('textarea');
		$admin_table = M('fun_admin');
		$admin_add = $admin_table->where()->add($data);die;
		//var_dump($data);

	}

//修改管理员信息
	public function editManagement(){
		$where['adminId'] = I('adminId');
		$data['adminName'] = I('adminName');
		$data['adminSex'] = I('sex');
		$data['adminPhone'] = I('phone');
		$data['adminAddress'] = I('address');
		$data['adminDepartment'] = I('department');
		$data['adminQQ'] = I('qq');
		$data['adminWeChat'] = I('weChat');
		$data['adminEmail'] = I('email');
		$data['adminState'] = I('state');
		$data['adminDescription'] = I('textarea');
		$admin_table = M('fun_admin');
		$admin_add = $admin_table->where($where)->limit(1)->save($data);die;

	}

//重置员工密码
	public function resetPassword(){
		$where['adminId'] = I('adminId');
		$data['adminPassword'] = md5('123456');
		$admin_table = M('fun_admin');
		$admin_add = $admin_table->where($where)->limit(1)->save($data);die;
	}

}