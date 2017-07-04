<?php  
	error_reporting(0);
	header('content-type:text/html;charset="utf-8"');//设置字符编码
	/*function Fn(){
		echo '123';
	}
	fn();*/

	//$a=5;
	//1、数据类型
	//resource类型
	/*$conn=mysql_connect();
	echo gettype($conn)*/

	/*$fp=fopen('hello.txt','r');
	$str=fread($fp,40);
	echo $str;*/

	//echo gettype($fp);
	
	//$num;
	//$num=null;
	//echo gettype($num);//NULL

	//$arr=Array();//Array
	//echo $arr;
	
	//$arr=array('apple','banana','pear');
	//$arr1=array('name'=>'张三','age'=>100);
	//echo gettype($arr);//array
	//echo $arr;//array
	//print_r($arr1);
	

	/*class Person{//类

	}
	$p1=new Person();
	echo gettype($p1);//object*/

	/*$bool=false;
	echo $bool;//空
	echo gettype($bool);//boolean*/

	/*$f=1.345;
	echo gettype($f);//double*/

	/*$n=123;
	echo gettype($n);//integer*/

	//$str='hello';
	//settype($str,integer);
	//echo print gettype($str);
	
	/*$arr=array('apple','banana','pear');
	var_dump($arr);*/


	//2、选择结构、循环结构
	/*$w=date('w');//获取星期
	switch ($w) {
		case 4:
			echo "星期四";
			break;
		
		default:
			# code...
			break;
	}*/


	//$name='张三';
	//$age=100;

	//echo "你的名字是{$name},你今年有{$age}";
	//php双引号具有解析功能，同时也能解析html标签。
	//echo "<br>";
	//echo '你的名字是$name,你今年有$age岁';
	//php双引号具有解析功能，同时也能解析html标签。

	//echo "<strong>你的名字是</strong>".$name;

	
	/*function fn(){
		global $num;//全局变量，分号不能省略。
		$num=100;
		//echo $num;
	}

	fn();
	echo $num;//外面可以访问里面的全局变量*/
	/*$GLOBALS['name'] = 'zhangsan';//超级全局变量
	function fn(){
		echo $GLOBALS['name'];
	}
	fn();*/

	/*function ctable($rows=5,$cols=10){
		$str="<table border=1>";
		for($i=0;$i<$rows;$i++){
			$str.="<tr>";
			for($j=0;$j<$cols;$j++){
				$str.="<td>$cols</td>";
			}
			$str.="</tr>";
		}
		$str.="</table>";
		return $str;
	}

	echo ctable();*/


	$arr=array(
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'外媒:台湾20个"友邦" 至少18个排队等与大陆建交','date'=>'2017-6-15'),
		array('title'=>'《新华字典》App引争议 回应：部分网友或有误区','date'=>'2017-6-15'),
		array('title'=>'高考之后骗局来:师生QQ被克隆 家长智破连环骗局','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15')
	);
	echo json_encode($arr);//json_encode:将数据以json转换编码。
?>