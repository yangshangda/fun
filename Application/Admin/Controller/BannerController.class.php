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

	//添加轮播图
	public function addBanner(){
		// $data = I('post.');
		$bannerid = I('bannerid');
		$data['articleId'] = I('articleid');
		$data['bannerTitle'] = I('title');
		$data['bannerImage'] = I('img');
		$data['bannerStatus'] = I('status');

		$banner_table = M('fun_banner');
		if(!empty($bannerid)) {
			$where['bannerId'] = $bannerid;
			$banner_update = $banner_table->limit(1)->where($where)->save($data);die;
		}else{
			$data['bannerCreateTime'] = date("Y-m-d h:i:s");
			$banner_add = $banner_table->limit(1)->where()->add($data);die;
		}		

	}

	//修改是否发布
	public function setStatus(){
		// $data = I('post.');
		$where['bannerId'] = I('id');
		$data['bannerStatus'] = I('status');
		$banner_table = M('fun_banner');
		$banner_set_status = $banner_table->limit(1)->where($where)->save($data);die;

	}


}