<?php
    /**
     * loadMenu.php
     *
     * A php file that implement loading category into selectDishesPage or editMenuPage.
     *
     * Patrick Z
     * https://github.com/PatrickZZJ/sjtu_Menu
	 * unfinished: identity check;
     */
	$dom=simplexml_load_file("../xml/menu.xml");
	
	//��������ѡ����
	$i=0;
	foreach($dom->category as $category)
	{
		$i++;
		$ctgid=$category->attributes();
		print("<li/>");
		print("<a href='menu.php#c".$i."' target='iframe_menu'>");
		print($ctgid[1]);
		print("</a></li>");
	}
?>