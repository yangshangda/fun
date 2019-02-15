<?php
namespace Home\Controller;
class ConsultController extends CommonController {

	//
	public function info() {
		
		$fun_consult_table = M('fun_consult');
		$where['status'] = 1;
		$list = $fun_consult_table->where($where)->order('createTime desc')->select();
		exit(json_encode($list));
	}




}