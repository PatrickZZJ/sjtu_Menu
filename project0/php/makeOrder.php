<?php
	error_reporting(0);//错误显示
/* 	makeOrder.php
	
	20170703 17:05
	点击下单后生成order
*/

	session_start();
	$orders=simplexml_load_file('../xml/addDish.xml');
	$addOrder=simplexml_load_file('../xml/order.xml');

	foreach($orders->order as $order)// 得到需要提交order的id
	{
		if($order->desknumber == "{$_SESSION['desknumber']}")
		{
			$orderIdArr=$order->attributes();
			$orderId=$orderIdArr['id'];
		}
	}
	$orderThis=$orders->xpath('/orders/order[@id="'.$orderId.'"]');
	$orderThis[0]->handle="No";
	$i=0;
	$j=0;
	$p=0;
	$k=0; 
	foreach($orders->order as $order)
	{
		$orderIdCheck=$order->attributes();
		$oic=$orderIdCheck['id'];
		if($orderId == "{$oic}")//**经测试必须这么写，否则会无法判断，节点与属性相比较
		{
			foreach($order->dish as $dish)
				$p++;
			for($k=0;$k<=$p-1;$k++)
			{
				$dish=$order->dish[$k];
				$num = $dish->num;
				if($num == "0")
				{
					unset($order->dish[$k]);
					$k--;
					$p--;
				}
			}
		}
		$j++;
	}
	$orders->asXML('../xml/addDish.xml');
	
	//添加新订单
	$newOrders = $addOrder->xpath('/orders');
	$newOrderNum = $newOrders[0]->orderNum;//表示order.xml中<orders>下必须在一开始就有<orderNum>节点
	$newOrderNum = (int)($newOrderNum);
	$newOrderNum++;
	$newOrders[0]->orderNum = $newOrderNum;//**既可以修改节点也可以在不存在时添加节点
	$newOrderSet = $addOrder->addChild('order','');
	$newOrderSet->addAttribute('id',$newOrderNum);//添加order的id
	
	$total = $orderThis[0]->total;
	$newOrderSet->addChild('total',$total);//添加order中total节点
	
	$handle = $orderThis[0]->handle;
	$newOrderSet->addChild('handle',$handle);//添加order中handle节点
	
	$desknumber = $orderThis[0]->desknumber;
	$newOrderSet->addChild('desknumber',$desknumber);//添加order中desknumber节点
		
	foreach($orderThis[0]->dish as $dish)
	{
		$dishIdArr = $dish->attributes();
		$dishId = $dishIdArr['id'];
		$newDish = $newOrderSet->addChild('dish','');//添加order中dish节点
		$newDish->addAttribute('id',$dishId);
		
		$num = $dish->num;
		$newDish->addChild('num',$num);//添加dish中num节点
		
		$price = $dish->price;
		$newDish->addChild('price',$price);//添加dish中price节点
		
		$Cname = $dish->Cname;
		$newDish->addChild('Cname',$Cname);//添加dish中Cname节点
	}
	$addOrder->asXML('../xml/order.xml');
	
	header('Location:orderCheck.html');
?>
