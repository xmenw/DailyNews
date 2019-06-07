<?php 
	require_once("./dbUtils.php");
	header('content-type:application/json;charset=utf8');
	$id = urldecode($_POST["id"]);
	$num = urldecode($_POST["num"]);
	$user = "root";
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	$sql = "update news set watch = $num where id = $id";
	$result = query($mysql, $sql);
	echo json_encode( "{'num': $result}" );
	mysqli_free_result($result);
	mysqli_close($mysql);
