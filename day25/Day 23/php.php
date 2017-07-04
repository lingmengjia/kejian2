<?php  
	//$cb=$_GET['callback'];//获取前端传过来的函数
	//isset():判断()里面的值是否存在，返回布尔值 存在true,否则返回false。
	//$cb=isset($_GET['callback'])?$_GET['callback']:'fn';
	header('Access-Control-Allow-Origin:*');//请求的地址，*代表所有
	header('Access-Control-Allow-Method:GET,POST');//请求方式
	$arr=array(
		array('title'=>'4444444444444','date'=>'2014-08-14 14:42:11'),
		array('title'=>'DEDE栏目文章列表获取TAGS解决方法','date'=>'2014-08-13 14:42:11'),
		array('title'=>'尚狐观点：以人为本才是设计王道','date'=>'2014-08-14 14:42:11'),
		array('title'=>'热烈祝贺深圳蓝杰智库官方网站交付上线','date'=>'2014-05-14 14:42:11'),
		array('title'=>'AJAX-增加用户体验 为网站飞一会','date'=>'2014-08-14 17:42:11'),
		array('title'=>'尚狐观点：网站设计对企业的重要性','date'=>'2014-08-19 14:42:11')
	);

	echo json_encode($arr);
	//hehe(json_encode($arr))
	//echo $cb.'('.json_encode($arr).')';
?>