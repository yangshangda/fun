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


}