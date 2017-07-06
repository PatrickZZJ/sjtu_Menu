<?php
error_reporting(0);//错误显示
include("../jpgraph/jpgraph.php");
include("../jpgraph/jpgraph_bar.php");
//include("../jpgraph/jpgraph_line.php");

if(isset($_GET['month'])) $month=$_GET['month'];
else $month=date('Y-m');
$Ym = explode('-',$month);

$getMonth=$Ym[1];
$getYear =$Ym[0];


//get required dish
if($xml=simplexml_load_file('../xml/menu.xml')){
	foreach($xml->Xpath('/menu/category[@id="seafood"]/dish') as $list){
	  $matchDish[]=get_object_vars($list);
	}
}


//get required order
if($xml=simplexml_load_file('../xml/order.xml')){
	foreach($xml->order as $list){
		$order[]=get_object_vars($list);
	}
}
foreach($order as $list){
	$date = $list['date'];
	$Ymd = explode('/',$date);
	$year = $Ymd[0];
	$month = $Ymd[1];
	if(($year==$getYear)&&($month==$getMonth)){
		$matchOrder[]=$list;
	    }
}


//calculate dishTotal for each matchDish
foreach($matchDish as $list){
	$Cname[]=$list['Cname'];
	$a=$list['Cname'];
	$dishTotal["{$a}"]=0;
	if(isset($matchOrder)){
	foreach($matchOrder as $list1){
		//print_r($list1);
		foreach($list1['dish'] as $list2){
			$dish=get_object_vars($list2);
			if($dish['Cname']==$a){
				$dishTotal["{$a}"]=$dishTotal["{$a}"]+$dish['num']*$dish['price'];
			}
			//print_r($dish);
		}
	        //$dishTotal['$a']=$dishTotal['$a']+$d['0']['num']*$d['0']['price'];
	}
	}
}
		

foreach($dishTotal as $list){ //第一条曲线的数组
	$data1[] = $list;
}
   
$graph = new Graph(800,500);   
$graph->SetScale("textlin");  
$graph->SetShadow();     
$graph->SetMarginColor("teal");
$graph->img->SetMargin(60,30,30,70); //设置图像边距  
   
$graph->graph_theme = null; //设置主题为null，否则value->Show(); 无效  
   
$lineplot1=new BarPlot($data1); //创建设置两条曲线对象  
$lineplot1->value->SetColor("red");
$lineplot1->SetFillColor("#8090a0");
$lineplot1->SetWidth(0.6);
$lineplot1->value->Show();

$graph->Add($lineplot1);
 
$title = $getYear.'年'.$getMonth.'月'."海鲜销售情况";
$title = iconv("UTF-8", "gb2312", $title);
$graph->title->SetFont(FF_SIMSUN);
$graph->title->Set($title);   //设置图像标题 
$x = "菜品名";
$x = iconv("UTF-8", "gb2312", $x);
$graph->xaxis->title->SetFont(FF_SIMSUN);
$graph->xaxis->title->Set($x); //设置x坐标轴名称
$y = "额售销";
$y = iconv("UTF-8", "gb2312", $y);
$graph->yaxis->title->SetFont(FF_SIMSUN);
$graph->yaxis->title->Set($y);//设置y坐标轴名称
$graph->title->SetMargin(10);
$graph->xaxis->title->SetMargin(10);
$graph->yaxis->title->SetMargin(10);
   
//$Cname = iconv("UTF-8", "gb2312", $Cname);
foreach($Cname as $list){
	$c[]=iconv("UTF-8", "gb2312", $list);
}
$graph->xaxis->SetFont(FF_SIMSUN);
$graph->xaxis->SetTickLabels($c);

  
$graph->Stroke();  //输出图像 

?>
