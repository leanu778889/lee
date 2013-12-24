$(function(){
	totalAll();
	$('#pay').click(function(){
		$('#addressForm')[0].submit();
	})
})
function totalAll(){
	var iTotal = 0;
	var iNum = 0;
	$('.rowTotal').each(function(){
		iTotal+=Number($(this).find('.red span').html());
	})
	$('.rowNums').each(function(){
		iNum+=Number($(this).html());
	})
	$('#total-nums').html(iNum);
	$('#total-price').html(iTotal);
	$('#total-xiaoji').html(iTotal);
}