<?php
require_once("includes/connection.php");
require_once("includes/form_func.php");
require_once("includes/session.php");

if(isset($_POST['submit'])){
    $desc_id  = $_POST['comment_post_ID'];
    $comm = $_POST['comment'];
    $redirect = $_POST['redirect_to'];
    $user = $_POST['user'];
    
    if(register_comment($desc_id,$comm,$user) == true){
        header("Location:{$redirect}");
    }
    else{
        header("Location:{$redirect}");
    }
}
?>