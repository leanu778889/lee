<?php
class GoodsControl extends CommonControl{
	public $gid;
	public function __auto(){
		$this->db = K('goods');
		$this->gid = Q('get.gid','intval',0);
	}
	public function index(){
		$total = $this->db->goodsTotal();
		$page = new Page($total,10);
		$data = $this->db->fetchAll($page->limit());
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}
	public function add(){
		if(IS_POST === true){
			if($this->db->addGoods()){
				$this->success('添加商品成功！','index');
			}
			$this->error('添加商品失败');
		}
		$db = K('category');
		$category = $db->fetchAll();
		$this->assign('category',$category);
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->gid) _404();
		if(IS_POST === true){
			if($this->db->editGoods($this->gid)){
				$this->success('修改商品成功！','index');
			}
			$this->error('修改商品失败');
		}
		$db = K('category');
		$category = $db->fetchAll();
		$this->assign('category',$category);
		$data = $this->db->findGoods($this->gid);
		$this->assign('data',$data);
		$this->display('editShow.html');
	}
/*
	删除商品
*/
	public function del(){
		if(!$this->gid) _404();
		if($this->db->delGoods($this->gid)){
			$this->success('删除商品成功！','index');
		}
		$this->error('删除商品失败');
	}
/*
	添加橱窗商品
*/
	public function addShow(){
		if(!$this->gid) _404();
		if($this->db->addShow($this->gid)){
			$this->success('添加商品到橱柜成功！','showGoods');
		}
		$this->error('添加商品到橱柜失败');

	}
/*
	显示橱窗商品
*/
	public function showGoods(){
		$data = $this->db->fetchShow();
		$this->assign('data',$data);
		$this->display('showGoods.html');
	}
/*
	编辑橱柜商品
*/
	public function editShow(){
		$id = Q('get.id','intval');
		if(!$id) _404();
		if(IS_POST === true){
			if($this->db->editShow($id)){
				$this->success('修改橱柜商品成功！','showGoods');
			}
			$this->error('修改橱柜商品失败');
		}
		$data = $this->db->findShow($id);
		$this->assign('data',$data);
		$this->display('chuchuang.html');
	}
/*
	删除橱柜商品
*/
	public function delShow(){
		$id = Q('get.id','intval');
		if(!$id) _404();
		if($this->db->delShow($id)){
			$this->success('删除橱柜商品成功！','showGoods');
		}
		$this->error('删除橱柜商品失败');
	}
/*
	删除缩略图
*/
	public function delThumb(){
		if(IS_AJAX === false) return _404();
		$img_id = Q('post.img_id','intval');
		$result =array();
		$result['status'] =false;
		if($this->db->delThumb($img_id)){
			$result['status'] = true;
		}
		exit(json_encode($result));
	}
/*
	获得属性
*/
	public function getAttr(){
		if(IS_AJAX === false) return _404();
		$cid = Q('get.cid','intval');
		$result = array();
		$result['status'] = false;
		$db = K('category');
		$data = $db->getAttr($cid);
		if(!empty($data)){
			$result['status'] = true;
		}
		foreach ($data as $k=>$v){
			$result['data'][$v['tc_id']]['tc_id'] = $v['tc_id'];
			$result['data'][$v['tc_id']]['tc_name'] = $v['tc_name'];
			$result['data'][$v['tc_id']]['data'][$k]['tid'] = $v['tid'];
			$result['data'][$v['tc_id']]['data'][$k]['tname'] = $v['tname'];
		}
		exit(json_encode($result));
	}
}
?>