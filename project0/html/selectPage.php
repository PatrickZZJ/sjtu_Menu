<!--

20170630 
选菜界面。

20170701
42-44行是几种类别，target指向内敛框架不用改，href指向菜单中某类的开头需要具体设置

20170701
安全登录

20170703
链接addDish.php，输出总金额

-->
<?php 
	session_start();
	if(	isset($_SESSION["desknumber"])){}
	else header("Location:customerLogInPage.php");
	include('../php/addDish.php');
	
?>
<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>Select dishes</title>
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
         <link rel="stylesheet" href="css\frozen.css">



    </head>

	<body style="overflow:scroll;overflow-y:hidden">  
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
				<li><h1>
					<?php 
						if(!isset($_SESSION['total']))
							$total='0';
						else
							$total=$_SESSION['total'];
						print "￥".$total;
					?>
				</h1></li>
				<li><button class="ui-btn-lg ui-btn-danger" onclick="location.href='makeOrder.php'"><h2 style="color:white">下单<h2></button></a></li>
				</ul>
		</footer>
		
<section class="ui-container ui-center">
			<?php if(isset($_GET["dishctg"])){
					$i=1;
					if($_GET["dishctg"]=="seafood")$i=2;
					if($_GET["dishctg"]=="dessert")$i=3;
			};?>
			<?php print("<iframe src='menu.php#c".$i."' name='iframe_menu'>1</iframe>");?>
			<div class="menu-class">    
			  <ul >    
			  <?php include('../php/loadCategory.php')?>
			  </ul>    
			</div>			
</section>
	</body>  
</html>