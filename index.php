<?php session_start();
require_once __DIR__.'/connect.php'; ?>
<!doctype html>
<html lang="en">
  <head><?php require_once __DIR__.'/head.php'; ?></head>
  <body>
    <?php require_once __DIR__.'/navbar.php'; ?>

    <div class="container">
    <br><br><br><br><br><br><br><br> 
    <form action="SaveRegister.php" method="POST" encypte="multipart/form-data"> 
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4"><?php echo $_SESSION['email']?></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress">Status</label>
            <select name="status" class="form-control">
                <option>Choose</option>
                <option>admin</option>
                <option>user</option>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Sign up">
        </form>
    </div>



    <?php require_once __DIR__.'/script.php'; ?>
  </body>
</html>