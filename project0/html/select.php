<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>Select dishes</title>
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写得-->
         <link rel="stylesheet" href="css\frozen.css">


		

    </head>

	<body>  
			   <header class="ui-header ui-header-positive ui-border-b">
					<i class="ui-icon-return" onclick="history.back()"></i><h1> 商家名称XX </h1>
	
		  	<!-- 需要一个搜索框?-->
	
               </header>
			   <footer class="ui-footer ui-footer-btn">
						<ul class="ui-tiled ui-border-t">
							<li><h1  style="color:black">你的桌号<?php print($_SESSION['desknumber'])?></h1></li>
							<li><h1  style="color:black">总金额￥xx</h1></li>
							<li data-href="js.html"><button type="button" onclick="alert('Hello World!')">下单</button></li>
							
						</ul>
			    </footer>
			   
			<br />			<br />		
			<div class="menu-class">    
			  <ul >    
				<li><a href="menu.html"  target="iframe_a">炒菜</a></li>    
				<li><a href="#">小吃</a></li>    
				<li><a href="#">炒饭</a></li>    
				
						
			  </ul>    
			  

			</div>  
			
				  <iframe src="menu.html" name="iframe_a">123</iframe>
			
	</body>  
</html>