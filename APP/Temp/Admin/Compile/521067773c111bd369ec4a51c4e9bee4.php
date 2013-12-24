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
		<strong>商品类型列表</strong>
		<a class='btn' href="<?php echo U('Admin/Type/addAttr');?>/type_id/<?php echo $type_id;?>">添加类型属性</a>
	</div>
			<table class="table table-bordered" style="width:1100px;">
				<tr>
					<th width="5%">id</th>
					<th width="10%">属性名</th>
					<th width="11%">是否为规格</th>
					<th width="30%">所包含属性值</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
					<tr>
						<td><?php echo $v['tc_id'];?></td>
						<td><?php echo $v['tc_name'];?></td>
						<td>
							<?php if($v['issize']){?>
								是
							<?php  }else{ ?>
								否
							<?php }?>
						</td>
						<td>
							<?php if(is_array($v['tags'])):?><?php  foreach($v['tags'] as $m){ ?>
								<?php echo $m['tname'];?>,
							<?php }?><?php endif;?>
						</td>
						<td>
							<a class='btn' href="<?php echo U('Admin/Type/addTag');?>/tc_id/<?php echo $v['tc_id'];?>">添加属性值</a>
							<a class='btn' href="<?php echo U('Admin/Type/tagIndex');?>/tc_id/<?php echo $v['tc_id'];?>">查看所有属性值</a>
							<a class='btn' href="<?php echo U('Admin/Type/editAttr');?>/tc_id/<?php echo $v['tc_id'];?>">修改属性</a>
							<a class='btn delAffirm' href="<?php echo U('Admin/Type/delAttr');?>/tc_id/<?php echo $v['tc_id'];?>">删除属性</a>
						</td>
					</tr>
				<?php }?><?php endif;?>
			</table>
</div>
</body>
</html>