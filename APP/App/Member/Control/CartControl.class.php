<?php
class CartControl extends CommonControl{
	private $uid=null;
	private $gid;
	public function __auto(){
		$this->gid = Q('get.gid','intval',0);
		$this->db = K('cart');
		if(isset($_SESSION[C('RBAC_AUTH_KEY')])){
			$this->uid = $_SESSION[C('RBAC_AUTH_KEY')];
			$this->writeCart();
		}
	}
	public function index(){
		$data = $this->getCartData();
		$total = $this->getCartTotal();
		$this->assign('data',$data);
		$this->display();
	}
	//获得购物车数据
	private function getCartData(){
		$data = array();
		if(is_null($this->uid)){
			if(isset($_SESSION['cart'])){
				foreach($_SESSION['cart']['goods'] as $k=>$v){
					$gid = $k;
					$data[$k]['data'] = $this->db->getGoods($gid);
					foreach($v as $m=>$n){
						$data[$k]['nums'][$m]['num'] = $n['num'];
						$data[$k]['nums'][$m]['xiaoji'] = $n['num']*$data[$k]['data']['goods']['price'];
						unset($n['num']);
						$data[$k]['nums'][$m]['size'] = $n;
					}
				}
			}else{
				return $data;
			}
		}else{
			$data = $this->db->fetchAll($this->uid);
			$result = array();
			if(!empty($data)){
				foreach($data as $k=>$v){
					$result[$v['gid']]['data'] = $this->db->getGoods($v['gid']);
					$result[$v['gid']]['nums'][$k]['num'] =$v['num'] ;
					$result[$v['gid']]['nums'][$k]['xiaoji'] =$v['num']*$result[$v['gid']]['data']['goods']['price'];
					$result[$v['gid']]['nums'][$k]['size'] =explode(',', $v['size'] );
				}
			}
			return $result;
		}
		return $data;
	}
	//添加到购物车
	public function add(){
		if(is_null($this->uid)){
			if(isset($_SESSION['cart']['goods'][$this->gid])){
				$data = $_POST;
				unset($data['num']);
				$goods = $_SESSION['cart']['goods'][$this->gid];
				foreach ($goods as $key => $value) {
					unset($goods[$key]['num']);
					if(md5(implode(',',$data)) == md5(implode(',',$goods[$key]))){
						$_SESSION['cart']['goods'][$this->gid][$key]['num'] += $_POST['num'];
						header('Location:'.U('Member/Cart/index'));
						exit;
					}
				}
				$_SESSION['cart']['goods'][$this->gid][] = $_POST;
				header('Location:'.U('Member/Cart/index'));
			}else{
				$_SESSION['cart']['goods'][$this->gid][] = $_POST;
				header('Location:'.U('Member/Cart/index'));
			}
		}else{
			$data = array();
			$data['uid'] = $this->uid;
			$data['gid'] = $this->gid;
			$data['num'] = $_POST['num'];
			unset($_POST['num']);
			$data['size'] = implode(',', $_POST);
			$total = $this->checkAdd($data);
			if($total){
				header('Location:'.U('Member/Cart/index'));
			}
		}
	}
	//更改购物车中商品数量
	public function editCartNums(){
		if(IS_AJAX === false) _404();
		$type = Q('post.type','strip_tags,addslashes');
		$gid = Q('get.id','strip_tags,addslashes');
		$result =array();
		$result['status'] = false;
		switch ($type) {
			case 'prev':
				if(is_null($this->uid)){
					foreach($_SESSION['cart']['goods'] as $k=>$v){
						foreach($v as $n=>$m){
							$num = $m['num'];
							unset($m['num']);
							if($gid ==md5(implode(',', $m))){
								$_SESSION['cart']['goods'][$k][$n]['num'] = $num-1;
								$result['status'] = true;
							}
						}
					}
				}else{
					$data = $this->db->fetchAll($this->uid);
					foreach($data as $k=>$v){
						if($gid == md5($v['size'])){
							$result['status'] = true;
							$this->db->dec('num','id='.$v['id'],1);
						}
					}
				}
				break;
			case 'next':
				if(is_null($this->uid)){
					foreach($_SESSION['cart']['goods'] as $k=>$v){
						foreach($v as $n=>$m){
							$num = $m['num'];
							unset($m['num']);
							if($gid ==md5(implode(',', $m))){
								$result['status'] = true;
								$_SESSION['cart']['goods'][$k][$n]['num'] = $num+1;
							}
						}
					}
				}else{
					$data = $this->db->fetchAll($this->uid);
					foreach($data as $k=>$v){
						if($gid == md5($v['size'])){
							$result['status'] = true;
							$this->db->inc('num','id='.$v['id'],1);
						}
					}
				}
				break;
		}
		exit(json_encode($result));
	}
	//删除购物车中的单个商品
	public function delCartOne(){
		$id = Q('get.id','strip_tags,addslashes');
		if(is_null($this->uid)){
			foreach($_SESSION['cart']['goods'] as $k=>$v){
				foreach($v as $n=>$m){
					unset($m['num']);
					if($id ==md5(implode(',', $m))){
						unset($_SESSION['cart']['goods'][$k][$n]);
						if(empty($_SESSION['cart']['goods'][$k])){
							unset($_SESSION['cart']['goods'][$k]);
							if(empty($_SESSION['cart']['goods'])){
								unset($_SESSION['cart']);
							}
						}
						go('index');
					}
				}
			}
		}else{
			$data = $this->db->fetchAll($this->uid);
			foreach($data as $k=>$v){
				if($id == md5($v['size'])){
					$this->db->delCart(array('id'=>$v['id']));
					go('index');
				}
			}
		}
	}
	//清空购物车
	public function delCartAll(){
		if(is_null($this->uid)){
			unset($_SESSION['cart']);
			go('index');
		}else{
			$data = $this->db->fetchAll($this->uid);
			foreach($data as $k=>$v){
				$this->db->delCart(array('id'=>$v['id']));
			}
			go('index');
		}
	}
	//获得总数量
	public function getCartTotal(){
		$total = 0;
		if(is_null($this->uid)){
			if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
			if(!isset($_SESSION['cart']['goods'])) $_SESSION['cart']['goods'] = array();
			foreach($_SESSION['cart']['goods'] as $k=>$v){
				foreach($v as $n=>$m){
					$total+=$m['num'];
				}
			}
		}else{
			$data = $this->db->fetchAll($this->uid);
			if(!empty($data)){
				foreach($data as $k=>$v){
					$total+=$v['num'];
				}
			}
		}
		if(IS_AJAX === true) exit(json_encode($total));
		$this->assign('total',$total);
	}
	//session 写入数据库
	private function writeCart(){
		if(!isset($_SESSION['cart']['goods'])) return;
		$carts = $_SESSION['cart']['goods'];
		foreach($carts as $k=>$v){
			foreach($v as $n){
				$data = array();
				$data['uid'] = $this->uid;
				$data['gid'] = $k;
				$data['num'] = $n['num'];
				unset($n['num']);
				$data['size'] = implode(',',$n);
				$this->checkAdd($data);
			}
		}
		unset($_SESSION['cart']);
	}
	//检查数据库中是否存在该规模的该商品   存在即添加数量，不存在则添加记录
	private function checkAdd($data){
		$where = array('uid'=>$data['uid'],'gid'=>$data['gid'],'size'=>$data['size']);
		$count = $this->db->checkCart($where);
		if($count){
			return $this->db->incCart($where,$data);
		}else{
			return $this->db->addCart($data);
		}
	}
}
?>