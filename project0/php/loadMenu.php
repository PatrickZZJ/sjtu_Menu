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
	
	//右侧的菜单显示
		foreach($dom->category as $category)
	{
		
		$ctgid=$category->attributes();
		print("			<li class='ui-border-t'>
				<a name='c13'>".$ctgid[1]."</a>
			</li>");
		foreach($category->dish as $dish)
		{
			print("			<li class='ui-border-t'>
			<ul class='ui-tiled'>
				<div class='ui-list-thumb'>
				<span style='background-image:url(".$dish->picture.")'></span>
				</div>

				<li style='padding:15px 0'>
				<h4>".$dish->Cname."</h4>
				<h4>".$dish->price."元</h4>
				</li>
				
				<li>
				<button class='ui-btn-wrap ui-btn-s' onclick='' >+</button>
				<h3> 0 </h3>
				<button class='ui-btn-wrap ui-btn-s'>-</button>
				</li>
			</ul>");
		}
	}
?>

