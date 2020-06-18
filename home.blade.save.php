<?php 
session_start();
$user = $_SESSION['id'];
require_once __DIR__.'/connect_pdo.php'; 

$name = $_POST['name'];
$type = $_POST['type'];
$detail = $_POST['detail'];



$sql = "INSERT INTO tbl_product (id, name, type, detail, create_by, create_at)
        VALUES('', '".$name."', '".$type."', '".$detail."', '".$user."', current_timestamp())";

if($db->exec($sql) == TRUE){
    echo "<script>";
    echo "alert('Create Product Success');";
    echo "window.location.href='home.blade.php';";
    echo "</script>";
}else{
    echo "ERROR".$sql."<br>".$db->error;
}    


?>