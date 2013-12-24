<?php
class OrderControl extends CommonControl{
	private $uid;
	private $order_id;
	public function __auto(){
		$this->db = K('order');
		if($_SESSION[C('RBAC_AUTH_KEY')]){
			$this->uid = $_SESSION[C('RBAC_AUTH_KEY')];
		}else{
			go(U('Member/Login/index'));
		}
		$this->order_id = Q('get.order_id','intval',0);
	}
	//展示订单页
	public function index(){
		$data = $this->getCartData();
		$this->assign('data',$data);
		$this->display();
	}
	//添加到购物车
	public function add(){
		if($this->db->addOrder($this->uid)===true){
			$db = K('Cart');
			if($db->delCart(array('uid'=>$this->uid))){
				go(U('Member/Order/index'));
			}
		}else{
			_404();
		}
	}
	//付款
	public function pay(){
		if(IS_POST === true){
			if($this->db->payOrder($this->uid)){
				go(U('Member/Order/paySuccess'));
			}else{
				$this->error('余额不足，请先充值！',U('Member/Account/index'));
			}
		}
	}
	//付款成功
	public function paySuccess(){
		$this->display();
	}
	//获得订单数据并处理
	private function getCartData(){
		if(!$this->order_id){
			$where = array('uid'=>$this->uid,'order_status'=>0);
		}else{
			$where = array('uid'=>$this->uid,'order_id'=>$this->order_id,'order_status'=>0);
		}
		$data = $this->db->fetchAll($where);
		$result = array();
		if(!is_array($data)){
			$data = array();
		}
		foreach($data as $k=>$v){
			$result[$v['gid']]['data'] = $this->db->getGoods($v['gid']);
			$result[$v['gid']]['nums'][$k]['num'] =$v['goods_num'] ;
			$result[$v['gid']]['nums'][$k]['xiaoji'] =$v['goods_num']*$result[$v['gid']]['data']['goods']['price'];
			$result[$v['gid']]['nums'][$k]['size'] =explode(',', $v['size'] );
			$result[$v['gid']]['nums'][$k]['order_id'] = $v['order_id'];
		}
		return $result;
	}
}
?>