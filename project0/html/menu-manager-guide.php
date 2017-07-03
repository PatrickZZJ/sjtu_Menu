<?php 	$dom=simplexml_load_file("../xml/menu.xml");?>
<!DOCTYPE html>
<!--

20170702
处理菜单页面左边

-->
<html>
    <head >
        <meta charset="utf-8">
        <link rel="stylesheet" href="css\frozen.css">
    </head>
	
	<body >  
			<div>    
				<ul class="ui-row-flex">
					<li class="ui-col ui-flex ui-flex-pack-start">
						<nav><div class="ui-flex ui-flex-pack-start">
							<?php
							foreach($dom->category as $category)
							{
								$ctgid=$category->attributes();
								print("	<div>
										<form action='menu-manager.php' method='post' target='iframe'>
											<input type='hidden' name='ctgid' value='".$ctgid[0]."'/>
											<input class='ui-btn' type='submit' value='".$ctgid[1]."'/>
										</form>
										</div>
									 ");
							}
							?>
						</div>
						</nav>
					</li>
					<li class="ui-col ui-flex ui-flex-pack-end">
						<a class="ui-btn" href="addDishIntoMenu.php" target='iframe'>增加菜品</a>
					</li>
				</ul>
			</div>
			
			<iframe src="menu-manager.php" name="iframe" width="100%" height="600" frameborder="0">1</iframe>
		

	</body >  
</html>