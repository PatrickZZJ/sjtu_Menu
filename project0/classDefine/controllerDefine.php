<?php
session_start();

require("entityDefine.php");

class logInController
{
	function customerLogInProcess()
	{
			$customerOne=new customer($_SESSION['desknumber']);
			header('Location:selectPage.php');
	}
	
	function staffLogInProcess()
	{
		define("MUSER", "isManager");
		define("MPASS", "isMPassword");
		define("CUSER", "isChef");
		define("CPASS", "isCPassword");
	
		// if username and password were submitted, check them
		if (($_POST["user"] == MUSER) && ($_POST["pass"] == MPASS))
		{
			$_SESSION["Mauthenticated"] = true;
			$_SESSION["staff"]=$_POST["user"];
			header("Location:kitchen.php");
		}
	
		else if (($_POST["user"] == CUSER) && ($_POST["pass"] == CPASS))
		{
			$_SESSION["Cauthenticated"] = true;
			$_SESSION["staff"]=$_POST["user"];
			header("Location:kitchen.php");
		}
		else {header("Location:staffLogInPage.php");}
	}
}

?>