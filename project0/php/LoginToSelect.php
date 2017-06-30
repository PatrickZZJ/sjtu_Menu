<!--
登录页切换至点餐页
-->
<?php
include('Login-single.html');//登录页面

if($_SERVER['REQUEST_METHOD']=='POST')//检查表单是否提交
{	//处理表单
	if(!empty($_POST['desknumber']))
	{
	session_start();
	$_SESSION['desknumber']=$_POST['desknumber'];
	//消除缓冲，重定向至点餐页
	ob_end_clean();
	header('Location:select.html');
	exit();
	}
	else 
	{
		echo "Please input your desknumber";
	}
}
?>