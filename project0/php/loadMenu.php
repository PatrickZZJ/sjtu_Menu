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
	$_SESSION['makeorder'] = "1";
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
			if($dish->soldOut == "否")
			{
				print("			<li class='ui-border-t'>
				<ul class='ui-tiled'>
					<div class='ui-list-thumb'>
					<form action='dishInfo-customer.php' method='get' target='_top'>
						<input value=' ' type='submit' style='width:60px;height:60px;border:none;background-size:cover;background-image:url(".$dish->picture.")' />
						<input type='hidden' name='dishId' value='".$dishIdSet."'/>
					</form>
					</div>

					<li>
					<h2>".$dish->Cname."</h2>
					<div>
					<span style='color:red'>￥".$dish->price."</span><span>&nbsp;/&nbsp;份</span>
					</div>
					</li>
					
					<li>
					<form action='selectPage.php' method='get' target='_top'>
						<input type='hidden' name=".$dishIdSet." value='A'>
						<input type='hidden' name='dishctg' value='".$ctgid[0]."' />
						<input type='submit' style='width:38px' value='+'>
					</form>
					<h3>");
				$orderDK=$_SESSION['desknumber'];
				foreach($orders->order as $list)
				{
					if($list->desknumber == $orderDK)
					{
						$orderIdArr = $list->attributes();
						$orderId = $orderIdArr['id'];
					}
				}
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
						<input type='hidden' name=".$dishIdSet." value='D'/>
						<input type='hidden' name='dishctg' value='".$ctgid[0]."' />
						<input type='submit' style='width:38px' value='-' />
					</form>
					</li>
				</ul>");
			}
		}
	}
?>

