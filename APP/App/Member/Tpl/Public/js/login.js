$(function(){
	var url = $('#inputCode').attr('url');
	$('#loginForm').validation({
		username:{
			rule:{
				regexp:/^\w[\w\.]+@\w+[\.a-z]+[a-z]$/i,
				required: true
			},
			error:{
				regexp:'用户名不是有效的邮箱地址',
				required: " 请输入用户名! "
			}
		},
		password:{
			rule: {
				required: true
			},
			error: {
				required: " 请输入密码 "
			}
		},
		code:{
			rule: {
				required: true,
				ajax: url
			},
			error: {
				required: " 验证码不能为空 ",
				ajax: " 验证码错误 "
			}
		}
	})
})