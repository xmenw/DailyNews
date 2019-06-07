<?php 
	require_once("./dbUtil/dbUtils.php");
	$title = urldecode($_POST["title"]);
	$text = urldecode($_POST["text"]);
	$pics = urldecode($_POST["pic"]);
	$name = urldecode($_POST["name"]);
	$id = urldecode($_POST["id"]);
	header('content-type:application/json;charset=utf8');
	$user = "root";	
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	$sql = "UPDATE `news` SET
				`title` = '$title', 
				`text` = '$text', 
				`pic` = '$pics', 
				`name` = '$name'
			WHERE `id` = '$id'";
	$result = query($mysql, $sql);
	echo $result;
	mysqli_close($mysql);
