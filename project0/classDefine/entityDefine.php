<?php

//order类定义
class order
{
	public $deskNumber;
	
	function __construct($defNum)
	{
		$this->deskNumber	=$defNum;
	}

}

//customer类定义
class customer
{
	public $customerOrder;
	
	function __construct($defNum)
	{
		$this->customerOrder		=new order($defNum);
	}

}

//staff类定义
class staff
{
	public $staffName;
	public $staffPassword;

}
?>