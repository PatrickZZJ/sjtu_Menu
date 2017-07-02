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
	.finishOrder {
		font-size:25px;
		 
		 color:#111177;
		 margin:0px;
		 padding:15px;
		 width:250px;
		 
		 }
	.handleStatus {
		font-size:25px;
		position:absolute;
		bottom:0px;
		width="100%";
		background-color:#eeeeee;
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
	
	echo '<div class="unfinishOrder">';
	
	echo '<div class="orderHead">订单号:',$orderID,'&nbsp;&nbsp;';
	echo '<span style="float:right;">桌号:',$Order['0']['desknumber'],'</span></div><br/>';
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
	
	echo '<div class="orderHead">订单号:',$orderID,'&nbsp;&nbsp;';
	echo '<span style="float:right;">桌号:',$Order['0']['desknumber'],'</span></div><br/>';
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


