<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends Controller{

	public function index(){
		$fun_user_table = M('fun_user');
		$count      = $fun_user_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$userList = $fun_user_table->where()->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->count = $count;
		$this->info = $userList;
		$this->display();
	}

}