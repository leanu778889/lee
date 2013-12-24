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
		<strong>属性值列表</strong>
		<a class='btn' href="<?php echo U('Admin/Type/addTag');?>/tc_id/<?php echo $tc_id;?>">添加属性值</a>
	</div>
			<table class="table table-bordered" style="width:1100px;">
				<tr>
					<th width="5%">id</th>
					<th width="10%">属性值</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
					<tr>
						<td><?php echo $v['tid'];?></td>
						<td><?php echo $v['tname'];?></td>
						<td>
							<a class='btn' href="<?php echo U('Admin/Type/editTag');?>/tid/<?php echo $v['tid'];?>">修改属性值</a>
							<a class='btn delAffirm' href="<?php echo U('Admin/Type/delTag');?>/tid/<?php echo $v['tid'];?>">删除属性值</a>
						</td>
					</tr>
				<?php }?><?php endif;?>
			</table>
</div>
</body>
</html>