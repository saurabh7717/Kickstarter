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
    
    function login_check($name,$password){
	$uname = trim(mysql_prep($name));
	$passwd = trim(mysql_prep($password));
	$h_passwd = sha1($passwd);
	
	$query = "SELECT uid,username,password,email from users WHERE username = '{$uname}' && password = '{$h_passwd}' LIMIT 1";
	$result = mysql_query($query);
	if(!$result){
	    die('Database connection failed'.mysql_error());
	    
	}
	$found_user = mysql_fetch_array($result);
	if($found_user){
	$SESSION['uid'] = $found_user['uid'];
	$SESSION['username'] = $found_user['username'];
	return true;
	}
	else{
	return false;
	}
    }
    
    function register_user($unm,$em,$pwd){
	$uname = trim(mysql_prep($unm));
	$email = trim(mysql_prep($em));
	$passwd = trim(mysql_prep($pwd));
	//echo $passwd;
	$h_passwd = sha1($passwd);
	//echo $h_passwd;
	$query = "INSERT into users (username,email,password) VALUES('{$uname}','{$email}','{$h_passwd}')";
	$result = mysql_query($query);
	if(!$result){
	    return false;
	}
	return true;
    }
    
    function register_comment($id,$comm,$user){
	$did = trim(mysql_prep($id));
	$comment = trim(mysql_prep($comm));
	//$curdate = date('Y-m-d');
	$query = "INSERT into comments (desc_id,comment,user) VALUES('{$did}','{$comment}','{$user}')";
	$result = mysql_query($query);
	if(!$result){
	    return false;
	}
	return true;
    }
?>