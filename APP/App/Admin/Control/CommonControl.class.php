<?php
class CommonControl extends Control{
	public $db;
	public function __init(){
		if(!isset($_SESSION[C('RBAC_SUPER_ADMIN')])){
			go(U('Admin/Login/index'));
		}
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
		$this->setNav();
	}
	public function setNav(){
		$nav = include APP_PATH.'Config/nav.php';
		$this->assign('nav',$nav);
	}
}
?>