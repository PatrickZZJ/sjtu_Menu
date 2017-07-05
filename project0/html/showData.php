<!DOCTYPE html>
<html>
    <head >
<!--        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>数据页面</title>
        <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写--
        <link rel="stylesheet" href="css\frozen.css">
        <link rel="stylesheet" href="https://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
         
    <script src="jquery-mobile/jquery-1.11.1.min.js"></script>
    <script src="jquery-mobile/jquery.mobile-1.3.0.min.js"></script>
-->	
    </head>

	<body >
	    <header >
		    <form action="showDataChild.php" method="post" target="showDataChild">
			请选择月份
			<input type="month" name="month" width="300px" value="2017-07">
			<input type="submit" value="生成图像">
			</form>
		</header>
		<iframe name="showDataChild" width="1005px" height="600px" src="showDataChild.php"> </iframe>
		
		
	</body>
</html>