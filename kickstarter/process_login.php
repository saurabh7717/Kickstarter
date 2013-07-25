<?php
require_once("includes/connection.php");
	require_once("includes/form_func.php");
	require_once("includes/session.php");
	
    if(isset($_POST['wp-submit'])){
        $name = $_POST['log'];
        $password = $_POST['pwd'];
        $redirect = $_POST['redirect_to'];
        
        if(login_check($name,$password) == true){
            $x = $redirect . "?success=" . $name;
            header("Location:{$x}");
            $_SESSION['username'] = $name;
        }
        else{
            $x = $redirect . "?error=" . $name;
            header("Location:{$x}");
        }
    }

?>