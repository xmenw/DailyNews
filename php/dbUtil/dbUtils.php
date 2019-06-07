<?php
 function connect($user, $pass, $database){
 	$mysql = mysqli_connect("localhost", $user, $pass, $database);
	if($mysql == null){
		die("数据库连接失败");
	}
	mysqli_query($mysql, "SET NAMES utf8");
	return $mysql;
 }

 function query($mysql, $sql){
 	$result = mysqli_query($mysql, $sql);
 	return $result;
 }