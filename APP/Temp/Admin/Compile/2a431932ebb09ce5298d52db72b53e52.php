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
		<strong>添加类型属性</strong>
	</div>
		<form id="addForm" action="<?php echo U('Admin/Type/addAttr');?>/type_id/<?php echo $data['type_id'];?>" method="post">
			<table class="table table-bordered" style="width:400px;">
				<tr>
					<td>商品类型属性名</td>
					<td><input id="tname" type="text" name='tc_name'></td>
				</tr>
				<tr>
					<td>是否为规格</td>
					<td>
						<label>是<input checked="true" type="radio" name="issize" value="1"/></label>
						<label>否<input type="radio"  name="issize" value="0"/></label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn" value="提交"></td>
				</tr>
			</table>
		</form>
</div>
</body>
</html>