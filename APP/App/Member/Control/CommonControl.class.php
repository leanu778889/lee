<?php
class CommonControl extends Control{
	protected $db;
	public function __init(){
		$this->setCategory();
		$this->setFooter();
		$this->assign('session',$_SESSION);
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
	}
	private function setCategory(){
		$this->db = K('category');
		$data = $this->db->fetchAll();
		$data = Data::channel($data,'cid','pid',0,0,1);
		$this->assign('category',$data);
	}
	private function setFooter(){
		$this->db = K('nav');
		$nav = $this->db->fetchAll();
		$this->assign('nav',$nav);
	}
}
?>