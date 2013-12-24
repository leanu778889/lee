<?php
class DetailControl extends CommonControl{
	private $gid;
	public function __auto(){
		$this->db = K('goods');
		$this->gid = Q('get.gid','intval',0);
	}
	public function index(){
		if(!$this->gid) _404();
		$data = $this->db->findGoods($this->gid);
		$this->assign('data',$data);
		$this->display();
	}
}
?>