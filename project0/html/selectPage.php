<!DOCTYPE html>
<?php session_start();?>
<!--

20170630 
选菜界面。

20170701
42-44行是几种类别，target指向内敛框架不用改，href指向菜单中某类的开头需要具体设置

-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>Select dishes</title>
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
         <link rel="stylesheet" href="css\frozen.css">



    </head>

	<body>  
			   <header class="ui-header ui-header-positive ui-border-b">
					<i class="ui-icon-return" onclick="history.back()"></i><h1> 商家名称：一起点餐吧 </h1>
	
		  	<!-- 
			1.需要一个搜索框?
			2.
			-->	
               </header>
		<footer class="ui-footer  ui-footer-btn ui-btn-group">
			<ul class="ui-tiled ui-border-t">
				<li><h1>桌号<?php print($_SESSION['desknumber'])?></h1></li>
				<li><h1>￥xx.xx</h1></li>
				<li><button class="ui-btn-lg ui-btn-danger" onclick="location.href='order-check.html'"><h2 style="color:white">下单<h2></button></a></li>
				</ul>
		</footer>
		
<section class="ui-container ui-center">

			<iframe src="menu.html" name="iframe_menu">1</iframe>
			<div class="menu-class">    
			  <ul >    
			  <?php include('../php/loadCategory.php')?>
			  </ul>    
			</div>  
</section>
	</body>  
</html>