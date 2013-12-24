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
		<strong>商品列表</strong>
	</div>

	<div class='content'>
		<table class='table table-bordered'>
			<thead>
			<tr>
				<th width="3%">id</th>
				<th width="15%">商品主标题</th>
				<th width="15%">商品副标题</th>
				<th width="10%">所属分类</th>
				<th width="8%">价格</th>
				<th width="10%">原价</th>
				<th width="8%">库存</th>
				<th width="17%">上架时间</th>
				<th >操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
				<tr>
					<td><?php echo $v['gid'];?></td>
					<td><?php echo $v['main_title'];?></td>
					<td><?php echo $v['sub_title'];?></td>
					<td><?php echo $v['cname'];?></td>
					<td><?php echo $v['price'];?></td>
					<td><?php echo $v['old_price'];?></td>
					<td><?php echo $v['num'];?></td>
					<td><?php echo date('Y-m-d',$v['addtime']);?></td>
					<td>
						<a class='btn btn-small' href="<?php echo U('Admin/Goods/edit');?>/gid/<?php echo $v['gid'];?>">编辑</a>
						<a class='btn btn-small delAffirm' href="<?php echo U('Admin/Goods/del');?>/gid/<?php echo $v['gid'];?>">删除</a>
						<a class='btn btn-small' href="<?php echo U('Admin/Goods/addShow');?>/gid/<?php echo $v['gid'];?>">添加到橱窗</a>
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