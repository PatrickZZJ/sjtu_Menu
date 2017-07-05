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
	    <?php 
	    	if(isset($_POST['month'])) $month=$_POST['month'];
	    	else $month=date('Y-m');
		
	    ?>
		
		<div style="left:600px"><iframe style="left:10px;position:relative;" width="950px" height="550px" src="monthSaleData.php?month=<?php echo $month ?>" > </iframe></div>
	    <div style="left:600px"><iframe style="left:70px;position:relative;" width="800px" height="500px" src="mainCourseData.php?month=<?php echo $month ?>" > </iframe></div>
	    <div style="left:600px"><iframe style="left:70px;position:relative;" width="800px" height="500px" src="seafoodData.php?month=<?php echo $month ?>" > </iframe></div>
	    <div style="left:600px"><iframe style="left:70px;position:relative;" width="800px" height="500px" src="dessertData.php?month=<?php echo $month ?>" > </iframe></div>
	</body>
</html>