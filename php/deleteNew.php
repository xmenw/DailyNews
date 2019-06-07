<?php 
	require_once("./dbUtil/dbUtils.php");
	$id = urldecode($_POST["id"]);
	header('content-type:application/json;charset=utf8');
	$user = "root";	
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	$sql = "DELETE FROM `news` WHERE `id`=$id";
	$result = query($mysql, $sql);
	echo $result;
	mysqli_close($mysql);
