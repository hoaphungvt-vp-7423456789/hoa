<?php
include 'connect.php';
$sql="SELECT tours.* ,categories.name AS type_name FROM tours LEFT JOIN categories ON tours.category_id = categories.id";
$statement=$connect->prepare($sql);
$statement->execute();
$rooms=$statement->fetchAll();
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
    <table border=1px>
        <thead>
            <th>id </th>
            <th>name </th>
            <th>img</th>
            <th>intro </th>
            <th>des</th>
            <th>number_date</th>
            <th>price</th>
            <th>type_id</th>
            <th>action</th>
        </thead>
        <?php

        foreach($rooms as $value){?>
<tr>
    <td><?= $value['id']?></td>
    <td><?= $value['name']?></td>
    <td><img src="./img/<?= $value['img']?>" alt="" width=100px></td>
    <td><?= $value['intro']?></td>
    <td><?= $value['des']?></td>
    <td><?= $value['number_date']?></td>
    <td><?= $value['price']?></td>
    <td><?= $value['type_name']?></td>
    <td>
        <a href="them.php"><button type="submit">thêm </button></a>
        <a href="xoa.php?id=<?= $value["id"]?>" onclick="return confirm ('bạn chắc chắn muốn xóa ')"><button>xóa </button></a>

        <a href="sua.php?id=<?= $value['id']?>"><button>sưa</button></a>
    </td>
</tr>
      <?php  }
        ?>
    </table>
</body>
</html>