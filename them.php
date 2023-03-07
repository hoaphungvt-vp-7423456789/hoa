<?php
include 'connect.php';
$sql="SELECT * FROM `categories` WHERE 1";
$statement=$connect->prepare($sql);
$statement->execute();
$categories=$statement->fetchAll()
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
    <form action="tnyc_them.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" id="" hidden>
        <input type="text" name="name" id="" placeholder="name">
        <input type="file" name="anh_moi" id=""> <br>
        
        <input type="text" name="intro" id="" placeholder="intro">
        <input type="text" name="des" id="" placeholder="des">
        <input type="number" name="number_date" id="" placeholder="number_date">
        <input type="number" name="price" id="" placeholder="price">
       
        <select name="category_id" id="">
            <option value="">
            <?php foreach ($categories as $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?> </option>
            <?php } ?>
            </option>
        </select>
        <button type="submit">them</button>
    </form>
   
</body>
<h2> <?php echo isset($_GET["thong_bao"])? $_GET["thong_bao"]:"" ?>  </h2>
</html>

