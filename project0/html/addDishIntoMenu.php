<?php	
	if(isset($_POST["category"])){
	$dom=simplexml_load_file("../xml/menu.xml");
	$ctgid=$_POST["category"];
	$ctg=$dom->xpath('/menu/category[@id="'.$ctgid.'"]');
	$category=$ctg[0];
	$dish=$category->addChild('dish');
	$id=str_replace(' ','',$_POST['Ename']);
	$dish->addAttribute('id',$id);
	$dish->addChild('Cname',$_POST['Cname']);
	$dish->addChild('Ename',$_POST['Ename']);
	$dish->addChild('price',$_POST['price']);
	$dish->addChild('soldOut',$_POST['soldOut']);
	$newAddress='pictures/'.$id.time().'.jpg';
	$myfile = fopen($newAddress, "w");
	fclose($myfile);
	move_uploaded_file($_FILES["file"]["tmp_name"],$newAddress);
	$dish->addChild('picture',$newAddress);
	$dom->asXML('../xml/menu.xml');
	header('location:menu-manager.php');
	}
?>
<!DOCTYPE html>
<!--

20170701
用于店长管理菜单界面的菜单条目。
使用横版标签<nav>作为导航
示例一个类别中的一个菜

v2

-->

<html>
    <head>
		<meta charset="utf-8">
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
         <link rel="stylesheet" href="css\frozen.css">
		 <title>增加菜品</title>
    </head>

	<body>

		<div style="background-color:white">
		<ul>
			<li>                 <!-- 类别名-->
				<h1 align="center"  style="background:#efefef"><a name="chaocai"  class="ui-txt-default" >增加菜品</a></h1>
				<br />
			</li>
	
			<li>         <!-- 一道菜-->
				<ul class="ui-row-flex">
					<li class="ui-col ui-flex ui-flex-pack-center">
					<img src="pictures/smile.jpg" width="300" height="200"></img>
					</li>
					<li class="ui-col ui-flex ui-flex-ver  ui-flex-align-end ui-flex-pack-end">
					<form action="addDishIntoMenu.php" method="post" enctype= 'multipart/form-data'>
						<label>分类：</label>&#12288;&#12288;
						<select name="category">
						<option value="mainCourse">主菜</option>
						<option value="seafood">海鲜</option>
						<option value="dessert" selected="selected">甜品</option>
						</select>
						<br>
						<label>中文名：</label>&#12288; <input type="text" name="Cname" value="" >
						<br />
						<label>英文名：</label>&#12288; <input type="text" name="Ename" value="" >
						<br />
						<label>价格：</label>&#12288;&#12288; <input type="number" step='0.01' name="price" value="00.00" >
						<br />
						<label>图片：</label>&#12288;&#12288; <input type="file" name="file">
						<br />
						<label>是否售空：</label> 
						<input type="radio" name="soldOut" value="是">是
						<input type="radio" name="soldOut" value="否"  checked>否
						<br />
						<div class="ui-flex ui-flex-pack-end">
						<input type="submit" class="ui-btn"  value="确认修改">
						</div>
					</form>	
					</li>
					<li class="ui-col ui-flex ui-flex-ver  ui-flex-align-start ui-flex-pack-end">
					<form method='post' action='menu-manager.php'>
						<div>
						<input type='submit' class='ui-btn ui-btn-danger' value='返回'>
						</div>
					</form>
					</li>
				</ul>
				<hr />
			</li>
	    </ul>
	</body>  
</html>


