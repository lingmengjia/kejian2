<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script type="text/javascript">
		

	</script>
	<?php $arr=array('banana','apple','orange','pear'); ?>
	<ul>
		<?php for($i=0;$i<count($arr);$i++) {?>
		<li><?php echo $arr[$i] ?></li>
		<?php } ?>
	</ul>
</body>
</html>