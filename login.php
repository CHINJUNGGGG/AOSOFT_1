<?php
session_start();
require_once __DIR__.'/connect.php'; ?>
<!doctype html>
<html lang="en">
  <head><?php require_once __DIR__.'/head.php'; ?></head>

  <?php

    if(isset($_POST['submit'])){
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($conn, $_POST['password']);
        $password = md5($password);

        $sql = "SELECT * FROM tbl_users WHERE email = '".$email."' AND password = '".$password."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

    
        if(!$row){
            echo "<script>";
            echo "alert('Username or Password is wrong !!');";
            echo "window.location.href='login.php';";
            echo "</script>";
        }else{
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["status"] = $row["status"];

            session_write_close();
        }

        if($row > 0){
            if($row['status'] == "admin"){
                header("location:home.blade.php");
            }
            if($row['status'] == "user"){
                header("location:index.php");
            }
        }
    }

  ?>

  <body>

    <div class="container">
    <br><br><br><br><br><br><br><br> 
    <form action="login.php" method="POST" encypte="multipart/form-data"> 
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Sign in">
        </form>
    </div>



    <?php require_once __DIR__.'/script.php'; ?>
  </body>
</html>