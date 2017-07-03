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
	$orders=simplexml_load_file("../xml/addDish.xml");
	
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
			$dishId=$dish->attributes();
			$dishIdSet=$dishId['id'];
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
				<form action='selectPage.php' method='get' target='_top'>
					<input type='hidden' name=".$dishIdSet." value='A'>
					<input type='submit' value='+'>
				</form>
				<h3>");
			$orderId=$orders->ordersNum;
			$order=$orders->xpath('/orders/order[@id="'.$orderId.'"]');
			if(isset($order[0]->dish))
			{
				$dishSet=$orders->xpath('/orders/order[@id="'.$orderId.'"]/dish[@id="'.$dishIdSet.'"]');
				if(!isset($dishSet[0]->num))
					print "0";
				else
					print $dishSet[0]->num;
			}
			else print "0";
			print("</h3>
				<form action='selectPage.php' method='get' target='_top'>
					<input type='hidden' name=".$dishIdSet." value='D'>
					<input type='submit' value='-' />
				</form>
				</li>
			</ul>");
		}
	}
?>

