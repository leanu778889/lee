<?php
class UserModel extends ViewModel{
	public $table = 'user';
	public $view = array();
	public function addUser(){
		$data = $this->disData();
		$uid = $this->add($data['user']);
		if($uid){
			$data['user_info']['uid'] = $uid;
			$data['user_address']['uid'] = $uid;
			$this->table('user_info')->add($data['user_info']);
		}else{
			return false;
		}
		return $uid;
	}
	public function findUser($where){
		$this->view['user_info'] = array(
			'type'=>'inner',
			'field'=>'nickname',
			'on'=>'user_info.uid = user.uid'
		);
		return $this->where($where)->find();
	}
	private function disData(){
		$data = array();
		$data['user']['uname'] = Q('post.email','strip_tags,addslashes');
		$data['user']['email'] = Q('post.email','strip_tags,addslashes');
		$data['user']['password'] = Q('post.password','md5');
		$data['user_info'] = array();
		return $data;
	}
}
?>