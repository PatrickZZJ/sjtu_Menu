<?php
    /**
     * menuEditing.php
     *
     * A php file that implement menuEditing usecase.
     *
     * Patrick Z
     * https://github.com/PatrickZZJ/sjtu_Menu
	 * unfinished: identity check;
     */

    // enable sessions
    session_start();
	
	//assume dish_id is passed by menuEditing.html
	define("DISH", "mooncake");
	define("URL", "home.php");
	$_SESSION["dish_id"]=DISH;

	$id=$_SESSION["dish_id"];
	$dom=simplexml_load_file("xml/menu.xml");
	$dish=$dom->xpath('/menu/dish[Ename="'.$id.'"]');
	
	if(isset($_POST["submission"])){
		$dish[0]->Cname=$_POST["Cname"];
		$dish[0]->Ename=$_POST["Ename"];
		$dish[0]->category=$_POST["category"];echo $_POST["category"];
		$dish[0]->price=$_POST["price"];
		$dish[0]->picture=$_POST["picture"];
		$dish[0]->description=$_POST["description"];
		echo $dom->asXML('xml/menu.xml');
		Header('Location:'.URL.'');
		}
	header("Content-type: text/html; charset=utf-8");
?>


<!DOCTYPE html>

<html>
  <head>
    <title>Menu Editing</title>
  </head>
  <body>
    <h1><?php print($id);?></h1>
    <br/>
	<?php if(!isset($_POST["submission"])){?>
		<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
			<b><?php print("中文名：")?>Chinese Name:</b>
			<input name="Cname" value="<?=$dish[0]->Cname?>"/>
			<br/>
			<b><?php //print("英文名：")?>English Name:</b>
			<input name="Ename" value="<?=$dish[0]->Ename?>"/>
			<br/>
			<b><?php //print("分类：")?>Category:</b>
			<input name="category" value="<?=$dish[0]->category?>"/>
			<br/>
			<b><?php //print("价格：")?>Price:</b>
			<input name="price" value="<?=$dish[0]->price?>"/>
			<br/>
			<b><?php //print("图片：")?>Picture:</b>
			<input name="picture" value="<?=$dish[0]->picture?>"/>
			<br/>
			<b><?php //print("描述：")?>Description:</b>
			<input name="description" value="<?=$dish[0]->description?>"/>
			<br/>
			<input type="submit" value="submit"/>
			<input type="hidden" name="submission" value="true"/>
			<img src="<?=$dish[0]->picture?>" />
		</form>
	<?php }?>
  </body>
</html>