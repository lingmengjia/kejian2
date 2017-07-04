<?php  
	require 'conn.php';//引入数据库连接的文件。

	error_reporting(0);

	//失去焦点时获取
	

	if(isset($_POST['name']) || $_POST['submit']){
		$user=@$_POST['name'];
	}else{
		exit('非法操作');
	}


	$query1="select * from info where username='$user'";//查询用户名是否存在于表中。
	$result=mysql_query($query1);//获取结果集
	if(mysql_fetch_array($result)){
		echo true;//有重复 1
	}else{
		echo false;//没有重复（kong）
	}


	//submit提交的时候才能获取
	//点击了注册按钮
	if(isset($_POST['submit'])){
		$name=$_POST['username'];//表单的名称
		$pass=$_POST['password'];//表单的名称
		$email=$_POST['email'];//表单的名称
		$query="insert info value(null,'$name','$pass','$email')";
		mysql_query($query);
		header('location:login.html');
	}
?>