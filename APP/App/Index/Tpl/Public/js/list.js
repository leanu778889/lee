$(function(){
	$('#page').find('.count').remove();
	$('#list-left .subnav-list').each(function(){
		$(this).find('.red').parents('.subnav-list').find('.sign').find('a').html('-');
		$(this).find('.red').parents('.subnav-list').find('.cate2').addClass('bg-color3');
		$(this).find('.red').parents('.subnav-list').find('.cate3').css('display','block');
		$(this).find('.sign').toggle(
			function(){
				$(this).find('a').html('-');
				$(this).parents('.subnav-list').find('.cate2').addClass('bg-color3');
				$(this).parents('.subnav-list').find('.cate3').css('display','block');
			},
			function(){
				$(this).find('a').html('+');
				$(this).parents('.subnav-list').find('.cate2').removeClass('bg-color3');
				$(this).parents('.subnav-list').find('.cate3').css('display','none');
			}
		)
	})
	$('.fil-con').each(function(){
		if(this.offsetHeight>=61){
			this.style.height = '56px';
			this.minHeight = 56;
		}else{
			this.minHeight =this.offsetHeight;
		}
	})


	$('#list-right .filter-list').each(function(i){
		$(this).find('.more').toggle(
			function(){

				$(this).parents('.filter-list').find('.fil-con').css('height','auto');
				$(this).find('span').removeClass('arrowB');
				$(this).find('span').addClass('arrowT');
			},
			function(){
				var iH = $(this).parents('.filter-list').find('.fil-con')[0].minHeight;
				$(this).parents('.filter-list').find('.fil-con').css('height',iH);
				$(this).find('span').removeClass('arrowT');
				$(this).find('span').addClass('arrowB');
			}
		)
	})
	$('#tag').find('.fil-con').each(function(){
		$(this).parent().prepend($(this).find('.fil-name').eq(0).addClass('fl'))
	})

	var id = getCookie('orderId');
	$('#goods-list').find('.con-item').each(function(){
		$(this).click(function(){
			setCookie('orderId',$(this).attr('id'))
		})
		if($(this).attr('id') == id){
			$('#goods-list').find('.con-item').removeClass('on');
			$(this).addClass('on');
		}
	})


})

function getCookie(name){
    var arr = document.cookie.split('; ');
    var i = 0;
    for (i = 0; i < arr.length; i++) {
        var arr2 = arr[i].split('=');
        if (arr2[0] == name) {
           return arr2[1];
        }
    }
    return '';
}
/**
 * 设置cookie
 * @param name
 * @param value
 * @returns
 */
function setCookie(name,value){
	document.cookie = name+"="+value+"; path=/";
}