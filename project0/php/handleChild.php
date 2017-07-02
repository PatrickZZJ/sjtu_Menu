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
      
     .unfinishOrder {
		 font-size:25px;
		 background-color:#ffeeee;
		 color:#110077;
		 margin:2px;
		 padding:15px;
		 width:250px;
<!--		 height:450px;-->
		 border:1px solid #ddbbbb;
		 border-top-left-radius: 25px;
		 border-top-right-radius: 25px;
<!--		 border-bottom-left-radius: 25px;
		 border-bottom-right-radius: 25px;    -->
		 }
	.finishOrder {
		font-size:25px;
		 background-color:#eeeeee;
		 color:#111177;
		 margin:2px;
		 padding:15px;
		 width:250px;
		 height:450px;
		 }
	.handleStatus {
		font-size:25px;
		position:absolute;
		bottom:0px;
		width="100%";
		color:#111177;
		margin:2px;
	}
	.orderHead {
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
	echo '" style="width:310px;height:480px;border:0px solid #bbdddd;margin:0px;" ></iframe>';
	
	
	echo '<footer class="handleStatus">';
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
	echo '" style="width:310px;height:480px;border:0px solid #bbdddd;margin:0px;" ></iframe>';
	
	
	echo '<footer class="handleStatus">';
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


