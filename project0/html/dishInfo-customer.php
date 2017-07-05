<!DOCTYPE html>
<!--

20170630  

20170701
42-44行是几种类别，href指向菜单中某个地方，target不用改

-->
<?php
	if(isset($_GET["dishId"])){
		$dom=simplexml_load_file("../xml/menu.xml");
		$id=$_GET["dishId"];
		$dish=$dom->xpath("//dish[@id='".$id."']");
		
	}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">                          <!-- 响应式相关-->
        <title>菜品详情</title>
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
         <link rel="stylesheet" href="css\frozen.css">



    </head>

	<body>  <!-- 固定导航栏-->
			    <header class="ui-header ui-header-positive ui-border-b">
			 		<i class="ui-icon-return" onclick="history.back()"></i><h1> 商家名称：一起用餐吧 </h1>
                </header>
				<div class="ui-footer ui-footer-stable">
					<a href="#"><button class="ui-btn-lg ui-btn-danger" style="height:100%">
					确定
					</button></a>
				</div>
							   
	<section class="ui-container">
		<img src="<?php print($dish[0]->picture);?>" width="100%" height="300px">
		<div class="ui-border-b"  style="margin-left:10px;font-family:黑体;font-size:22px;margin-right:10px">
			<div><?php print($dish[0]->Cname);?></div>
			<div class="ui-tiled" style="padding:5px">
			<div style="color:red">￥ <?php print($dish[0]->price);?></div><div>&nbsp;/&nbsp;份</div>
			</div>
		</div>
		<div style="margin:10px">
			<form>
				<div>
				<label style="font-family:黑体;font-size:19px">备注</label>
				</div>
				<input type="text" placeholder="口味偏好可以写在这里哟~(๑´ڡ`๑)~ " style="width:100%;height:25px;"/>
			</form>
		</div>
	</section>


		
	</body>  
</html>