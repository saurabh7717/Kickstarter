<?php
require_once("includes/connection.php");
	require_once("includes/form_func.php");
	require_once("includes/session.php");

        setcookie(session_name(),'',time()-4200,'/');
        $_SESSION = array();
            session_destroy();
            $x = "index.php";
        header("Location:{$x}");
?>