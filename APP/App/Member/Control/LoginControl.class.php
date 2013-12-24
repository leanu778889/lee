<?php
class LoginControl extends CommonControl{
	public function __auto(){
		$this->db = K('user');
	}
	public function index(){
		$this->display();
	}
	public function login(){
		if(IS_POST === false) _404();
		$username = Q('post.username','strip_tags,addslashes');
		$password = Q('post.password','md5');
		$userPreg = '/^\w[\w\.]+@\w+[\.a-z]+[a-z]$/i';
		if(!preg_match($userPreg, $username)) $this->error('用户名不是有效的邮箱地址!');
		$where = array('uname'=>$username);
		$userinfo = $this->db->findUser($where);
		if(!isset($userinfo['uid'])){
			$this->error('用户名不存在!');
			exit;
		}
		if($userinfo['password']!=$password){
			$this->error('用户名或密码错误!');
			exit;
		}
		$_SESSION[C('RBAC_AUTH_KEY')] = $userinfo['uid'];
		$_SESSION['nickname'] = $userinfo['nickname']?$userinfo['nickname']:$userinfo['uname'];
		$this->success('登录成功！',U('Index/Index/index'));

	}
	public function showCode(){
		$code = new Code();
		$code->show();
	}
	public function checkCode(){
		if(IS_AJAX ===false) _404();
		if(strtoupper($_POST['code']) == strtoupper($_SESSION['code'])){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function quit(){
		session_unset();
		session_destroy();
		$this->success('退出成功！',U('Index/Index/index'));
	}
}
?>