<?php
class CategoryModel extends ViewModel{
	public $tables = 'category';
	public $view = array();
/*
	获得分类的属性
*/
	public function getAttr($cid){
		$this->view['tag_attr'] = array(
			'type'=>'inner',
			'on'=>'category.type_id=tag_attr.type_id'
		);
		$this->view['tag'] = array(
			'type'=>'inner',
			'on'=>'tag_attr.tc_id=tag.tc_id'
		);
		$field = array(
			'tag.tc_id',
			'tc_name',
			'tid',
			'tname'
		);
		return $this->field($field)->where(array('cid'=>$cid))->select();
	}
/*
	查询所有分类
*/
	public function fetchAll($pid=0){
		$data = $this->select();
		return $this->formatData($data,$pid);
	}
/*
	添加分类
*/
	public function addCategory(){
		$data = $this->disData();
		return $this->add($data);
	}
/*
	查询单个分类
*/
	public function findCategory($cid){
		$data = $this->where(array('cid'=>$cid))->find();
		return $data;
	}
/*
	修改分类
*/
	public function editCategory($cid){
		$data = $this->disData();
		return $this->where(array('cid'=>$cid))->update($data);
	}
/*
	删除分类
*/
	public function delCategory($cid){
		if($this->fetchAll($cid)){
			$this->error = '请先删除子类！';
			return false;
		}
		$data = $this->table('goods')->where(array('cid'=>$cid))->count();
		if($data){
			$this->error = '请先删除分类中的商品！';
			return false;
		}
		return $this->where(array('cid'=>$cid))->del();
	}
/*
	对分类数据进行格式化
*/
	private function formatData($data,$pid=0){
		$newData = Data::channel($data,'cid','pid',$pid,null,2,'--');
		return $newData;
	}
/*
	对表单提交数据进行处理
*/
	private function disData(){
		$data = array();
		$data['pid'] = Q('post.pid','intval',0);
		$data['type_id'] = Q('post.type_id','intval',0);
		$data['cname'] = Q('post.cname','strip_tags,addslashes');
		$data['ctitle'] = Q('post.ctitle','strip_tags,addslashes');
		$data['c_keywords'] = Q('post.c_keywords','strip_tags,addslashes');
		$data['c_description'] = Q('post.c_description','strip_tags,addslashes');
		$data['htmldir'] = Q('post.htmldir','strip_tags,addslashes');
		$data['cis_show'] = Q('post.cis_show','intval');
		$data['sort'] = Q('post.sort','intval');
		$data['is_archtml'] = Q('post.is_archtml','intval');
		return $data;
 	}
}
?>