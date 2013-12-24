$(function(){
	var url = $('#inputCode').attr('url');
	$('#regForm').validation({
		email:{
			rule: {
			    email: true,
			    required: true
			},
			error: {
				email: " Email格式不正确 ",
				required: " 不能为空 "
			},
			message: " 请输入常用的邮箱地址 ",
			success: " 邮箱地址正确 "
		},
		password_d:{
			rule: {
				confirm: "password"
			},
			error: {
				confirm: " 密码不一致，请重新输入 "
			},
			message: " 请再次输入密码 ",
			success: " 输入正确 "
		},
		code:{
			rule: {
				required: true,
				ajax: url
			},
			error: {
				required: " 验证码不能为空 ",
				ajax: " 验证码错误 "
			},
			message: " 请输入验证码 ",
			success: " 输入正确 "
		}
	})

	$('#regForm').submit(function(){
		if($('#checkRead').attr('checked')==undefined){
			return false;
		}
	})


})