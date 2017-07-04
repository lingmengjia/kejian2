<?php  
$cb=isset($_GET['callback'])?$_GET['callback']:'fn';

$arr=file_get_contents('http://www.kuitao8.com/api/joke');//获取到内容

echo $cb.'('.$arr.')';
?>