<?php
include 'connect.php';
$id= $_GET["id"];
$sql="DELETE FROM tours WHERE `tours`.`id` = $id";
$statement=$connect->prepare($sql);
$statement->execute();
header("location:trangchu.php")
?>