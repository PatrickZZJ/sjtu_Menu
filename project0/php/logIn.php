<!--
登录页切换至点餐页
-->
<?php
session_start();
//处理表单
if(isset($_GET['desknumber']))
	{
		$_SESSION['desknumber']=$_GET['desknumber'];
		header('Location:select.php');
		
		if(empty($_GET['desknumber']))header('Location:home.php');
	}
?>