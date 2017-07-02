<html>


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
	
	echo '<iframe src="../html/handleChild.php?orderID='  ,  $orderID  ,  '&handled=no';
	echo '" style="width:320px;height:600px;border:2px solid #ddbbbb;background-color:#ccffff;" ></iframe>';
	
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
	
	echo '<iframe src="../html/handleChild.php?orderID='  ,  $orderID  ,  '&handled=yes';
	echo '" style="width:320px;height:600px;border:2px solid #bbdddd;background-color:#ffffcc;" ></iframe>';
	
}
}
?>
  
  
  
  
  
  
  
  
  
  
 



</html>
