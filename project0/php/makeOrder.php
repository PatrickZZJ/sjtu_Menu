<?php
	error_reporting(7);//错误显示
/* 	makeOrder.php
	
	20170703 17:05
	点击下单后生成order
*/

	session_start();
	$orders=simplexml_load_file('../xml/addDish.xml');
	$addOrder=simplexml_load_file('../xml/order.xml');
	
	//删除addDish.php中num=0的dish节点
	foreach($orders->order as $order)// 得到需要提交order的id
	{
		if($order->desknumber == "{$_SESSION['desknumber']}")
		{
			$orderIdArr=$order->attributes();
			$orderId=$orderIdArr['id'];
		}
	}
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
	
	header('Location:order-check-customer.php');
?>