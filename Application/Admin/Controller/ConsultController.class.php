<?php
namespace Admin\Controller;
use Think\Controller;
class ConsultController extends CommonController {

	//列表
	public function index() {
		$fun_consult_table = M('fun_consult');

		$name = I('name');
		if(!empty($name)){
        	$where['name'] = array('like','%'.$name.'%');
        	$this->name = $name;
        }

        $description = I('description');
        if(!empty($description)){
        	$where['description'] = array('like','%'.$description.'%');
        	$this->description = $description;
        }

        $grade = I('grade');
        if(!empty($grade) && $grade!='-1'){
        	$where['grade'] = $grade;
        	$this->grade = $grade;
        }else{
        	$this->grade = '-1';
        }

        $sex = I('sex');
        if($sex == 1){
        	$where['sex'] = 1;
        	$this->sex = $sex;
        }else if($sex == '-1'){
        	$where['sex'] = 0;
        	$this->sex = '-1';
        }

        $status = I('status');
        if($status == 1){
        	$where['status'] = 1;
        	$this->status = $status;
        }else if($status == '-1'){
        	$where['status'] = 0;
        	$this->status = '-1';
        }

        $recommend = I('recommend');
        if($recommend == 1){
        	$where['recommend'] = 1;
        	$this->recommend = $recommend;
        }else if($recommend == '-1'){
        	$where['recommend'] = 0;
        	$this->recommend = '-1';
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
		
		$count      = $fun_consult_table->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$consultList = $fun_consult_table->where($where)->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->count = $count;
		$this->info = $consultList;
		$this->display('index');
	}

	//添加
	public function addConsult(){
		// $data = I('post.');
		$id = I('id');
		$data['name'] = $name;
		$data['img'] = I('img');
		$data['sex'] = I('sex');
		$data['grade'] = I('grade');
		$data['phone'] = I('phone');
		$data['address'] = I('address');
		$data['background'] = I('background');
		$data['description'] = I('description');
		$data['recommend'] = I('recommend');
		$data['status'] = I('status');

		$fun_consult_table = M('fun_consult');
		
		
		if(!empty($id)) {					
			$where['id'] = $id;
			$consult_update = $fun_consult_table->limit(1)->where($where)->save($data);die;
		}else{
			$data['createTime'] = date("Y-m-d h:i:s");
			$consult_add = $fun_consult_table->limit(1)->where()->add($data);die;
		}		

	}

	//修改是否上线
	public function setStatus(){
		// $data = I('post.');
		$where['id'] = I('id');
		$data['status'] = I('status');
		$fun_consult_table = M('fun_consult');
		$consult_set_status = $fun_consult_table->limit(1)->where($where)->save($data);die;

	}

	//修改是否推荐
	public function setRecommend(){
		// $data = I('post.');
		$where['id'] = I('id');
		$data['recommend'] = I('recommend');
		$fun_consult_table = M('fun_consult');
		$consult_set_recommend = $fun_consult_table->limit(1)->where($where)->save($data);die;

	}

	//置顶
	public function setTop(){
		// $data = I('post.');
		$where['id'] = I('id');
		$data['createTime'] = date('Y-m-d h:i:s');
		$fun_consult_table = M('fun_consult');
		$consult_set_top = $fun_consult_table->limit(1)->where($where)->save($data);die;

	}

	//下置顶
	public function setDown(){
		// $data = I('post.');
		$where['id'] = I('id');
		$db = M('fun_consult');
		$where1['status'] = '1';
		$time = $db->where($where1)->limit(1)->order('createTime asc')->getField('createTime');
		$alterTime = strtotime($time)-1;
		$data['createTime'] = date("Y-m-d H:i:s",$alterTime);
		$consult_set_down = $db->limit(1)->where($where)->save($data);die;
	}

	//删除
	public function dele(){
		// $data = I('post.');
		$where['id'] = I('id');
		//$data['materialCreateTime'] = date('Y-m-d h:i:s');
		$fun_consult_table = M('fun_consult');
		$consult_delete = $fun_consult_table->limit(1)->where($where)->delete();die;

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