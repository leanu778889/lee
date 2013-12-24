<?php
class OrderModel extends Model{
	public $table='orders';
	public function getTotal($where){
		return $this->where($where)->count();
	}
	public function fetchAll($where,$limit){
		return $this->where($where)->limit($limit)->select();
	}
	public function getGoods($gid){
		$field = array(
			'gid',
			'main_title',
			'num',
			'price',
		);
		return $this->table('goods')->field($field)->where(array('gid'=>$gid))->find();
	}
	public function delOrder($order_id){
		$data = $this->table('orders')->field('address_id')->where(array('order_id'=>$order_id))->find();
		$this->table('order_address')->where(array('address_id'=>$data['address_id']))->del();
		return $this->table('orders')->where(array('order_id'=>$order_id))->del();
	}
	public function getAddress($address_id){
		return $this->table('order_address')->field('province,city,county,street')->where(array('address_id'=>$address_id))->find();
	}
}
?>