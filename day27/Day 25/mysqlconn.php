<?php  
	header('content-type:text/html;charset="utf-8"');
	$conn=@mysql_connect('localhost','root','12345678');
	if (!$conn) {
	    die('主机用户名和密码有误：' . mysql_error());
	}
	mysql_select_db('js1704');
	mysql_query('SET NAMES UTF8');//执行代码

	$title='我是变量里面的内容';
	$title1='2222222222222222222222';
	//增加数据
	//$query="insert news value(null,'$title',NOW()),(null,'$title1',NOW())";

	//删除数据

	//$query="delete from news where id%2=0";

	//修改数据
	//$query="update news set id=10 where id=1";
	//mysql_query($query);//执行代码
	

	$query="select * from student";
	$query1="select * from news";

	$result=mysql_query($query);
	$result1=mysql_query($query1);

	$array;
	$j=0;
	for($i=0;$i<mysql_num_rows($result);$i++){
		$array[$j++]=mysql_fetch_array($result,MYSQL_ASSOC);
	}

	$array1;
	$k=0;
	for($i=0;$i<mysql_num_rows($result1);$i++){
		$array1[$k++]=mysql_fetch_array($result1,MYSQL_ASSOC);
	}


	class Baidu{

	};

	$b=new Baidu();

	$b->user=$array;
	$b->news=$array1;

	echo json_encode($b);








	mysql_close($conn);//关闭数据库

?>