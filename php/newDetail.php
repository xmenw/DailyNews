<?php 
	require_once("./dbUtil/dbUtils.php");
	header('content-type:application/json;charset=utf8');
	header("Cache-Control: public; max-age=200");
	$id = urldecode($_POST["id"]);
	$user = "root";
	$pass = "";
	$db = "news";
	$mysql = connect($user, $pass, $db);
	if ($id != null) {
		$sql = "SELECT * FROM news";
		if (isset($id)) {
			$sql.=" where id='$id'";
		}
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
	}
	mysqli_close($mysql);
