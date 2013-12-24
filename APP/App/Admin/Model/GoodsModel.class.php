<?php
class GoodsModel extends ViewModel{
	public $table = "goods";
	public $view = array();
/*
	添加新商品
*/
	public function addGoods(){
		$data = $this->disData();
		$this->beginTrans();
		$gid = $this->add($data['goods']);
		$attr = array();
		if($gid){
			foreach($data['goods_attr'] as $v){
				$attr['tid'] = $v;
				$attr['gid'] = $gid;
				if(!$this->table('tag_goods')->add($attr)){
					$this->rollback();
				}
			}
			$data['goods_detail']['gid'] = $gid;
			foreach($data['goods_img'] as $k=>$v){
				$data['goods_img'][$k]['gid'] = $gid;
				if(!$this->table('goods_img')->add($data['goods_img'][$k])){
					$this->rollback();
				}
			}
			if(!$this->table('goods_detail')->add($data['goods_detail'])){
				$this->rollback();
			}
		}else{
			$this->rollback();
		}
		$this->commit();
		return $gid;
	}
/*
	修改商品
*/
	public function editGoods($gid){
		$data = $this->disData();
		$this->beginTrans();
			$this->where(array('gid'=>$gid))->update($data['goods']);
			$this->table('tag_goods')->where(array('gid'=>$gid))->del();
			foreach($data['goods_attr'] as $v){
				$attr['tid'] = $v;
				$attr['gid'] = $gid;
				if(!$this->table('tag_goods')->add($attr)){
					$this->rollback();
				}
			}
			foreach($data['goods_img'] as $k=>$v){
				$data['goods_img'][$k]['gid'] = $gid;
				if(!$this->table('goods_img')->add($data['goods_img'][$k])){
					$this->rollback();
				}
			}
			$this->table('goods_detail')->where(array('gid'=>$gid))->update($data['goods_detail']);
		$this->commit();
		return true;
	}
/*
	删除商品
*/
	public function delGoods($gid){
		$img = $this->table('goods_img')->field('img_id')->where(array('gid'=>$gid))->select();
		$img = empty($img)?array():$img;
		foreach ($img as $v) {
			$this->delThumb($v['img_id']);
		}
		$this->beginTrans();
		$this->table('goods_img')->where(array('gid'=>$gid))->del();
		$this->table('tag_goods')->where(array('gid'=>$gid))->del();
		$this->table('goods_detail')->where(array('gid'=>$gid))->del();
		$this->where(array('gid'=>$gid))->del();
		$this->commit();
		return true;
	}
/*
	统计商品总数
*/
	public function goodsTotal(){
		return $this->count();
	}
/*
	查询出所有的商品
*/
	public function fetchAll($limit){
		$this->view['category'] =array(
			'type'=>'inner',
			'field'=>'cid,cname',
			'on'=>'goods.cid=category.cid'
		);
		return $this->limit($limit)->select();
	}
/*
	查询单条商品的详细信息
*/
	public function findGoods($gid){
		$attr= $this->table('tag_goods')->where(array('gid'=>$gid))->select();
		$img= $this->table('goods_img')->where(array('gid'=>$gid))->select();
		$this->view['goods_detail'] = array(
			'type'=>'inner',
			'on'=>'goods.gid=goods_detail.gid'
		);
		$data = $this->where(array('gid'=>$gid))->find();
		function func($v){
			return $v['tid'];
		}
		$data['attr'] = array_map('func', $attr);
		$data['img'] = $img;
		return $data;
	}
/*
	添加到橱柜
*/
	public function addShow($gid){
		$data = array();
		$data['gid'] = $gid;
		return $this->table('showgoods')->add($data);
	}
/*
	展示橱柜所有商品
*/
	public function fetchShow(){
		$this->view['showgoods'] =array(
			'type'=>'inner',
			'on'=>'showgoods.gid=goods.gid'
		);
		$field = array(
			'goods.gid',
			'main_title',
			'img',
			'sort',
			'id'
		);
		return $this->table('showgoods')->field($field)->select();
	}
/*
	显示单条橱柜商品
*/
	public function findShow($id){
		return $this->table('showgoods')->field('id,img,sort')->where(array('id'=>$id))->find();
	}
/*
	修改橱柜商品
*/
	public function editShow($id){
		$data = array();
		$data['img'] = isset($_POST['file'])?$_POST['file'][1]['path']:$_POST['image'];
		$data['sort'] = Q('post.sort','intval');
		return $this->table('showgoods')->where(array('id'=>$id))->update($data);
	}
/*
	删除橱柜商品
*/
	public function delShow($id){
		$img = $this->table('showgoods')->field('img')->where(array('id'=>$id))->find();
		$imgPath = !empty($img['img'])?ROOT_PATH.ltrim($img['img'],'/'):null;
		$this->delImage($imgPath);
		return $this->table('showgoods')->where(array('id'=>$id))->del();
	}
/*
	处理通过表单提交过来的商品数据
*/
	private function disData(){
		$data = array();
		$data['goods']['main_title'] = Q('post.main_title','strip_tags,addslashes');
		$data['goods']['sub_title']  = Q('post.sub_title','strip_tags,addslashes','');
		$data['goods']['cid']        = Q('post.cid','intval');
		$data['goods']['price']      = Q('post.price','intval');
		$data['goods']['old_price']  = Q('post.old_price','intval');
		$data['goods']['num']        = Q('post.num','intval');
		if(METHOD ==='add'){
			$data['goods']['addtime']     = $_SERVER['REQUEST_TIME'];
			$data['goods']['update_time'] = date('Y-m-d H:m:i',$_SERVER['REQUEST_TIME']);
		}
		$data['goods_attr']                    = $_POST['attr'];
		$data['goods_img']                     = $this->disImage();
		$data['goods_detail']['g_keywords']    = Q('post.g_keywords','strip_tags,addslashes');
		$data['goods_detail']['g_description'] = Q('post.g_description','strip_tags,addslashes');
		$data['goods_detail']['goods_detail']  = $_POST['goods_detail'];
		return $data;
	}
/*
	处理图片
*/
	private function disImage(){
		if(!isset($_POST['file']))	return array();
		// 220*220   60*60  460*460  1000*1000
		$files     = array();
		$img       = new Image();
		$thumbSize = explode(',', C('THUMB_SIZE'));
		foreach($_POST['file'] as $k=>$v){
			$pathinfo  = pathinfo($v['path']);
			$filename  = $pathinfo['filename'];
			$ext       = $pathinfo['extension'];
			$thumbPath = rtrim(str_replace('\\', '/',C('THUMB_PATH')),'/').'/'.$filename;
			foreach($thumbSize as $n=>$m){
				if($n%2){
					$thumbWidth  = $thumbSize[$n-1];
					$thumbHeight = $m;
					$outFile     = $filename.'_'.$thumbWidth.'x'.$thumbHeight.'.'.$ext;
					$files[$k][] = $thumbPath.'/'.$outFile;
					$img->thumb($v['path'],$thumbWidth,$thumbHeight,C('THUMB_TYPE'),$thumbPath,$outFile);
				}
			}
			$this->delImage(ROOT_PATH.$v['path']);
		}
		$data = array();
		foreach($files as $k=>$v){
			$data[$k]['s_img'] = str_replace(ROOT_PATH, '/',$v[0]);
			$data[$k]['m_img'] = str_replace(ROOT_PATH, '/',$v[1]);
			$data[$k]['b_img'] = str_replace(ROOT_PATH, '/',$v[2]);
			$data[$k]['y_img'] = str_replace(ROOT_PATH, '/',$v[3]);
		}
		/*$arr = array();
		foreach($data as $k=>$v){
			$str = '';
			foreach($v as $n=>$m){
				$str .='#@#'.$m.'#@#';
			}
			$arr[$k] = $str;
		}*/
		return $data;
	}
	public function delThumb($img_id){
		$file = $this->table('goods_img')->field('s_img')->where(array('img_id'=>$img_id))->find();
		$imgPath = ROOT_PATH.ltrim(dirname($file['s_img']),'/');
		$this->delImage($imgPath);
		return $this->table('goods_img')->where(array('img_id'=>$img_id))->del();
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