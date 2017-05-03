<?php

require_once 'core/init.php';
var_dump($date_current);

if ($user) {
	header('Location: index.php');
}

$name = $db->real_escape_string($_POST['name']);
$password = $_POST['password'];

$repassword = $_POST['rePassword'];

// cac bien chua code js ve thong bao
$show_alert = "<script>$('#formSignup .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignup .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignup .alert').attr('class', 'alsert alert-success');</script>";
//lenh sql kiem tra su ton tai cua username
$sql_check_user_exist = "SELECT name FROM users WHERE name = '$name'";

//neu do dai dang nhap khong nam trong khoang 6-24 ky tu
if (strlen($name) < 6 || strlen($name) > 24) {
	echo $show_alert . 'Ten dang nhap phai nam trong khoang 6-24 ky tu.';
}
else if (preg_match('/\W/', $name)) {
	echo $show_alert . 'Ten dang nhap khong dc chua khoang trang va ky tu dat biet';
}
else if ($db->num_rows($sql_check_user_exist)) {
	echo $show_alert . 'Ten dang nhap da ton tai';
}
else if (strlen($password) < 6) {
	echo $show_alert. 'password qua ngan! it nhat 6 ky tu';
}
else if ($password != $repassword) {
	echo $show_alert. 'Mat khau nhap lai khong khop';
}
else {
	$password = md5($password);
	$sql = "INSERT INTO user VALUES (
	'',
	'$name',
	'$password',
	'$date_current'
	)";

	//thuc thi cau truy van
	$db->query($sql);
	//gui du lieu ve luu session
	$session->send($name);
	//close ket noi
	$db->close();
	//hien thi thong bao va tai lai trang
	echo $show_alert . $success_alert. "Dang ky thanh cong.<script>location.reload()</script>";
}
