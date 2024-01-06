<?php 

require "connection.php";

$product_name = $_POST["prod_name"];
$product_price = $_POST["prod_price"];
$product_desc = $_POST["prod_desc"];
$product_code = $_POST["prod_code"];

$i = Database::search("SELECT * FROM `rpos_products` WHERE `prod_code` = '".$product_code."'");
$iF = $i->fetch_assoc();
$id = $iF["prod_id"];
$pi = $iF["prod_img"];
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');

$length = sizeof($_FILES);
if (isset($_FILES["image"])) {
    $image = $_FILES["image"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please select a valid image.");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }

        $a = time();
        $file_name = "_" . $a . $new_file_extention;

        move_uploaded_file($image["tmp_name"], "assets/img/products/" . $file_name);
        $imagePath = "C:/xampp/htdocs/POS-Management-System-main/pos/admin/assets/img/products/$file_name";
        $newPath = "C:/xampp/htdocs/POS-Management-System-main/pos/cashier/OSS Restaurant System_files/";
        $newName  = $newPath . $file_name;
        $copied = copy($imagePath, $newName);
        Database::iud("UPDATE `rpos_products` SET `prod_img`='".$file_name."',`created_at` = '".$date."' WHERE `prod_id` = '".$id."'");        
    }
}

Database::iud("UPDATE `rpos_products` SET `prod_name`='".$product_name."',`prod_price`='".$product_price."',`prod_desc` = '".$product_desc."',`created_at` = '".$date."' WHERE `prod_id` = '".$id."'");
echo("ok");
?>