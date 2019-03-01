<?php
namespace Admin\Controller;
use Think\Controller;
class MaterialController extends CommonController {

	//列表
	public function index() {
		$fun_material_table = M('fun_material');

		$name = I('name');
		if(!empty($name)){
        	$where['materialTitle'] = array('like','%'.$name.'%');
        	$this->name = $name;
        }

        $description = I('description');
        if(!empty($description)){
        	$where['materialDescription'] = array('like','%'.$description.'%');
        	$this->description = $description;
        }

        $status = I('status');
        if($status == 1){
        	$where['materialRecommend'] = 1;
        	$this->status = $status;
        }else if($status == '-1'){
        	$where['materialRecommend'] = 0;
        	$this->status = '-1';
        }

        $start_time = I('start_time');
        $end_time = I('end_time');
        if(!empty($start_time) && empty($end_time)){
        	$where['materialCreateTime'] = array('GT',$start_time.' 00:00:00');
        	$this->start_time = $start_time;
        }else if(empty($start_time) && !empty($end_time)){
        	$where['materialCreateTime'] = array('LT',$end_time.' 23:59:59');
        	$this->end_time = $end_time;
        }else if(!empty($start_time) && !empty($end_time)){
        	$where['materialCreateTime'] = array('between',array($start_time.' 00:00:00',$end_time.' 23:59:59'));
        	$this->start_time = $start_time;
        	$this->end_time = $end_time;
        }
        // if(!empty($status)){
        // 	$where['materialRecommend'] = $status;
        // 	$this->status = $status;
        // }
		//$where['materialRecommend'] = '1';
		
		$count      = $fun_material_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$materialList = $fun_material_table->where($where)->order('materialCreateTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->count = $count;
		$this->info = $materialList;
		$this->display('index');
	}

	//添加
	public function addMaterial(){
		// $data = I('post.');
		$id = I('id');
		$materialid = I('materialid');
		$materialinput = htmlspecialchars_decode(I('materialinput'));
		$data['materialId'] = $materialid;
		$data['materialCover'] = I('img');
		$data['materialTitle'] = I('materialtitle');
		$data['materialInput'] = $materialinput;
		$data['materialDescription'] = I('materialdescription');
		$data['materialRecommend'] = I('materialrecommend');

		$fun_material_table = M('fun_material');
		$where1['materialId'] = $materialid;
		
		
		if(!empty($id)) {	
			$where1['id'] = ['not in', $id];
			$materialid_num = $fun_material_table->where($where1)->count();
			if($materialid_num) {
				exit('-1');
			}				
			$where['id'] = $id;
			$material_update = $fun_material_table->limit(1)->where($where)->save($data);die;
		}else{
			
			$materialid_num = $fun_material_table->where($where1)->count();
			if($materialid_num) {
				exit('-1');
			}
			$data['materialCreateTime'] = date("Y-m-d h:i:s");
			$material_add = $fun_material_table->limit(1)->where()->add($data);die;
		}		

	}

	//修改是否上线
	public function setRecommend(){
		// $data = I('post.');
		$where['materialId'] = I('id');
		$data['materialRecommend'] = I('materialRecommend');
		$fun_material_table = M('fun_material');
		$material_set_recommend = $fun_material_table->limit(1)->where($where)->save($data);die;

	}
	
	//获取json
	public function inputJson(){
		// $data = I('post.');
		$where['materialId'] = I('materialId');
		$fun_material_table = M('fun_material');
		$inputJson = $fun_material_table->where($where)->getField('materialInput');
		exit($inputJson);
		die;
	}

	//置顶
	public function setTop(){
		// $data = I('post.');
		$where['materialId'] = I('id');
		$data['materialCreateTime'] = date('Y-m-d h:i:s');
		$fun_material_table = M('fun_material');
		$material_set_top = $fun_material_table->limit(1)->where($where)->save($data);die;

	}

	//下置顶
	public function setDown(){
		// $data = I('post.');
		$where['materialId'] = I('id');
		$db = M('fun_material');
		$where1['materialRecommend'] = '1';
		$time = $db->where($where1)->limit(1)->order('materialCreateTime asc')->getField('materialCreateTime');
		$alterTime = strtotime($time)-1;
		$data['materialCreateTime'] = date("Y-m-d H:i:s",$alterTime);
		$material_set_down = $db->limit(1)->where($where)->save($data);die;
	}

	//删除
	public function dele(){
		// $data = I('post.');
		$where['materialId'] = I('id');
		//$data['materialCreateTime'] = date('Y-m-d h:i:s');
		$fun_material_table = M('fun_material');
		$material_dele = $fun_material_table->limit(1)->where($where)->delete();die;

	}

	//
	// public function materialDetail() {
	// 	$fun_material_table = M('fun_material');
	// 	$where['materialId'] = I('materialId');
	// 	$material = $fun_material_table->where($where)->select();
	// 	exit(json_encode($material));
	// }

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