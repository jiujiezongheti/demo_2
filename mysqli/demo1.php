<?php
	//创建mysqli对象,连接数据库
	$mysqli = new mysqli('localhost','root','','demo1');
	$mysqli->set_charset('utf8');
	$_sql = "SELECT * FROM `tg_user`";
	$res = $mysqli->query($_sql);
	echo $res->num_rows;
	var_dump($res->fetch_assoc());
	//销毁结果集
	$res->free();
	//断开mysql
	$mysqli->close();
?>