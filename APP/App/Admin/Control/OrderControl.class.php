<?php
class OrderControl extends CommonControl{
	private $status;
	private $orser_id;
	public function __auto(){
		$this->status = Q('get.status','intval');
		$this->order_id = Q('get.order_id','intval');
		$this->db = K('order');
	}
	public function index(){
		if(isset($this->status)){
			$where = array('order_status'=>$this->status);
		}else{
			$where = '1=1';
		}
		$total = $this->db->getTotal($where);
		$page = new Page($total,1);
		$data = $this->disData($where,$page->limit());
		$this->assign('data',$data);
		$this->assign('page',$page->show());
		$this->display();
	}
	public function del(){
		if($this->db->delOrder($this->order_id)){
			$this->success('删除订单成功！');
		}
	}
	private function disData($where,$limit){
		$data = $this->db->fetchAll($where,$limit);
		if(!is_array($data)){
			$data = array();
		}
		foreach($data as $k=>$v){
			$data[$k]['goods'] = $this->db->getGoods($v['gid']);
			$data[$k]['xiaoji'] = $data[$k]['goods']['price']*$v['goods_num'];
			$data[$k]['address'] = $this->db->getAddress($v['address_id']);
		}
		return $data;
	}
}
?>