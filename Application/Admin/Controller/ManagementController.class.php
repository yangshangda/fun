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
		$data['adminDescription'] = I('department');
		$admin_table = M('fun_admin');
		$admin_add = $admin_table->where()->add($data);die;
		//var_dump($data);

	}

	public function editManagement(){
		$data= $_POST['id'];
		//var_dump($data);die;

		$where['adminId'] = I('id');
		$admin_table = M('fun_admin');
		$admin_info = $admin_table->where($where)->select();
		//var_dump($admin_info);die;
		 // $this->ajaxReturn($data);
		$this -> assign('info',$data);
		$this->display('edit-management');

	}

}