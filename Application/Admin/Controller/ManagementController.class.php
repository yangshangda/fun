<?php
namespace Admin\Controller;
use Think\Controller;
//属性控制器
class ManagementController extends CommonController {
	public function index(){

		$admin_table = M('fun_admin');
		$where['adminRecycle'] = '0';
		$count      = $admin_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$info = $admin_table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		
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

	//进入回收站
	public function recycle(){
		$where['adminId'] = I('id');
		$data['adminRecycle'] = '1';
		$admin_table = M('fun_admin');
		$admin_password_reset = $admin_table->where($where)->limit(1)->save($data);die;
	}

	//还原
	public function recover(){
		$where['adminId'] = I('id');
		$data['adminRecycle'] = '0';
		$admin_table = M('fun_admin');
		$admin_password_reset = $admin_table->where($where)->limit(1)->save($data);die;
	}

	public function recycleList(){

		$admin_table = M('fun_admin');
		$where['adminRecycle'] = '1';
		$count      = $admin_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$info = $admin_table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->info = $info;
		$this->count = $count;
		$this->display();

	}

}