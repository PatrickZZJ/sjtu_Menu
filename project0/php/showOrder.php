
<!--
注释：处理订单业务由handleOrder.php , handleChild.php , showOrder.php三个文件完成，
handleOrder.php负责将每个订单(order)对应的订单框架<iframe class="finishOrder/unfunushOrder">
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

<body>

<?php


if($xml=simplexml_load_file('../xml/order.xml')){
	foreach($xml->Xpath('/orders/order[@id="'.$_GET['orderID'].'"]') as $list){
	  $Order[]=get_object_vars($list);
	}
}
else{
	echo('load xml error!');
}
//print unfinished order
if(isset($Order)&&($_GET['handled']=='no')){
foreach($Order as $list){
	$orderID=$list['@attributes']['id'];
	
	echo '<div class="unfinishOrder">';
	
	echo '<div class="orderHead">订单号：',$orderID,'&nbsp;&nbsp;';
	echo '<span style="float:right;">桌号：',$Order['0']['desknumber'],'</span></div><br/>';
	foreach($xml->Xpath('/orders/order[@id="'.$orderID.'"]/dish') as $list){
		$dish[$orderID][]=get_object_vars($list);
	}
	foreach($dish[$orderID] as $d){
		echo $d['Cname']  ,  '<span style="float:right;">&nbsp;&nbsp;'  ,  $d['num']  ,  '份</span><br/>';
	}
	echo '</div>';
}
}

//print finished order
if(isset($Order)&&($_GET['handled']=='yes')){
foreach($Order as $list){
	$orderID=$list['@attributes']['id'];
	
	echo '<div class="finishOrder">';
	
	echo '<div class="orderHead">订单号：',$orderID,'&nbsp;&nbsp;';
	echo '<span style="float:right;">桌号：',$Order['0']['desknumber'],'</span></div><br/>';
	foreach($xml->Xpath('/orders/order[@id="'.$orderID.'"]/dish') as $list){
		$dish[$orderID][]=get_object_vars($list);
	}
	foreach($dish[$orderID] as $d){
		echo $d['Cname']  ,  '<span style="float:right;">'  ,  $d['num']  ,  '份</span><br/>';
	}
	echo '</div>';
	
}
}

?>


</body>
</html>

