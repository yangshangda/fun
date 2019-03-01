<?php
namespace Admin\Controller;
use Think\Controller;
class BannerController extends CommonController {

	//轮播图列表
	public function index() {
		$fun_banner_table = M('fun_banner');
		

		$count      = $fun_banner_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$bannerList = $fun_banner_table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->count = $count;
		$this->info = $bannerList;
		$this->display('index');
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

	//删除
	public function dele(){
		$where['bannerId'] = I('id');
		$banner_table = M('fun_banner');
		$banner_dele = $banner_table->limit(1)->where($where)->delete();die;

	}

	//置顶
	public function setTop(){
		// $data = I('post.');
		$where['bannerId'] = I('id');
		$data['bannerCreateTime'] = date('Y-m-d h:i:s');
		$banner_table = M('fun_banner');
		$banner_set_top = $banner_table->limit(1)->where($where)->save($data);die;

	}


}