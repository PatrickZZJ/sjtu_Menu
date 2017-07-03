<?php
    require("../classDefine/controllerDefine.php");
	session_start();

    // were this not a demo, these would be in some database
    define("MUSER", "isManager");
    define("MPASS", "isMPassword");
	define("CUSER", "isChef");
    define("CPASS", "isCPassword");

	
    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
        $customerLogInController	=new logInController;
		$customerLogInController->staffLogInProcess();
	}
?>