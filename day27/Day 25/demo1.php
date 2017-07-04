<?php  
	$arr=array('apple');
	$arr1=array('title'=>'11111111111111111');
	$arr2=array(//二维数组
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222'),
		array('title'=>'22222222222222')
	);

	//echo json_encode($arr2);//编码
	//echo json_decode();//解码
	

	class Person{//创建一个类

	};

	$p1=new Person();//实例化对象


	$p1->name=$arr2;//添加属性
	$p1->info=$arr2;

	echo json_encode($p1);


?>