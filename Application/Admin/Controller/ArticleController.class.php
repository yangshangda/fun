<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {

	//文章列表
	public function index() {
		$fun_article_table = M('fun_article');
		$articleList = $fun_article_table->where()->order('articleCreateTime desc')->select();
		$count=count($articleList);
		
		$this->count = $count;
		$this->info = $articleList;
		$this->display();
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