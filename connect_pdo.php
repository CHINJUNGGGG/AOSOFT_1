<?php

$dsn = 'mysql:host=localhost;dbname=php_example';
$username = "php_example";
$password = "root";

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
try{
    $db = new PDO($dsn, $username, $password, $options);
    //echo "Connect Success"; 
}catch (Exception $e){
    //echo "Connect Failed". $e->getMessage();
}


?>