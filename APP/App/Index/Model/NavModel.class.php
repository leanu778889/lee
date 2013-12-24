<?php
class NavModel extends Model{
	public $table = 'nav';
/*
	获得所有导航
*/
	public function fetchAll(){
		$data = $this->order('sort')->select();
		return $this->formatData($data);
	}
/*
	格式化导航列表的数据
*/
	private function formatData($data){
		$result = array();
		foreach($data as $v){
			$result[$v['site']][] = $v;
		}
		return $result;
	}
}
?>