<?php
class Goods{
	public function _goods($attr,$content,$parse){
		$name = isset($attr['name'])?$attr['name']:'field';
		$cid = isset($attr['cid'])?(int)$attr['cid']:0;
		if(!$cid){
			$cid =isset($_GET['cid'])?(int)$_GET['cid']:0;
		}
		$where = $cid?' cid='.$cid:' 1=1';
		$limit = isset($attr['limit'])?$attr['limit']:8;
		$order = isset($attr['order'])?$attr['order'].' DESC':'addtime DESC';
		$str =<<<str
		<?php
			\$db = K('goods');
			\$data = \$db->fetchAll("{$where}","{$order}","{$limit}");
		?>
str;
		$str .='<?php foreach($data as $k=>$'.$name.'):?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>