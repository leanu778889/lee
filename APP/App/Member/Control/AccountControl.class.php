<?php
class AccountControl extends CommonControl{
	private $uid;
	public function __auto(){
		$this->db = K('account');
		if($_SESSION[C('RBAC_AUTH_KEY')]){
			$this->uid = $_SESSION[C('RBAC_AUTH_KEY')];
		}else{
			go(U('Member/Login/index'));
		}
	}
	public function index(){
		$balance = $this->db->findBalance($this->uid);
		$this->assign('balance',$balance);
		$this->display();
	}
	public function add(){
		if($this->db->addBalance($this->uid)){
			go(U('Member/Account/index'));
		}
	}
	public function setting(){
		$data = $this->db->findUser($this->uid);
		$this->assign('data',$data);
		$this->display();
	}
	public function addUserInfo(){
		if($this->db->addUserInfo($this->uid)){
			$this->success('更新资料成功！');
		}
	}

}
?>