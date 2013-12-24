<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $header['webname'];?></title>
<link href="http://localhost/Lee/APP/App/Index/Tpl/Public/css/detail.css" rel="stylesheet" />
<link href="http://localhost/Lee/APP/App/Index/Tpl/Public/css/common.css" rel="stylesheet" />
<script type='text/javascript' src='http://localhost/Lee/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script type="text/javascript" src="http://localhost/Lee/APP/App/Index/Tpl/Public/js/detail.js"></script>
</head>
	<body>
		<div id="header" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/Lee/APP/App/Index/Tpl/Public/css/header.css" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="http://localhost/Lee/APP/App/Index/Tpl/Public/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix(".buy,.clear-btn-icon,.icon6_4,.cart-icon,.icon6_1,.icon6_cart,.icon6_eye,.icon6_hot,.icon6_install,.icon6_5,.icon6_land,.icon6_7,.icon6_3,.icon6_next,.icon6_next-1,.icon6_phone,.icon6_prev-1,.icon6_prev,.icon6_search,.icon6_shoes,.icon6_slide-in,.icon6_6,.icon6_tips-1,.icon6_tips-2,.icon6_tips-3,.icon6_user,.icon6_2,.icon6_wz-next-s,.icon6_wz-next,.icon6_wz-prev-s,.icon6_wz-prev,.icon6_wzo-cart-ico, background");
</script>
<![endif]-->
<script type="text/javascript" src="http://localhost/Lee/APP/App/Index/Tpl/Public/js/header.js"></script>
<div id="headTop" >
	<div class="w1000 clearfix">
		<div class="fl">
			<div id="btnFollow" class="posr">
				<i class="icon6_eye posa"></i>
				<a target="_blank" href="#">关注我们</a>
			</div>
		</div>
		<div class="fr">
			<div id="headTel" class="fr posr">
				<i class="icon6_phone posa"></i>
				<span>400-000-0000</span>
			</div>
			<div id="listMy" class="fr clearfix posr">
				<div class="listShow">
					<a href="javascript:void(0)">我的商场</a>
					<s class="posa arrow arrowB s"></s>
					<ul class="dn listCon">
						<li><a href="<?php echo U('Member/Index/index');?>">我的订单</a></li>
						<li><a href="<?php echo U('Member/Account/setting');?>">收货地址</a></li>
					</ul>
				</div>
			</div>
			<?php if($session['uid']){?>
				<div id="headLogin" class="fr posr">
					<a href="<?php echo U('Member/Login/quit');?>">退出</a>
				</div>
				<div id="headReg" style="width:auto;padding:0px 10px;" class="fr posr">
					<a href="<?php echo U('Member/Index/index');?>"><?php echo $session['nickname'];?></a>
				</div>

			<?php  }else{ ?>
				<div id="headReg" class="fr posr">
					<a href="<?php echo U('Member/Reg/index');?>">免费注册</a>
					<i class="icon6_install posa"></i>
				</div>
				<div id="headLogin" class="fr posr">
					<a href="<?php echo U('Member/Login/index');?>">登录</a>
					<i class="icon6_user posa"></i>
				</div>
			<?php }?>
		</div>
	</div>
</div>
<div id="headMain" class="w1000 clearfix">
	<div id="headLogo" class="fl">
		<h1 class="fs30 mg-l15 mg-t14">我的毕业作品</h1>
		<!-- <img height="71" src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/logo.png"/> -->
	</div>
	<div id="headSearch" class="fl posr">
		<form>
			<div class="headSearchBorder posr">
				<input class="input" type="text" name="keywords"/>
				<input type="submit" value="" class="submit" />
				<i class="icon6_search posa"></i>
			</div>
		</form>
			<div class="headHotSearch clearfix">
				<span class="font-grey-8 mg-l8">热门搜索：</span>
				<a href="#">女装</a>
				<a href="#">男装</a>
				<a href="#">鞋靴箱包</a>
				<a href="#">珠宝配饰</a>
				<a href="#">运动户外</a>
			</div>
	</div>
	<div id="headCart" class="fr posr">
		<a class="icon6_cart posa" href="<?php echo U('Member/Cart/index');?>">
			<span id="goods-num" class="goods-num fr" url="">0</span>
			<span class="cart-text posa"> 购物车 </span>
		</a>
	</div>
	<script>
		var cartUrl = "<?php echo U('Member/Cart/getCartTotal');?>";
		$.ajax({
			url:cartUrl,
			success:function(result){
				$('#goods-num').html(result);
			}
		})
	</script>
