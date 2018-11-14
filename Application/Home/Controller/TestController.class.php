<?php
namespace Home\Controller;
class TestController extends CommonController {

	//问卷
	public function questionnaireList() {
		$data = I('post.');
		$fun_questionnaire_table = M('fun_questionnaire');
		$where['questionType'] = $data['questionType'];
		$questionnaire = $fun_questionnaire_table->where($where)->select();
		exit(json_encode($questionnaire));
	}

	//问题
	public function testList() {
		$data = I('post.');
		$fun_test_table = M('fun_test');
		$where['questionId'] = $data['questionid'];
		$test = $fun_test_table->where($where)->select();
		exit(json_encode($test));
		
	}



}