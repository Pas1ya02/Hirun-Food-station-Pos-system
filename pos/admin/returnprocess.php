<?php
require "connection.php";


$ordercode  = $_POST["order"];

Database::iud("UPDATE `rpos_orders` SET `order_status` = '2' WHERE `order_code`='".$ordercode."'");

Database::iud("DELETE FROM `rpos_payments` WHERE `order_code`='".$ordercode."' ");

echo "ok";
?>