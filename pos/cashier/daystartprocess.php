<?php

require "connection.php";
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');
$day_amount = $_POST["daystart"];

$day_start =Database::search("SELECT* FROM `rpos_day`");
$day_num=$day_start->num_rows;
$day_data=$day_start->fetch_assoc();

if (empty($day_amount)) {
} else {
    if($day_num==1){
        Database::iud("UPDATE `rpos_day`
        SET `start_amount` = '".$day_amount."'
        WHERE `day_id` ='".$day_data["day_id"]."' ;");
    }else{
        Database::iud("INSERT INTO `rpos_day`(`start_amount`,`datetime` ) VALUES('" . $day_amount . "','" . $date  . "')");

    }

    echo "ok";
}
?>