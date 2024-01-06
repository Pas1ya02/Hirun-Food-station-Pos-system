<?php
require "connection.php";

$bill_title = $_POST['bill_title'];
$bill_address = $_POST['bill_address'];
$bill_mobile = $_POST['bill_mobile'];
$discount = $_POST['discount'];
$service_charge = $_POST['service_charge'];
$bill_footer_text = $_POST['bill_footer_text'];
$cheacked = $_POST['cheacked'];





Database::iud("UPDATE `rpos_bill`
SET `bill_title` = '" . $bill_title . "', `bill_address` = '" . $bill_address . "',`bill_mobile` = '" . $bill_mobile . "',`discount` = '" . $discount . "',`service_charge` = '" . $service_charge . "',`bill_footer`= '" . $bill_footer_text . "',`rpos_status_id`= '" .  $cheacked . "'
");

echo "success";
