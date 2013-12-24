<?php
class RegControl extends CommonControl{
	public function __auto(){
		$this->db = K('user');
	}
	public function index(){
		$this->display();
	}
	public function add(){
		if(IS_POST === false) _404();
		$uid = $this->db->addUser();
		if($uid){
			$_SESSION[C('RBAC_AUTH_KEY')] = $uid;
			$_SESSION['nickname'] = Q('post.email','strip_tags,addslashes');
			$this->success('注册用户成功！',U('Index/Index/index'));
		}
		$this->error('注册用户失败！');
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
}
?>