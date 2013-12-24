<?php
class AccountModel extends Model{
	public $table = 'user';
	public function findBalance($uid){
		$result = $this->table('user_info')->field('money')->where(array('uid'=>$uid))->find();
		return $result['money'];
	}
	public function addBalance($uid){
		return $this->table('user_info')->inc('money','uid='.$uid,10000);
	}
	public function findUser($uid){
		$data = array();
		$data['user'] = $this->where(array('uid'=>$uid))->find();
		$data['userInfo'] = $this->table('user_info')->where(array('uid'=>$uid))->find();
		return $data;
	}
	public function addUserInfo($uid){
		$data = $this->disData();
		return $this->table('user_info')->where(array('uid'=>$uid))->update($data);
	}
	private function disData(){
		$data = array();
		$data['nickname'] = Q('post.nickname','strip_tags,addslashes');
		$data['name'] = Q('post.name','strip_tags,addslashes');
		$data['province'] = Q('post.province','strip_tags,addslashes');
		$data['city'] = Q('post.city','strip_tags,addslshes');
		$data['county'] = Q('post.county','strip_tags,addslshes');
		$data['street'] = Q('post.street','strip_tags,addslshes');
		$data['zipcode'] = Q('post.zipcode','strip_tags,addslshes');
		$data['phone'] = Q('post.phone','strip_tags,addslasher');
		$data['tel'] = Q('post.tel','strip_tags,addslashes');
		return $data;
	}
}
?>