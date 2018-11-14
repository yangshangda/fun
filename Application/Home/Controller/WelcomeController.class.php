<?php
//http://localhost/Fun/Home/Welcome/a
namespace Home\Controller;
class WelcomeController extends CommonController {

	//获取用户的信息并更新或存入数据库
	public function index() {
		//exit('111');
		$data = I('post.');
		$fun_user_table = M('fun_user');
		$where['userOpenId'] = $data['userOpenId'];
		$openId = $fun_user_table->where($where)->select();
		//$save = $fun_user_table->where($where)->save($data);
		if($openId) {
			$save_data = $fun_user_table->where($where)->save($data);
			exit('had openid,save');
		}else{
			$add_data = $fun_user_table->where()->add($data);
			exit('success,add');
		}
	}

}