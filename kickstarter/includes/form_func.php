<?php
    function check_req_fields($fields){
        $e = array();
        foreach($fields as $f){
            if(!isset($_POST[$f]) || empty($_POST[$f])){
                $e[] = $f; 
            }
        }
        return $e;
    }
    
    function mysql_prep($field){
        $mag_quo_act = get_magic_quotes_gpc();
        $new_php = function_exists("mysql_real_escape_string");
        if($new_php){
            if($mag_quo_act){
                $field = stripslashes($field);
            }
            $val = mysql_real_escape_string($field);
        }
        else{
            $val = addslashes($field);
        }
        return $val;
    }
    
    function get_days_left($date1,$length){
        $date2 = date('Y-m-d');
	$diff = abs(strtotime($date2-$date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $length-$days;    
    }
?>