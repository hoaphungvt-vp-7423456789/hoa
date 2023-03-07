<?php
include 'connect.php';
$sql="SELECT * FROM `tours` WHERE 1";
$statement=$connect->prepare($sql);
$statement->execute();
$tours=$statement->fetch();



$sql1="SELECT * FROM `categories` WHERE 1";
$statement=$connect->prepare($sql1);
$statement->execute();
$categories=$statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="tnyc_edit.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?= $tours["id"] ?>" hidden> <br>
        <input type="text" name="name" value="<?= $tours["name"] ?>"> <br>
        <img src="./img/<?= $tours["img"] ?>" width=150> <br>
        <!-- <input type="file" name="anh_moi" id="" > <br> -->
        <input type="text" name="anh_cu" value="<?= $tours["img"] ?>" hidden> <br>
        <input type="text" name="intro" value="<?= $tours["intro"] ?>"> <br>
        <input type="text" name="des" value="<?= $tours["des"] ?>"> <br>
        <input type="number" name="number_date" value="<?= $tours["number_date"] ?>"> <br>
        <input type="number" name="price" value="<?= $tours["price"] ?>"> <br>
      
        <select name="category_id">
            <?php foreach ($categories as $value) { ?>
                <option value="<?= $value['id'] ?>">
                <?= $value['name'] ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Sửa</button>
    </form>
   
</body>
<h2> <?php echo isset($_GET["thong_bao"])? $_GET["thong_bao"]:"" ?>  </h2>
</html>

