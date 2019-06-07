<?php 
	require_once("./dbUtil/dbUtils.php");
	$title = urldecode($_POST["title"]);
	$comment = urldecode($_POST["comment"]);
	$users = urldecode($_POST["user"]);
	$date = urldecode($_POST["date"]);
	header('content-type:application/json;charset=utf8');
	$user = "root";
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	$sql = "INSERT INTO `comments`(`title`, `comment`, `user`, `date`) VALUES('$title', '$comment', '$users', '$date')";
	$result = query($mysql, $sql);
	echo $result;
	mysqli_close($mysql);
