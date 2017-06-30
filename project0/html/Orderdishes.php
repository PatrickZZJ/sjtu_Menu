<?php

/*	Orderdishes page
*	In this file we want to realize the function of the ordering of dishes.
*	Elements:
*	Dish:bread,chicken
*	Num:num_of_bread,num_of_chicken
*
*	By Moton
*/

	define("bread_price","5");
	define("chicken_price","3");
	
	session_start();

	$dish=array("bread","chicken");
	echo "Dish<br />". $dish["0"]. "<br />" .$dish[1];

	if($_POST["bread"] == "1" || $_POST["bread"] == "2" || $_POST["bread"] == "3" || $_POST["bread"] == "4" || $_POST["bread"] == "5")
		$_SESSION["num_of_bread"]+=$_POST["bread"];//using in the html to show the num of dishes
	else
		print("Please input number 1~5.");
	
	if($_POST["chicken"] == "1" || $_POST["chicken"] == "2" || $_POST["chicken"] == "3" || $_POST["chicken"] == "4" || $_POST["chicken"] == "5")
		$_SESSION["num_of_chicken"]+=$_POST["chicken"];//using in the html to show the num of dishes
	else
		print("Please input number 1~5.");
	
	$_SESSION["price"]=$_SESSION["num_of_bread"] * bread_price + $_SESSION["num_of_chicken"] * chicken_price;//price of the order

/* 	Let the html show the num and price of dishes with php.
*	The order can use the num in _SESSION.
*/




?>

