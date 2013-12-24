<?php
class TypeControl extends CommonControl{
	private $type_id;
	private $tc_id;
	private $tid;
	public function __auto(){
		$this->type_id = isset($_GET['type_id'])?(int)$_GET['type_id']:0;
		$this->tc_id = isset($_GET['tc_id'])?(int)$_GET['tc_id']:0;
		$this->tid = isset($_GET['tid'])?(int)$_GET['tid']:0;
 		$this->db = K('type');
	}
/*
	展示商品类型页
*/
	public function index(){
		$data = $this->db->fetchTypeAll();
		$data = is_array($data)?$data:array();
		foreach($data as $k=>$v){
			$data[$k]['attr'] = $this->db->fetchAttrAll($v['type_id']);
		}
		$this->assign('data',$data);
		$this->display();
	}
/*
	添加商品类型
*/
	public function addType(){
		if(IS_POST ===true){
			if($this->db->addType()){
				$this->success('添加商品类型成功！','index');
			}
			$this->error('添加商品类型失败！');
		}
		$this->display('addType.html');
	}
/*
	修改商品类型
*/
	public function editType(){
		if(!$this->type_id) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->editType($this->type_id)){
				$this->success('修改商品类型成功！','index');
			}
			$this->error('修改商品类型失败！');
		}
		$data = $this->db->findType($this->type_id);
		$this->assign('data',$data);
		$this->display('editType.html');
	}
/*
	删除商品类型
*/
	public function delType(){
		if(!$this->type_id) exit('缺少参数！');
		if($this->db->delType($this->type_id)){
			$this->success('删除商品类型成功！','index');
		}
		$this->error($this->db->error);
	}
/*
	添加类型属性
*/
	public function addAttr(){
		if(!$this->type_id) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->addAttr($this->type_id)){
				$this->success('添加商品类型属性成功！',__CONTROL__.'/attrIndex/type_id/'.$this->type_id);
			}
			$this->error('添加商品类型属性失败！');
		}
		$data['type_id'] = $this->type_id;
		$this->assign('data',$data);
		$this->display('addAttr.html');
	}
/*
	展示当前类型的所有属性
*/
	public function attrIndex(){
		if(!$this->type_id) exit('缺少参数！');
		$_SESSION['type_id'] = $this->type_id;
		$data = $this->db->fetchAttrAll($this->type_id);

		$data = is_array($data)?$data:array();
		foreach($data as $k=>$v){
			$data[$k]['tags'] = $this->db->fetchTagAll($v['tc_id']);
		}
		$this->assign('type_id',$this->type_id);
		$this->assign('data',$data);
		$this->display('attr.html');
	}
/*
	修改属性
*/
	public function editAttr(){
		if(!$this->tc_id) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->editAttr($this->tc_id)){
				$this->success('修改类型属性成功！',__CONTROL__.'/attrIndex/type_id/'.$_SESSION['type_id']);
			}
			$this->error('修改类型属性失败！');
		}
		$data = $this->db->findAttr($this->tc_id);
		$this->assign('data',$data);
		$this->display('editAttr.html');
	}
/*
	删除属性
*/
	public function delAttr(){
		if(!$this->tc_id) exit('缺少参数！');
		if($this->db->delAttr($this->tc_id)){
			$this->success('删除类型属性成功！');
		}
		$this->error('删除类型属性失败！');
	}
/*
	添加属性值
*/
	public function addTag(){
		if(!$this->tc_id) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->addTag($this->tc_id)){
				$this->success('添加属性值成功！',__CONTROL__.'/tagIndex/tc_id/'.$this->tc_id);
			}
			$this->error('添加属性值失败！');
		}
		$this->assign('tc_id',$this->tc_id);
		$this->display('addTag.html');
	}
/*
	属性值列表
*/
	public function tagIndex(){
		if(!$this->tc_id) exit('缺少参数！');
		$_SESSION['tc_id'] = $this->tc_id;
		$data = $this->db->fetchTagAll($this->tc_id);
		$this->assign('tc_id',$this->tc_id);
		$this->assign('data',$data);
		$this->display('tag.html');
	}
/*
	修改属性值
*/
	public function editTag(){
		if(!$this->tid) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->editTag($this->tid)){
				$this->success('修改属性值成功！',__CONTROL__.'/tagIndex/tc_id/'.$_SESSION['tc_id']);
			}
			$this->error('修改属性值失败！');
		}
		$data = $this->db->findTag($this->tid);
		$this->assign('data',$data);
		$this->display('editTag.html');
	}
/*
	删除属性值
*/
	public function delTag(){
		if(!$this->tid) exit('缺少参数！');
		if($this->db->delTag($this->tid)){
			$this->success('删除属性值成功！');
		}
		$this->error('删除属性值失败！');
	}
}
?>