<?php
require("../classDefine/controllerDefine.php");

if(isset($_GET['desknumber']))
	{
		$_SESSION['desknumber']		=$_GET['desknumber'];
		$customerLogInController	=new logInController;
		$customerLogInController->customerLogInProcess(); 
		if(empty($_GET['desknumber']))header('Location:customerLogInPage.php');
	}	
?>