<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
<?php
	/*$v=$_POST['xss'];
	echo "$v";*/
	$str='hello';
	echo md5($str);
	
?>
<!--<script>alert(12345)</script>-->
</body>
</html>