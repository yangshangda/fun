<?php
namespace Home\Controller;
class UserController extends CommonController {

	//获取用户信息
	public function userInfo() {
		$userOpenId  = I('userOpenId');
		$fun_user_table = M('fun_user');
		$where['userOpenId'] = $userOpenId;
		$user_info = $fun_user_table->where($where)->select();
		exit(json_encode(array_values($user_info)));
	}

	//获取用户点赞数
	public function likeNum() {
		$userOpenId  = I('userOpenId');
		$like_table = M('fun_articlelike');
		$where['userOpenId'] = $userOpenId;
		$likeNum = $like_table->where($where)->count();
		exit(json_encode(array('likeNum' => $likeNum)));
	}

	//获取用户收藏数
	public function collectNum() {
		$userOpenId  = I('userOpenId');
		$collect_table = M('fun_articlecollect');
		$where['userOpenId'] = $userOpenId;
		$collectNum = $collect_table->where($where)->count();
		exit(json_encode(array('collectNum' => $collectNum)));
	}

	

}