<?php  
	header('content-type:text/html;charset="utf-8"');//设置字符编码
	/*function fn($a,$b,$c){//返回多个值的函数调用
		$arr=array($a,$b,$c);
		list($d,$e,$f)=$arr;//解构赋值
		return $d.'-'.$e;
	}

	echo fn(5,6,7);*/

	//$arr=array('banana','apple','orange','pear');
	//$arr1=array(1,3,4,5,3,56,23,12,3,23,123,56,12,1,1,1,3,3,3);
	//sizeof()   count()  统计个数
	//echo count($arr);//长度4
	//array_push()   array_pop()  array_shift()  array_unshift()
	//array_push($arr,'a','c','d');
	//print_r($arr);
	//array_unshift($arr,'a','c','d');
	//print_r($arr);
	//in_array():判断是否在数组里面存在当前值，返回boolean
	//三个参数：1.找的值   2.数组本身  3.boolean:判断类型
	//echo in_array('orange1',$arr);
	

	//sort();排序  1参：数组 2参：排序的类型
	
	//sort($arr,SORT_STRING);//字符串的方式
	//sort($arr1,SORT_NUMERIC);
	//print_r($arr1);

	//array_count_values() 统计数组中所有的值出现的次数
	//print_r(array_count_values($arr1));
	//array_unique:数组去重
	//print_r(array_unique($arr1));
	//list() 把数组中的值赋给一些变量
	//list($d,$e,$f)=$arr;
	

	//each() 返回数组中当前的键／值对并将数组指针向前移动一步
	
	/*print_r(each($arr));
	print_r(each($arr));*/
	/*for($i=0;$i<count($arr);$i++){
		print_r(each($arr));
	}*/
	//echo $arr[2];//下标访问
	
	/*$arr2=array('a'=>5,'b'=>6,'c'=>7);//自定义索引
	$arr3=array(5,6,7);//默认索引
	echo $arr2['a'];
	echo '<br>';
	echo $arr3[0];*/

	/*$arr1=array(
		array('title'=>'朝鲜回应“美特别代表赴平壤后大学生获释”：人道原因','date'=>'2017-6-15'),
		array('title'=>'外媒:台湾20个"友邦" 至少18个排队等与大陆建交','date'=>'2017-6-15'),
		array('title'=>'《新华字典》App引争议 回应：部分网友或有误区','date'=>'2017-6-15'),
		array('title'=>'高考之后骗局来:师生QQ被克隆 家长智破连环骗局','date'=>'2017-6-15')
	);*/

	//$arr2=array('banana','apple','orange','pear');

	/*for($i=0;$i<sizeof($arr2);$i++){
		echo $arr2[$i].'<br>';
	}*/

	/*foreach ($arr2 as $key => $value) {
		echo $key.'-----'.$value.'<br>';
	}*/

	/*for($i=0;$i<sizeof($arr1);$i++){
		foreach ($arr1[$i] as $key => $value) {
			echo $key.'-----'.$value.'<br>';
		}
	}*/
	//json_encode()  对变量进行JSON编码
	//json_decode()  对JSON格式的字符串进行解码
	
	//echo json_encode($arr1,true);//true:按数组的方式，false:对象
	
	//http://www.kuitao8.com/api/joke
	
	
	//$joke=file_get_contents('http://www.kuitao8.com/api/joke');//取出对应的接口的内容
	//echo $joke;
	//$arr=json_decode($joke,true);
	//echo $arr['content'];


	/*$weather=file_get_contents('http://www.sojson.com/open/api/weather/json.shtml?city=杭州');
	$arr=json_decode($weather,true);
	print_r($arr['data']['forecast'][0]);*/

	/*$arr=range(-10,9);//范围
	print_r($arr);*/
?>