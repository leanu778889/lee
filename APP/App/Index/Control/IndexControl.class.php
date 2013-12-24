<?php
//测试控制器类
class IndexControl extends CommonControl{
	public function __auto(){
		$this->db = K('index');
	}
    public function index(){
    	$banner = $this->db->fetchBanner();
    	$chugui = $this->db->fetchChuGui();
    	$hotCategory = $this->db->fetchCategory();
    	$this->assign('hotCategory',$hotCategory);
    	$this->assign('banner',$banner);
    	$this->assign('chugui',$chugui);
        $this->display('index.html');
    }
}
?>