
<?php
//include ('../php/makeOrder.php');

session_start();
@$desknumber=$_SESSION['desknumber'];
if(!isset($desknumber)){$desknumber='7';}

if($xml=simplexml_load_file('../xml/addDish.xml')){
	foreach($xml->Xpath('/orders/order[desknumber="'.$desknumber.'"]') as $list){
	  $Order[]=get_object_vars($list);
	}
}
else{
	echo('load xml error!');
}
//print_r($Order);

if(isset($Order)){
foreach($Order as $list){
	$orderID=$list['@attributes']['id'];
	
	foreach($xml->Xpath('/orders/order[@id="'.$orderID.'"]/dish') as $list){
		$dish[$orderID][]=get_object_vars($list);
	}
	foreach($dish[$orderID] as $d){
		$c[]=$d;
	}
}
}
//print_r($c);

?>


<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>支付页面</title>
         <link rel="stylesheet" href="css\demo.css">                           <!-- 自己写-->
         <link rel="stylesheet" href="css\frozen.css">
         <link rel="stylesheet" href="https://apps.bdimg.com/libs/jquerymobile/1.4.5/jquery.mobile-1.4.5.min.css">
         
    <script src="jquery-mobile/jquery-1.11.1.min.js"></script>
    <script src="jquery-mobile/jquery.mobile-1.3.0.min.js"></script>
    </head>

	<body >  
    <header class="ui-header ui-header-positive ui-border-b" style="position:fixed">
					<i class="ui-icon-return" onclick="history.back()"></i><h1>支付订单</h1>
               </header> 
                
<section class="ui-container ui-center" style="background: #DADADA" data-role="page">
		<br /><br />	   
       <p style="height: 30px;padding: 10px">桌号:<?php echo $desknumber ?></p>      
       <table style="background:white;width: 350px;text-align: center">
        <tr>
            <th style="width: 40%;text-align: center">菜品</th>
            <th style="width: 30%;text-align: center">数量</th>
            <th style="width: 30%;text-align: center">单价</th>
        </tr>
<?php  
        foreach($c as $list){
			echo '<tr>';
			echo '<td>'  , $list['Cname'] , '</td>';
			echo '<td>×' , $list['num'] ,   '</td>';
			echo '<td>￥', $list['price'] , '</td>';
			echo '</tr>';
		}	
?>
        
        <tr>
            <td></td>
            <td  style="text-align: right">合计金额：</td>
            <td>￥<?php echo $Order['0']['total'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td  style="text-align: right;color: red">实付金额：</td>
            <td style="color: red">￥<?php echo $Order['0']['total'] ?></td>
        </tr>
</table>
<br/>
       <table style="background:white;width: 350px;text-align: center">
        <tr>
            <th style="width: 30%;"></th>
            <th style="width: 50%;"></th>
            <th style="width: 20%;"></th>
        </tr>
        <tr>
            <td><strong>联系方式</strong></td>
            <td>
			    <form>
				    <input type="text" placeholder="请输入您的手机号"> </input>
				</form>
			</td>
            <td><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-edit ui-btn-icon-notext">图标</a></td>
        </tr>
        <tr>
            <td><strong>桌号</strong></td>
            <td><?php echo $desknumber ?></td>
            <td><a href="#" class="ui-btn ui-shadow ui-corner-all ui-icon-camera ui-btn-icon-notext">图标</a></td>
        </tr>
</table>
<p style="height: 30px;padding: 10px">付款方式</p>
       <table style="background:white;width:350px;text-align: center">
        <tr>
            <th style="width: 30%"></th>
            <th style="width: 70%"></th>
        </tr>
        <tr>
            <td>
          <input type="radio" name="payMethod" value="1"/></td>
            <td><p style="height: 30px">微信会员卡（A048798）</p></td>
        </tr>
        <tr>
            <td><input type="radio" name="payMethod" value="2"/></td>
            <td><p style="height: 30px">微信支付</p></td>
        </tr>
</table>
	
</section>
<footer  class="ui-footer  ui-footer-btn ui-btn-group" style="position:fixed;background:#DADADA;border: 0">
			<ul class="ui-tiled ui-border-t">
				<li><a style="border: 0" class="ui-btn-lg ui-btn-primary" onclick="history.back()"><h2 style="color:white">修改/加菜</h2></a></li>
				<li><a style="border: 0" class="ui-btn-lg ui-btn-danger" href="confOrder.php"><h2 style="color:white">提交订单</h2></a></li>
				</ul>
		</footer>
	</body>  
</html>