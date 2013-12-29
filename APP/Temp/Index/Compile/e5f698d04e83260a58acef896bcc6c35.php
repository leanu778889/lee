<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $header['webname'];?></title>
<script type='text/javascript' src='http://localhost/lee/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/lee/APP/App/Index/Tpl/Public/css/list.css" rel="stylesheet" />
<link href="http://localhost/lee/APP/App/Index/Tpl/Public/css/common.css" rel="stylesheet" />

<script type="text/javascript" src="http://localhost/lee/APP/App/Index/Tpl/Public/js/list.js"></script>
</head>
	<body>
		<div id="header" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/lee/APP/App/Index/Tpl/Public/css/header.css" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="http://localhost/lee/APP/App/Index/Tpl/Public/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix(".buy,.clear-btn-icon,.icon6_4,.cart-icon,.icon6_1,.icon6_cart,.icon6_eye,.icon6_hot,.icon6_install,.icon6_5,.icon6_land,.icon6_7,.icon6_3,.icon6_next,.icon6_next-1,.icon6_phone,.icon6_prev-1,.icon6_prev,.icon6_search,.icon6_shoes,.icon6_slide-in,.icon6_6,.icon6_tips-1,.icon6_tips-2,.icon6_tips-3,.icon6_user,.icon6_2,.icon6_wz-next-s,.icon6_wz-next,.icon6_wz-prev-s,.icon6_wz-prev,.icon6_wzo-cart-ico, background");
</script>
<![endif]-->
<script type="text/javascript" src="http://localhost/lee/APP/App/Index/Tpl/Public/js/header.js"></script>
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
		<!-- <img height="71" src="http://localhost/lee/APP/App/Index/Tpl/Public/images/logo.png"/> -->
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
				<span class="fr">找到相关商品<span class="red">33</span>件</span>
				<span class="font-grey-8">您现在的位置： <a href="<?php echo U('Index/Index/index');?>">首页</a>
				<?php if(is_array($arr)):?><?php  foreach($arr as $v){ ?> > <a href="<?php echo U('Index/List/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a><?php }?><?php endif;?></span>
			</div>
			<div id="list-main" class="w1000">
				<div id="list-left" class="fl">
					<div class="left-subnav">
						<h3 class="subnav-title fs15">
							<?php echo $title;?>
						</h3>
						<div class="left-subnav-list">
							<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
							<dl class="subnav-list">
								<dt class="cate2 bg-color1 clearfix <?php if($v['cid']==$cid){?>red<?php }?>">
									<a href="<?php echo U('Index/List/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
									<i class="fr sign">
										<a class="fr"  href="javascript:void(0)">+</a>
									</i>
								</dt>
								<dd class="cate3 bg-color4 clearfix">
									<?php if(is_array($v['Data'])):?><?php  foreach($v['Data'] as $m){ ?>
									<a <?php if($m['cid']==$cid){?>class="red"<?php }?> href="<?php echo U('Index/List/index');?>/cid/<?php echo $m['cid'];?>"><?php echo $m['cname'];?></a>
									<?php }?><?php endif;?>
								</dd>
							</dl>
							<?php }?><?php endif;?>
						</div>
					</div>
					<div class="left-hot">
						<h3 >
							热销排行
							<span class="words">HOT</span>
						</h3>
						<div class="hot-list">
									<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","buy DESC","5");
		?><?php foreach($data as $k=>$v):?>
							<dl class="goods-list">
								<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img width=180 height=180 src="http://localhost/lee/<?php echo $v['m_img'];?>"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
									<del class="mg-l8">￥ <?php echo $v['old_price'];?></del>
								</dd>
								<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
							</dl>
							<?php endforeach;?>
						</div>
					</div>
					<div class="left-like">
						<h3 >
							猜你喜欢
							<span class="words">LIKE</span>
						</h3>
						<div class="hot-list">
									<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","5");
		?><?php foreach($data as $k=>$v):?>
							<dl class="goods-list">
								<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img width=180 height=180 src="http://localhost/lee/<?php echo $v['m_img'];?>"></a></dt>
								<dd class="mg-t13">
									<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
									<del class="mg-l8">￥ <?php echo $v['old_price'];?></del>
								</dd>
								<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
							</dl>
							<?php endforeach;?>
						</div>
					</div>
				</div>
				<div id="list-right" class="fl">
					<div id="filters">
						<div class="filter-search"></div>
						<div id="tag" class="goods-filter">
							<?php if(is_array($attr)):?><?php  foreach($attr as $v){ ?>
							<dl class="filter-list clearfix">
								<dt class="filter-list-title fl"><?php echo $v['tc_name'];?>：</dt>
								<dd class="filter-list-con fl">
									<div class="fl fil-con">
										<?php if(is_array($v['data'])):?><?php  foreach($v['data'] as $m){ ?>
											<?php echo $m['html'];?>
										<?php }?><?php endif;?>
									</div>
								</dd>
								<dd class="fl more">
									<a class="more-btn" href="">
										更多
										<span class="arrow arrowB ">
										</span>
									</a>
								</dd>
							</dl>
							<?php }?><?php endif;?>
						</div>
					</div>
					<div id="goods-list" class="posr">
						<div class="list-tit">
							<dl>
								<dt class="fl">商品排序按：</dt>
								<dd class="fl list-con">
									<div class="fl con-item on" id="1"><a href="<?php echo $url;?>/order/addtime">默认</a></div>
									<div class="fl con-item" id="2"><a href="<?php echo $url;?>/order/price">价格 </a></div>
									<div class="fl con-item" id="3"><a href="<?php echo $url;?>/order/buy">销量</a></div>
									<div class="fl con-item" id="4"><a href="<?php echo $url;?>/order/addtime">最新上架</a></div>
									<!-- <div class="fl con-item"><a href="#">折扣</a></div> -->
								</dd>
								<dd class="fr page">
									<div class="fl"><?php echo $pageObj->selfPage;?>/<?php echo $pageObj->totalPage;?></div>
									<div class="fl page-prev"><?php echo $pageObj->pre();?></div>
									<div class="fl page-next"><?php echo $pageObj->next();?></div>
								</dd>
							</dl>
						</div>
						<ul class="list">
							<?php if(is_array($goods)):?><?php  foreach($goods as $v){ ?>
							<li class="goods fl">
								<dl class="goods-info">
									<dt class="goods-img"><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee/<?php echo $v['m_img'];?>"></a></dt>
									<dd class="goods-thumb">
										<ul class="thumb-list">
											<li class="thumb-img fl on"><img width="30"  src="http://localhost/lee/<?php echo $v['s_img'];?>"></li>
										</ul>
									</dd>
									<dd class="mg-t5">
										<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
										<span class="mg-r10">（<?php echo $v['zhekou'];?>折）</span>
										<del class="mg-l8">￥ <?php echo $v['old_price'];?></del>
									</dd>
									<dd class="goods-maintitle mg-t7"><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
									<dd class="goods-subtitle mg-t5"><a class="red" href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['sub_title'];?></a></dd>
								</dl>
							</li>
							<?php }?><?php endif;?>
						</ul>
					</div>
					<div class="bk30 clearfix"></div>
					<div id="page">
						<?php echo $page;?>
					</div>
					<div class="bk30 clearfix"></div>
				</div>
			</div>
		</div>
		<div id="footer" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/lee/APP/App/Index/Tpl/Public/css/footer.css" rel="stylesheet" />
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