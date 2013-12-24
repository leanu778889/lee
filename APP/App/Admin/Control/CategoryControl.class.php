<?php
class CategoryControl extends CommonControl{
	private $cid;
	public function __auto(){
		$this->cid = Q('get.cid','intval',0);
		$this->db = K('category');
	}
	public function index(){
		$data = $this->db->fetchAll();
		$this->assign('data',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST === true){
			if($this->db->addCategory()){
				$this->success('添加分类成功','index');
			}
			$this->error('添加分类失败','index');
		}
		$this->assign('cid',$this->cid);
		$category = $this->db->fetchAll();
		$this->assign('category',$category);
		$db = K('type');
		$data = $db->fetchTypeAll();
		$this->assign('type',$data);
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->cid) _404();
		if(IS_POST === true){
			if($this->db->editCategory($this->cid)){
				$this->success('修改分类成功','index');
			}
			$this->error('修改分类失败','index');
		}
		$category = $this->db->fetchAll();
		$this->assign('category',$category);
		$son =$this->db->fetchAll($this->cid);
		function func($v){
			return $v['cid'];
		}
		$disabledArr = array_map('func', $son);
		$disabledArr[] = $this->cid;
		$this->assign('disabledArr',$disabledArr);
		$db = K('type');
		$type = $db->fetchTypeAll();
		$this->assign('type',$type);
		$data = $this->db->findCategory($this->cid);
		$this->assign('data',$data);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->cid) _404();
		if($this->db->delCategory($this->cid)){
			$this->success('删除分类成功','index');
		}
		$this->error($this->db->error,'index');
	}
}
?>