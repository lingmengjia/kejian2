<?php
	/*$cb=$_GET['callback'];
	$tel=$_GET['tel'];
	$telinfo=file_get_contents('http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.$tel);

	echo $cb.'('.$telinfo.')';*/
	
	$telinfo=file_get_contents('http://tcc.taobao.com/cc/json/mobile_tel_segment.htm?tel='.$tel);
	echo $telinfo;

//	$cb=$_GET['callback'];
//	$city=$_GET['send'];
//	$telinfo=file_get_contents('http://api.tocus.com.cn/weather2.php?send='.$city);
//
//	echo $cb.'('.$telinfo.')';

?>