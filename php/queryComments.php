<?php 
	require_once("./dbUtil/dbUtils.php");
	$title = urldecode($_POST["title"]);
	header('content-type:application/json;charset=utf8');
	header("Cache-Control: public; max-age=200");
	$user = "root";
	$pass = "";
	$db = "news";
	$size = 8;
	if(isset($_POST["begin"])){
		$begin = urldecode($_POST["begin"]) * $size;
	}else {
		$begin = 0;
	}
	$mysql = connect($user, $pass, $db);
	$sql = "SELECT * from comments WHERE title = '$title' ORDER BY ID DESC LIMIT $begin, $size";
	$result = query($mysql, $sql);
	$num = mysqli_fetch_row($result);
	$arr = [];
	$i = 0;
	while ($num != null) {
		$arr[$i ++] = $num;
		$num = mysqli_fetch_row( $result );
	}
	/*查询评论数*/
	$sql = "SELECT COUNT(*) from comments WHERE title = '$title'";
	$result = query($mysql, $sql);
	$num = mysqli_fetch_row($result);
	$arr[$i] = $num[0] / $size;
	echo json_encode($arr);
	mysqli_close($mysql);
