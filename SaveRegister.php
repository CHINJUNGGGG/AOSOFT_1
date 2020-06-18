<?php
session_start();
$user = $_SESSION['email'];
require_once __DIR__.'/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$status = $_POST['status'];

$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);

$sql = "INSERT INTO `tbl_users`(`id`, `email`, `password`, `address`, `status`, `create_at`, `update_at`) 
        VALUES ('', '".$email."', '".$password."', '".$address."', '".$status."', current_timestamp(), current_timestamp())";

if($conn->query($sql) == TRUE){
    echo "<script>";
    echo "alert('Create User Success');";
    echo "window.location.href='login.php';";
    echo "</script>";
}else{
    echo "ERROR".$sql."<br>".$conn->error;
}        


?>