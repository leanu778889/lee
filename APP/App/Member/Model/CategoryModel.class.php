<?php
class CategoryModel extends Model{
	public $table = 'category';
/*
	查询所有分类
*/
	public function fetchAll(){
		$field = array(
			'cid',
			'pid',
			'cname'
		);
		return $this->field($field)->select();
	}
}
?>