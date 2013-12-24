<?php
class TypeModel extends ViewModel{
	public $table = 'tag_type';
	public $view = array();
/*
	添加商品类型
*/
	public function addType(){
		$data = $this->disTypeData();
		return $this->add($data);
	}
/*
	查看所有商品类型
*/
	public function fetchTypeAll(){
		return $this->select();
	}
/*
	查看单条商品类型
*/
	public function findType($type_id){
		return $this->where(array('type_id'=>$type_id))->find();
	}
/*
	修改商品类型
*/
	public  function editType($type_id){
		$data = $this->disTypeData();
		return $this->where(array('type_id'=>$type_id))->update($data);
	}
/*
	删除商品类型
*/
	public function delType($type_id){
		if($this->table('tag_attr')->where(array('type_id'=>$type_id))->count()){
			$this->error = '请先删除类型的属性！';
			return false;
		}
		if($this->table('category')->where(array('type_id'=>$type_id))->count()){
			$this->error = '请先删除所属类型的分类！';
			return false;
		}
		return $this->where(array('type_id'=>$type_id))->del();
	}
/*
	添加类型属性
*/
	public function addAttr($type_id){
		$data = $this->disAttrData($type_id);
		return $this->table('tag_attr')->add($data);
	}
/*
	查看当前类型的所有属性
*/
	public function fetchAttrAll($type_id){
		return $this->table('tag_attr')->where(array('type_id'=>$type_id))->select();
	}
/*
	查看单条属性
*/
	public function findAttr($tc_id){
		return $this->table('tag_attr')->where(array('tc_id'=>$tc_id))->find();
	}
/*
	修改属性
*/
	public function editAttr($tc_id){
		$data = $this->disAttrData();
		return $this->table('tag_attr')->where(array('tc_id'=>$tc_id))->update();
	}
/*
	删除属性
*/
	public function delAttr($tc_id){
		if($this->table('tag')->where(array('tc_id'=>$tc_id))->count()){
			return false;
		}
		return $this->table('tag_attr')->where(array('tc_id'=>$tc_id))->del();
	}
/*
	添加属性值
*/
	public function addTag($tc_id){
		$data = $this->disTagData($tc_id);
		return $this->table('tag')->add($data);
	}
/*
	查看当前类型的所有属性
*/
	public function fetchTagAll($tc_id){
		return $this->table('tag')->where(array('tc_id'=>$tc_id))->select();
	}
/*
	查看单条属性
*/
	public function findTag($tid){
		return $this->table('tag')->where(array('tid'=>$tid))->find();
	}
/*
	修改属性
*/
	public function editTag($tid){
		$data = $this->disTagData();
		return $this->table('tag')->where(array('tid'=>$tid))->update($data);
	}
/*
	删除属性
*/
	public function delTag($tid){
		return $this->table('tag')->where(array('tid'=>$tid))->del();
	}
/*
	属性值的数据处理
*/
	public function disTagData($tc_id=null){
		if(empty($_POST['tname'])) exit('请填写属性值！');
		$data = array();
		if(!is_null($tc_id)){
			$data['tc_id'] = $tc_id;
		}
		$data['tname'] = Q('post.tname','strip_tags,addslashes');
		return $data;
	}
/*
	属性的数据处理
*/
	private function disAttrData($type_id=null){
		if(empty($_POST['tc_name'])) exit('请填写类型属性名！');
		$data = array();
		if(!is_null($type_id)){
			$data['type_id'] = $type_id;
		}
		$data['tc_name'] = Q('post.tc_name','strip_tags,addslashes');
		$data['issize'] = Q('post.issize','intval',0);
		return $data;
	}
/*
	商品类型的数据处理
*/
	private function disTypeData(){
		$data = array();
		if(empty($_POST['type_name'])) exit('请填写类型名！');
		$data['type_name'] = Q('post.type_name','strip_tags,addslashes');
		return $data;
	}
}
?>