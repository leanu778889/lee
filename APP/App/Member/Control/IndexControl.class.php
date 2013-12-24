<?php
//测试控制器类
class IndexControl extends CommonControl{
	private $uid;
	private $status;
	public function __auto(){
		$this->db = K('order');
		if($_SESSION[C('RBAC_AUTH_KEY')]){
			$this->uid = $_SESSION[C('RBAC_AUTH_KEY')];
		}else{
			go(U('Member/Login/index'));
		}
		$this->status = Q('get.status','intval');
	}
    public function index(){
    	$data = $this->getCartData();
		$this->assign('data',$data);
    	$this->display();
    }
    public function collect(){
		$data = $this->getCartData($this->status);
		$this->assign('data',$data);
    	$this->display('index.html');
    }
    public function del(){
    	$id = Q('get.order_id','intval',0);
    	if($this->db->delOrder($id)){
    		go(U('Member/Index/index'));
    	}
    }
    //获得订单数据
	private function getCartData($status=null){
		if(is_null($status)){
			$where = array('uid'=>$this->uid);
		}else{
			$where = array('uid'=>$this->uid,'order_status'=>$status);
		}
		$data = $this->db->fetchAll($where);

		if(!is_array($data)){
			$data = array();
		}
		$result = array();
		foreach($data as $k=>$v){
			$result[$v['gid']]['data'] = $this->db->getGoods($v['gid']);
			$result[$v['gid']]['nums'][$k]['num'] =$v['goods_num'] ;
			$result[$v['gid']]['nums'][$k]['xiaoji'] =$v['goods_num']*$result[$v['gid']]['data']['goods']['price'];
			$result[$v['gid']]['nums'][$k]['size'] =explode(',', $v['size'] );
			$result[$v['gid']]['nums'][$k]['order_status'] = $v['order_status'];
			$result[$v['gid']]['nums'][$k]['order_id'] = $v['order_id'];
		}
		return $result;
	}
}
?>