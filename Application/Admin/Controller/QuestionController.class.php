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


}