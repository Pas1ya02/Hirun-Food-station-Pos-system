<?php 
require "connection.php";
$table = $_POST["table"];
$have_table = Database::search("SELECT * FROM rpos_dining WHERE rpos_table_table_id='" . $table . "' AND rpos_status_id = '1'");
    $tn = $have_table->num_rows;
    $tf = $have_table->fetch_assoc();
    if($tn == 1){
        echo $tf["order_code"];
    }else{
      echo time();
    }


?>