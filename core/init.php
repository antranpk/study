<?php
require_once 'classes/DB.php';
require_once 'classes/Session.php';

/*$conn = mysqli_connect('localhost', 'root', 'root', 'note');
$sql = "INSERT INTO user VALUES(
	'',
	'an',
	'123123',
	'2012/23/2'
)";

if ($conn) {
	mysqli_query($conn, $sql);
}*/

$db = new DB();
$db->connect_sql();

/*$sql = "INSERT INTO user VALUES (
	'',
	'name',
	'password',
	'2017/12/07'
	)";

if ($db->connect_sql()) {
	var_dump('ket noi thanh cong');
} else {
	var_dump('ket noi that bai');
}
if ($db->query($sql)) {
	var_dump('insert thanh cong');
} else {
	var_dump('insert fail');
}
*/

//khoi tao session object
$session = new Session();
//bat dau session
$session->start();
//lay du lieu session
$user = $session->get();
//cai dat mui gio
date_default_timezone_get('Asia/Ho_Chi_Minh');
$date_current = '';
$date_current = date("Y-m-d H:i:sa");

//neu ton tai session
if ($user) {
	//truy van thong tin user
	$sql_get_data_user = "select * from users where name = '$user'";
	//lay thong tin user
	$data_user = $db->fetch_assoc($sql_get_data_user, 1);
}

?>