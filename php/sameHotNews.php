<?php
	require_once("./dbUtil/dbUtils.php");
	header('content-type:application/json;charset=utf8');
	header("Cache-Control: public; max-age=200");
	$name = $_POST["name"];
	$sql = "SELECT id, title, watch FROM news where name='$name' ORDER BY watch DESC LIMIT 5";
	$result = query($mysql, $sql);
	$num = mysqli_fetch_row($result);
	$arr = [];
	$i = 0;
	while ($num != null) {
		$arr[$i ++] = $num;
		$num = mysqli_fetch_row( $result );
	}
	echo json_encode( $arr );
	mysqli_free_result($result);
	mysqli_close($mysql);