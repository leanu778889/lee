<?php
class ListControl extends CommonControl{
	private $cid;
	private $s;
	private $order;
	private $url;
	public function __auto(){
		$this->db = K('category');
		$this->s = isset($_GET['s'])?explode('-',$_GET['s']):array();
		$this->cid = Q('get.cid','intval',0);
		$this->order = Q('get.order','strip_tags,addslashes','addtime').' DESC';
		$this->url = __METH__.'/cid/'.$_GET['cid'];
	}
	public function index(){
		if(!$this->cid) _404();
		$data = $this->db->showCategory($this->cid);
		$this->assign('cid',$this->cid);
		//顶级分类名称
		$this->assign('title',$data['title']['cname']);
		//2级分类及3J分类
		$this->assign('data',$data['con']);
		$arr = array();
		$arr[] = array('cname'=>$data['title']['cname'],'cid'=>$data['title']['cid']);
		foreach($data['con'] as $k=>$v){
			foreach ($v['Data'] as $m => $n) {
				if($n['cid'] == $this->cid){
					$arr[] = array('cname'=>$v['cname'],'cid'=>$v['cid']);
					$arr[] = array('cname'=>$n['cname'],'cid'=>$n['cid']);
				}
			}
			if($v['cid'] ==$this->cid){
				$arr[] = array('cname'=>$v['cname'],'cid'=>$v['cid']);
			}
		}
		//列表页位置导航
		$this->assign('arr',$arr);
		//获取该分类的属性
		$attr = $this->db->getAttr($this->cid,$this->s,$this->url);
		$this->assign('attr',$attr);
		//商品分页
		$total = $this->db->getGoods($this->cid,$this->s,$this->order,10,0);
		$page = new Page($total,5);
		$this->assign('pageObj',$page);
		$this->assign('page',$page->show());
		//获取该分类的商品
		$goods = $this->db->getGoods($this->cid,$this->s,$this->order,$page->limit(),1);
		$this->assign('goods',$goods);
		//分配商品排序的url
		if(isset($_GET['s'])){
			$this->url = $this->url.'/s/'.$_GET['s'];
		}
		$this->assign('url',$this->url);

		$this->display();
	}
}
?>