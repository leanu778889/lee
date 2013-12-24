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