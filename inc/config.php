<?php
error_reporting(0);
$url = "../";

    #------------------------------------------------#
 $DBhost = 'localhost';
 $DBname = 'easydev';
 $DBuser = 'root';
 $DBpass = '';
 
 $Connect = @mysql_connect($DBhost,$DBuser,$DBpass);
 if(!$Connect){

      echo 'خطأ';
 exit;
     
 }  


 $Select = @mysql_select_db($DBname);
 if(!$Select){
      echo 'خطأ';
 exit;
}
#-------------------------------------------------#