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

	//结果
	public function result() {
		$userOpenId = I('userOpenId');
		$qid = I('qid');
		$score = I('score');
		$fun_result_table = M('fun_result');
		$fun_analysis_table = M('fun_analysis');
		$fun_questionnaire_table = M('fun_questionnaire');

		$where['userOpenId'] = $userOpenId;
		$where['qid'] = $qid;
		$has = $fun_result_table->where($where)->select();

		$data['createTime'] = date("Y-m-d h:i:s");
		$data['userOpenId'] = $userOpenId;
		$data['qid'] = $qid;
		$data['score'] = $score;
		//$data['result'] = 'result';

		$where1['qid'] = $qid;
		$where1['minScore'] = array('ELT',$score);
		$where1['maxScore'] = array('EGT',$score);
		$data['result'] = $fun_analysis_table->where($where1)->getField('result');

		$where2['questionId'] = $qid;
		$data['questionTitle'] = $fun_questionnaire_table->where($where2)->getField('questiontitle');
		$data['questionDescription'] = $fun_questionnaire_table->where($where2)->getField('questiondescription');
		$data['questionCover'] = $fun_questionnaire_table->where($where2)->getField('questioncover');

		if(!empty($has)) {
			$fun_result_table->where($where)->save($data);
			exit(json_encode($data));
		}

		$fun_result_table->where($where)->add($data);
		exit(json_encode($data));
		
	}

	//mylog
	public function mylog() {
		$fun_result_table = M('fun_result');
		$where['userOpenId'] = I('userOpenId');
		$testList = $fun_result_table->where($where)->order('createTime desc')->select();
		if(empty($testList)) {
			die;
		}

		// $articleId = $fun_articlelog_table->where($where)->select();
		
		exit(json_encode($testList));
	}

	public function delelog() {
		$fun_result_table = M('fun_result');
		$where['userOpenId'] = I('userOpenId');
		$fun_result_table->where($where)->delete();	

	}

	//detailLog
	public function detailLog() {
		$fun_result_table = M('fun_result');
		$where['userOpenId'] = I('userOpenId');
		$where['qid'] = I('qid');
		$log = $fun_result_table->where($where)->limit(1)->select();
		if(empty($log)) {
			die;
		}
		// $articleId = $fun_articlelog_table->where($where)->select();		
		exit(json_encode($log));
	}



}