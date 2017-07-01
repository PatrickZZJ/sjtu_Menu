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
	$orders=simplexml_load_file("../xml/order.xml");
	
	$i=0;
	//右侧的菜单显示
		foreach($dom->category as $category)
	{
		$i++;
		$ctgid=$category->attributes();
		print("			<li class='ui-border-t'>
				<a name='c".$i."'>".$ctgid[1]."</a>
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
				<form action='../php/addDish.php' method='get'>
					<button class='ui-btn-wrap ui-btn-s' type='submit'>+</button>
				</form>
				<h3>");
			$dishId=$dish->attributes();
			$dishIdSet=$dishId['id'];
			
			foreach($orders->order->dish as $orderDish)
			{
				$orderDishId=$orderDish->attributes();
				$orderDishIdSet=$orderDishId['id'];
				if($orderDishIdSet == "{$dishIdSet}")
				{
					$num=$orders->order->dish->num;
					print $num;
				}
			}
			print("</h3>
				<form action='../php/addDish.php' method='get'>
					<button class='ui-btn-wrap ui-btn-s' type='submit'>-</button>
				</form>
				</li>
			</ul>");
		}
	}
?>

