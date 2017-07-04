<?php  
	header('content-type:text/html;charset="utf-8"');
	//1、数据库的连接,三个参数：1、主机名localhost  2、用户名root  3、密码
	$conn=mysql_connect('localhost','root','12345678');//资源

	//2、选择数据库和设置字符集
	mysql_select_db('js1704');
	mysql_query('SET NAMES UTF8');

	//3、操作数据库
	
	/*$query='select * from student';//sql语句

	$result=mysql_query($query);//执行sql语句*/
	$result=mysql_query('select * from student');//$result结果是所有的记录集。

	/*print_r(mysql_fetch_array($result,MYSQLI_ASSOC));//获取一条数组
	echo '<br>';
	print_r(mysql_fetch_array($result,MYSQLI_ASSOC));//获取一条*/

	//echo mysql_num_rows($result);//获取$result里面记录集的长度
	$array;
	$j=0;

	for($i=0;$i<mysql_num_rows($result);$i++){
		$array[$j++]=mysql_fetch_array($result,MYSQLI_ASSOC);
	}

	echo json_encode($array);
?>