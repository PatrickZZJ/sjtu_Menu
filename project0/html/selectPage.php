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
							<li><h1>你的桌号<?php print($_SESSION['desknumber'])?></h1></li>
							<li><h1>总金额￥xx</h1></li>
							<li><i class="ui-icon-return"><button type="button" onclick="">下单</button></i></li>
							
						</ul>
			    </footer>
			   
			<br />			<br />		
			<iframe src="menu.html" name="iframe_menu">123</iframe>
			<div class="menu-class">    
			  <ul >    
				<li><a href="menu.html#1" target="iframe_menu">炒菜</a></li>    
				<li><a href="menu.html#2" target="iframe_menu">小吃</a></li>    
				<li><a href="menu.html#3" target="iframe_menu">炒饭</a></li>     
				
						
			  </ul>    
			  

			</div>  
			
				  <iframe src="menu.html" name="iframe_a">123</iframe>
			
	</body>  
</html>