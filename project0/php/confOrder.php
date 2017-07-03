<?php
/*
	删除临时订单addDish.xml中的order节点
	20170703 19:28
	By Moton Shao
*/
	$orders=simplexml_load_file('../xml/addDish.xml');
	
	$j = 0;
	foreach($orders->order as $order)
	{
		$orderIdCheck=$order->attributes();
		$oic=$orderIdCheck['id'];
		if($orderId == "{$oic}")//**经测试必须这么写，否则会无法判断，节点与属性相比较
		{
			unset($orders->order[$j]);
		}
		$j++;
	}
	$orders->asXML('../xml/addDish.xml');
?>