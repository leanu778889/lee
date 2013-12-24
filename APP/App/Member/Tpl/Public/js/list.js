$(function(){
	$('#list-left .subnav-list').each(function(){
		$(this).find('.sign').toggle(
			function(){
			$(this).parents('.subnav-list').find('.cate2').addClass('bg-color3');
			$(this).parents('.subnav-list').find('.cate3').css('display','block');
			},
			function(){
				$(this).parents('.subnav-list').find('.cate2').removeClass('bg-color3');
				$(this).parents('.subnav-list').find('.cate3').css('display','none');
			}
		)
	})
	$('#list-right .filter-list').each(function(i){
		$(this).find('.more').toggle(
			function(){
				$(this).parents('.filter-list').find('.fil-con').css('height','auto');
				$(this).find('span').removeClass('arrowB');
				$(this).find('span').addClass('arrowT');
			},
			function(){
				$(this).parents('.filter-list').find('.fil-con').css('height',60);
				$(this).find('span').removeClass('arrowT');
				$(this).find('span').addClass('arrowB');
			}
		)
	})


})