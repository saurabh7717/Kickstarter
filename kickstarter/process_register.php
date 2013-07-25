<?php
require_once("includes/connection.php");
	require_once("includes/form_func.php");
	require_once("includes/session.php");
	
    if(isset($_POST['submit'])){
        $email = $_POST['user_email'];
        $name = $_POST['user_login'];
        $password = $_POST['user_pass'];
        
        if(register_user($name,$email,$password) == true){
            $x = "register.php?pass=".$name;
            header("Location:{$x}");
        }
        else{
            $x = "register.php?fail=".$name;
            header("Location:{$x}");
        }
    }

?>