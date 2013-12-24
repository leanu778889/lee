$(function(){
	$('#home-banner .banner').eq(0).css('opacity',1);
	$('#home-banner .btn').eq(0).addClass('on');
	$('#home-banner .btn').eq(0).find('.posa').css('display','block');
	var m = 0;
	var t = null;
	autoRun()
	function autoRun(){
		t = setInterval(move,3000);
	}
	$('#home-banner').hover(function(){
		clearInterval(t);
	},function(){
		autoRun()
	})
	$('#home-banner').find('.btn').each(function(i){
		$(this).hover(
			function(){
				$(this).addClass('on').siblings(this).removeClass('on');
				$('#home-banner .btn-list .posa').css('display','none');
				$(this).find('.posa').css('display','block');
				$('#home-banner .banner').siblings().stop().animate({opacity:0},600);
				$('#home-banner .banner').eq(i).stop().animate({'opacity':'1'},600)
				m=i;
			},
			function(){
				$(this).addClass('on').siblings(this).removeClass('on');
				$(this).find('.posa').css('display','block');
			}
		);
	})
	function move(){
		$('#home-banner').find('.btn').eq(m).addClass('on').siblings(this).removeClass('on');
		$('#home-banner .btn-list .posa').css('display','none');
		$('#home-banner').find('.btn').eq(m).find('.posa').css('display','block');
		$('#home-banner .banner').siblings().stop().animate({opacity:0},600);
		$('#home-banner .banner').eq(m).stop().animate({'opacity':'1'},600)
		m++
		if(m>=$('#home-banner .banner').length){
			m=0;
		}
	}
	$('#home-recommend .con-list').find('li').hover(
		function(){
			$(this).siblings().find('.con-mask').css({'opacity':0.7,'z-index':3})
		},
		function(){
			$(this).siblings().find('.con-mask').css({'opacity':0.7,'z-index':-1})
		}
	);
	var m1=0;
	var t1=null;
	autoRun1();
	function autoRun1(){
		t1 = setInterval(move1,3000);
	}
	$('#home-news').hover(
		function(){
			clearInterval(t1);
		},
		function(){
			autoRun1();
		}
	);
	function move1(){
		m1++;
		if(m1==$('#home-news .news-list .news-con').length-1 ||m1>$('#home-news .news-list .news-con').length-1 ){
			$('#home-news .news-btn').find('span').eq(0).addClass('on').siblings().removeClass('on');
			$('#home-news .news-list').stop();
			$('#home-news .news-list').animate({'left':-1000*m1},1000,function(){
				$('#home-news .news-list').css('left',0);
			});
			m1 = 0;
		}else{
			$('#home-news .news-btn').find('span').eq(m1%4).addClass('on').siblings().removeClass('on');
			$('#home-news .news-list').stop();
			$('#home-news .news-list').animate({'left':-1000*m1},1000);
		}
	}
	$('#home-news .news-btn').find('span').each(function(i){
		$(this).hover(
			function(){
				$(this).addClass('on').siblings().removeClass('on');
				$('#home-news .news-list').stop();
				$('#home-news .news-list').animate({'left':-1000*i},1000)
				m1=i;
			},
			function(){

			}
		);
	});
	var m2=0;
	var t2=null;
	autoRun2();
	function autoRun2(){
		t2 = setInterval(move2,3000);
	}
	function move2(){
		m2++;
		if(m2==$('#home-hot .hot-list .hot-con').length-1 ||m2>$('#home-hot .hot-list .hot-con').length-1){
			$('#home-hot .hot-nav .hot-nav-con').eq(0).css('background','#fff').siblings().css('background','#E7E7E7');
			$('#home-hot .hot-list').stop();
			$('#home-hot .hot-list').animate({'left':-1000*m2},1000,function(){
				$('#home-hot .hot-list').css('left',0);
				m2=0
			})
		}else{
			$('#home-hot .hot-nav .hot-nav-con').eq(m2).css('background','#fff').siblings().css('background','#E7E7E7');
			$('#home-hot .hot-list').stop();
			$('#home-hot .hot-list').animate({'left':-1000*m2},1000);
		}
	}
	$('#home-hot').hover(
		function(){
			clearInterval(t2)
		},
		function(){
			autoRun2();
		}
	);
	$('#home-hot .hot-nav .hot-nav-con').each(function(i){
		$(this).hover(
			function(){
				$(this).css('background','#fff').siblings().css('background','#E7E7E7');
				$('#home-hot .hot-list').stop();
				$('#home-hot .hot-list').animate({'left':-1000*i},1000)
				m2 =i;
			},
			function(){
			}
		);
	})
	$('#home-class .class-list .class-con').eq(4).css('border','0');
	$('#home-class .class-list .class-con').eq(5).css('border','0');
	$('#home-class .class-list .class-con').eq(6).css('border','0');
})