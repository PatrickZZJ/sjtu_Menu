<?php
error_reporting(0);
/*	addDishes.php
*	addDish.php realize adding dishes.
*
*	Update time:7/2/2017 20:00
*	By Moton Shao
*/

	$menu=simplexml_load_file("../xml/menu.xml");
	$orders=simplexml_load_file("../xml/order.xml");//订单xml
	$ordersNum=$orders->xpath('/orders');
	
	if(!isset($orders->state))//判断是否为同一订单
	{
		if(!isset($ordersNum[0]->ordersNum))
		{
			$orders->addChild('ordersNum','1');
			$ordersNumSet="1";
			$ordersNumSet=(int)($ordersNumSet);
			$_SESSION['n']=$ordersNumSet;
		}
		else
		{
			$ordersNumSet=$ordersNum[0]->ordersNum;
			$ordersNumSet=(int)($ordersNumSet);
			$ordersNumSet++;
			$ordersNum[0]->ordersNum=$ordersNumSet;
			$_SESSION['n']=$ordersNumSet;
		}
		$order = $orders->addChild('order','');
		$order->addAttribute('id',$_SESSION['n']);
		$desknumber = $order->addChild('desknumber',$_SESSION["desknumber"]);
		$order->addChild('total','0');
		$orders->addChild('state','1');
	}
	//写入订单  /*确认订单时应将所有的超全局变量归零*/
	
	$orderIdSet=$orders->ordersNum;
	$orderId=$orders->xpath('/orders/order[@id="'.$orderIdSet.'"]');//**确定需要写入的订单
	$total=$orderId[0]->total;
	
	foreach($menu->category as $category)
	{
		foreach($category->dish as $dish)
		{
			$dishId=$dish->attributes();
			$dishIdSet=$dishId['id'];
			$flag="0";//flag判断是否需要建新的dish元素

			if(isset($_GET["{$dishIdSet}"]))
			{
				if($_GET["{$dishIdSet}"]=="A")
				{
					if(isset($orderId[0]->dish))
					{	
						foreach($orderId[0]->dish as $orderDish)
						{
							$orderDishId=$orderDish->attributes();
							$orderDishIdSet=$orderDishId['id'];
							if($dishIdSet == "{$orderDishIdSet}")
							{	
								$flag="1";
								$odxp=$orders->xpath('/orders/order[@id="'.$orderIdSet.'"]/dish[@id="'.$orderDishIdSet.'"]');
								$num=$odxp[0]->num;
								$num=(int)($num);
								$num++;
								$odxp[0]->num=$num;
								$price = (float)($odxp[0]->price);
								$total=$price + $total;
							}
						}
					}
					print "(3)";
					if($flag == "0")
					{
						$dishes=$orderId[0]->addChild('dish','');
						$dishes->addAttribute('id',$dishIdSet);
						$dishes->addChild('price',$dish->price);
						$dishes->addChild('num','1');
						$dishes->addChild('Cname',$dish->Cname);
						$odxp=$orders->xpath('/orders/order[@id="'.$orderIdSet.'"]/dish[@id="'.$dishIdSet.'"]');
						$price = (float)($odxp[0]->price);
						$total=$price + $total;
					}
				}
				if($_GET["{$dishIdSet}"]=="D")
				{
					$odxp=$orders->xpath('/orders/order[@id="'.$orderIdSet.'"]/dish[@id="'.$dishIdSet.'"]');
					if(isset($odxp[0]->num))
					{
						$num=$odxp[0]->num;
						$num=(int)($num);
						$num--;
						$price = (float)($odxp[0]->price);
						if($num<0){$num++;$price=0;}
						$odxp[0]->num=$num;
						$total=$total - $price;
					}
				}
				unset($_GET["{$dishIdSet}"]);
			}
			if(isset($total))
			{
				$orderId[0]->total=$total;
				$_SESSION['total']=$total;
			}
		}
	}
	$orders->asXML('../xml/order.xml');//整合至xml
?>

