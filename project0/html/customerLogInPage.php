
<!--

20170424 Allegro
	顺便学习html、css的产物。
	其他：
	1.做个logo？
	2.自适应浏览器大小
	3.增加字体样式

20170630  
	加了图片，结合bootstrap完成自适应，字体就这样吧……稍微好看点。
	电脑打开时，中间层背景不透明，手机模拟的时候会透明。
	
20170701
	1.wrap垂直居中
	2.去掉了jquery
	
20170703
	修改后的页面 
-->
<?php 
include('../php/customerLogIn.php');
if(	isset($_SESSION["desknumber"]))
	{
		header('Location:selectPage.php');
	}

?>

<!DOCTYPE html>
<html >
<head>
		<meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
		<link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
        <link rel="stylesheet" href="css\frozen.css">
<title>顾客登录</title>
  

</head>

<body>

<div class="wrapper">
	<form class="form-1" action="customerLogInPage.php" > 
		<img src="images/timg.jpg" width="180" height="160"/>
		<h1 style="font-size:30px;">一起用餐吧</h1>
		<br/>
		<br/>
		<div class="ui-input ui-border-radius">
			<input type="number" min="1" max="300" name="desknumber" placeholder="请输入桌号" required />      
		</div>
		<button  class="ui-btn" type="submit">开始点餐</button>   
	</form>
  </div>

</body>
</html>