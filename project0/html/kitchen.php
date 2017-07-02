<?php 
	session_start();
	if(	(isset($_SESSION["Mauthenticated"])) || (isset($_SESSION["Cauthenticated"]))  )
	{}
	else header("Location:staffLogInPage.php");
  
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>后厨管理界面</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css.css" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
			<div class="container">
			<nav class="navbar navbar-default navbar-static-top">
			<div class="container-fluid">
			<div class="navbar-form navbar-left">
			<img src="images/timg.jpg" width="79" height="70" alt="">
			</div>
			<div class="navbar-form navbar-left">
	<h1><strong>一起去点餐后台管理系统</strong></h1>
			</div>
	<div id="navbar-menu">
		<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<img src="images/1.jpg" width="40" class="img-circle" alt=""> 
	<span><?php print($_SESSION['staff']) ?></span> 
		<i class="glyphicon glyphicon-chevron-down"></i>
			</a>
		<ul class="dropdown-menu">
	<li><a href="info.html" target="watch"><span>个人信息</span></a></li>
	<li><a href="settings.html" target="watch"><span>用户设置</span></a></li>
	<li><a href="login.html"><span>退出系统</span></a></li>
		</ul></li></ul></div></div></nav>
		<div id="left2">
	<nav>
		<ul class="nav">
     <li><a href="../php/handleOrder.php" target="watch"><span>查看订单</span></a></li>
     <li><a href="AD.html" target="watch"><span>处理菜单</span></a></li>
     <li><a href="allsettings.html" target="watch"><span>系统设置</span></a></li>
     <li><a href="helper.html" target="watch"><span>服务中心</span></a></li>
		</ul></nav></div>
			<div id="main">
	<iframe name="watch" src="info.html" width="100%" height="700" frameborder="0">
	</iframe>
	</div>
</div>
</body>
</html>
