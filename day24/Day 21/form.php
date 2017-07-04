<?php
	header('content-type:text/html;charset="utf-8"');
	//error_reporting(0)//全部的错误。
	$name=$_POST['username'];
	$pass=$_POST['password'];
	echo "你的用户名是：$name,你的密码是：$pass";
?>