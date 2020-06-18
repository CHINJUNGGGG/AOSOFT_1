<?php 
session_start();
require_once __DIR__.'/connect_pdo.php'; 
?>
<!doctype html>
<html lang="en">
  <head><?php require_once __DIR__.'/head.php'; ?></head>
  <body>
    <?php require_once __DIR__.'/navbar.php'; ?>

    <div class="container">
    <br><br><br><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product type</th>
                    <th scope="col">Product Detail</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $i = 0;

            $sql = "SELECT * FROM tbl_product";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $name = $row['name'];
                $type = $row['type'];
                $detail = $row['detail'];

                $i++
            ?>

                <tr>
                    <td><?=$i?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?=$detail?></td>
                </tr>
            <?php } ?>    
            </tbody>
        </table>

    <form action="home.blade.save.php" method="POST" encypte="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Product name :</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Product type</label>
                <select class="form-control" name="type">
                    <option>-- กรุณาเลือก --</option>
                    <option>สุขภาพ</option>
                    <option>การแต่งกาย</option>
                    <option>อาหาร</option>
                    <option>เครื่องดื่ม</option>
                    <option>ขนม</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Product detail</label>
            <textarea class="form-control" name="detail" rows="6"></textarea>
        </div>
        <input type="submit" name="submit" value="Save" class="btn btn-primary">
        </form>
    </div>

    <?php require_once __DIR__.'/script.php'; ?>
  </body>
</html>