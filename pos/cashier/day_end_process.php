<?php

session_start();

require "connection.php";


date_default_timezone_set('Asia/Colombo');

$date = date("Y-m-d H:i:s");
if (isset($_SESSION["staff"])) {
    $status = $_SESSION["staff"]["staff_id"];
    $staff_name = Database::search("SELECT * FROM `rpos_staff` WHERE `staff_id` = '" . $status . "'");
    $staff = $staff_name->fetch_assoc();
    
   
    
    Database::iud("UPDATE `rpos_shift` SET `rpos_status_id` = '2' ,`end_time`='".$date."' WHERE `rpos_staff_staff_id`= '".$staff['staff_id']."' AND `rpos_status_id`='1' ");


    Database::iud("DELETE  FROM `rpos_day` ");
    
   
    
    $lastActivityTime = $_SESSION['last_activity'];

    // Set the inactivity timeout to 30 days
    $inactivityTimeout = 30 * 24 * 60 * 60; // 30 days in seconds
    
    if (time() - $lastActivityTime > $inactivityTimeout) {
        // User has been inactive for too long, log them out
        unset($_SESSION['staff_id']);
        session_destroy();
    }
    echo "Success";
}
