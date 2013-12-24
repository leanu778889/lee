$(function(){
	$('.collect-nav a').click(function(){
		var id = $(this).attr('id');
		document.cookie = "userHomeNav="+id+';path=/';
	})
	var id = getCookie('userHomeNav');
	$('.collect-nav a').each(function(){
		if($(this).attr('id') == id){
			$(this).addClass('active');
		}else{
			$(this).removeClass('active');
		}
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