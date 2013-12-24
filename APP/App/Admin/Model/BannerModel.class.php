<?php
class BannerModel extends Model{
	public $table = 'banner';
	public function addBanner(){
		$data= $this->disData();
		return $this->add($data);
	}
	public function fetchAll(){
		return $this->order('sort ASC')->select();
	}
	public function findBanner($id){
		return $this->where(array('id'=>$id))->find();
	}
	public function editBanner($id){
		$data = $this->disData();
		return $this->where(array('id'=>$id))->update($data);
	}
	public function delBanner($id){
		$data = $this->where(array('id'=>$id))->find();
		$imgPath = !empty($data['image'])?ROOT_PATH.ltrim($data['image'],'/'):null;
		$this->delImage($imgPath);
		return $this->where(array('id'=>$id))->del();
	}
	private function disData(){
		$data = array();
		$data['title'] = Q('post.title','addslashes,strip_tags');
		$data['url'] = Q('post.url','addslashes,strip_tags');
		$data['sort'] = Q('post.sort','intval');
		$data['isshow'] = Q('post.isshow','intval');
		$data['image'] = isset($_POST['file'])?$_POST['file'][1]['path']:$_POST['image'];
		return $data;
	}
/*
	删除图片
*/
	private function delImage($file){
		is_dir($file) && dir::del($file);
		is_file($file) && unlink($file);
	}
}
?>