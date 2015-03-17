<?php
	echo "Mysql</br>";
	$mysql_server_name="localhost";
	$mysql_username="root";
	$mysql_password="";
	$mysql_database="skdemo";
	//准备数据库
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	//连接数据库
	$id=$_GET["id"];
	//获取查询信息
	$find="select * from skye";
	//形成查询队列
	$result=mysql_query($find,$conn);
	//查询
	$row=mysql_fetch_array($result);
	echo "result:".$row['id'];
	mysql_free_result($result);
	mysql_close($conn);
?>