<?php
	error_reporting(7);//错误显示
/*	addDishes.php

	addDish.php realize adding dishes.
	20170702 20:00
	
	实现多人多桌实时点餐；对点餐数据和订单数据实现分离
	20170703 17:08
	
	By Moton Shao
*/

	$menu=simplexml_load_file("../xml/menu.xml");
	$orders=simplexml_load_file("../xml/addDish.xml");//订单xml
	$ordersNum=$orders->xpath('/orders');
	
	$orderState = "0";
	if(!isset($ordersNum[0]->ordersNum))//验证是否已创建过订单
	{
		$orders->addChild('ordersNum','1');
		$ordersNumSet="1";
		//创建新订单
		$order = $orders->addChild('order','');
		$order->addAttribute('id',$ordersNumSet);
		$desknumber = $order->addChild('desknumber',$_SESSION["desknumber"]);
		$order->addChild('total','0');
		$order->addChild('handle','ordering');
	}
	else
	{
		$ordersNumSet=$orders->ordersNum;
		foreach($orders->order as $order)//查找所有正在进行的订单，若有此桌号，orderState为1,跳过创建
		{
			
			$deskNum=$order->desknumber;
			if($deskNum == $_SESSION['desknumber'])
			{
				$orderState = "1";
				$orderThisAttr=$order->attributes();
				$orderThisId=$orderThisAttr['id'];
			}
		}
		if($orderState == "0")//若没有此桌号，则创建新订单
		{
			$ordersNumSet=(int)($ordersNumSet);
			$ordersNumSet++;
			$ordersNum[0]->ordersNum=$ordersNumSet;
			$orderThisId = $ordersNumSet;
			//创建新订单
			$newOrder = $orders->addChild('order','');
			$newOrder->addAttribute('id',$ordersNumSet);
			$desknumber = $newOrder->addChild('desknumber',$_SESSION["desknumber"]);
			$newOrder->addChild('total','0');
			$newOrder->addChild('handle','ordering');
			$orderState = "1";
		}
	}
	
	//写入订单  /*确认订单时应将所有的超全局变量归零*/
	
	$orderIdSet=$orderThisId;//确定需要写入的订单号（id）
	$orderId=$orders->xpath('/orders/order[@id="'.$orderIdSet.'"]');//**确定需要写入的订单
	$total=(float)($orderId[0]->total);
	
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
						if($num>0)
						{
							$num--;
							$price = (float)($odxp[0]->price);
							$odxp[0]->num=$num;
							$total=$total - $price;
						}
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
	$orders->asXML('../xml/addDish.xml');//整合至xml
?>

