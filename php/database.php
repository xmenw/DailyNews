<?php 
	require_once("./dbUtil/dbUtils.php");
	$size = 6;
	$name = urldecode($_POST["name"]);
	$begin = urldecode($_POST["begin"]) * $size;
	header('content-type:application/json;charset=utf8');
	header("Cache-Control: public; max-age=200");
	$user = "root";
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	if(!isset($name)){
		$name = '全部';
	}
	$sql = "SELECT id, title, pic FROM news";
	if ($name != "全部") {
		$sql.=" where name='$name'";
	}
	$sql.=" ORDER BY `id` DESC limit $begin, $size";
	$result = query($mysql, $sql);
	$num = mysqli_fetch_row($result);
	$arr = [];
	$i = 0;
	while ($num != null) {
		$arr[$i ++] = $num;
		$num = mysqli_fetch_row( $result );
	}
	if(isset($_COOKIE["user"])){
		$arr[$i] = $_COOKIE["user"];
	}else {
		$arr[$i] = null;
	}
	echo json_encode( $arr );
	mysqli_free_result($result);
	mysqli_close($mysql);
