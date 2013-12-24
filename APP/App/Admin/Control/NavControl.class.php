<?php
class NavControl extends CommonControl{
	private $nid;
	public function __auto(){
		$this->db = K('nav');
		$this->nid = Q('get.nid','intval',0);
	}
	public function index(){
		$data = $this->db->fetchAll();
		$this->assign('nav',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST ===true ){
			if($this->db->addNav()){
				$this->success('添加导航成功！','index');
			}
			$this->error('添加导航失败！');
		}
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->nid) _404();
		if(IS_POST ===true ){
			if($this->db->editNav($this->nid)){
				$this->success('修改导航成功！','index');
			}
			$this->error('修改导航失败！');
		}
		$data = $this->db->findNav($this->nid);
		$this->assign('nav',$data);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->nid) _404();
		if($this->db->delNav($this->nid)){
			$this->success('删除导航成功！','index');
		}
		$this->error('删除导航失败！');
	}
}
?>