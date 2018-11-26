<?php
namespace Admin\Controller;
use Think\Controller;
class QuestionController extends CommonController {

	//问卷列表
	public function index() {
		$fun_questionnaire_table = M('fun_questionnaire');
		$questionnaireList = $fun_questionnaire_table->where()->select();
		$count=count($questionnaireList);
		
		$this->count = $count;
		$this->info = $questionnaireList;
		$this->display();
	}

	//问卷列表
	public function test() {
		$fun_test_table = M('fun_test');
		$testList = $fun_test_table->where()->select();
		$count=count($testList);
		
		$this->count = $count;
		$this->info = $testList;
		$this->display();
	}

	//添加问卷
	public function addQuestionnaire(){
		//$data = I('post.');
		$questionnaireid = I('questionid');
		$data['questionTitle'] = I('title');
		$data['questionCover'] = I('img');
		$data['questionDescription'] = I('description');
		$data['questionPayState'] = I('state');
		$data['questionType'] = I('type');
		$data['preMoney'] = I('premoney');
		$data['nowMoney'] = I('nowmoney');
       
		$questionnaire_table = M('fun_questionnaire');

		if(!empty($questionnaireid)) {
			$where['questionId'] = (int)$questionnaireid;
			$questionnaire_update = $questionnaire_table->limit(1)->where($where)->save($data);die;
		}else{
			$data['questionCreateTime'] = date("Y-m-d h:i:s");
			$questionnaire_add = $questionnaire_table->limit(1)->where()->add($data);die;
		}
	}

	//修改是否付费
	public function setPayState(){
		// $data = I('post.');
		$where['questionId'] = I('id');
		$data['questionPayState'] = I('questionpaystate');
		$questionnaire_table = M('fun_questionnaire');
		$questionnaire_set_paystate = $questionnaire_table->limit(1)->where($where)->save($data);die;
	}

	//添加测试
	public function addTest(){
		//$data = I('post.');
		$testid = I('testid');
		$data['questionId'] = I('qid');
		$data['testNumber'] = I('num');
		$data['testTitle'] = I('title');
		$data['testImg'] = I('set_titleimg');
		$data['aTitle'] = I('atitle');
		$data['aScore'] = I('ascore');
		$data['aImg'] = I('set_aimg');
		$data['bTitle'] = I('btitle');
		$data['bScore'] = I('bscore');
		$data['bImg'] = I('set_bimg');
		$data['cTitle'] = I('ctitle');
		$data['cScore'] = I('cscore');
		$data['cImg'] = I('set_cimg');
		$data['dTitle'] = I('dtitle');
		$data['dScore'] = I('dscore');
		$data['dImg'] = I('set_dimg');
       
		$test_table = M('fun_test');

		if(!empty($testid)) {
			$where['testId'] = (int)$testid;
			$test_update = $test_table->limit(1)->where($where)->save($data);die;
		}else{
			//$data['testCreateTime'] = date("Y-m-d h:i:s");
			$test_add = $test_table->limit(1)->where()->add($data);die;
		}
	}


}