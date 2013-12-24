<?php
class CartModel extends Model{
	public $table = 'cart';
//统计是否含有符合条件的购物车记录
	public function checkCart($where){
		return $this->where($where)->count();
	}
//购物车中存在记录 即添加相应的数量
	public function incCart($where,$data){
		$this->inc('num',$where,$data['num']);
		return $this->where(array('uid'=>$data['uid']))->count();
	}
//添加进购物车
	public function addCart($data){
		$this->add($data);
		return $this->where(array('uid'=>$data['uid']))->count();
	}
//查询出该用户的所有购物车记录
	public function fetchAll($uid){
		return $this->where(array('uid'=>$uid))->select();
	}
//删除购物车记录
	public function delCart($where){
		return $this->where($where)->del();
	}
//获得单条商品的详细情况
	public function getGoods($gid){
		$data = array();
		$field = array(
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