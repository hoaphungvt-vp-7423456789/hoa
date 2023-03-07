
<?php
include "./connect.php";
$id=$_POST['id'];
$name = $_POST["name"];
$intro = $_POST["intro"];
$des = $_POST["des"];
$number_date = $_POST["number_date"];
$price = $_POST["price"];
$category_id = $_POST["category_id"];
if ($_POST["name"] == null) {
    $mess = "mời điền tên";
    header("location: sua.php?thong_bao=$mess");
// } else if ($_FILES["anh_moi"]["name"] == null) {
//     $mess = "Mời tải ảnh lên";
//     header("location: them.php?thong_bao=$mess");
// } else if (filesize($_FILES["anh_moi"]["tmp_name"]) > 2000000) {
//     $mess = "Kích thước ảnh tải lên <= 2MB";
//     header("location: them.php?thong_bao=$mess");
} else if ($_POST["intro"] == null) {
    $mess = "KHông để trống intro";
    header("location: sua.php?thong_bao=$mess");
} else if ($_POST["des"] == null) {
    $mess = "KHông để trống description";
    header("location: sua.php?thong_bao=$mess");
} else if ($_POST["number_date"] == null) {
    $mess = "KHông để trống number";
    header("location: sua.php?thong_bao=$mess");
} else if ($_POST["price"] == null) {
    $mess = "KHông để trống price";
    header("location: sua.php?thong_bao=$mess");
}
// else if (!is_numeric($_POST["price"]) || !is_numeric($_POST["number"])) {
//     $mess = "Price hoặc number phải nhập số";
//     header("location: ./create_room.php?thong_bao=$mess");
// }  is_numeric true nếu là số
else if ($_POST["price"] <= 0 || $_POST["number_date"] <= 0) {
    $mess = "Price hoặc number phải >= 0";
    header("location: sua.php?thong_bao=$mess");
} else if ($_POST["category_id"] == null) {
    $mess = "KHông để trống type ";
    header("location: sua.php?thong_bao=$mess");
} else {
   

    // $name = $_POST["name"];
    // $intro = $_POST["intro"];
    // $des = $_POST["des"];
    // $number_date = $_POST["number_date"];
    // $price = $_POST["price"];
    // $category_id = $_POST["category_id"];
    // $img= $_FILES["img"]["name"];
    // move_uploaded_file($_FILES["anh_moi"]["tmp_name"], "./img/" . $_FILES["anh_moi"]["name"]);

    //tmp_name: lưu tạm thời trên localhost
    //name: tên file vừa tải lên
    //chuyển file ảnh từ file tạm trên localhost mà mình vừa tải lên, chuyển vào fooder img 

    $sql = "UPDATE `tours` SET `name` = '$name',`intro` = '$intro',`des` = '$des',`number_date` = '$number_date',`price` = '$price',`category_id` = '$category_id' WHERE `tours`.`id` = $id";
    $statement = $connect->prepare($sql);
    $statement->execute();
    header("location: trangchu.php");
}
