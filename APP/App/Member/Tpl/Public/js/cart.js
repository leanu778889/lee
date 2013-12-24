$(function(){
	totalAll();
	$('.goodsNum').find('.prev').click(function(){
		var gid = $(this).attr('gid');
		var url = $(this).attr('url');
		var oNum = $(this).siblings('.nums')[0];
		var iNum = Number($(oNum).val());
		var iPrice = Number($(this).parents('.rowCount').siblings('.rowPrice').find('p span').html());
		var oXiaoji = $(this).parents('.rowCount').siblings('.rowSub').find('.red span');
		var oTotalNums = $('#total-nums');
		var iTotalNums = Number($('#total-nums').html());
		var self = this;
		if(iNum>1){
			$.ajax({
				url:url+'/id/'+gid,
				type:'POST',
				data:'type=prev',
				dataType:'json',
				success:function(result){
					if(result.status === true){
						$(self).siblings('.nums').val(iNum-1);
						addEnable(oNum);
						oXiaoji.html(iPrice*(iNum-1));
						totalAll();
					}
				}
			})
		}

	})
	$('.goodsNum').find('.next').click(function(){
		var gid = $(this).attr('gid');
		var url = $(this).attr('url');
		var oNum = $(this).siblings('.nums')[0];
		var iNum = Number($(oNum).val());
		var iCun = Number($(oNum).attr('kucun'));
		var iPrice = Number($(this).parents('.rowCount').siblings('.rowPrice').find('p span').html());
		var oXiaoji = $(this).parents('.rowCount').siblings('.rowSub').find('.red span');
		var self = this;
		if(iNum<iCun){
			$.ajax({
				url:url+'/id/'+gid,
				type:'POST',
				data:'type=next',
				dataType:'json',
				success:function(result){
					if(result.status === true){
						$(self).siblings('.nums').val(iNum+1);
						oXiaoji.html(iPrice*(iNum+1));
						addEnable(oNum);
						totalAll();
					}
				}
			})
		}
	})
	$('.rowCount').each(function(){
		var oNum = $(this).find('.nums')[0];
		addEnable(oNum);
	})
})
/******  删除确认  *******/
$(function(){
	$('.delAffirm').click(function(){
		if(!confirm('你确定要删除吗?')){
			return false;
		}
	})
})
function addEnable(obj){
	var iNum = Number($(obj).val());
	var iCun = Number($(obj).attr('kucun'))
	if(iNum>1){
		$(obj).siblings('.prev').addClass('enable')
	}else{
		$(obj).siblings('.prev').removeClass('enable')
	}
	if(iNum<iCun){
		$(obj).siblings('.next').addClass('enable')
	}else{
		$(obj).siblings('.next').removeClass('enable')
	}
}
function totalAll(){
	var iTotal = 0;
	var iNum = 0;
	$('.rowTotal').each(function(){
		iTotal+=Number($(this).find('.red span').html());
	})
	$('.rowNums').each(function(){
		iNum+=Number($(this).find('.nums').val());
	})
	$('#total-nums').html(iNum);
	$('#total-price').html(iTotal);
	$('#total-xiaoji').html(iTotal);
}