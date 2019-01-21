<?php
namespace Home\Controller;
class MaterialController extends CommonController {

	//首页推送文章
	// public function index() {
	// 	$fun_article_table = M('fun_material');
	// 	$where['articleRecommend'] = 1;
	// 	$recommendArticle = $fun_article_table->where($where)->order('articleCreateTime desc')->select();	
	// 	exit(json_encode($recommendArticle));
	// }

	//文章列表
	public function materialList() {
		$fun_material_table = M('fun_material');
		//$where['articleType'] = I('articleType');
		$materialList = $fun_material_table->where()->order('materialCreateTime desc')->select();
		exit(json_encode($materialList));
	}

	public function materialDetail() {
		$fun_material_table = M('fun_material');
		$where['materialId'] = I('materialId');
		$material = $fun_material_table->where($where)->select();
		// foreach ($material as $key => $value) {
		// 	$value['materialinput'] = str_replace(['"[',']"'],["[","]"],$value['materialinput']);
		// 	# code...
		// }

		exit(json_encode($material));
		//$input = str_replace(['"[',']"'],["[","]"],$material['materialinput']);
		//exit(json_encode(array('material' => $material ,'input' => $input )));
	}

	//指定文章详情
	// public function articleDetail() {
	// 	$fun_article_table = M('fun_article');
	// 	$where['articleId'] = I('articleId');
	// 	$articleDetail = $fun_article_table->where($where)->limit(1)->select();
	// 	$content = htmlspecialchars_decode($articleDetail[0]['articlecontent']);
	// 	$content = str_replace(['&nbsp;','  ','	'],["\r\t\r","\r\t\r","\r\t\r"],$content);
	// 	exit(json_encode(array('articleDetail' => $articleDetail ,'content' => $content )));
	// }

	//分类文章列表
	// public function sortArticleList() {
	// 	$fun_article_table = M('fun_article');
	// 	//$where['articleType'] = I('articleType');
	// 	$sortArticleList = $fun_article_table->where($where)->order('articleCreateTime desc')->select();
	// 	$allSortArticle=[];
	// 	foreach ($sortArticleList as $key => $value) {
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleId'] = $value['articleid'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleCreateTime'] = $value['articlecreatetime'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleTitle'] = $value['articletitle'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleDescription'] = $value['articledescription'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleContent'] = $value['articlecontent'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleCover'] = $value['articlecover'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleType'] = $value['articletype'];
	// 		$allSortArticle[$value['articletype']][$value['articleid']]['articleRecommend'] = $value['articlerecommend'];
	// 		if($value['articletype'] == '10'){
	// 			$allSortArticle[$value['articletype']]['articleTypeName'] = '综合';
	// 		}elseif($value['articletype'] == '1'){
	// 			$allSortArticle[$value['articletype']]['articleTypeName'] = '情感';
	// 			//$allSortArticle[$value['articletype']][$value['articleid']]['articleTypeName'] = '情感';
	// 		}elseif($value['articletype'] == '2'){
	// 			$allSortArticle[$value['articletype']]['articleTypeName'] = '性格';
	// 		}elseif($value['articletype'] == '3'){
	// 			$allSortArticle[$value['articletype']]['articleTypeName'] = '趣味';
	// 		}
	// 	}
	// 	exit(json_encode($allSortArticle));
	// }

}