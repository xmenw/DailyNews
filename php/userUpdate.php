<?php 
	ini_set("session.cookie_httponly", 1);
	require_once("./dbUtil/dbUtils.php");
	header('content-type:application/json;charset=utf8');
	$ac = urldecode($_POST["ac"]);
	$username = urldecode($_POST["user"]);
	$password = sha1(sha1(urldecode($_POST["password"])));
	$user = "root";
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	// 1 注册 
	// 2 登录 
	if ($ac == 1) {
		$sql = "INSERT INTO `user`(user, password) VALUES('$username', '$password')";
	} else {
		$sql = "SELECT COUNT(*) FROM `user` WHERE `user`='$username' AND `password`='$password'";
	}
	$result = query($mysql, $sql);
	if ($ac == 1) {
		echo $result == true;
	} else {
		$res = mysqli_fetch_row( $result )[0];
		if ($res >= 1) {
			setcookie("user", "$username", time() + 60 * 20);
		}
		echo $res;
		mysqli_free_result($result);
	}
	mysqli_close($mysql);
