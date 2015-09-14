<?php
error_reporting(0);
// get IP

function get_ip(){
    
    $ip = $_SERVER['REMOTE_ADDR'];
    
    if (!empty($_SERVER['HTTP_CLIRNT_IP'])){
      
        $ip = $_SERVER['HTTP_CLIRNT_IP'];
        
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $SERVER['HTTP_X_FORWARDED_FOR']; 
    }
    return $ip;
}
// end get IP

