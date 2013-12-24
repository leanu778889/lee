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
<link href="http://localhost/Lee/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/Lee/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
<body>
<div id="window">
	<div class='page_title'>
		<strong>添加分类</strong>
	</div>
		<form action="<?php echo U('Admin/Category/add');?>"  method="post">
			<table class="table table-bordered">
				<tr>
					<td>父级分类</td>
					<td>
						<select name='pid'>
							<option value=0>&nbsp;顶级分类</option>
							<?php if(is_array($category)):?><?php  foreach($category as $v){ ?>
								<option <?php if($cid == $v['cid']){?>selected<?php }?> value='<?php echo $v['cid'];?>'>&nbsp;|-<?php echo $v['html'];?><?php echo $v['cname'];?></option>
							<?php }?><?php endif;?>
						</select>
					</td>
					<td ></td>
				</tr>
				<tr>
					<td>所属商品类型</td>
					<td>
						<select name='type_id'>
							<?php if(is_array($type)):?><?php  foreach($type as $v){ ?>
								<option value='<?php echo $v['type_id'];?>'>&nbsp;|-<?php echo $v['type_name'];?></option>
							<?php }?><?php endif;?>
						</select>
					</td>
					<td ></td>
				</tr>
				<tr>
					<td>分类名</td>
					<td><input type="text" name='cname'></td>
					<td width="30%"><span id="hd_cname"></span></td>
				</tr>
				<tr>
					<td>分类标题</td>
					<td><input type="text" name='ctitle'></td>
					<td width="30%"><span id="hd_ctitle"></span></td>
				</tr>
				<tr>
					<td>分类关键字</td>
					<td><textarea name='c_keywords'></textarea></td>
					<td width="30%"><span id="hd_c_keywords"></span></td>
				</tr>
				<tr>
					<td>分类描述</td>
					<td><textarea name='c_description'></textarea></td>
					<td width="30%"><span id="hd_c_description"></span></td>
				</tr>
				<tr>
					<td>分类静态目录</td>
					<td><input type="text" name='htmldir'></td>
					<td width="30%"><span id="hd_htmldir"></span></td>
				</tr>
				<tr>
					<td>排序</td>
					<td><input type="text" name='sort'></td>
					<td width="30%"><span id="hd_sort"></span></td>
				</tr>
				<tr>
					<td>内容页是否生成静态</td>
					<td>
						<label>是
						<input type="radio" name='is_archtml' checked='true' value=1>
						</label>
						<label>否
						<input type="radio" name='is_archtml' value=0>
						</label>
					</td>
					<td ></td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<label>是
						<input type="radio" name='cis_show' checked='true' value=1>
						</label>
						<label>否
						<input type="radio" name='cis_show' value=0>
						</label>
					</td>
					<td ></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn" value="提交"></td>
				</tr>
			</table>
		</form>
<script>
	$('form').validation({
		cname: {
			rule: {
				maxlen: 20,
				required: true
			},
			error: {
				maxlen: " 不能大于 20 个字符 ",
				required: " 不能为空 "
			},
			message: " 分类名长度 1 到 20 位 ",
			success: " 分类名正确 "
		},
		ctitle: {
			rule: {
				maxlen: 60,
				required: true
			},
			error: {
				maxlen: " 不能大于 60 个字符 ",
				required: " 不能为空 "
			},
			message: " 分类标题长度 1 到 60 位 ",
			success: " 分类标题正确 "
		},
		c_keywords: {
			rule: {
				maxlen: 120,
				required: true
			},
			error: {
				maxlen: " 不能大于 120 个字符 ",
				required: " 不能为空 "
			},
			message: " 分类关键字长度 1 到 120 位 ",
			success: " 分类关键字正确 "
		},
		c_description: {
			rule: {
				maxlen:255,
				required: true
			},
			error: {
				maxlen: " 不能大于 255 个字符 ",
				required: " 不能为空 "
			},
			message: " 分类描述长度 1 到 255 位 ",
			success: " 分类描述正确 "
		},
		sort: {
			rule: {
				num: "1,100",
				required: true
			},
			error: {
				num: " 排序范围为1-100 ",
				required: " 不能为空 "
			},
			message: " 请填写1-100以内的数字 ",
			success: " 排序填写正确 "
		},
		htmldir: {
			rule: {
				regexp: /^[a-z]\w{1,19}$/,
				required: true
			},
			error: {
				regexp: " 以字母开头不能多于20位 ",
				required: " 不能为空 "
			},
			message: " 目录名以小写字母开头，不能多于20位 ",
			success: " 目录名填写正确 "
		},
	})
</script>
</div>
</body>
</html>