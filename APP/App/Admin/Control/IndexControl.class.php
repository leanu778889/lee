<?php
//测试控制器类
class IndexControl extends CommonControl{
    public function index(){
      	$this->display();
    }
    public function welcome(){
    	$this->assign('server',$_SERVER);
    	$this->display();
    }
    public function quit(){
    	session_unset();
    	session_destroy();
    	$this->success('退出成功！');
    }
}
?>