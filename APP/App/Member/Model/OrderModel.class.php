<?php
class OrderModel extends Model{
	public $table = 'orders';
	public function addOrder($uid){
		$data = $this->table('cart')->field('gid,num,size')->where(array('uid'=>$uid))->select();
		foreach($data as $v){
			$v['goods_num'] = $v['num'];
			unset($v['num']);
			$v['uid'] = $uid;
			$v['single_time'] = $_SERVER['REQUEST_TIME'];
			$v['order_status'] = 0;
			$this->add($v);
		}
		return true;
	}
	public function fetchAll($where){
		return $this->where($where)->order('single_time DESC')->select();
	}
	public function payOrder($uid){
		$data = $this->disData();
		$address_id = $this->table('order_address')->add($data['address']);
		$total = 0;
		foreach ($data['order'] as $v) {

			$order = $this->field('gid','goods_num')->where(array('order_id'=>$v))->find();
			$goods = $this->table('goods')->field('price')->where(array('gid'=>$order['gid']))->find();
			$total +=$order['goods_num']*$goods['price'];
		}
		$user = $this->table('user_info')->field('money')->where(array('uid'=>$uid))->find();
		if($user['money']>=$total){
			$this->table('user_info')->dec('money','uid='.$uid,$total);
			foreach ($data['order'] as $v) {
				$result = array();
				$result['order_id'] = $v;
				$result['order_status'] = 1;
				$result['address_id'] = $address_id;
				$this->update($result);
			}
		}else{
			return false;
		}
		return true;
	}
	private function disData(){
		$data = array();
		$data['order'] = $_POST['order_id'];
		$data['address']['province'] = Q('post.province','strip_tags,addslasher');
		$data['address']['city'] = Q('post.city','strip_tags,addslasher');
		$data['address']['county'] = Q('post.county','strip_tags,addslasher');
		$data['address']['street'] = Q('post.street','strip_tags,addslasher');
		$data['address']['zipcode'] = Q('post.zipcode','strip_tags,addslasher');
		$data['address']['consignee'] = Q('post.consignee','strip_tags,addslasher');
		$data['address']['phone'] = Q('post.phone','strip_tags,addslasher');
		return $data;
	}
	public function delOrder($order_id){
		return $this->where(array('order_id'=>$order_id))->del();
	}
	public function getGoods($gid){
		$data = array();
		$field = array(
			'gid',
			'main_title',
			'num',
			'price',
			'old_price'
		);
		$data['goods'] = $this->table('goods')->field($field)->where(array('gid'=>$gid))->find();
		$data['img'] = $this->table('goods_img')->field('s_img')->where(array('gid'=>$gid))->find();
		$field = 't_g.tid,tname,t_a.tc_id,tc_name';
		$sql = 'SELECT '.$field.' FROM '.C('DB_PREFIX').'tag_goods AS t_g ';
		$sql.= 'INNER JOIN '.C('DB_PREFIX').'tag AS t ON t_g.tid=t.tid ';
		$sql.= 'INNER JOIN '.C('DB_PREFIX').'tag_attr AS t_a ON t.tc_id=t_a.tc_id ';
		$sql.= 'WHERE t_g.gid='.$gid.' AND t_a.issize >=1';
		$attr = $this->query($sql);
		foreach($attr as $k=>$v){
			$data['attr'][$v['tc_name']][] = $v;
		}
		return $data;
	}
}
?>