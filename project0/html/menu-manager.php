<?php 
		$dom=simplexml_load_file("../xml/menu.xml");
		if(isset($_POST["ctgid"]))$id=$_POST["ctgid"];
		else {$dd=$dom->category[0]->attributes();
		$id=$dd[0];}
		$category=$dom->xpath('/menu/category[@id="'.$id.'"]');
		$ctgid=$category[0]->attributes();
		$category=$category[0];
		 
		$i=0;
		
		if(isset($_POST["dishid"])){
			$dishid=$_POST["dishid"];
			$dish=$dom->xpath('//dish[@id="'.$dishid.'"]');
			//处理删除操作
			if(isset($_POST["delete"])){
				foreach($category->dish as $dish)
				{
					$dids=$dish->attributes();
					$did=$dids["id"];
					if($did==$dishid)break;
					$i++;
				}
				unset($category->dish[$i]);
				$dom->asXML('../xml/menu.xml');
				print("提示：删除成功！");
			}
			//处理编辑操作
			else{
				$dish[0]->Cname=$_POST["Cname"];
				$dish[0]->Ename=$_POST["Ename"];
				$dish[0]->price=$_POST["price"];
				$dish[0]->soldOut=$_POST["soldOut"];
				if(isset($_FILES["file"]["type"])){
				
				if ((($_FILES["file"]["type"] == "image/gif")
					  || ($_FILES["file"]["type"] == "image/jpeg")
					  || ($_FILES["file"]["type"] == "image/pjpeg")
					  || ($_FILES["file"]["type"] == "image/jpg"))
					  && ($_FILES["file"]["size"] < 2000000000)){
						unlink($dish[0]->picture);
						$newAddress='pictures/'.$dishid.time().'.jpg';
						$myfile = fopen($newAddress, "w");
						fclose($myfile);
						move_uploaded_file($_FILES["file"]["tmp_name"],$newAddress);
						$dish[0]->picture=$newAddress;
				}
				$dom->asXML('../xml/menu.xml');
				print("提示：修改成功！");
				}
			}
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
		 <title>菜单</title>
    </head>

	<body>

		<div style="background-color:white">
		<ul>
			<li>                 <!-- 类别名-->
				<h1 align="center"  style="background:#efefef"><a name="chaocai"  class="ui-txt-default" ><?php print($ctgid[1]);?></a></h1>
				<br />
			</li>
	<?php foreach($category->dish as $dish)
			{	print("
				<li>
				<ul class='ui-row-flex'>
					<li class='ui-col ui-flex ui-flex-pack-center'>
					<img src='".$dish->picture."' width='300' height='200'></img>
					</li>
					<li class='ui-col ui-flex ui-flex-ver ui-flex-pack-end ui-flex-align-end'>
					<form method='post' action='menu-manager.php' enctype= 'multipart/form-data'>
						<label>中文名：</label>&#12288; <input type='text' name='Cname' value='".$dish->Cname."' >
						<br />
						<label>英文名：</label>&#12288; <input type='text' name='Ename' value='".$dish->Ename."' >
						<br />
						<label>价格：</label>&#12288;&#12288; <input type='number' name='price' value='".$dish->price."' >
						<br />
						<label>图片：</label>&#12288;&#12288; <input type='file' name='file'>
						<input type='hidden' name='MAX_FILE_SIZE' value='500000'>
						<br /><br />
						<label>是否售空：</label> ");
				if($dish->soldOut=='否')
						print("<input type='radio' name='soldOut' value='是'>是
						<input type='radio' name='soldOut' value='否'  checked>否");
				else print("<input type='radio' name='soldOut' value='是' checked>是
						<input type='radio' name='soldOut' value='否'>否");
				$dishids=$dish->attributes();
				$dishid=$dishids["id"];
				print("
						<br />
						<div class='ui-flex ui-flex-pack-end'>
						<div>
						<input type='submit' class='ui-btn'  value='确认修改'>
						<input type='hidden' name='ctgid' value='".$id."'>
						<input type='hidden' name='dishid' value='".$dishid."'>
						</div>
						</div>
					</form>
					</li>
					<li class='ui-col ui-flex ui-flex-ver ui-flex-align-start ui-flex-pack-end'>
					<form method='post' action='menu-manager.php'>
						<div>
						<input type='submit' class='ui-btn ui-btn-danger' value='删除该菜品'>
						<input type='hidden' name='ctgid' value='".$id."'>
						<input type='hidden' name='dishid' value='".$dishid."'>
						<input type='hidden' name='delete' value='delete'>
						</div>
					</form>
					</li>
				</ul>
				<hr/>
				</li>");
		    }
	?>
	    </ul>
		
		
			
				<br />
				<h5 style="text-align:center">没有了 ╮(╯▽╰)╭</h5>

				<br />
	</body>  
</html>


