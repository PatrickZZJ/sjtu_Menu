
<!--
注释：处理订单业务由handleOrder.php , handleChild.php , showOrder.php三个文件完成，
handleOrder.php负责将每个订单(order)对应的订单框架<iframe class="finishOrder/unfinishOrder">
               打印在后台管理页面的查看订单页面中
handleChild.php负责打印各个订单框架对应的网页，其中包括一个订单详情框架<iframe class="showFinishOrder/showUnfunushOrder">
               以及一个可以显示并改动完成情况的页脚<footer class="handleFinishOrder/handleUnfinishOrder">
showOrder.php负责打印订单详情框架，其整体为<div class="finishOrder/unfinishOrder">
               其中包括显示订单号及桌号的块<div class="orderHead">
			   
-->
<!DOCTYPE html>
<html>


<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--bootstrap
   <link href="css.css" rel="stylesheet" type="text/css">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
-->
   <link rel="stylesheet" href="css\frozen.css">
   <link rel="stylesheet" href="css\demo-order-chef.css">

</head>

<?php
//deal with the get information
if(@$_GET['handled']=='yes'){
	$xml=simplexml_load_file('../xml/order.xml');
	$xg=$xml->Xpath('/orders/order[@id="'.$_GET['orderID'].'"]');
	$xg[0]->handled='yes';  
	$xml->asXML('../xml/order.xml');
	$_GET['handled']='0';
}
if(@$_GET['handled']=='no'){
	$xml=simplexml_load_file('../xml/order.xml');
	$xg=$xml->Xpath('/orders/order[@id="'.$_GET['orderID'].'"]');
	$xg[0]->handled="no";
	$xml->asXML('../xml/order.xml');
	$_GET['handled']='0';
}

//print unfinish order
if($xml=simplexml_load_file('../xml/order.xml')){
	foreach($xml->Xpath('/orders/order[handled="no"]') as $list){
	  $unfinishOrder[]=get_object_vars($list);
	}
}
else{
	echo('load xml error!');
}

if(isset($unfinishOrder)){
foreach($unfinishOrder as $list){
	$orderID=$list['@attributes']['id'];
	
	echo '<iframe src="handleChild.php?orderID='  ,  $orderID  ,  '&handled=no';
	echo '" class="unfinishOrder"></iframe>';
	
}
}


//print finish order
if($xml=simplexml_load_file('../xml/order.xml')){
	foreach($xml->Xpath('/orders/order[handled="yes"]') as $list){
	  $order[]=get_object_vars($list);
	}
}
else{
	echo('load xml error!');
}

if(isset($order)){
foreach($order as $list){
	$orderID=$list['@attributes']['id'];
	
	echo '<iframe src="handleChild.php?orderID='  ,  $orderID  ,  '&handled=yes';
	echo '" class="finishOrder"></iframe>';
	
}
}
?>
  
  
 



</html>
