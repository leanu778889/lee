<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $header['webname'];?></title>
<script type='text/javascript' src='http://localhost/Lee/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/Lee/APP/App/Member/Tpl/Public/css/order.css" rel="stylesheet" />
<link href="http://localhost/Lee/APP/App/Member/Tpl/Public/css/common.css" rel="stylesheet" />
<link href="http://localhost/Lee/APP/App/Member/Tpl/Public/css/account.css" type="text/css" rel="stylesheet" >
<script type="text/javascript" src="http://localhost/Lee/APP/App/Member/Tpl/Public/js/order.js"></script>
</head>
	<body>
		<div id="header" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/Lee/APP/App/Member/Tpl/Public/css/header.css" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="http://localhost/Lee/APP/App/Member/Tpl/Public/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix(".buy,.clear-btn-icon,.icon6_bag,.cart-icon,.icon6_bm,.icon6_cart,.icon6_eye,.icon6_hot,.icon6_install,.icon6_jewelry,.icon6_land,.icon6_life,.icon6_men,.icon6_next,.icon6_next-1,.icon6_phone,.icon6_prev-1,.icon6_prev,.icon6_search,.icon6_shoes,.icon6_slide-in,.icon6_sport,.icon6_tips-1,.icon6_tips-2,.icon6_tips-3,.icon6_user,.icon6_women,.icon6_wz-next-s,.icon6_wz-next,.icon6_wz-prev-s,.icon6_wz-prev,.icon6_wzo-cart-ico, background");
</script>
<![endif]-->
<script type="text/javascript" src="http://localhost/Lee/APP/App/Member/Tpl/Public/js/header.js"></script>
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
						<li><a href="<?php echo U('Member/Account/setting');?>">我的帐号</a></li>
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
		<!-- <img height="71" src="http://localhost/Lee/APP/App/Member/Tpl/Public/images/logo.png"/> -->
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
			<span id="goods-num" class="goods-num fr">0</span>
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
			<div id="cart" class="w1000">
				<div class="mycart">
					<form id="addressForm" action="<?php echo U('Member/Order/pay');?>" method="post">
					<div class="cart-top">
						<div class="fl">
							<span class="cart-icon fl mg-r5"></span>
							<span class="cart-title fl ">商品清单</span>
						</div>
						<div class="fr cart-step">
							<ul class="step-msg clearfix">
								<li>我的购物车</li>
								<li class="red">确认订单信息</li>
								<li>成功提交订单</li>
							</ul>
							<ul class="step-icon-list clearfix">
								<li class="right"><span class="step-icon"></span></li>
								<li ><span class="step-icon on"></span></li>
								<li class="left"><span class="step-icon"></span></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="cart-body">
						<div class="cart-body-head">
							<ul class="clearfix">
								<li class="rowInfo">商品信息</li>
								<li class="rowPrice">单价</li>
								<li class="rowCount">数量</li>
								<li class="rowSub ">小计</li>
							</ul>
						</div>
						<div class="cart-body-list">
							<ul>
								<?php if(is_array($data)):?><?php  foreach($data as $k=>$v){ ?>
								<?php if(is_array($v['nums'])):?><?php  foreach($v['nums'] as $nums){ ?>
								<li class="goods-info">
									<input type="hidden" name="order_id[]" value = "<?php echo $nums['order_id'];?>"/>
									<ul>
										<li class="rowInfo">
											<div class="goods-img">
												<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $k;?>">
													<img  src="http://localhost/Lee<?php echo $v['data']['img']['s_img'];?>"/>
												</a>
											</div>
											<div class="rowInfo-title">
												<div class="clearfix bk20"></div>
												<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $k;?>" class="goods-title"><?php echo $v['data']['goods']['main_title'];?></a>
												<p>
													<?php if(is_array($v['data']['attr'])):?><?php  foreach($v['data']['attr'] as $m=>$n){ ?>
														<?php echo $m;?>:
														<?php if(is_array($n)):?><?php  foreach($n as $tag){ ?>
														<?php if(in_array($tag['tid'],$nums['size'])){?><?php echo $tag['tname'];?><?php }?>
														<?php }?><?php endif;?>
													<?php }?><?php endif;?>
												</p>
											</div>
										</li>
										<li class="rowPrice">
											<div class="clearfix bk20"></div>
											<p class="font-grey-8">￥<span><?php echo $v['data']['goods']['price'];?></span></p>
										</li>
										<li class="rowCount">
											<div class="clearfix bk20"></div>
											<div class="goodsNum rowNums">
												<?php echo $nums['num'];?>
											</div>
										</li>
										<li class="rowSub rowTotal">
											<div class="clearfix bk20"></div>
											<p class="red">￥<span><?php echo $nums['xiaoji'];?></span></p>
										</li>

									</ul>
								</li>
								<?php }?><?php endif;?>
								<?php }?><?php endif;?>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="cart-foot">
						<div class="fl foot-left " >
						<div  class="address">

						<div class='address-base'>
							<dl>
								<dt>*省市区：</dt>
								<dd style="width:400px;">
									<select id="s_province" name="province"></select>
									<select id="s_city" name="city" ></select>
									<select id="s_county" name="county"></select>
									<script type="text/javascript" src="http://localhost/Lee/APP/App/Member/Tpl/Public/js/area.js"></script>
									<script type="text/javascript">_init_area();</script>
								</dd>
							</dl>
							<dl>
								<dt>*街道地址：</dt>
								<dd style="width:450px;">
									<input name="street" type="text" value="">
								</dd>
							</dl>
							<dl>
								<dt>*邮政编码：</dt>
								<dd>
									<input name="zipcode" type="text" value="">
								</dd>
							</dl>
							<dl>
								<dt>*收货人姓名：</dt>
								<dd>
									<input name="consignee" type="text" value="">
								</dd>
							</dl>
							<dl>
								<dt>*电话号码：</dt>
								<dd>
									<input type="text" name="phone" value="">
								</dd>
							</dl>
						</div>
						</div>
						</div>
						<div class="fr foot-right">
							<p class="font-grey-8">共<span id="total-nums" class="font-red"><?php echo $total;?></span>件商品&nbsp;</p>
							<p class="font-grey-8">
								商品金额总计：￥<span id="total-price">10,148.00</span>
							</p>
							<p class="font-red mg-t7 total">总计：<span class="fs28" >￥<span  id="total-xiaoji">10,148.00</span></span></p>
							<p class="buy-btn posr">
								<a href="javascript:void(0)" id="pay" class="btn fr">付款</a>
							</p>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div id="footer" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/Lee/APP/App/Member/Tpl/Public/css/footer.css" rel="stylesheet" />
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