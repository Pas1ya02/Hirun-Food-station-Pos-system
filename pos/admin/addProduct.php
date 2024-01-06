<?php
session_start();
require "connection.php";
include "config/code-generator.php";

$product_name = $_POST["prod_name"];
$product_code = $_POST["prod_code"];
$product_price = $_POST["prod_price"];
$product_category = $_POST["s_category"];
$product_desc = $_POST["prod_desc"];
$product_id = $delta;
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');


if (isset($_FILES["image"])) {
    $img = $_FILES["image"];

    $allowed_images_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $img["type"];

    if (!in_array($file_ex, $allowed_images_extentions)) {
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
        $file_name =  "_" . $a . $new_file_extention;
       

        move_uploaded_file($img["tmp_name"], "assets/img/products/" . $file_name);

        $imagePath = "C:/xampp/htdocs/POS-Management-System-main/pos/admin/assets/img/products/$file_name";
        $newPath = "C:/xampp/htdocs/POS-Management-System-main/pos/cashier/OSS Restaurant System_files/";
        $newName  = $newPath . $file_name;
        $copied = copy($imagePath, $newName);

    }
    
        $rs = Database::iud("INSERT INTO `rpos_products` 
        (`prod_id`,`prod_code`,`prod_name`,`prod_img`,`prod_desc`,`prod_price`,`created_at`,`rpos_catergory_id`) VALUES 
        ('" . $product_id . "','" . $product_code . "','" . $product_name . "','" . $file_name . "','" . $product_desc . "','" . $product_price . "','" . $date . "','" . $product_category . "')");

}
$rs = Database::iud("INSERT INTO `rpos_products` 
(`prod_id`,`prod_code`,`prod_name`,`prod_desc`,`prod_price`,`created_at`,`rpos_catergory_id`) VALUES 
('" . $product_id . "','" . $product_code . "','" . $product_name . "','" . $product_desc . "','" . $product_price . "','" . $date . "','" . $product_category . "')");
echo("ok");

