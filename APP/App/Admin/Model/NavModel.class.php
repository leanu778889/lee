<?php
class NavModel extends Model{
	public $table = 'nav';
/*
	添加导航
*/
	public function addNav(){
		$data = $this->disData();
		return $this->add($data);
	}
/*
	获得所有导航
*/
	public function fetchAll(){
		$data = $this->order('sort')->select();
		return $this->formatData($data);
	}
/*
	获得单条导航的详细信息
*/
	public function findNav($nid){
		return $this->where(array('nid'=>$nid))->find();
	}
/*
	修改导航
*/
	public function editNav($nid){
		$data = $this->disData();
		return $this->where(array('nid'=>$nid))->update($data);
	}
/*
	删除导航
*/
	public function delNav($nid){
		return $this->where(array('nid'=>$nid))->del();
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
/*
	处理表单提交的数据
*/
	private function disData(){
		$data = array();
		$data['n_title'] = Q('post.n_title','strip_tags,addslashes');
		$data['url'] = Q('post.url','addslashes');
		$data['open_new'] = Q('post.open_new','intval');
		$data['is_show'] = Q('post.is_show','intval');
		$data['sort'] = Q('post.sort','intval');
		$data['site'] = Q('post.site','intval');
		return $data;
	}
}
?>