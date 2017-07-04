<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script type="text/javascript">
		for(var i=0;i<5;i++){
			document.write(i);
			document.write('<br>');
		}
	</script>
	<?php  
		for($i=0;$i<5;$i++){
			echo $i;
			echo "<br>";
		}
	?>
</body>
</html>