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
		<strong>轮播图列表</strong>
	</div>

	<div class='content'>
		<table class='table table-bordered'>
			<thead>
			<tr>
				<th width="5%">id</th>
				<th width="10%">轮播图标题</th>
				<th width="20%">轮播图URL</th>
				<th width="35%">轮播图图片</th>
				<th width="5%">排序</th>
				<th width="8%">是否展示</th>
				<th >操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
				<tr>
					<td><?php echo $v['id'];?></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['url'];?></td>
					<td><img src="http://localhost/Lee/<?php echo $v['image'];?>"/></td>
					<td><?php echo $v['sort'];?></td>
					<td><?php if($v['isshow']){?>是<?php  }else{ ?>否<?php }?></td>
					<td>
						<a class='btn btn-small' href="<?php echo U('Admin/Banner/edit');?>/id/<?php echo $v['id'];?>">编辑</a>
						<a class='btn btn-small' href="<?php echo U('Admin/Banner/del');?>/id/<?php echo $v['id'];?>">删除</a>
					</td>
				</tr>
			<?php }?><?php endif;?>
			</tbody>
		</table>
		</form>
	</div>
</div>
</body>
</html>