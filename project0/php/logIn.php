<!--
登录页切换至点餐页
-->
<?php

//处理表单
if(!empty($_GET['desknumber']))
{
	session_start();
	$_SESSION['desknumber']=$_GET['desknumber'];
	header('Location:../html/select.html');
}
else 
{
	header('Location:../html/home.html');
}
?>