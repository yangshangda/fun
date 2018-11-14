<?php
//http://localhost/Fun/Home/Welcome/a
namespace Home\Controller;
class BannerController extends CommonController {

	//轮播图接口
	public function index() {
		$fun_banner_table = M('fun_banner');
		$where['bannerStatus'] = 1;
		$banner_info = $fun_banner_table->where($where)->select();
		exit(json_encode($banner_info));
	}
	// public function a() {
	// 	//exit('111');
	// 	$data = I('post.');
	// 	$fun_user_table = M('fun_user');
	// 	$where['userOpenId'] = $data['userOpenId'];
	// 	$openId = $fun_user_table->where($where)->select();
	// 	//$save = $fun_user_table->where($where)->save($data);
	// 	if($openId) {
	// 		$save = $fun_user_table->where($where)->save($data);
	// 		exit('had openid');
	// 	}else{
	// 		$save = $fun_user_table->where()->add($data);
	// 		exit('success');
	// 	}
	// }

}