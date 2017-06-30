<!--
顾客登陆页面
-->
<?php include('../php/customerLogIn.php')?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
<link href="jquery-mobile/jquery.mobile.theme-1.3.0.min.css" rel="stylesheet" type="text/css">
<link href="jquery-mobile/jquery.mobile.structure-1.3.0.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
<script src="jquery-mobile/jquery-1.11.1.min.js"></script>
<script src="jquery-mobile/jquery.mobile-1.3.0.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.button.min.js"></script>
<title>顾客登录</title>
  
  <style type="text/css">
.form-1 {
  max-width: 1000px;
  padding: 60px 140px 180px;
  margin: 0 auto;
  background-color: #E0E0E0;
  border: 1px solid rgba(0, 0, 0, 0);
</style>
</head>

<body>

<div style="text-align: center" data-role="page" id="page">
		<form class="form-1"> 
		<img src="images/timg.jpg" width="238" height="215" alt=""/>
		<h1>一起用餐吧</h1>
		<div data-role="fieldcontain">
			<input  class="form-2" type="number" min="1" max="300" name="desknumber" placeholder="请输入桌号" />      
		</div>
		<button type="submit">开始点餐</button>   
    </form>
  </div>
  
<address>
<br />
Software Engineering, Group 9 <br />
</address>
 
</body>
</html>