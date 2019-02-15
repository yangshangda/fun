<?php
namespace Home\Controller;
class UserController extends CommonController {

	//获取用户信息
	public function userInfo() {
		$userOpenId  = I('userOpenId');
		$fun_user_table = M('fun_user');
		$where['userOpinId'] = $userOpenId;
		$user_info = $fun_user_table->where($where)->select();
		exit(json_encode(array_values($user_info)));
	}

}