<?php
    // enable sessions
    session_start();

    // were this not a demo, these would be in some database
    define("MUSER", "isManager");
    define("MPASS", "isMPassword");
	define("CUSER", "isChef");
    define("CPASS", "isCPassword");

    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
        // if username and password are valid, log user in
        if (($_POST["user"] == MUSER && $_POST["pass"] == MPASS))
        {
            // remember that user's logged in
            $_SESSION["Mauthenticated"] = true;

            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header('Location:kitchen.html');
            exit;
        }
		if (($_POST["user"] == CUSER && $_POST["pass"] == CPASS))
        {
            // remember that user's logged in
            $_SESSION["Cauthenticated"] = true;

            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header('Location:kitchen.html');
            exit;
        }
    }
?>