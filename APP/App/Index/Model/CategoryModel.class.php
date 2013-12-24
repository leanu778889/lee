<?php
class CategoryModel extends ViewModel{
	public $tables = 'category';
	public $view = array();
/*
	查询所有分类
*/
	public function fetchAll(){
		$field = array(
			'cid',
			'pid',
			'cname'
		);
		return $this->field($field)->select();
	}
/*
	获得分类的属性
*/
	public function getAttr($cid,$s,$url){
		if(isset($_GET['order'])){
			$url = $url.'/order/'.$_GET['order'];
		}
		$data = $this->field('type_id')->where(array('cid'=>$cid))->find();
		$type_id = $data['type_id'];
		$attr = $this->table('tag_attr')->field('tc_id,tc_name')->where(array('type_id'=>$type_id))->where('issize <2')->select();
		foreach($attr as $k=>$v){
			$temp = isset($s[$k])?$s[$k]:0;
			$attr[$k]['data'] = $this->table('tag')->field('tid,tname')->where(array('tc_id'=>$v['tc_id']))->select();
			array_unshift($attr[$k]['data'],array('tname'=>'不限','tid'=>0));
			foreach ($attr[$k]['data'] as $m=>$n){
				if($temp == $n['tid']){
					$attr[$k]['data'][$m]['html'] = '<span class=" fil-name on">'.$n['tname'].'</span>';
				}else{
					$s[$k] = $n['tid'];
					$str = implode('-',$s);
					$attr[$k]['data'][$m]['html'] = '<a class="fil-name" href="'.$url.'/s/'.$str.'">'.$n['tname'].'</a>';
				}
			}
			$s[$k] = $temp;
		}
		return $attr;
	}
/*
	获取该分类下符合检索条件的商品
*/
	public function getGoods($cid,$s,$order,$limit,$type){
		$gids = array();
		//取得符合一个条件的商品id
		foreach($s as $v){
			if($v==0) continue;
			unset($this->view);
			$gid = $this->table('tag_goods')->where(array('tid'=>$v))->group('gid')->select();
			$gid = !empty($gid)?$gid:array();
			$gids[] =$gid;
		}
		$tempArr = array();
		//取得检索条件的交集，即取得满足所有条件的商品id
		foreach($gids as $k=>$v){
			$arr = array();
			foreach($v as $m){
				$arr[] = $m['gid'];
			}
			if($k==0){
				$tempArr = $arr;
				continue;
			}
			$tempArr = array_intersect($tempArr, $arr);
		}
		//组合where条件
		if(empty($gids)){
			$where = array('cid'=>$cid);
		}elseif(!empty($tempArr)){
			$where = 'goods.cid = '.$cid.' AND goods.gid in('.implode(',',$tempArr).')';
		}else{
			$where = 'goods.gid in(0)';
		}
		$this->view['goods'] = array(
			'type'=>'inner',
			'on'=>'category.cid=goods.cid'
		);
		$this->view['goods_img'] = array(
			'type'=>'inner',
			'on'=>'goods.gid=goods_img.gid'
		);
		$field=array(
			'goods.gid',
			'goods.price',
			'goods.old_price',
			'goods.main_title',
			'goods.sub_title',
			'goods.cid',
			'm_img',
			's_img'
		);
		$data = $this->table('goods')->field($field)->where($where)->group('gid')->order($order)->limit($limit)->select();
		$data = !empty($data)?$data:array();
		foreach ($data as $k => $v) {
			$data[$k]['zhekou'] = number_format($v['price']/$v['old_price']*10,1);
		}
		if($type){
			return $data;
		}else{
			unset($this->view['goods_img']);
			return $this->table('goods')->field(array('goods.cid'))->where($where)->count();
		}
	}
/*
	获得当前分类的顶级分类下面的所有分类
*/
	public function showCategory($cid){
		$cid = $this->findParent($cid);
		$data = array();
		$data['con'] = Data::channel($this->fetchAll(),'cid','pid',$cid,null,1);
		$data['title'] = $this->field('cname,cid')->where(array('cid'=>$cid))->find();
		return $data;
	}
/*
	获得父级分类
*/
	private function findParent($cid){
		$data = $this->field('pid,cid')->where(array('cid'=>$cid))->find();
		if($data['pid']){
			$cid = $this->findParent($data['pid']);
		}else{
			return $data['cid'];
		}
		return $cid;
	}
}
?>