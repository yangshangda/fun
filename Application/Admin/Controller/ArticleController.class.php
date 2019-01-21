<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {

	//文章列表
	public function index() {
		$fun_article_table = M('fun_article');
		
		//$count=count($articleList);

		$count      = $fun_article_table->where()->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$articleList = $fun_article_table->where()->order('articleCreateTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->count = $count;
		$this->info = $articleList;
		$this->display('index');
	}

	//添加文章
	public function addArticle(){
		// $data = I('post.');
		$articleid = I('articleid');
		$data['articleTitle'] = I('title');
		$data['articleCover'] = I('img');
		$data['articleDescription'] = I('description');
		$data['articleContent'] = I('content');
		$data['articleType'] = I('type');
		$data['articleRecommend'] = I('recommend');

		$article_table = M('fun_article');
		if(!empty($articleid)) {
			$where['articleId'] = $articleid;
			$article_update = $article_table->limit(1)->where($where)->save($data);die;
		}else{
			$data['articleCreateTime'] = date("Y-m-d h:i:s");
			$article_add = $article_table->limit(1)->where()->add($data);die;
		}		

	}

	//修改是否推送
	public function setRecommend(){
		// $data = I('post.');
		$where['articleId'] = I('id');
		$data['articleRecommend'] = I('articleRecommend');
		$article_table = M('fun_article');
		$article_set_recommend = $article_table->limit(1)->where($where)->save($data);die;

	}


}