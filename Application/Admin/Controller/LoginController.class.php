<?php
namespace Admin\Controller;
use Think\Controller;
//后台用户登录控制器
class LoginController extends Controller {
	//后台登录页
	public function index(){
		
		//$this->display('Login/index');
		if (IS_POST){
			// //检查验证码
			// $rst = $this->checkVerify(I('post.verify'));
			// if($rst===false){
			// 	$this->error('验证码错误');
			// }
			//检查用户名密码
			$admin_table = M('fun_admin');
			$where['adminName'] = I('post.admin_name');
			$pwd = $admin_table->where($where)->getField('adminPassword');
			$state = $admin_table->where($where)->getField('adminState');
			$id = $admin_table->where($where)->getField('adminId');
			$recycle = $admin_table->where($where)->getField('adminRecycle');
			if($recycle == '1') {
				echo "<script>alert('该管理员已被拉黑！');</script>";
				$this->display();
			}
			if(md5(I('post.admin_pwd')) == $pwd){
				session('admin_name',I('post.admin_name'));
				session('state',$state);
				session('id',$id);
				$this->display('Index/index');
				// $this->success('登录成功，请稍等', U('Index/index'));
			}else{
				echo "<script>alert('登录失败，用户名或密码错误！');</script>";
				// return true;
				$this->display();
				//return;
				//$this->redirect('Login/index');
				// $this->error('登录失败，用户名或密码错误');
				//$this->show();
			}
			return;
		}else{
			session('[destroy]');
		}		
		$this->display();
	}

	// //生成验证码
	// public function getVerify(){
	// 	$verify = new \Think\Verify();
	// 	return $verify->entry();
	// }
	// //检查验证码
	// private function checkVerify($code, $id='') {
	// 	$verify = new \Think\Verify();
	// 	return $verify->check($code,$id);
	// }
	//退出系统
	public function logout(){
		session('[destroy]');
		$this->display('Login/index');
		//$this->success('退出成功',U('Login/index'));
	}
}
