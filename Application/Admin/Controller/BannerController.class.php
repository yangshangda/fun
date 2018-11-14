<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends CommonController {

	//文章列表
	public function index() {
		$fun_banner_table = M('fun_banner');
		$bannerList = $fun_banner_table->where()->select();
		$count=count($bannerList);
		
		$this->count = $count;
		$this->info = $bannerList;
		$this->display();
	}


}