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
		//$data = I('post.');
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
		$data['adminCreateTime'] = date("Y-m-d h:i:s");
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
		$admin_edit = $admin_table->where($where)->limit(1)->save($data);die;

	}

//重置员工密码
	public function resetPassword(){
		$where['adminId'] = I('adminId');
		$data['adminPassword'] = md5('123456');
		$admin_table = M('fun_admin');
		$admin_password_reset = $admin_table->where($where)->limit(1)->save($data);die;
	}

//修改密码
	public function alterPassword(){
		$admin_table = M('fun_admin');
		$where['adminId'] = I('adminId');
		$data = md5(I('oldPwd'));
		$oldPwd = $admin_table->where($where)->limit(1)->getField('adminPassword');
		if(!($data == $oldPwd)) {
			echo '-1';die;
		}
		$data1['adminPassword'] = md5(I('newPwd'));
		$admin_password_alter = $admin_table->where($where)->limit(1)->save($data1);die;
	}

}