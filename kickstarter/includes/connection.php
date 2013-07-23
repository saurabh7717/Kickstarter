<?php
    require_once("constants.php");
    $conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
    if(!$conn){
        die("Database connection failed" . mysql_error($conn));
    }
    
    $db_sel = mysql_select_db(DB_NAME,$conn);
    if(!$db_sel){
        die("Database connection failed" . mysql_error($conn));
    }
?>