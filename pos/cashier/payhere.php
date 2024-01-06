<?php
session_start();



require_once "config/code-generator.php";

require "connection.php";

$order_code = $_POST["order_code"];
$pay_amount = $_POST["amount"];
$card = $_POST["Card"];
$cash = $_POST["cash"];
$payment_method = 0;
$id = uniqid();
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d');
$time = date('H:i:s');

$shift = Database::search("SELECT * FROM `rpos_shift` WHERE `rpos_staff_staff_id`='" . $_SESSION["staff"]["staff_id"] . "' AND `rpos_status_id`='1'");
$shift_data = $shift->fetch_assoc();

$payment = Database::search("SELECT * FROM `rpos_payments` WHERE `order_code`='" . $order_code . "'");
$payment_rs = $payment->num_rows;

if ($payment_rs == 1) {
} else if ($card == 0 && $cash == 0) {
} else if (empty($card) && empty($cash)) {
} else {
    if (empty($card)) {
        $payment_method = 1;
    } else if (empty($cash)) {
        $payment_method = 2;
    } else {
        $payment_method = 3;
        Database::iud("INSERT INTO `day_summery_method` (`card`,`cash`,`order_code`) VALUES('" . $card . "','" . $cash . "','" . $order_code . "')");
    }
    Database::iud("UPDATE `rpos_orders` SET `order_status`='1' WHERE `order_code`='" . $order_code . "' ");

    Database::iud("INSERT INTO `rpos_payments` (`pay_id`, `pay_code`,`order_code`,`pay_amt`,`created_at`,`payment_method_id`,`created_time`) VALUES('" . $id . "','" . $payid . "','" . $order_code . "','" . $pay_amount . "','" . $date . "','" . $payment_method . "','" . $time . "')");

    Database::iud("INSERT INTO `rpos_payments_has_rpos_shift`(`rpos_payments_pay_id`,`rpos_shift_shift_id`) VALUES('" . $id . "','" . $shift_data["shift_id"] . "')");
}
