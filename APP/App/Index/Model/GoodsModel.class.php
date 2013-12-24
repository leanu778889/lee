<?php
class GoodsModel extends ViewModel{
	public $table = 'goods';
	public $view = array();
	public function fetchAll($where,$order,$limit){
		$this->view['goods_img'] = array(
			'type'=>'inner',
			'on'=>'goods.gid=goods_img.gid'
		);
		$field=array(
			'goods.gid',
			'price',
			'old_price',
			'main_title',
			'sub_title',
			'cid',
			'm_img'
		);
		$data = $this->field($field)->where($where)->group('gid')->order($order)->limit($limit)->select();
		foreach ($data as $k => $v) {
			$data[$k]['zhekou'] = number_format($v['price']/$v['old_price']*10,1);
		}
		return $data;
	}
	public function findGoods($gid){
		$this->view['goods_detail'] = array(
			'type' =>'inner',
			'on'=>'goods.gid=goods_detail.gid'
		);
		$data = $this->where(array('gid'=>$gid))->find();
		$data['zhekou'] = number_format($data['price']/$data['old_price']*10,1);
		unset($this->view);
		$data['images'] = $this->table('goods_img')->field('s_img')->where(array('gid'=>$gid))->limit(6)->select();
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