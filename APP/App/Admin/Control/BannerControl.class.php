<?php
class BannerControl extends CommonControl{
	private $id ;
	public function __auto(){
		$this->db = K('banner');
		$this->id = Q('get.id','intval',0);
	}
	public function index(){
		$data = $this->db->fetchAll();
		$this->assign('data',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST === true){
			if($this->db->addBanner()){
				$this->success('添加轮播图成功！','index');
			}
			$this->error('添加轮播图失败！');
		}
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->id) _404();
		if(IS_POST === true){
			if($this->db->editBanner($this->id)){
				$this->success('修改轮播图成功！','index');
			}
			$this->error('添加轮播图失败！');
		}
		$data = $this->db->findBanner($this->id);
		$this->assign('data',$data);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->id) _404();
		if($this->db->delBanner($this->id)){
			$this->success('删除轮播图成功！','index');
		}
		$this->error('删除轮播图失败！');
	}
}
?>