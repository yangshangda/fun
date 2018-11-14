<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends Controller{

	public function index(){
		$fun_user_table = M('fun_user');
		$userList = $fun_user_table->where()->select();
		$count=count($userList);
		
		$this->count = $count;
		$this->info = $userList;
		$this->display();
	}

}