</div>
<div id="headNav" class="w1000 ">
	<ul id="nav-list" class="fs14">
		<li class="subnav nav-active"><a href="<?php echo U('Index/Index/index');?>" class="ui-nohover">首页 HOME</a></li>
		<?php if(is_array($category)):?><?php  foreach($category as $v){ ?>
		<li class="subnav posr">
			<a href="javascript:void(0)" class="ui-nohover"><?php echo $v['cname'];?></a>
			<div class="nav-hover-list fs12">
				<?php if(is_array($v['Data'])):?><?php  foreach($v['Data'] as $m){ ?>
				<dl class="clearfix">
					<div class="fl" style="width:60px;height:auto;">
					<dt><a href="<?php echo U('Index/List/index');?>/cid/<?php echo $m['cid'];?>"><?php echo $m['cname'];?></a></dt>
					</div>
					<div class="fl xian" style="width:410px;height:auto;">
					<?php if(is_array($m['Data'])):?><?php  foreach($m['Data'] as $n){ ?>
					<dd><a href="<?php echo U('Index/List/index');?>/cid/<?php echo $n['cid'];?>"><?php echo $n['cname'];?></a> <span class="bar">|</span></dd>
					<?php }?><?php endif;?>
					</div>
				</dl>
				<?php }?><?php endif;?>
			</div>
		</li>
		<?php }?><?php endif;?>
		<script>
			$('.xian').each(function(){
				$(this).find('dd').last().find('.bar').html('');
			})
		</script>
	</ul>
