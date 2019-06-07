<?php 
	require_once("./dbUtil/dbUtils.php");
	header('content-type:application/json;charset=utf8');
	$title = urldecode($_POST["title"]);
	$text = urldecode($_POST["text"]);
	$name = urldecode($_POST["name"]);
	$file = "./static/";
	$dir = $file.iconv("UTF-8", "Big5", $_FILES["pic"]["name"]);
	move_uploaded_file($_FILES["pic"]["tmp_name"], $dir);
	if($_FILES["pic"]["error"]){
		echo "文件上传失败";
	}
	$user = "root";	
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	$sql = "INSERT INTO `news`(`title`, `text`, `pic`, `name`) VALUES('$title', '$text', '$dir', '$name')";
	$result = query($mysql, $sql);
	header('location:http://localhost:800/news/html/uploadNews.html');
	mysqli_close($mysql);
