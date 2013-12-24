<?php
class IndexModel extends Model{
	public $table = 'banner';
	public function fetchBanner(){
		return $this->order('sort ASC')->select();
	}
	public function fetchChugui(){
		return $this->table('showgoods')->order('sort ASC')->select();
	}
	public function fetchCategory(){
		$field = array(
			'cid',
			'cname',
		);
		$data = $this->table('category')->field('cid,ctitle')->where(array('pid'=>0))->select();
		function func($v){
			return $v['cid'];
		}
		foreach ($data as $k => $v) {
			$result = $this->table('category')->field('cid')->where(array('pid'=>$v['cid']))->select();
			$result = array_map('func', $result);
			$data[$k]['Data'] = $this->table('category')->field($field)->in(array('pid'=>$result))->group('cname')->limit(8)->select();
		}
		return $data;
	}
}
?>