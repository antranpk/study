// bat su kien khi click vao nu Tao tai khoan
$('#submit_signup').on('click', function() {
	//lay cac gia tri trong form dang ky
	$name = $('#user_signup').val();
	$password = $('#pass_signup').val();
	$rePassword = $('#repass_signup').val();
	//kiem tra neu nhu cac bien la rong thi thong bao loi
	if ($name == '' || $password == '' || $rePassword == '') {
		//hien thi thong bao
		$('#formSignup .alert').removeClass('hidden');
		$('#formSignup .alert').html('Vui long dien day du thong tin!');
	}
	else {
		$('#formSignup .alert').addClass('hidden');
		//thuc hien gui du lieu bang ajax
		$.ajax({
			url : 'signup.php', //url xu ly du lieu
			type : 'POST', //phuong thuc gui du lieu
			//du lieu gui di 
			data : {
				name : $name,
				password : $password,
				rePassword : $rePassword
			},
			//xu ly khi gui xu lieu thanh cong
			success : function(data) {
				$('#formSignup .alert').html(data);
			}
		});
	}
});