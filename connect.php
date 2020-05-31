<?php

$hostname = "localhost";
$username = "php_example";
$password = "root";
$database = "php_example";

$conn = new mysqli($hostname, $username, $password, $database);
if($conn->connect_error){
    die("Connected Error : " .$conn->connect_error);
}
$conn->set_charset("utf8");

?>