</div>
		</div>
		<div id="main" class="wrap-wide">
			<div id="list-location" class="w1000 pd-t20">
				<span class="font-grey-8">您现在的位置： <a href="#">首页</a> > <a href="#">名品</a> > <a href="#">时尚女包</a> > <a href="#">单肩/斜跨包</a> > Oxygene Monde 女士一粒扣西装外套 </span>
			</div>
			<div id="goods-info" class="w1000 pd-t30" >
				<div id="goods-img" class="fl">
					<div class='box'>
						 <div class="current">
						 	 <div id="layer"></div>
						 	 <div id="mark"> </div>
						 	 <img id="curImg" src=""/>
						 </div>
						 <div class="small">
						 	<?php if(is_array($data['images'])):?><?php  foreach($data['images'] as $v){ ?>
						 		<img src="http://localhost/Lee<?php echo $v['s_img'];?>"/>
						 	<?php }?><?php endif;?>
						 	<div id='selected'> </div>
						 </div>
					</div>
					<div class="goods" class="fr">
						<div class="goods-name fs15">
							<h1><?php echo $data['main_title'];?></h1>
							<div class="xian"></div>
							<form action="<?php echo U('Member/Cart/add');?>/gid/<?php echo $data['gid'];?>" method="post" id="goodsForm">
							<ul class="goods-info">
								<li class="fs13">市场价：<del>￥<?php echo $data['old_price'];?></del></li>
								<li id="goods-price" class="red fs15">售价：<strong>￥<?php echo $data['price'];?></strong>&nbsp;&nbsp;<span><?php echo $data['zhekou'];?>折</span></li>
								<?php if(is_array($data['attr'])):?><?php  foreach($data['attr'] as $k=>$v){ ?>
								<li class="fs13 goods-size" ><?php echo $k;?>：
									<input type="hidden" class="post_form" name="<?php echo $v[0]['tc_id'];?>" value="<?php echo $v[0]['tid'];?>"/>
									<?php if(is_array($v)):?><?php  foreach($v as $m){ ?>
										<a href="javascript:void(0)" tid="<?php echo $m['tid'];?>" ><span><?php echo $m['tname'];?></span></a>
									<?php }?><?php endif;?>
								</li>
								<?php }?><?php endif;?>
								<li id="goods-num" class="fs13">
									<div class="fl">数量：</div>
									<div class="fl">
										<a href="javascript:void(0)" class="fl num prev">&nbsp;-</a>
										<input class="fl nums" kucun="<?php echo $data['num'];?>" type="text" name="num" value="1" maxlength="2">
										<a href="javascript:void(0)" class="fl num next">+</a>
									</div>
								</li>
								<li id="goods-buy"><a href="javascript:void(0)"><span class="">加入购物车</span></a></li>
							</ul>
							</form>
						</div>
					</div>
					<div class="big">
						<div class='keep'>

						</div>
						<img id="bigImg" src=''/>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="goods-detail" class="w1000 mg-t30">
				<div class="detail-left fl">
					<h3 >
						看过还看过
						<span class="words">HOT</span>
					</h3>
					<div class="hot-list">
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
					</div>
					<h3 >
						买过还买过
						<span class="words">HOT</span>
					</h3>
					<div class="hot-list">
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
							<dl class="goods-list">
								<dt><a href="#"><img width=180 height=180 src="http://localhost/Lee/APP/App/Index/Tpl/Public/images/30012716002_01_mt_220x220.jpg"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ 1,169</span>
									<del class="mg-l8">￥ 1,299</del>
								</dd>
								<dd><a href="">ELLE 文胸 肤色 70C</a></dd>
							</dl>
					</div>
				</div>
				<div class="detail-right fl">
					<h3><a href="#">商品信息</a><a class="xian"></a><a href="#">品牌故事</a><a class="xian"></a><a href="#">售后服务</a></h3>
					<div id="detail-body">
						<?php echo $data['goods_detail'];?>
					</div>
				</div>
			</div>

		</div>
		<div id="footer" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/Lee/APP/App/Index/Tpl/Public/css/footer.css" rel="stylesheet" />
<div id="footEnsure" class="wrap-wide " >
	<div class="w1000 posr">
		<div class="ensure w1000 posa">
			<div id="footTel" class="fl clearfix">
				<ul class="fl pd-lr10 ">
					<li class="icon layout-ib"></li>
					<li class="label layout-ib">400-000-0000</li>
					<li class="time layout-ib">09:00-21:00</li>
				</ul>
			</div>
			<div class="fr clearfix">
				<ul id="footFreight" class="fr pd-lr10">
					<li class="icon layout-ib"></li>
					<li class="label layout-ib">满199免运费</li>
				</ul>
				<ul id="footReturn" class="fr pd-lr10">
					<li class="icon layout-ib"></li>
					<li class="label layout-ib">15天退换货保障</li>
				</ul>
				<ul id="footGenuine" class="fr pd-lr10">
					<li class="icon layout-ib"></li>
					<li class="label layout-ib">100%正品保证</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="bg-grey-44 bk40 footBg">
</div>
<div class="w1000 tc mg-t13" id="footMiddleNav">
	<?php if(is_array($nav[2])):?><?php  foreach($nav[2] as $v){ ?>
		<a href="<?php echo $v['url'];?>"><?php echo $v['n_title'];?></a>
	<?php }?><?php endif;?>
</div>
<hr width="53%">
<div class="w1000 tc mg-t13" id="footNav">
	<ul id="footNav">
		<?php if(is_array($nav[3])):?><?php  foreach($nav[3] as $v){ ?>
			<li><a href="<?php echo $v['url'];?>"><?php echo $v['n_title'];?></a></li>
		<?php }?><?php endif;?>
		<script>
			$('#footNav li').first().css('border',0);
		</script>
	</ul>
</div>
<div class="w1000 tc mg-t13 fs13" style="line-height:20px;">
	本Demo只供学习使用,不用于任何商业目的<br/>
		版权归原网站所有
</div>
		</div>
	</body>
</html>