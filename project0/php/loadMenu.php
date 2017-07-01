<?php
    /**
     * loadMenu.php
     *
     * A php file that implement loading menu into selectDishesPage or editMenuPage.
     *
     * Patrick Z
     * https://github.com/PatrickZZJ/sjtu_Menu
	 * unfinished: identity check;
     */

	$dom=simplexml_load_file("../xml/menu.xml");
	header("Content-type: text/html; charset=utf-8");
	
	//左侧的类型选择处理
	foreach($dom->category as $category)
	{
		$ctgid=$category->attributes();
		print("<li/>");
		print("<a href="menu.html#3" target="iframe_menu">")
		print($ctgid);
		print("</a></li>");
	}
	
	//右侧的菜单显示
		foreach($dom->category as $category)
	{
		$ctgid=$category->attributes();
		print("<br/>");
		print($ctgid);
		print("<br/>");
		foreach($category->dish as $dish)
		{
			print($dish->Ename);
			print("<br/>");
		}
	}
?>
