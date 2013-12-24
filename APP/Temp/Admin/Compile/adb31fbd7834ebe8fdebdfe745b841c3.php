<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后盾网cms后台管理中心</title>
<script type='text/javascript' src='http://localhost/Lee/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/Lee/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/Lee/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/Lee/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/Lee/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]-->
<script type="text/javascript" src="http://localhost/Lee/APP/App/Admin/Tpl/Public/js/base.js"></script>
<script type="text/javascript" src="http://localhost/Lee/APP/App/Admin/Tpl/Public/js/index.js"></script>
<link rel="stylesheet" href="http://localhost/Lee/APP/App/Admin/Tpl/Public/css/base.css" />
<link rel="stylesheet" href="http://localhost/Lee/APP/App/Admin/Tpl/Public/css/index.css" />
<base target="content" />
</head>
<body>
<div id="window">
	<div class='page_title'>
		<strong>订单列表</strong>
	</div>

	<div class='content'>
		<table class='table table-bordered'>
			<thead>
			<tr>
				<th width="7%">订单id</th>
				<th width="20%">商品主标题</th>
				<th width="10%">商品规格</th>
				<th width="5%">价格</th>
				<th width="5%">数量</th>
				<th width="7%">小计</th>
				<th width="18%">收货地址</th>
				<th width="10%">下单时间</th>
				<th width="7%">状态</th>
				<th >操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
				<tr>
					<td><?php echo $v['order_id'];?></td>
					<td><?php echo $v['goods']['main_title'];?></td>
					<td><?php echo $v['size'];?></td>
					<td><?php echo $v['goods']['price'];?></td>
					<td><?php echo $v['goods_num'];?></td>
					<td><?php echo $v['xiaoji'];?></td>
					<td><?php echo $v['address']['province'];?>-<?php echo $v['address']['city'];?>-<?php echo $v['address']['county'];?>-<?php echo $v['address']['street'];?></td>
					<td><?php echo date('Y-m-d',$v['single_time']);?></td>
					<td><?php if($v['order_status']){?>已付款<?php  }else{ ?>未付款<?php }?></td>
					<td>
						<a class='btn btn-small delAffirm' href="<?php echo U('Admin/Order/del');?>/order_id/<?php echo $v['order_id'];?>">删除</a>
						<a class='btn btn-small' href="javascript:void(0)">发货</a>
					</td>
				</tr>
			<?php }?><?php endif;?>
			</tbody>
		</table>
		</form>
		<div class='pageStyle1'>
			<?php echo $page;?>
		</div>
	</div>
</div>
</body>
</html>