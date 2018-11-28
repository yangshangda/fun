<?php
namespace Home\Controller;
class ArticleController extends CommonController {

	//首页推送文章
	public function index() {
		$fun_article_table = M('fun_article');
		$where['articleRecommend'] = 1;
		$recommendArticle = $fun_article_table->where($where)->order('articleCreateTime desc')->select();	
		exit(json_encode($recommendArticle));
	}

	//文章列表
	public function articleList() {
		$fun_article_table = M('fun_article');
		$where['articleType'] = I('articleType');
		$articleList = $fun_article_table->where($where)->order('articleCreateTime desc')->select();	
		exit(json_encode($articleList));
	}

	//指定文章详情
	public function articleDetail() {
		$fun_article_table = M('fun_article');
		$where['articleId'] = I('articleId');
		$articleDetail = $fun_article_table->where($where)->limit(1)->select();
		exit(json_encode($articleDetail));
	}

	//分类文章列表
	public function sortArticleList() {
		$fun_article_table = M('fun_article');
		//$where['articleType'] = I('articleType');
		$sortArticleList = $fun_article_table->where($where)->order('articleCreateTime desc')->select();
		$allSortArticle=[];
		foreach ($sortArticleList as $key => $value) {
			$allSortArticle[$value['articletype']][$value['articleid']]['articleId'] = $value['articleid'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleCreateTime'] = $value['articlecreatetime'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleTitle'] = $value['articletitle'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleDescription'] = $value['articledescription'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleContent'] = $value['articlecontent'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleCover'] = $value['articlecover'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleType'] = $value['articletype'];
			$allSortArticle[$value['articletype']][$value['articleid']]['articleRecommend'] = $value['articlerecommend'];
			if($value['articletype'] == '10'){
				$allSortArticle[$value['articletype']]['articleTypeName'] = '综合';
			}elseif($value['articletype'] == '1'){
				$allSortArticle[$value['articletype']]['articleTypeName'] = '情感';
				//$allSortArticle[$value['articletype']][$value['articleid']]['articleTypeName'] = '情感';
			}elseif($value['articletype'] == '2'){
				$allSortArticle[$value['articletype']]['articleTypeName'] = '性格';
			}elseif($value['articletype'] == '3'){
				$allSortArticle[$value['articletype']]['articleTypeName'] = '趣味';
			}
		}
		exit(json_encode($allSortArticle));
	}

}