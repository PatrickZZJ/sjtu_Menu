
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
   <link href="css.css" rel="stylesheet" type="text/css">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <style>
      
    iframe.finishOrder {
		 width:320px;
		 height:600px;
		 border:2px solid #bbdddd;
		 background-color:#ffffcc;
		 }
	iframe.unfinishOrder {
		 width:320px;
		 height:600px;
		 border:2px solid #ddbbbb;
		 background-color:#ccffff;
		 }
	iframe.showFinishOrder {
		 width:310px;
		 height:480px;
		 border:0px solid #bbdddd;
		 margin:0px;
	}
	iframe.showUnfinishOrder {
		 width:310px;
		 height:480px;
		 border:0px solid #bbdddd;
		 margin:0px;
	}
	footer.handleFinishOrder {
		font-size:25px;
		position:absolute;
		bottom:0px;
		width="100%";
		background-color:#eeeeee;
		color:#111177;
		margin:2px;
		background-color:pink;
	}
	footer.handleUnfinishOrder {
		font-size:25px;
		position:absolute;
		bottom:0px;
		width="100%";
		background-color:#eeeeee;
		color:#111177;
		margin:2px;
		background-color:pink;
	}div.unfinishOrder {
		 font-size:25px;
		 
		 color:#110077;
		 margin:0px;
		 padding:15px;
		 width:250px;
<!--		 height:450px;-->
		 border:1px solid #ddbbbb;
		 border-top-left-radius: 25px;
		 border-top-right-radius: 25px;
<!--		 border-bottom-left-radius: 25px;
		 border-bottom-right-radius: 25px;    -->
		 }
	div.finishOrder {
		font-size:25px;
		color:#111177;
		margin:0px;
		padding:15px;
		width:250px;
		 }
	div.orderHead {
		font-size:28px;
		color:#110077;
	}
</style>
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
	
	echo '<iframe src="../html/showOrder.php?orderID='  ,  $orderID  ,  '&handled=yes';
	echo '" class="showUnfinishOrder"></iframe>';
	
	
	echo '<footer class="handleUnfinishOrder">';
	echo '完成情况：未完成';//$unfinishOrder["{$orderID}"]['handled'];
	echo '<form action="handleOrder.php" method="get" target="_parent">';
	echo '<input type="hidden" name="orderID" value="'  ,  $orderID  ,  '"/>'  ;
	echo '<input type="radio" name="handled" value="yes"  checked />完成';
	echo '<input type="radio" name="handled" value="no"/>未完成  <br/>';
	echo '<div style="align:center"><input type="submit" value="确定"   style="height:38px;width:180px;font-size:30px;font-color:#4444ff"/></div>';
	echo '</form>';
	echo '</footer>';
	
	
	
}
}

//print finished order
if(isset($Order)&&($_GET['handled']=='yes')){
foreach($Order as $list){
	$orderID=$list['@attributes']['id'];
	
	echo '<iframe src="../html/showOrder.php?orderID='  ,  $orderID  ,  '&handled=yes';
	echo '" class="showFinishOrder" ></iframe>';
	
	
	echo '<footer class="handleFinishOrder">';
	echo '完成情况：已完成';
	echo '<form action="handleOrder.php" method="get" target="_parent">';
	echo '<input type="hidden" name="orderID" value="'  ,  $orderID  ,  '"/>'  ;
	echo '<input type="radio" name="handled" value="yes" />完成';
	echo '<input type="radio" name="handled" value="no" checked />未完成  <br/>';
	echo '<div style="align:center"><input type="submit" value="确定"   style="height:38px;width:180px;font-size:30px;font-color:#4444ff"/></div>';
	echo '</form>';
	echo '</footer>';
	
}
}


?>


</body>


