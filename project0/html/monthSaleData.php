<?php
	include("../jpgraph/jpgraph.php");
	include("../jpgraph/jpgraph_bar.php");
	include("../jpgraph/jpgraph_line.php");
	include("../jpgraph/jpgraph_pie.php");
	//数据获取
	$Ym = $_GET['month'];
	$YmArr = explode('-',$Ym);
	$getMonth = $YmArr[1];
	$getYear = $YmArr[0];
	$orders = simplexml_load_file("../xml/order.xml");
	$i = 0;
	for($n = 0; $n <= 30; $n++)
	{
		$dayTotal[$n] = 0;
		$xa[$n] = $n*10  + 10;
		foreach($orders->order as $order)
		{
			$date = $order->date;
			$Ymd = explode('/',$date);
			$year = $Ymd[0];
			$month = $Ymd[1];
			$day = $Ymd[2];
			$day = (int)($day);
			$total = $order->total;
			$total = (float)($total);
			if($getYear == $year)
			{
				if($getMonth == $month)
				{
					if($day == $n + 1)
						$dayTotal[$n] = $dayTotal[$n] + $total;
				}
			}
		}
	}
	foreach($dayTotal as $list)
	{ //第一条曲线的数组
		$data1[] = $list;
	}
	
	//生成图像
	$graph = new Graph(950,550);   
	$graph->SetScale("textlin");  
	$graph->SetShadow();     
	$graph->SetMarginColor("teal");
	$graph->img->SetMargin(60,30,30,70); //设置图像边距  
	   
	$graph->graph_theme = null; //设置主题为null，否则value->Show(); 无效  
	   
	$lineplot1=new LinePlot($data1); //创建设置两条曲线对象  
	$lineplot1->value->SetColor("#607080");
	//$lineplot1->SetFillColor("orange");
	//$lineplot1->SetWidth(0.6);
	$lineplot1->value->Show();

	$graph->Add($lineplot1);//y轴

	$monthSet = (int)($getMonth);
	$title = $monthSet."月每日销售情况";
	$title = iconv("UTF-8", "gb2312", $title);
	$graph->title->SetFont(FF_SIMSUN);
	$graph->title->Set($title);   //设置图像标题 
	$x = "天";
	$x = iconv("UTF-8", "gb2312", $x);
	$graph->xaxis->title->SetFont(FF_SIMSUN);
	$graph->xaxis->title->Set($x); //设置x坐标轴名称
	$y = "￥/额售销";
	$y = iconv("UTF-8", "gb2312", $y);
	$graph->yaxis->title->SetFont(FF_SIMSUN);
	$graph->yaxis->title->Set($y);//设置y坐标轴名称
	$graph->title->SetMargin(10);
	$graph->xaxis->title->SetMargin(10);
	$graph->yaxis->title->SetMargin(30);
	$graph->xaxis->SetFont(FF_SIMSUN);

	$graph->xaxis->SetTickLabels($xa);//设置x坐标轴
	$graph->Stroke();  //输出图像

?>  