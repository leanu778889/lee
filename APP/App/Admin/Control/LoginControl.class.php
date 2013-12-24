<?php
class LoginControl extends Control{
	public $db;
	public function __init(){
		$this->db = M('admin');
	}
	public function index(){
		$this->display();
	}
	public function login(){
		if(IS_POST === false) _404();
		$username = Q('post.username','strip_tags,addslashes');
		$password = Q('post.password','md5');
		$userInfo = $this->db->where(array('username'=>$username))->find();
		if(!is_array($userInfo)){
			$this->error('用户名不存在！');
		}
		if($password == $userInfo['password']){
			$_SESSION[C('RBAC_SUPER_ADMIN')] = $username;
			$this->success('登录成功！',U('Admin/Index/index'));
		}
		$this->error('密码错误！');
	}
	public function checkCode(){
		if(IS_AJAX ===false) _404();
		$result=array();
		$result['status'] = false;
		if(strtoupper($_POST['code']) == strtoupper($_SESSION['code'])){
			$result['status'] = true;
		}
		exit(json_encode($result));
	}
	public function showCode(){
		$code = new Code;
		$code->show();
	}

}
?>