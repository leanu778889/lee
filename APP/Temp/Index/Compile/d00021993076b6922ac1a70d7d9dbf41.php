<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $header['webname'];?></title>
<link href="http://localhost/lee.bak/APP/App/Index/Tpl/Public/css/index.css" rel="stylesheet" />
<link href="http://localhost/lee.bak/APP/App/Index/Tpl/Public/css/common.css" rel="stylesheet" />
<script type='text/javascript' src='http://localhost/lee.bak/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<script type="text/javascript" src="http://localhost/lee.bak/APP/App/Index/Tpl/Public/js/index.js"></script>
</head>
	<body>
		<div id="header" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/lee.bak/APP/App/Index/Tpl/Public/css/header.css" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="http://localhost/lee.bak/APP/App/Index/Tpl/Public/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix(".buy,.clear-btn-icon,.icon6_4,.cart-icon,.icon6_1,.icon6_cart,.icon6_eye,.icon6_hot,.icon6_install,.icon6_5,.icon6_land,.icon6_7,.icon6_3,.icon6_next,.icon6_next-1,.icon6_phone,.icon6_prev-1,.icon6_prev,.icon6_search,.icon6_shoes,.icon6_slide-in,.icon6_6,.icon6_tips-1,.icon6_tips-2,.icon6_tips-3,.icon6_user,.icon6_2,.icon6_wz-next-s,.icon6_wz-next,.icon6_wz-prev-s,.icon6_wz-prev,.icon6_wzo-cart-ico, background");
</script>
<![endif]-->
<script type="text/javascript" src="http://localhost/lee.bak/APP/App/Index/Tpl/Public/js/header.js"></script>
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
		<!-- <img height="71" src="http://localhost/lee.bak/APP/App/Index/Tpl/Public/images/logo.png"/> -->
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
			<div id="home-banner" class="w1000 ">
				<ul class="banner-list">
					<?php if(is_array($banner)):?><?php  foreach($banner as $v){ ?>
						<li class="banner"><a href="<?php echo $v['url'];?>"><img src="http://localhost/lee.bak/<?php echo $v['image'];?>"/></a></li>
					<?php }?><?php endif;?>
				</ul>
				<div class="clearfix bk15 w1000"></div>
				<ul class="btn-list">
					<?php if(is_array($banner)):?><?php  foreach($banner as $v){ ?>
					<li class="btn">
						<a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a>
						<s class="posa arrow arrowT" ></s>
					</li>
					<?php }?><?php endif;?>
				</ul>
			</div>
			<!-- 幻灯片结束 -->
			<div class="clearfix bk15 w1000"></div>
			<!--  精品推荐开始 -->
			<div id="home-recommend" class="mg-t30">
				<h2 class="con-title">
					<p class="title-p">
						精品推荐
						<s class="posa lf-44 arrow arrowB"></s>
					</p>
					BEST RECOMMEND
				</h2>
				<ul class="con-list">
					<?php if(is_array($chugui)):?><?php  foreach($chugui as $v){ ?>
					<li class="fl posr">
						<span class="posa con-mask"></span>
						<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>">
							<img src="http://localhost/lee.bak/<?php echo $v['img'];?>">
						</a>
					</li>
					<?php }?><?php endif;?>
				</ul>
			</div>
			<!-- 精品推荐结束 -->
			<div class="clearfix bk20 w1000"></div>
			<!-- 新品推荐开始 -->
			<div id="home-news" class="w1000 mg-t20 posr">
				<h2 class="con-title">
					<div class="fr news-btn">
						<span class="icon6_slide-in fl on mg-t13"></span>
						<span class="icon6_slide-in fl mg-t13"></span>
						<span class="icon6_slide-in fl mg-t13"></span>
						<span class="icon6_slide-in fl mg-t13"></span>
					</div>
					<p class="title-p">
						新品推荐
						<s class="posa lf-44 arrow arrowB"></s>
					</p>
					NEW ARRIVALS

				</h2>
				<ul class="news-list posa">
					<li class="news-con">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" 1=1","addtime DESC","0,4");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</li>
					<li class="news-con">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" 1=1","addtime DESC","2,4");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</li>
					<li class="news-con">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" 1=1","addtime DESC","4,4");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</li>
					<li class="news-con">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" 1=1","addtime DESC","3,4");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</li>
					<li class="news-con">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" 1=1","addtime DESC","0,4");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</li>
				</ul>
			</div>
			<!-- 新品推荐结束 -->
			<div class="clearfix bk15 w1000"></div>
			<!--  热卖推荐开始 -->
			<div id="home-hot" class="mg-t30 w1000 posr">
				<h2 class="con-title">
					<p class="title-p">
						热卖推荐
						<s class="posa lf-44 arrow arrowB"></s>
					</p>
					HOT SALES
				</h2>
				<div class="hot-nav">
					<ul class="hot-nav-list">
						<li class="hot-nav-con" style="background:#fff">名品</li>
						<li class="hot-nav-con">女装</li>
						<li class="hot-nav-con">男装</li>
						<li class="hot-nav-con">鞋靴箱包</li>
						<li class="hot-nav-con">珠宝配饰</li>
						<li class="hot-nav-con">运动户外</li>
						<li class="hot-nav-con">居家生活</li>
					</ul>
				</div>
				<div class="hot-list posa">
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>

					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
					<div class="hot-con w1000 fl mg-t13">
								<?php
			$db = K('goods');
			$data = $db->fetchAll(" cid=31","addtime DESC","8");
		?><?php foreach($data as $k=>$v):?>
						<dl class="goods-list">
							<dt><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><img src="http://localhost/lee.bak/<?php echo $v['m_img'];?>"></a></dt>
							<dd class="mg-t13">
								<span class="red fw f-price">￥ <?php echo $v['price'];?></span>
								<span class="c444 mg-r10">（<?php echo $v['zhekou'];?>折）</span>
								<del>￥ <?php echo $v['old_price'];?></del>
							</dd>
							<dd><a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a></dd>
						</dl>
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<!-- 热卖推荐结束 -->
			<div class="clearfix bk15 w1000"></div>
			<!--  热卖分类开始 -->
			<div id="home-class" class="w1000">
				<h2 class="con-title">
					<p class="title-p">
						热门分类
						<s class="posa lf-44 arrow arrowB"></s>
					</p>
					HOT CLASSIFICATION
				</h2>
				<div class="class-list">
					<?php if(is_array($hotCategory)):?><?php  foreach($hotCategory as $v){ ?>
					<div class="class-con">
						<h4 class="class-tit">
							<?php echo $v['ctitle'];?>
							<i class="icon6_<?php echo $v['cid'];?> posa"></i>
						</h4>
						<?php if(is_array($v['Data'])):?><?php  foreach($v['Data'] as $k=>$m){ ?>
							<a href="<?php echo U('Index/List/index');?>/cid/<?php echo $m['cid'];?>" class="class-item <?php if(!($k%4)){?> c-red-1<?php }?>"><?php echo $m['cname'];?></a>
						<?php }?><?php endif;?>
					</div>
					<?php }?><?php endif;?>
				</div>
			</div>
		</div>
		<div id="footer" class="wrap-wide">
			<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><link href="http://localhost/lee.bak/APP/App/Index/Tpl/Public/css/footer.css" rel="stylesheet" />
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