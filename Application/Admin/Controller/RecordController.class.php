<?php
namespace Admin\Controller;
use Think\Controller;
class RecordController extends CommonController {

	public function index() {
		// $fun_banner_table = M('fun_banner');
		
		// $count      = $fun_banner_table->where($where)->count();// 查询满足要求的总记录数
		// $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		// $show       = $Page->show();// 分页显示输出
		// $this->assign('page',$show);// 赋值分页输出

		// $bannerList = $fun_banner_table->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		
		// $this->count = $count;
		// $this->info = $bannerList;
		$this->display('index');
	}

	public function record() {
		$j = I('j');
        if(empty($j)){
            $j = 6;
        }
		$time = I('time');
        if(empty($time)){
            $time = date('Y-m-d');
        }

        $articleId = I('articleId');
        if(!empty($articleId)){
        	$article_map['articleId'] = $articleId;
        }else {
        	$articleId = '';
        }

        $testId = I('testId');
        if(!empty($testId)){
        	$result_map['qid'] = $testId;
        }else {
        	$testId = '';
        }

        $uid = I('uid');
        if(!empty($uid)){
        	$article_map['userOpenId'] = $uid;
        	$result_map['userOpenId'] = $uid;
        }else {
        	$uid = '';
        }
        // $s_time = date("Y-m-d", strtotime("-6 days", strtotime($time)));
        // $begin_time = $s_time . ' 00:00:00';
        // $end_time = $time . ' 23:59:59';
        

        $article_log_table = M('fun_articlelog');
        $result_log_table = M('fun_result');

        for ($i=$j; $i >= 0 ; $i--) {
            $day = "-" . $i . " days";
            $s_time = date("Y-m-d", strtotime($day, strtotime($time)));
            $begin_time = $s_time . ' 00:00:00';
            $end_time = $s_time . ' 23:59:59';
            $article_map['createTime'] = array(array('egt',$begin_time),array('elt',$end_time));
            $result_map['createTime'] = array(array('egt',$begin_time),array('elt',$end_time));


            
            $dataTime[] = $s_time;
            $articleLogCount[] = (int)$article_log_table->where($article_map)->count();
            $resultLogCount[] = (int)$result_log_table->where($result_map)->count();
        }









        // if(!empty($start_time) && empty($end_time)){
        // 	$where['materialCreateTime'] = array('GT',$start_time.' 00:00:00');
        // 	$this->start_time = $start_time;
        // }else if(empty($start_time) && !empty($end_time)){
        // 	$where['materialCreateTime'] = array('LT',$end_time.' 23:59:59');
        // 	$this->end_time = $end_time;
        // }else if(!empty($start_time) && !empty($end_time)){
        // 	$where['materialCreateTime'] = array('between',array($start_time.' 00:00:00',$end_time.' 23:59:59'));
        // 	$this->start_time = $start_time;
        // 	$this->end_time = $end_time;
        // }


		// $this->categories = $dataTime;

		// exit(['categories' => ['one','2','3','4','5','6','7']]);
		exit(json_encode(array('time' => $time ,'j' => $j ,'articleId' => $articleId ,'testId' => $testId ,'categories' => $dataTime , 'articleLogCount' => $articleLogCount , 'resultLogCount' => $resultLogCount)));

		

	}

	

}