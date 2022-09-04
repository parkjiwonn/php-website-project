<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

$host = '127.0.0.1';
$user = 'root';
$password = 'jiwon3482';
$database = 'workbench';

$db = mysqli_connect($host, $user, $password, $database);

if(mysqli_connect_error()){
    echo "mysql 접속중 오류 발생";
    echo  mysqli_connect_error();
}
else{
    

        //echo "db에 접속 성공";
    
     
}

?>